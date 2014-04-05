<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url()?>site_media/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 0;
                padding-bottom: 20px;
            }
            #cont-iconos{
              margin-top: 8%;
            }
            .jumbotron{
              background-color: #EEE;
            }
            #cont-iconos h1{
              font-weight: 400;
            }
        </style>
        <link rel="stylesheet" href="<?php echo base_url()?>site_media/css/animate.css">

        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <div class="jumbotron">
      <div class="container text-center" id="cont-mensaje">
        <h1>AlertaSAPAO</h1>
        <p>Información y alertas sobre el suministro de agua en la Ciudad de Oaxaca</p>
      </div>
    </div>

    <div class="container" id="cont-iconos">
      <!-- Example row of columns -->
      <div class="row text-center">
        <div class="col-md-4">
          <a href="<?php echo site_url('inicio/mapa')?>">
            <img src="<?php echo base_url()?>site_media/img/icono.png" alt="">
          </a>
        </div>
        <div class="col-md-4">
          <img src="<?php echo base_url()?>site_media/img/icono2.png" alt="">
        </div>
        <div class="col-md-4">
          <img src="<?php echo base_url()?>site_media/img/icono3.png" alt="">
        </div>
      </div>
    </div> <!-- /container -->

        <script src="<?php echo base_url()?>site_media/js/vendor/jquery-1.11.0.min.js"></script>
        <script src="<?php echo base_url()?>site_media/js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript">
          $(function() {
            $('#cont-mensaje').addClass('animated pulse');
            $('#cont-iconos').addClass('animated bounceIn');
          });
        </script>
    </body>
</html>
