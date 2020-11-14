<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'account':
 * @property integer $account_id
 * @property string $code
 * @property string $work_phone
 * @property string $website
 * @property string $email
 * @property string $remarks
 * @property string $full_address
 * @property string $postal_code
 * @property string $full_name
 * @property string $created_date
 * @property string $modified_date
 * @property integer $created_by
 * @property integer $modified_by
 *
 * The followings are the available model relations:
 * @property Task[] $tasks
 */
class Account extends CActiveRecord
{
	public $opportunity_code;
	public $opportunity_id;
	public $leads_code;
	public $leads_id;
	public $contact_id;
	public $contact_code;
	public $destination_id;
	public $destination_code;
	public $subdistrict;
	public $province;
	public $city;
	public $search_by;
	public $search_value;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, opportunity_id, leads_id, contact_id, destination_id, work_phone, email, full_address, postal_code, full_name', 'required'),

			array('opportunity_id, leads_id, contact_id, destination_id, created_by, modified_by', 'numerical', 'integerOnly'=>true),

			array('code, work_phone, website, email, remarks, full_address, full_name', 'length', 'max'=>100),

			array('postal_code', 'length', 'max'=>50),

			array('created_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>true, 'on'=>'insert'),

			array('modified_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false),

			array('created_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false, 'on'=>'insert'),

			array('modified_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('account_id, code, opportunity_id, leads_id, contact_id, destination_id, work_phone, website, email, remarks, full_address, postal_code, full_name, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'opportunity'	=>array(self::BELONGS_TO, 'Opportunity', 'opportunity_id'),
			'leads'			=>array(self::BELONGS_TO, 'Leads', 'leads_id'),
			'contact'		=>array(self::BELONGS_TO, 'Contact', 'contact_id'),
			'destination'	=>array(self::BELONGS_TO, 'Destination', 'destination_id')
			// 'tasks' => array(self::HAS_MANY, 'Task', 'account_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'account_id' 	=> 'Account',
			'code' 			=> 'Code',
			'opportunity_id'=> 'OPPORTUNITY',
			'leads_id'		=> 'Leads',
			'contact_id'	=> 'Contact',
			'destination_id'=> 'Destination',
			'work_phone' 	=> 'Work Phone',
			'website' 		=> 'Website',
			'email' 		=> 'Email',
			'remarks' 		=> 'Remarks',
			'full_address'	=> 'Full Address',
			'postal_code' 	=> 'Postal Code',
			'full_name' 	=> 'Full Name',
			'created_date' 	=> 'Created Date',
			'modified_date' => 'Modified Date',
			'created_by' 	=> 'Created By',
			'modified_by' 	=> 'Modified By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
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

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Account the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
