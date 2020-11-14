<?php
date_default_timezone_set('Asia/Jakarta');
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	public function authenticate()
	{

		$username = strtolower($this->username);
		$user = Users::model()->findByAttributes(array('username'=>$this->username, "password"=>($this->password)));

		if($user===null)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}	

		else
		{
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
			$this->_id=$user->users_id;
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
			// $this->setState('menu', $user->list_menu);
			$this->setState('userName', $user->username);
			$this->setState('fullName', $user->full_name);
			$this->setState('phone', 	$user->phone);
			$this->setState('email', 	$user->email);
			$this->setState('groupName',$user->position);
			$this->setState('picture',	$user->picture);


			return $this->errorCode == self::ERROR_NONE;
			echo var_dump($user->full_name);exit;
		}
			return !$this->errorCode;
		

					
				
				// $this->setState('locations', $res['data']['list_location']);
				// $this->setState('application', $res['data']['list_application']);
				// $this->setState('groupName', $res['data']['current_authorization']);
				// $this->setState('privilege', $res['data']['list_privilege']);
				
			
				// $this->setState('joinDate', date('M', strtotime($user['data']['join_date'])).'. '.date('Y', strtotime($user->join_date)));
				// $this->setState('photo', $res['data']['photo']);
				// $this->setState('email', $res['data']['email']);
				// $this->setState('isClient', $res['data']['is_client']);
				// $this->errorCode = self::ERROR_PASSWORD_INVALID;
				// $this->errorCode = self::ERROR_NONE;

	}

	
	public function getId()
	{
		return $this->_id;
	}
}