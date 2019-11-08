<?php 
namespace Controllers;

use Utils;

class Tasks extends \App\Controller
{
	public function __construct()
	{
		parent::__construct();
		\App\Session::init();
		\Utils\Auth::handleLogin();

		$this->view->js = array(
			'tasks/js/default.js',
			'tasks/js/alterClass.js',
			'tasks/js/bootstrap-datepicker.pt-BR.min.js'
		);
		$this->view->css = array('tasks/css/default.css');
	}

	public function index()
	{
		header("Location: " . URL . "tasks/tm");
	}

	public function add()
	{
		$this->view->title = "Cadastro";
		$this->view->subtitle = "Insira nova tarefa";
		
		$this->view->users = $this->model->select();
		$this->view->renderH("tasks/add", false, true);
	}

	public function add_()
	{
		$task = $_POST;
		$task['team'] = strip_tags($_POST['created_to']);
		$task['created_at'] = date("Y-m-d H:i:s", strtotime($_POST['created_at']));
		$task['finished_at'] = str_replace("/", "-", implode("/", array_reverse(explode("/", $_POST['finished_at']))));
		$task['finished_at'] = $task['finished_at'] . " " . date("H:i:s");

		/* If Not Minimum Info Passed, Redirect to Form */
		if(count(array_filter($task)) <= 10)
			header("Location: " . URL . "tasks/add");

		/* cadastrar tarefa no banco de dados */
		$cadastrar = $this->model->create('supero_tasks', $task);
			header("Location: " . URL . "tasks/tm");
	}

	public function tm($comando = null)
	{	
		// Filtros
		$getUrl = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$filterParams = $this->filterParams($getUrl);
		$getPost = array_filter($_POST);

		if(isset($getPost['rangedate'])){
			$getPost['from'] = $this->extractFromDateRange($getPost['rangedate']);
			$getPost['to'] = $this->extractToDateRange($getPost['rangedate']);
		}

		// Models
		$dates = $this->tasksDates(); # $getPost
		$this->view->users = $this->model->select();

		/* Verify A Form Search And Apply Correct Instruction */
		if(isset($getPost) && count(array_filter($getPost)) > 0):
			$tasks = $this->model->selectTasksGoupedByDatesWithSearch($getPost);
		else:
			$tasks = $this->model->selectTasksGoupedByDates($dates, $filterParams);
		endif;

		// Views
		$this->view->msg = ((count(array_filter($tasks)) == 0) ? "Nehuma tarefa foi encontrada." : "");
		$this->view->dataTasks = $tasks;
		$this->view->title = "SUPERO | Tarefas do Sistema";
		$this->view->renderH("tasks/timeline", false, true);
	}

	/**
	 * [managetask description]
	 * @return [type] [description]
	 */
	public function managetask()
	{
		$post = $_POST;
		$acao = strip_tags($post['acao']);
		$postData['id'] = strip_tags($post['idtask']);
		$possibilities = ['setToNew', 'setToWork', 'setToWaiting', 'setToFinished'];

		$response = "";
		if(in_array($acao, $possibilities) || is_numeric($postData['id'])){
			$response = $this->passTaskStatusToUpdate($acao, $postData);
		} 

		echo json_encode($response);
	}

	private function passTaskStatusToUpdate(String $acao, Array $postData)
	{
		$response = 0;
		if($acao == 'setToNew') $response = $this->setToNew($postData);
		if($acao == 'setToWork') $response = $this->setToWork($postData);
		if($acao == 'setToWaiting') $response = $this->setToWaiting($postData);
		if($acao == 'setToUrgent') $response = $this->setToUrgent($postData);
		if($acao == 'setToFinished') $response = $this->setToFinished($postData);

		return $response;
	}

	public function setToNew(Array $postData)
	{
		$postData['status'] = 'NEW';
		if($this->model->setToNew($postData) === true) return 'NEW';
	}

	public function setToWork(Array $postData)
	{
		$postData['status'] = 'WORK';
		if($this->model->setToWork($postData) === true) return 'WORK';
	}

	public function setToWaiting(Array $postData)
	{
		$postData['status'] = 'WAITING';
		if($this->model->setToWaiting($postData) === true) return 'WAITING';
	}

	public function setToUrgent(Array $postData)
	{
		$postData['status'] = 'URGENT';
		if($this->model->setToUrgent($postData) === true) return 'URGENT';
	}

	public function setToFinished(Array $postData)
	{
		$postData['status'] = 'FINISHED';
		if($this->model->setToFinished($postData) === true) return 'FINISHED';
	}

	/**
	 * Extract filter param to SQL Query
	 * @param  [type] $param [description]
	 * @return [type] [description]
	 */
	public function filterParams($param = null)
	{
		$explode = ((isset(explode("/f_", $param)[1]))? explode("/f_", $param)[1] : 'NEW');
		if(isset($explode) && !is_null($explode)){
			switch ($explode) {
				case 'novas':
					$filter = 'NEW';
					break;
				case 'andamento':
					$filter = 'WORK';
					break;
				case 'aguardando':
					$filter = 'WAITING';
					break;
				case 'urgente':
					$filter = 'URGENT';
					break;
				case 'terminado':
					$filter = 'FINISHED';
					break;
				default:
					$filter = null;
					break;
			}

			return $filter;
		}
	}

	private function extractFromDateRange($rangeDate)
	{
		$rangeDate = explode(" - ", trim($rangeDate))[0];
		return $rangeDate = str_replace("/", "-", implode("/", array_reverse(explode("/", $rangeDate))));
	}

	private function extractToDateRange($rangeDate)
	{
		$rangeDate = explode(" - ", trim($rangeDate))[1];
		return $rangeDate = str_replace("/", "-", implode("/", array_reverse(explode("/", $rangeDate))));
	}

	/**
	 * Get Tasks Dates
	 * @return [type] [description]
	 */
	private function tasksDates()
	{
		$returnDates = [];
		foreach ($this->model->selectGoupedTasksDates() as $dates => $date) {
			$returnDates[] = $date['created_dt'];
		} return $returnDates;
	}

	/**
	 * Delete Specific Task
	 * @return [type] [description]
	 */
	public function delspecifictask()
	{
		$id = (int)strip_tags($_POST['idtask']);

		if( $id !== 0 ){
			if($this->model->delspecifictask($id) == true){
				echo json_encode(true);
				return;
			} 

			echo json_encode(false);
		}
	}
}