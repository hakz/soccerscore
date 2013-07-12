<?php
//echo '<pre>';
//print_r($ctrl);
//echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Soccer Score Web Application</title>
        <!-- Le styles -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" rel="stylesheet"> 
        <link href="<?php echo base_url(); ?>assets/css/docs.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/google-code-prettify/prettify.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
        <script>
            $(function() {
                window.prettyPrint && prettyPrint();
                $('#awal').datepicker();
            });
        </script>

    </head>
    <body style="background-color: #f5f5f5; margin-top: -60px" >
        <header class="jumbotron subhead" id="overview" style="background-color: white">
            <div class="container">
                <h1>Soccer Score</h1>
                <p class="lead">One stop soccer score web application</p>
            </div>
        </header>
        <!--		</header>-->
        <div class="container-fluid" >
            <div class="row-fluid">
                <div class="span2">
                    <div class="well sidebar-nav" style="background-color: white">
                        <ul class="nav nav-list">
                            <li class="nav-header">Menu</li>
                            <li class="active"><?php echo anchor('administrator/barang', 'Input', 'title="Input"'); ?></li>
                            <li><?php echo anchor('administrator/order', 'List', 'title="List"'); ?></li>
                            <li><?php echo anchor('news/local/123', 'Rekap', 'title="Rekap"'); ?></li>
                            <li><?php echo anchor('news/local/456', 'Summary', 'title="Summary"'); ?></li>
                        </ul>
                         <ul class="nav nav-list">
                             <li class="nav-header"></li>
                           <a class="btn btn-warning btn-small" href="<?php echo site_url('login/logout'); ?>"><i class="icon-off"></i> Logout</a>
                         </ul>
                    </div><!--/.well -->
                </div><!--/span-->
                <div class="span10">
                    <div class="well" style="padding: 20px; background-color: white; ">
                        <?php $this->load->view('admin/' . $ctrl['page']); ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>