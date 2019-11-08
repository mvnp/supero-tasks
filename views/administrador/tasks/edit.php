  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $this->tittle ?>
        <small><?php echo $this->subtitle ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div id="taskBox" class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Editar registro existente</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget=""><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget=""><i class="fa fa-remove"></i></button>
          </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <form action="<?php echo URL . "tasks/edit_/{$this->task['id']}" ?>" method="post" enctype="application/x-www-url-encoded" autocomplet="off">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Quem está delegando a tarefa?</label>
                  <select class="form-control" style="width: 100%" required name="created_us">
                    <option value="">Selecione ..</option>
                    <?php foreach ($this->users as $validUsers => $usrs): ?>
                      <option <?php echo ((isset($this->task['created_us']) && $this->task['created_us'] == $usrs['id']) ? "selected='selected'" :"") ?> value="<?php echo $usrs['id'] ?>"><?php echo $usrs['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>A quem se destina a tarefa?</label>
                  <select class="form-control" style="width: 100%" required name="created_to">
                    <option value="">Selecione ..</option>
                    <?php foreach ($this->users as $validUsers => $usrs): ?>
                      <option <?php echo ((isset($this->task['created_to']) && $this->task['created_to'] == $usrs['id']) ? "selected='selected'" :"") ?> value="<?php echo $usrs['id'] ?>"><?php echo $usrs['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Data de entrega</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker_2" required value="<?php echo ((isset($this->task['finished_at'])) ? date("d/m/Y", strtotime($this->task['finished_at'])) : "") ?>" name="finished_at" autocomplet="off">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Categoria da tarefa?</label>
                  <select class="form-control" style="width: 100%" name="categoria" readonly>
                    <option value="">Selecione ..</option>
                    <option value="5" <?php echo ((isset($this->task['categoria']) && $this->task['categoria'] == "5") ? "selected='selected'" : ""); ?>>Tarefa de Casa</option>
                    <option value="6" <?php echo ((isset($this->task['categoria']) && $this->task['categoria'] == "6") ? "selected='selected'" : ""); ?>>Tarefa do Trabalho</option>
                    <option value="7" <?php echo ((isset($this->task['categoria']) && $this->task['categoria'] == "7") ? "selected='selected'" : ""); ?>>Tarefas adicionais</option>
                  </select>
                </div>
              </div>
            </div>   
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Título da tarefa</label>
                  <input type="text" class="form-control" style="width: 100%" value="<?php echo ((isset($this->task['title'])) ? $this->task['title'] : "") ?>" name="title" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" style="width: 100%; height: 150px" name="description" required><?php echo ((isset($this->task['description'])) ? $this->task['description'] : "") ?></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="hidden" name="status" value="NEW" required />
                  <input type="hidden" name="team" value="<?php echo $this->task['created_to'] ?>" required />
                  <input type="hidden" name="updated_at" value="<?php echo date("Y-m-d H:i:s") ?>" required />
                  <input type="submit" class="btn btn-success btn-block" value="Atualizar tarefa" />
                </div>
              </div>
            </div>
            <!-- /.row -->
          </form>
          <!-- /.form -->
        </div>
        <!-- /.box-body -->
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