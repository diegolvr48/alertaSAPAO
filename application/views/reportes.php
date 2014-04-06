<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>AlertaSAPAO - Reportes</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url()?>site_media/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 35px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo base_url()?>site_media/css/animate.css">

        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
        <![endif]-->
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
            <li class="active"><a href="<?php echo site_url('inicio/reportes');?>">Reportes</a></li>
            <li><a href="<?php echo site_url('inicio/estadisticas');?>">Estadisticas</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container" id="cont-iconos">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
          <div class="page-header">
            <h1>Listado de reportes emitidos</h1>
          </div>
          <table class="table table-striped" id="table_reportes">
            <thead>
              <tr>
                <th>#</th>
                <th>Status</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Dirección</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div> <!-- /container -->

        <script src="<?php echo base_url()?>site_media/js/vendor/jquery-1.11.0.min.js"></script>
        <script src="<?php echo base_url()?>site_media/js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript">
          $(function() {
            $.ajax({
              url: 'http://reportesapao.oaxaca.gob.mx/api/requests.json',
              type: 'GET',
              dataType: 'JSON'
            })
            .done(function(text) {
              $.each(text.service_requests, function(index, val) {
                 var contenido = '<tr>'+
                                   '<td>'+val.service_request_id+'</td>'+
                                   '<td>'+val.status+'</td>'+
                                   '<td>'+val.service_name+'</td>'+
                                   '<td>'+val.description+'</td>'+
                                   '<td>'+val.address+'</td>'+
                                  '</tr>';
                  $('#table_reportes tbody').append(contenido);
              });
            })
            .fail(function() {
              console.log("error");
            })
          });
        </script>
    </body>
</html>
