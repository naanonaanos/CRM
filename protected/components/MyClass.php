<?php
class MyClass
{
	public function BeginRequest(CEvent $event)
	{
		Yii::app()->theme = Yii::app()->session['theme'];
	}
}