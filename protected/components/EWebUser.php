<?php
class EWebUser extends CWebUser
{
	protected $_model;
	protected $check;
	
	function loadUser()
	{
		if(!Yii::app()->user->isGuest)
		{
			$page = Yii::app()->controller->id;
			$action = Yii::app()->controller->action->id;
			
			$rest_page = "failed";
			$rest_action= "failed";
			
			// $arr = Yii::app()->user->getState('position');
			
			// if(in_array($page, array_column($arr, 'page'))) 
			// 	$rest_page = "success";
			
			// if(in_array($action, array_column($arr, 'action'))) 
			// 	$rest_action = "success";
		
			$validate = "";
			if($rest_page == "success" && $rest_action == "success")
				$validate = '@';
			
			return $validate;
		}
	}
	
	// public function checkPrivilege($page, $action)
	// {
	// 	if(!Yii::app()->user->isGuest)
	// 	{
	// 		$rest_page = "failed";
	// 		$rest_action= "failed";
			
	// 		$arr = Yii::app()->user->getState('position');
			
	// 		if(in_array($page, array_column($arr, 'page'))) 
	// 			$rest_page = "success";
			
	// 		if(in_array($action, array_column($arr, 'action'))) 
	// 			$rest_action = "success";
		
	// 		$validate = "0";
	// 		if($rest_page == "success" && $rest_action == "success")
	// 			$validate = 1;
				
	// 		return $validate;	
	// 	}
	// }
	
	public function getUser($users_id)
	{
		$user = Users::model()->findByPk($users_id);
		if($user)
			return $user->full_name;
	}

}