<?php

class Task extends CActiveRecord
{
	public $contact_name;
	public $prioritys;

	public function tableName()
	{
		return 'task';
	}

	public function rules()
	{
		return array(

			array('status_id, leads_id, contact_id, account_id, code, subject, priority, from_date, to_date, created_date, modified_date, created_by, modified_by', 'required'),

			array('status_id, leads_id, contact_id, account_id, created_by, modified_by', 'numerical', 'integerOnly'=>true),

			array('code, priority', 'length', 'max'=>50),

			array('subject, remarks', 'length', 'max'=>100),
			
			array('task_id, status_id, leads_id, contact_id, account_id, code, subject, remarks, from_date, to_date, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{

		return array(
			'status' 	=> array(self::BELONGS_TO, 'Status', 'status_id'),
			'leads'		=> array(self::BELONGS_TO, 'Leads', 'leads_id'),
			'contact'	=> array(self::BELONGS_TO, 'Contact', 'contact_id'),
			'account' 	=> array(self::BELONGS_TO, 'Account', 'account_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'task_id' 		=> 'Task',
			'status_id' 	=> 'Status',
			'leads_id' 		=> 'Leads',
			'contact_id' 	=> 'Contact',
			'account_id' 	=> 'Account',
			'code' 			=> 'Code',
			'subject' 		=> 'Subject',
			'remarks' 		=> 'Remarks',
			'priority'		=>'Priority',
			'from_date' 	=> 'From Date',
			'to_date' 		=> 'To Date',
			'created_date' 	=> 'Created Date',
			'modified_date'	=> 'Modified Date',
			'created_by' 	=> 'Created By',
			'modified_by' 	=> 'Modified By',
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('task_id',$this->task_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('leads_id',$this->leads_id);
		$criteria->compare('contact_id',$this->contact_id);
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('priority',$this->priority,true);
		$criteria->compare('from_date',$this->from_date,true);
		$criteria->compare('to_date',$this->to_date,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_by',$this->modified_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
