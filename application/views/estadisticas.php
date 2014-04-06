<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>site_media/css/bootstrap.min.css">
    <style>
      body {
        padding-top: 60px;
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
            <li class="active"><a href="<?php echo site_url('inicio/estaditicas');?>">Estadisticas</a></li>
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
                    <p class="announcement-heading" id="total_requests"></p>
                    <p class="announcement-text">Solicitudes!</p>
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
                    <p class="announcement-heading" id="unique_visitors"></p>
                    <p class="announcement-text">Visitantes</p>
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
                    <p class="announcement-heading" id="failed_requests"></p>
                    <p class="announcement-text">Solicitudes Fallidas</p>
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
                    <p class="announcement-heading" id="unique_files"></p>
                    <p class="announcement-text">Archivos!</p>
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
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Estadísticas de tráfico</h3>
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
                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Status Codes</h3>
              </div>
              <div class="panel-body">
                <div id="morris-chart-donut"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> IP's más frecuentes</h3>
              </div>
              <div class="panel-body">
                  <div id="morris-chart-line"></div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->
  </body>
</html>