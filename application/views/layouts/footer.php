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
   



<!-- 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    -->
   


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

<script src="<?= base_url();?>assets/main.js?v=<?= time() ?>"></script>


<script language="javascript">
    var base_url = '<?php echo base_url(); ?>';
    var path = '<?= base_url(); ?>';
</script>
<script src="<?= base_url()?>assets/template/dist/js/archivos.js"></script>

<script type="text/javascript">

$(document).ready(function () {
 var base_url="<?php echo base_url();?>"; 
 var year = (new Date).getFullYear();
 //datagrafico(base_url, year);
 $("#year").on("change",function(){

    yearselect = $(this).val();
    //datagrafico(base_url,yearselect);
 });




 $('button.ingresar').click(function() {
    swal(
  'Good job!',
  'You clicked the button!',
  'success'
)
  });
   

    $(".btn-remove").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
       // alert(ruta);
       $.ajax({
        url: ruta,
        type:"POST",
        success:function(resp){
          window.location.href = base_url + resp;
        }
       });
        
    });
    $(".btn-view").on("click",function (){
        var id=$(this).val();
        $.ajax({
            url: base_url + "mantenimiento/categorias/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
               // alert(resp);
            }
        });
    });


     $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Almacen",
                exportOptions: {
                    columns: [ 0, 1,2, 3, 4, 5,6]
                }
            },
            {
                extend: 'pdfHtml5',
                title: "Listado de Almacen",
                exportOptions: {
                    columns: [ 0, 1,2, 3, 4, 5, 6 ]
                }
                
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        },
   "bDestroy":true,
        "iDisplayLength": 10,
        "order": [[0,"desc"]]
 });
/*function datagrafico(base_url,year){
    namesMonth= ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Set","Oct","Nov","Dic"];
    $.ajax({
        url: base_url + "reportes/iconos/getData",
        type:"POST",
        data:{year: year},
        dataType:"json",
        success:function(data){
            var meses = new Array();
            var montos = new Array();
            $.each(data,function(key, value){
                meses.push(namesMonth[value.mes - 1]);
                valor = Number(value.totalcarita);
                montos.push(valor);
            });
            graficar(meses,montos,year);
        }
    });
}*/
function graficar(meses, montos, year ) {
    Highcharts.chart('grafico', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Cantidad de caritas acumuladas'
    },
    subtitle: {
        text: 'Año:' + year
    },
    xAxis: {
        categories: meses,
        
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        },
          series:{
            dataLabels:{
                enabled:true,
                formatter:function(){
                    return Highcharts.numberFormat(this.y,2)
                }

            }
        }
    },
    series: [{
        name: 'Excelente' ,
        data: montos

    }, {
        name: 'Bueno' ,
        data: montos

    },
    {
        name: 'Regular' ,
        data: montos

    },

     {
        name: 'Pesimo' ,
        data: montos

    },

    {
        name: 'Malo' ,
        data: montos

    },


     ]

   
});

 function graficos_nuevos(){
Highcharts.chart('container', {

    title: {
        text: 'Solar Employment Growth by Sector, 2010-2016'
    },

    subtitle: {
        text: 'Source: thesolarfoundation.com'
    },

    yAxis: {
        title: {
            text: 'Number of Employees'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },

    series: [{
        name: 'Installation',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }, {
        name: 'Manufacturing',
        data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    }, {
        name: 'Sales & Distribution',
        data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    }, {
        name: 'Project Development',
        data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    }, {
        name: 'Other',
        data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
   }




}


    $('.sidebar-menu').tree();

   
})
</script>


    
        


    
  


    
</body>
</html>
