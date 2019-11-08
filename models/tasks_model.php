<?php 
namespace Models;

class Tasks_Model extends \App\Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Select All Tasks Dates To Foreach This
	 * @return [type] [description]
	 */
	public function selectGoupedTasksDates()
	{
		return $stmt = $this->db->select("SELECT created_dt FROM supero_tasks GROUP BY created_dt ORDER BY created_at ASC");
	}

	/**
	 * Draw Timeline With Simple Filter Data
	 * @return [type] [description]
	 */
	public function selectTasksGoupedByDates($tasksDates, $filter = null)
	{
		$tasks = [];
		$today = date("Y-m-d");
		$where = "1 = 1";

		switch ($filter){
			case 'NEW':
				$where .= " AND status = 'NEW'";
				break;
			case 'WORK':
				$where .= " AND status = 'WORK'";
				break;
			case 'WAITING':
				$where .= " AND status = 'WAITING'";
				break;
			case 'URGENT':
				$where .= " AND status = 'URGENT'";
				break;
			case 'OUTDEADLINE':
				$where .= " AND finished_at < CURDATE() AND status != 'FINISHED'";
				break;
			case 'FINISHED':
				$where .= " AND status = 'FINISHED'";
				break;
			default:
				$where .= '';
				break;
		}

		foreach ($tasksDates as $date => $dt):

			$created_dt = $dt;
			$sql = "
				SELECT supero_tasks.*, a.name AS author, b.name AS executer 
				FROM supero_tasks 
				INNER JOIN supero_users a ON created_us = a.id
				INNER JOIN supero_users b ON created_to = b.id
				WHERE " . $where . " AND created_dt = '$created_dt'
				ORDER BY created_at ASC
			";
			$tasks[] = $this->db->select($sql);
		endforeach;
		return $tasks;
	}

	/**
	 * Draw Timeline With Specialized Filter Data
	 * @return [type] [description]
	 */
	public function selectTasksGoupedByDatesWithSearch($pstFilter)
	{		
		$tasks = [];
		$today = date("Y-m-d");
		$where = "1 = 1";

		/* Set Date Range Between */
		if(isset($pstFilter['from']) && isset($pstFilter['to']) ):	
			\App\Session::set('rangedate', $pstFilter['rangedate']);
			$from = date("Y-m-d 00:00:00", strtotime($pstFilter['from']));
			$to = date("Y-m-d 23:59:59", strtotime($pstFilter['to']));
			$where .= " AND created_at BETWEEN '$from' AND '$to'";

			$period = new \DatePeriod(
			    new \DateTime($pstFilter['from']),
			    new \DateInterval('P1D'),
			    new \DateTime(date("Y-m-d", strtotime($pstFilter['to'] . '+1 day')))
			);

			$tasksDates = [];
			foreach ($period as $dateIndice => $date):
			    $tasksDates[] = $date->format('Y-m-d');      
			endforeach;
		else:
			\App\Session::set('rangedate', NULL);	
		endif;

		/* Set Status Of Task */
		if(isset($pstFilter['status'])){
			$filter = trim($pstFilter['status']);
			\App\Session::set('status', $pstFilter['status']);
			switch ($filter){
				case 'NEW':
					$where .= " AND status = 'NEW'";
					break;
				case 'WORK':
					$where .= " AND status = 'WORK'";
					break;
				case 'WAITING':
					$where .= " AND status = 'WAITING'";
					break;
				case 'URGENT':
					$where .= " AND status = 'URGENT'";
					break;
				case 'FINISHED':
					$where .= " AND status = 'FINISHED'";
					break;
				default:
					$where .= '';
					break;
			}				
		} else {
			\App\Session::set('status', NULL);
		}

		/* Delegate Author */
		if(isset($pstFilter['created_us'])){
			\App\Session::set('created_us', $pstFilter['created_us']);
			$created_us = (int)$pstFilter['created_us'];
			$where .= " AND created_us = $created_us";
		} else {
			\App\Session::set('created_us', NULL);
		}

		/* Delegate Executer */
		if(isset($pstFilter['created_to'])){
			\App\Session::set('created_to', $pstFilter['created_to']);
			$created_to = (int)$pstFilter['created_to'];
			$where .= " AND created_to = $created_to";
		} else {
			\App\Session::set('created_to', NULL);
		}

		foreach ($tasksDates as $date => $dt):
			$created_dt = $dt;
			$sql = "
				SELECT supero_tasks.*, a.name AS author, b.name AS executer 
				FROM supero_tasks 
				INNER JOIN supero_users a ON created_us = a.id
				INNER JOIN supero_users b ON created_to = b.id
				WHERE " . $where . " and created_dt = '$created_dt'
				ORDER BY created_at ASC
			";
			$tasks[] = $this->db->select($sql);
		endforeach;
		return $tasks;		
	}

	/**
	 * Set Task Status To New
	 * @return [type] [description]
	 */
	public function setToNew(Array $postData)
	{
		return $this->db->update('supero_tasks', $postData, "id = {$postData['id']}");
	}

	/**
	 * Set Task Status To Working
	 * @return [type] [description]
	 */
	public function setToWork(Array $postData)
	{
		return $this->db->update('supero_tasks', $postData, "id = {$postData['id']}");
	}

	/**
	 * Set Task Status To Waiting
	 * @return [type] [description]
	 */
	public function setToWaiting(Array $postData)
	{
		return $this->db->update('supero_tasks', $postData, "id = {$postData['id']}");
	}

	/**
	 * Set Task Status To Urgent
	 * @return [type] [description]
	 */
	public function setToUrgent(Array $postData)
	{
		return $this->db->update('supero_tasks', $postData, "id = {$postData['id']}");
	}

	/**
	 * Set Task Status To Finished
	 * @return [type] [description]
	 */
	public function setToFinished(Array $postData)
	{
		return $this->db->update('supero_tasks', $postData, "id = {$postData['id']}");
	}	

	/**
	 * Insert New Task On Database
	 * @param  [type] $table [description]
	 */
	public function create($table, $postData)
	{
		return $this->db->insert($table, $postData);
	}

	/**
	 * Select All Users On Database
	 * @param  [type] $table [description]
	 */
	public function selectUsers()
	{
		return $stmt = $this->db->select("SELECT id, name FROM supero_users ORDER BY name ASC");
	}

	/**
	 * Delete Specific Task On Database
	 * @param  [type] $table [description]
	 */
	public function delspecifictask($id)
	{
		$result = $this->db->delete("supero_tasks", "id = '$id'");
		return $result;
	}
}