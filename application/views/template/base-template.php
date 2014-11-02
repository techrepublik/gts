<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<title>USM - GTS | <?php echo isset($title) ? $title : 'A tracer study of USM Graduates'; ?></title>
<link href="<?php echo base_url('assets/css/jquery-ui-1.11.1/jquery-ui.min.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/bootstrap-3.1.1/bootstrap.min.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet" />
<?php
if(isset($styles)):
foreach($styles as $css):
?>
<link href="<?php echo base_url('assets/css/' . $css . '.css'); ?>" rel="stylesheet" />
<?php
endforeach;
endif;
?>
<script type='text/javascript'>var base_url = '<?php echo base_url(); ?>';</script>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top header" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">GRADUATE TRACER STUDY</a>
</div>
<div class="collapse navbar-collapse">
<?php 
if(isset($menu)):
echo $menu;
endif;
?>
</div>
</div>
</div>
<?php
if(isset($modals)):
foreach ($modals as $modal):
echo $modal;
endforeach;
endif;
if(isset($content)):
echo $content;
endif;
?>
<div class="footer"><div class="footer-text"><p>All content is public domain unless otherwise stated.</p></div></div>
<script src="<?php echo base_url('assets/js/jquery-2.1.1/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui-1.11.1/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-3.1.1/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/moment-2.8.3/moment.min.js'); ?>"></script>
<?php
if(isset($jscripts)):
foreach($jscripts as $js):
?>
<script src="<?php echo base_url('assets/js/' . $js . '.js'); ?>"></script>
<?php
endforeach;
endif;
?>
<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
</body>
</html>
