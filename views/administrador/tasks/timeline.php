  <!-- Content Wrapper. Contains page content -->
  <div id="tasks" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tasks<small>Tarefas do Projeto SUPERO</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">UI</a></li>
        <li class="active">Timeline</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <h4><?php echo $this->msg ?></h4>
          <!-- The time line -->
          <ul class="timeline">
            <div class="row">
              <div class="col-md-12">
                <div id="buscar" class="box box-primary">
                  <div class="box-body">
                    <div class="row">
                      <form action="<?php echo URL . 'tasks/tm' ?>" method="post">
                        <div class="col-md-8">
                          <!-- Date range -->
                          <div class="form-group">
                            <label>Intervalo de datas da busca:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="rangedate" id="reservationtime" value="<?php echo ((isset($_SESSION['rangedate'])) ? $_SESSION['rangedate'] : "") ?>">
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-4">
                          <!-- Date range -->
                          <div class="form-group">
                            <label>Status da tarefa:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-refresh"></i>
                              </div>
                              <select class="form-control pull-right" name="status">
                                <option <?php echo ((isset($_SESSION['status']) && $_SESSION['status'] == '') ? "selected='selected'" : "") ?> value="">Selecione ..</option>
                                <option <?php echo ((isset($_SESSION['status']) && $_SESSION['status'] == 'NEW') ? "selected='selected'" : "") ?> value="NEW">Nova</option>
                                <option <?php echo ((isset($_SESSION['status']) && $_SESSION['status'] == 'WORK') ? "selected='selected'" : "") ?> value="WORK">Executando</option>
                                <option <?php echo ((isset($_SESSION['status']) && $_SESSION['status'] == 'WAITING') ? "selected='selected'" : "") ?> value="WAITING">Aguardando</option>
                                <option <?php echo ((isset($_SESSION['status']) && $_SESSION['status'] == 'URGENT') ? "selected='selected'" : "") ?> value="URGENT">Urgente</option>
                                <option <?php echo ((isset($_SESSION['status']) && $_SESSION['status'] == 'FINISHED') ? "selected='selected'" : "") ?> value="FINISHED">Finalizados</option>
                              </select>
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-5">
                          <!-- Date range -->
                          <div class="form-group">
                            <label>Delegador:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                              </div>
                              <select class="form-control" style="width: 100%" name="created_us">
                                <option value="" selected="selected">Selecione ..</option>
                                <?php foreach ($this->users as $validUsers => $usrs): ?>
                                  <option <?php echo ((isset($_SESSION['created_us']) && $_SESSION['created_us'] == $usrs['id']) ? "selected='selected'" : "") ?> value="<?php echo $usrs['id'] ?>"><?php echo $usrs['name'] ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                        </div>
                        <div class="col-md-5">
                          <!-- Date range -->
                          <div class="form-group">
                            <label>Delegado:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                              </div>
                              <select class="form-control" style="width: 100%" name="created_to">
                                <option value="" selected="selected">Selecione ..</option>
                                <?php foreach ($this->users as $validUsers => $usrs): ?>
                                  <option <?php echo ((isset($_SESSION['created_to']) && $_SESSION['created_to'] == $usrs['id']) ? "selected='selected'" : "") ?> value="<?php echo $usrs['id'] ?>"><?php echo $usrs['name'] ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                        </div>
                        <!-- col-md-3 -->
                        <div class="col-md-2">
                          <!-- Date range -->
                          <div class="form-group">
                            <label>&nbsp;</label>
                            <div class="input-group btn-block">
                              <input type="submit" class="btn btn-success btn-block" value="Buscar" />
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                        </div>
                        <!-- col-md-2 -->
                      <form>
                      <!-- form cadastro tarefa -->
                    </div>
                    <!-- row -->
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <?php foreach(array_filter($this->dataTasks) as $taskDates => $dayTasks): ?>

              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-blue"><?php echo \App\Helpers::convertDateToPTBR($dayTasks[0]['created_dt']) ?></span>
              </li>

              <!-- /.timeline-label -->
              <?php foreach ($dayTasks as $tasks => $task): 
                $backg = \App\Helpers::setStatusToViewTask($task['status']);
              ?>

              <!-- timeline item -->
              <li data-status="<?php echo $task['status'] ?>">
                <i data-itask="<?php echo $task['id'] ?>" class="fa fa-comments bg-blue"></i>
                <div id="task_<?php echo $task['id'] ?>" class="timeline-item <?php echo $backg ?>" data-statuscolor="<?php echo $backg ?>">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php echo "#" . str_pad($task['id'], 10, 0, STR_PAD_LEFT) ?>&nbsp;&nbsp;<?php echo "<strong>".date("d/m/Y H:i:s", strtotime($task['finished_at']))."</strong>" ?></span>
                  <h3 class="timeline-header">
                    <?php echo "<a href='#'>{$task['author']}</a>"; ?></a> criou a tarefa <strong><?php echo strtolower(str_replace(".", "", $task['title'])); ?></strong> para <?php echo "<a href='#'>{$task['executer']}</a>"; ?>
                  </h3>
                  <div class="timeline-body description-task"><?php echo $task['description']; ?></div>
                  <div class="timeline-footer">
                    <a data-task="<?php echo $task['id'] ?>" data-acao="setToNew" class="responsive-buttons acao btn <?php echo (($task['status'] == 'NEW') ? "btn-success": "btn-primary") ?> btn-xs">Novo</a>
                    <a data-task="<?php echo $task['id'] ?>" data-acao="setToWork" class="responsive-buttons acao btn <?php echo (($task['status'] == 'WORK') ? "btn-success": "btn-primary") ?> btn-xs">Executando</a>
                    <a data-task="<?php echo $task['id'] ?>" data-acao="setToWaiting" class="responsive-buttons acao btn <?php echo (($task['status'] == 'WAITING') ? "btn-success": "btn-primary") ?> btn-xs">Aguardando</a>
                    <a data-task="<?php echo $task['id'] ?>" data-acao="setToUrgent" class="responsive-buttons acao btn <?php echo (($task['status'] == 'URGENT') ? "btn-success": "btn-primary") ?> btn-xs">Urgente</a>
                    <a data-task="<?php echo $task['id'] ?>" data-acao="setToFinished" class="responsive-buttons acao btn <?php echo (($task['status'] == 'FINISHED') ? "btn-success": "btn-primary") ?> btn-xs">Finalizado</a>
                    <a href="#" class="btn btn-default btn-xs hide hidden">Comentar</a>
                    <a onclick="return confirm('Deseja excluir essa tarefa?');" data-task="<?php echo $task['id'] ?>" data-telement="task_<?php echo $task['id'] ?>" class="responsive-buttons delete btn btn-danger btn-xs">Excluir</a>                      
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
            <?php endforeach ?>            
            <!-- timeline item o'clock -->
            <li style="margin-bottom: 70px">
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
            <!-- END timeline item o'clock -->
            <?php endforeach ?>
          </ul>
          <!-- timeline -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- jQuery 3 -->
  <script src="<?php echo PUBLIC_URL . 'bower_components/jquery/dist/jquery.min.js' ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo PUBLIC_URL . 'bower_components/bootstrap/dist/js/bootstrap.min.js' ?>"></script>
  <!-- Select2 -->
  <script src="<?php echo PUBLIC_URL . 'bower_components/select2/dist/js/select2.full.min.js' ?>"></script>
  <!-- InputMask -->
  <script src="<?php echo PUBLIC_URL . 'plugins/input-mask/jquery.inputmask.js' ?>"></script>
  <script src="<?php echo PUBLIC_URL . 'plugins/input-mask/jquery.inputmask.date.extensions.js' ?>"></script>
  <script src="<?php echo PUBLIC_URL . 'plugins/input-mask/jquery.inputmask.extensions.js' ?>"></script>
  <!-- date-range-picker -->
  <script src="<?php echo PUBLIC_URL . 'bower_components/moment/min/moment.min.js' ?>"></script>
  <script src="<?php echo PUBLIC_URL . 'bower_components/bootstrap-daterangepicker/daterangepicker.js' ?>"></script>
  <!-- bootstrap datepicker -->
  <script src="<?php echo PUBLIC_URL . 'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ?>"></script>
  <!-- bootstrap color picker -->
  <script src="<?php echo PUBLIC_URL . 'bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js' ?>"></script>
  <!-- bootstrap time picker -->
  <script src="<?php echo PUBLIC_URL . 'plugins/timepicker/bootstrap-timepicker.min.js' ?>"></script>
  <!-- SlimScroll -->
  <script src="<?php echo PUBLIC_URL . 'bower_components/jquery-slimscroll/jquery.slimscroll.min.js' ?>"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?php echo PUBLIC_URL . 'plugins/iCheck/icheck.min.js' ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo PUBLIC_URL . 'bower_components/fastclick/lib/fastclick.js' ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo PUBLIC_URL . 'js/adminlte.min.js' ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo PUBLIC_URL . 'js/demo.js' ?>"></script>
  <!-- Page script -->
  <!-- Personal Scripts   -->
  <?php if(isset($this->js)): ?>
    <?php foreach ($this->js as $js): ?>
      <?php echo '<script type="text/javascript" src="'.URL.'views/administrador/'.$js.'"></script>'; ?>
    <?php endforeach; ?>
  <?php endif; ?>
  </body>
</html>  