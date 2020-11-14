<!DOCTYPE html>
<html lang="en">
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRM</title>

    <!-- Bootstrap -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Custom Theme Style -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/build/css/custom.min.css" rel="stylesheet">

    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jquery/dist/ui/1.12.0/jquery-ui.css" rel="stylesheet">

    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jquery/dist/ui/1.12.4/jquery-1.12.4.js"></script>

    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jquery/dist/ui/1.12.0/jquery-ui.js"></script>

    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jquery/dist/jquery.blockUI.js"></script>
  </head>

    <!-- Require the sidebar -->
    <?php if(!Yii::app()->user->isGuest) require_once('tpl_sidebar.php')?>  

    <!-- Require the header -->
    <?php if(!Yii::app()->user->isGuest) require_once('tpl_header.php')?>

    <!-- Include content pages -->
    <?php echo $content; ?>
    
    <!-- Require the footer -->
    <?php if(!Yii::app()->user->isGuest) require_once('tpl_footer.php')?>

</body>
</html>