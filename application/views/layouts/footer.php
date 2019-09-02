        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.3.0
            </div>
            <strong>Elaborado por Sysdora <a href="https://adminlte.io"></a>.</strong> 
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
   

<script src="<?php echo base_url();?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/export-data.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>


<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url();?>assets/template/jquery-print/jquery.print.js"></script>



<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="<?php echo base_url();?>assets/template/dist/js/bootstrap-switch.js"></script>
<script src="<?php echo base_url();?>assets/template/dist/js/jquery.formatCurrency-1.4.0.min.js"></script>
<script src="<?php echo base_url();?>assets/template/dist/js/jquery.uitablefilter.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<!-- DataTables -->

<script src="<?php echo base_url();?>assets/template/datatables/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url();?>assets/template/datatables/js/dataTables.bootstrap.js"></script>

<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap-datepicker.es.min.js"></script>

<script src="<?php echo base_url();?>assets/template/bootstrap/js/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap-datetimepicker.min.js"></script> 

<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap-datetimepicker.es.js"></script>

<script src="<?= base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/template/bootstrap/js/app.min.js" type="text/javascript"></script>




<script src="<?= base_url();?>assets/plugins/select2/select2.full.min.js"></script>
<script src="<?= base_url();?>assets/plugins/jquery-validate/jquery.validate.js"></script>
<script src="<?= base_url();?>assets/plugins/jquery-validate/additional-methods.js"></script>
<script src="<?= base_url();?>assets/plugins/jquery-validate/localization/messages_es.js"></script>
<script src="<?= base_url();?>assets/plugins/jquery-form/jquery.form.js"></script>
<script src="<?= base_url();?>assets/plugins/datedropper3/datedropper.js"></script>

<script src="<?= base_url();?>assets/plugins/input-mask/jquery.inputmask.bundle.js"></script>
<script src="<?= base_url();?>assets/plugins/input-mask/jquery.mask.min.js"></script>

<script src="<?= base_url();?>assets/jquery-upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?= base_url();?>assets/jquery-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?= base_url();?>assets/jquery-upload/js/jquery.fileupload.js"></script>

<script src="<?= base_url() ?>assets/main.js?v=<?= time() ?>"></script>
<script src="<?= base_url() ?>assets/html2canvas.min.js"></script>

<script src="<?= base_url() ?>assets/template/ckeditor/ckeditor.js"></script>


<script src="<?= base_url() ?>assets/odontograma/js/main.js?v=<?= time() ?>"></script>

<?php if ($this->session->flashdata('titulo')): ?>
<div id="ModalMensajeFlash" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= $this->session->userdata('titulo') ?></h4>
      </div>
      <div class="modal-body">
        <?= $this->session->userdata('contenido') ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $('#ModalMensajeFlash').modal();
</script>
<?php endif ?>

<script language="javascript">
var base_url = '<?php echo base_url(); ?>';
var path = '<?= base_url(); ?>';
</script>
<script src="<?= base_url()?>assets/template/dist/js/archivos.js"></script>
    
</body>
</html>
