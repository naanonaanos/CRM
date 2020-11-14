<?php
  $baseUrl = Yii::app()->theme->baseUrl; 
  $cs = Yii::app()->getClientScript();
  Yii::app()->clientScript->registerCoreScript('jquery');
?>
<?php
  foreach(Yii::app()->user->getFlashes() as $key => $message) 
  {
    echo '<script>';
        echo 'alert("'. $message .'");';
    echo '</script>';
  }
?>
    <title>CRM</title>

  <body class="login">
      <div class="login_wrapper">

        <div class="animate form login_form">
          <section class="login_content">
      <img src="images/crmicon.png" width="400" height="180">
            
            <form>
              <h1>Forgot Password</h1>
              <div>
        <?php $form = $this->beginWidget('CActiveForm', array(
        'id'=>'forgot-form',
        'enableClientValidation'=>false,
         )); ?>     
				<?php echo $form->textField($model,'email', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
              </div>
              <br>
              <div>
                <?php echo CHtml::submitButton('Back to Login', array('class'=>'btn')); ?>
                <?php echo CHtml::submitButton('Submit', array('class'=>'btn')); ?>
              </div>
              <?php $this->endWidget(); ?>
              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div><p>©2020 All Rights <b>Nizam Haqqizar</b> Reserved.</p></div>
              </div>
            </form>
          </section>
        </div>
      </div>
  </body>