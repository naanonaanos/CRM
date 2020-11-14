<?php
class Contact extends CActiveRecord
{
	public $search_by;
	public $search_value;
	public $leads_id;
	public $active;
	public $full_name;
	public $fullName;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'contact';
	}

	public function rules()
	{
		return array(
			array('code, contact_name, contact_jobtitle, contact_phone, contact_email, contact_pic', 'required'),

			array('code', 'unique'),

			array('code, contact_name, contact_jobtitle, contact_phone, contact_email, contact_pic, contact_remarks', 'length', 'max'=>100),

			array('search_by, search_value', 'safe'),

			array('created_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>true, 'on'=>'insert'),

			array('modified_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false),

			array('created_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false, 'on'=>'insert'),

			array('modified_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>true),
			
			array('code, contact_name, contact_jobtitle, contact_phone, contact_email, contact_pic, contact_remarks, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array();
	}

	public function attributeLabels()
	{
		return array(
		'contact_id'		=>'CONTACT',
		'code'				=>'CODE',
		'contact_name'		=>'CONTACT NAME',
		'full_name'			=>'FULL NAME',
		'contact_jobtitle'	=>'CONTACT JOBTITLE',
		'contact_phone'		=>'CONTACT PHONE',
		'contact_email'		=>'CONTACT EMAIL',
		'contact_pic'		=>'CONTACT PIC',
		'contact_remarks'	=>'CONTACT REMARKS',
		'created_date'		=>'CREATED DATE',
		'modified_date'		=>'MODIFIED DATE',
		'created_by'		=>'CREATED BY',
		'modified_by'		=>'MODIFIED BY',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		if($this->search_by == 'code')
			$criteria->compare('t.code', $this->search_value, true);
		if($this->search_by=='contact_name')
			$criteria->compare('t.contact_name', $this->search_value, true);
		if($this->search_by == 'contact_jobtitle')
			$criteria->compare('t.contact_jobtitle', $this->search_value, true);
		if($this->search_by == 'contact_phone')
			$criteria->compare('t.contact_phone', $this->search_value, true);
		if($this->search_by == 'contact_email')
			$criteria->compare('t.contact_email', $this->search_value, true);
		if($this->search_by == 'contact_pic')
			$criteria->compare('t.contact_pic', $this->search_value, true);
		$criteria->order='t.created_date DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'10'
			),
		));
	}
}
?>