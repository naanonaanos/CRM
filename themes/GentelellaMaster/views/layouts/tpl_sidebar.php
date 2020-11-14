<?php
  $baseUrl = Yii::app()->theme->baseUrl; 
  $cs = Yii::app()->getClientScript();
  Yii::app()->clientScript->registerCoreScript('jquery');
?>
<body class="nav-md footer_fixed">

  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jquery/dist/ui/1.12.0/jquery-ui.css" rel="stylesheet">

    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jquery/dist/ui/1.12.4/jquery-1.12.4.js"></script>

     <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jquery/dist/ui/1.12.0/jquery-ui.js"></script>

     <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jquery/dist/jquery.blockUI.js"></script>

<div class="container body">
<div class="main_container">
<div class="col-md-3 left_col menu_fixed">
<div class="left_col scroll-view">
<div class="navbar nav_title" style="border: 0;">
        <a class="site_title"><span><center>CRM Application</center></span></a>
</div>

<div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile clearfix">
<div class="profile_pic">
  <!-- <img src="images/nizam.jpg" alt="Nizam Haqqizar" class="img-circle profile_img"> -->

          <?php
        if(!Yii::app()->user->isGuest)
        {
          $user = Yii::app()->user->id;
          $photo = Yii::app()->user->getState('picture');
          if($photo)
          {
            echo '<img src="'.$photo.'"class=" img-thumbnail profile_img" alt="User Image">';  
          }
          else
            echo '<img src="'.$baseUrl.'/dist/img/profile.png" class="img-circle profile_img" alt="User Image">';
        }
      ?>
</div>

<div class="profile_info">
<span><h2><?php if(!Yii::app()->user->isGuest) echo '&nbsp;'.Yii::app()->user->getState('fullName'); ?></h2></span>
 <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
</div>
</div>
<!-- /menu profile quick info -->

<br />


<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
<div class="menu_section">
          <?php
          if(!Yii::app()->user->isGuest)
          {
            $permission = array();

            $permission[] = array('label'=>'<i class="fa fa-dashboard"></i>Home', 'url'=>('index.php'));

            if(Yii::app()->user->getState('groupName') != 'client')
            {
              $permission[] = array('label'=>'<i class="fa fa-users"></i>Customers',
                                    'url'=>'#',
                                    'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=> 'dropdown'),
                                    'itemOptions'=>array('class'=>'dropdown user'),
                                    'items'=>array(
                                      array('label'=>'<i class="fa fa-building-o"></i>Leads', 'url'=>array('/Leads/index')),
                                      array('label'=>'<i class="fa fa-user"></i>Contact', 'url'=>array('/Contact/index')),
                                      array('label'=>'<i class="fa fa-sitemap"></i>Account', 'url'=>array('/Account/index'))
                                    ),
                              );
            }
            
            // if ( Yii::app()->user->getState('groupName') == "am" || Yii::app()->user->getState('groupName') == "development") {
            // Buat menentukan privilege menu ke user
            if(Yii::app()->user->getState('groupName') != 'client')
            {
              $permission[] = array('label'=>'<i class="fa fa-money"></i>Opportunity', 'url'=>array('/Opportunity/index'));
            }
            // }

            if(Yii::app()->user->getState('groupName') != 'client')
            {
              $permission[] = array('label'=>'<i class="fa fa-archive"></i>Activity',
                                    'url'=>'#',
                                    'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=> 'dropdown'),
                                    'itemOptions'=>array('class'=>'dropdown user'),
                                    'items'=>array(
                                      array('label'=>'<i class="fa fa-comments-o"></i>Meeting', 'url'=>array('/Meeting/index')),
                                      array('label'=>'<i class="fa fa-file-text"></i>Notes', 'url'=>array('/Notes/index')),
                                      array('label'=>'<i class="fa fa-tasks"></i>Task', 'url'=>array('/Task/index'))
                                    ),
                              );
            }

            if(
              Yii::app()->user->getState('groupName') != 'sd' &&
              Yii::app()->user->getState('groupName') != 'client'
            )
            {
             $permission[] = array('label'=>'<i class="fa fa-wrench"></i>Other', 
                                   'url'=>'#',
                                   'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                                   'itemOptions'=>array('class'=>'dropdown user'),
                                   'items'=>array(
                                      array('label'=>'<i class="fa fa-child"></i>Users', 'url'=>array('/Users/index'))
                                    ),
                              );
            }

            $this->widget('zii.widgets.CMenu',array(
            'htmlOptions'=>array('id'=>'sidebar-menu', 'class'=>'nav side-menu'),
            'submenuHtmlOptions'=>array('class'=>'nav child_menu'),
            'encodeLabel'=>false,
            'items'=>$permission));
          }
          else
            echo '<div id=\'footer\'></div>';
        ?>
</div>
</div>
<!-- /sidebar menu -->

      <!-- /menu footer buttons -->
<!-- <div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
   </a>
   <a data-toggle="tooltip" data-placement="top" title="FullScreen">
     <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
   </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo Yii::app()->getHomeUrl();?>?r=site/logout">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
</div> -->
      <!-- /menu footer buttons -->
</div>
</div>
