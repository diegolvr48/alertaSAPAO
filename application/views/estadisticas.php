<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AlertaSAPAO - Estadisticas</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>site_media/css/bootstrap.min.css">
    <style>
      body {
        padding-top: 65px;
        padding-bottom: 20px;
      }
    </style>
    <!-- Add custom CSS here -->
    <link href="<?php echo base_url()?>site_media/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>site_media/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>site_media/css/morris.css">
  </head>

  <body>
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AlertaSAPAO</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url();?>">Inicio</a></li>
            <li><a href="<?php echo site_url('inicio/mapa');?>">Mapa</a></li>
            <li><a href="<?php echo site_url('inicio/reportes');?>">Reportes</a></li>
            <li class="active"><a href="<?php echo site_url('inicio/estadisticas');?>">Estadisticas</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-4">
                    <i class="fa fa-check fa-5x"></i>
                  </div>
                  <div class="col-xs-8 text-right">
                    <p class="announcement-text" id="total_requests"></p>
                    <p class="announcement-text" id="num_req"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-text" id="mat"></p>
                    <p class="announcement-text" id="num_mat"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-4">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <div class="col-xs-8 text-right">
                    <p class="announcement-text" id="vest"></p>
                    <p class="announcement-text" id="num_vest"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-4">
                    <i class="fa fa-file fa-5x"></i>
                  </div>
                  <div class="col-xs-8 text-right">
                    <p class="announcement-text" id="noct"></p>
                    <p class="announcement-text" id="num_noct"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Colonias con más suministro</h3>
              </div>
              <div class="panel-body">
                <div id="morris-chart-area"></div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Lugar con Mas Agua en c/ Horario</h3>
              </div>
              <div class="panel-body">
                <div id="morris-chart-donut"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Ranking Matutino</h3>
              </div>
              <div class="panel-body">
                  <div id="morris-chart-line"></div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->
    <script src="<?php echo base_url()?>site_media/js/vendor/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url()?>site_media/js/morris/raphael-min.js"></script>
    <script src="<?php echo base_url()?>site_media/js/morris/morris-0.4.3.min.js"></script>
    <script src="<?php echo base_url()?>site_media/js/morris/chart-data-morris.js"></script>
    <script type="text/javascript">
      $(function(){
        var colonias = [],
            status_codes = [],
            hosts = [];
        $.ajax({
          url: '<?php echo site_url("inicio/reportes1")?>',
          type: 'GET',
          dataType: 'JSON',
          async: false
        }).done(function(data){
          $(data.vXc).each(function(i,item){
            if(i <= 10)
            {
              colonias.push({nombre:i,cant:item.cantidad});
            }
            else
            {
              return false;
            }

          })
          $('#total_requests').html('<strong>'+data.ganona.nombre+'</strong>');
          $('#num_req').html(data.ganona.maximo);
          $('#mat').html('<strong>'+data.coloniaM.nombre+'</strong>');
          $('#num_mat').html(data.coloniaM.maximo);
          $('#vest').html('<strong>'+data.coloniaV.nombre+'</strong>');
          $('#num_vest').html(data.coloniaV.maximo);
          $('#noct').html('<strong>'+data.coloniaN.nombre+'</strong>');
          $('#num_noct').html(data.coloniaN.maximo);
          status_codes.push({label:data.coloniaM.nombre,value:data.coloniaM.maximo});
          status_codes.push({label:data.coloniaV.nombre,value:data.coloniaV.maximo});
          status_codes.push({label:data.coloniaN.nombre,value:data.coloniaN.maximo});
          $(data.turnoV).each(function(i,item){
            if(i <= 10)
            {
              hosts.push({nombre:item.nombre,value:item.cantidad})
            }
            else
            {
              return false;
            }
          });
          Morris.Area({
            // ID of the element in which to draw the chart.
            element: 'morris-chart-area',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: colonias,
            // The name of the data record attribute that contains x-visitss.
            xkey: 'nombre',
            // A list of names of data record attributes that contain y-visitss.
            ykeys: ['cant'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Cantidad'],
            // Disables line smoothing
            smooth: false,
            lineColors: ['#16a085'],
          });
          Morris.Donut({
            element: 'morris-chart-donut',
            data: status_codes,
            colors: [
              '#2ecc71',
              '#2980b9',
              '#9b59b6',
              '#e74c3c'
            ],
            formatter: function (y) { return y + "%" ;}
          });
          Morris.Bar({
            // ID of the element in which to draw the chart.
            element: 'morris-chart-line',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: hosts,
            // The name of the data record attribute that contains x-visitss.
            xkey: 'nombre',
            // A list of names of data record attributes that contain y-visitss.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Valor'],
            // Disables line smoothing
            barRatio: 0.4,
            xLabelAngle: 10,
            hideHover: 'auto'
          });
        })
      })
    </script>
  </body>
</html>