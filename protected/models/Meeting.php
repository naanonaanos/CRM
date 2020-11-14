<?php

class Meeting extends CActiveRecord
{
	public $status_name;
	public $status_opp;
	public $meeting_subject;
	public $priority_level;
	public $contact_name;

	public function tableName()
	{
		return 'meeting';
	}

	public function rules()
	{
		return array(
			array('status_id, status_meeting, contact_id, opportunity_id, event, subject_meeting, reminder, full_name, from_date, to_date, created_date, modified_date, created_by, modified_by', 'required'),

			array('id, status_id, contact_id, opportunity_id, created_by, modified_by', 'numerical', 'integerOnly'=>true),

			array('event, subject_meeting, full_name, assign_from, assign_to, priority, status_meeting', 'length', 'max'=>50),

			array('reminder', 'length', 'max'=>100),

			array('add_mom', 'length', 'max'=>200),
			
			array('meeting_id, status_id, contact_id, opportunity_id, event, subject_meeting, reminder, full_name, from_date, to_date, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'id'			=> array(self::BELONGS_TO, 'Users', 'id'),
			'status' 		=> array(self::BELONGS_TO, 'Status', 'status_id'),
			'contact'	 	=> array(self::BELONGS_TO, 'Contact', 'contact_id'),
			'opportunity'	=> array(self::BELONGS_TO, 'Opportunity', 'opportunity_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'meeting_id' 		=> 'Meeting',
			'status_id' 		=> 'Status',
			'contact_id' 		=> 'Contact',
			'opportunity_id' 	=> 'Opportunity',
			'id'				=> 'Users Id',
			'event' 			=> 'Event',
			'subject_meeting'	=> 'Subject Meeting',
			'status_meeting' 	=> 'Status Meeting',
			'reminder' 			=> 'Reminder',
			'priority'			=> 'Priority',
			'add_mom'			=> 'Add MOM',
			'full_name' 		=> 'Full Name',
			'from_date' 		=> 'From Date',
			'to_date' 			=> 'To Date',
			'created_date' 		=> 'Created Date',
			'modified_date' 	=> 'Modified Date',
			'created_by' 		=> 'Created By',
			'modified_by' 		=> 'Modified By',
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('meeting_id',$this->meeting_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('contact_id',$this->contact_id);
		$criteria->compare('opportunity_id',$this->opportunity_id);
		$criteria->compare('event',$this->event,true);
		$criteria->compare('subject_meeting',$this->subject_meeting,true);
		$criteria->compare('reminder',$this->reminder,true);
		$criteria->compare('add_mom', $this->add_mom, true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('status_meeting', $this->status_meeting, true);
		$criteria->compare('from_date',$this->from_date,true);
		$criteria->compare('to_date',$this->to_date,true);
		$criteria->compare('priority', $this->priority,true);
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
