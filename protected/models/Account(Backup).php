<?php
class Account extends CActiveRecord
{
	public $search_by;
	public $search_value;
	public $province;
	public $subdistrict;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'account';
	}

	public function rules()
	{
		return array(

			array('code, leads_id, contact_id, destination_id, work_phone, full_address, postal_code, full_name, created_date, modified_date, created_by, modified_by', 'required'),

			array('code, name', 'unique'),

			array('search_by, search_value', 'safe'),

			array('email', 'email'),

			array('email', 'unique', 'className' => 'Account', 'attributeName' => 'email', 'message'=>'This Email is already in use','on'=>'insert'),

			array('created_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>true, 'on'=>'insert'),

			array('modified_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false),

			array('leads_id, contact_id, created_by, modified_by', 'numerical', 'integerOnly'=>true),

			array('code, work_phone, website, remarks, full_address, city, email, full_name', 'length', 'max'=>100),

			array('postal_code', 'length', 'max'=>50),

			array('created_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false, 'on'=>'insert'),

			array('modified_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>true),

			array('account_id, code, leads_id, contact_id, destination_id, work_phone, website, remarks, full_address, email, full_name, postal_code, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'leads' => array(self::BELONGS_TO, 'Leads', 'leads_id'),
			'contact' => array(self::BELONGS_TO, 'Contact', 'contact_id'),
			'destination'=>array(self::BELONGS_TO,'Destination', 'destination_id')
			// 'tasks' => array(self::HAS_MANY, 'Task', 'account_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'account_id' 	=> 'Account',
			'code' 			=> 'Code',
			'leads_id' 		=> 'Leads',
			'contact_id' 	=> 'Contact',
			'destination_id'=> 'Destination',
			'work_phone' 	=> 'Work Phone',
			'website' 		=> 'Website',
			'email'			=> 'Email',
			'remarks' 		=> 'Remarks',
			'full_address'	=> 'Full Address',
			'postal_code' 	=> 'Postal Code',
			'full_name'		=> 'Full Name',
			'created_date' 	=> 'Created Date',
			'modified_date' => 'Modified Date',
			'created_by' 	=> 'Created By',
			'modified_by' 	=> 'Modified By',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
			
		if($this->search_by == 'code')
			$criteria->compare('t.code', $this->search_value, true);
		
		if($this->search_by == 'full_name')
			$criteria->compare('t.full_name', $this->search_value, true);
		
		if($this->search_by == 'phone')
			$criteria->compare('t.phone', $this->search_value, true);
			
		if($this->search_by == 'email')
			$criteria->compare('t.email', $this->search_value, true);
			$criteria->order='t.created_date DESC';
		// if($this->search_by == 'position')
		// 	$criteria->compare('t.position', $this->search_value, true);
		// $criteria->compare('account_id',$this->account_id);
		// $criteria->compare('code',$this->code,true);
		// $criteria->compare('leads_id',$this->leads_id);
		// $criteria->compare('contact_id',$this->contact_id);
		// $criteria->compare('work_phone',$this->work_phone,true);
		// $criteria->compare('website',$this->website,true);
		// $criteria->compare('remarks',$this->remarks,true);
		// $criteria->compare('full_address',$this->full_address,true);
		// $criteria->compare('city',$this->city,true);
		// $criteria->compare('postal_code',$this->postal_code,true);
		// $criteria->compare('provence',$this->provence,true);
		// $criteria->compare('country',$this->country,true);
		// $criteria->compare('created_date',$this->created_date,true);
		// $criteria->compare('modified_date',$this->modified_date,true);
		// $criteria->compare('created_by',$this->created_by);
		// $criteria->compare('modified_by',$this->modified_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'10'
			),
		));
	}
}
?>