<?php
$baseUrl = Yii::app()->theme->baseUrl; 
  $cs = Yii::app()->getClientScript();
  Yii::app()->clientScript->registerCoreScript('jquery');
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); 
  
  if(!Yii::app()->user->isGuest)
  {
      $this->redirect('index.php');
      // $this->render('index');
  }
?>
    <title>CRM</title>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">

        <div class="animate form login_form">
          <section class="login_content">
      <img src="images/crmicon.png" width="400" height="180">
            
            <form>
              <h1>Login Form</h1>
              <div>
                
				<?php echo $form->textField($model,'username', array('class'=>'form-control', 'placeholder'=>'username')); ?>
				<?php echo $form->error($model,'username'); ?>
              </div>
              <div>
               
				<?php echo $form->passwordField($model,'password', array('class'=>'form-control', 'placeholder'=>'password')); ?>
				<?php echo $form->error($model,'password'); ?>
              </div>
              <div class="row">
						<div class="checkbox icheck">
							<div class="col-xs-12">
								<label>
									<?php echo $form->checkBox($model,'rememberMe', array('class'=>'checkbox icheck')); ?> Remember Me
								</label>
							</div>
						</div>
					</div>
              <br>
              <div>
               <?php echo CHtml::submitButton('Sign In', array('class'=>'btn')); ?>
               <?php echo CHtml::link('Lost your password?', array('site/forgot'), array('class'=>'btn')); ?>
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
    </div>
  </body>