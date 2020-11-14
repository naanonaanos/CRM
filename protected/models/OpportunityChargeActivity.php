<?php
class OpportunityChargeActivity extends CActiveRecord
{
	public $search_by;
	public $search_value;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'opportunitychargeactivity';
	}

	public function rules()
	{
		return array(

			array('opportunity_id, size, product_description, vam_inbound, rate_idr_inbound, revenue_sharing_inbound, vam_outbound, rate_idr_outbound, revenue_sharing_outbound, aipo_charge, appi_charge', 'required'),

			array('opportunity_id, vam_inbound, rate_idr_inbound, revenue_sharing_inbound, vam_outbound, rate_idr_outbound, revenue_sharing_outbound, vam_storage, rate_idr_storage, revenue_sharing_storage, aipo_charge,appi_charge', 'numerical', 'integerOnly'=>true),

			array('size, product_description, uom_inbound, remarks_inbound, uom_outbound, remarks_outbound, uom_storage, remarks_storage', 'length', 'max'=>100),	

			array('search_by, search_value', 'safe'),

			array('created_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>true, 'on'=>'insert'),

			array('modified_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false),

			array('created_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false, 'on'=>'insert'),
			
			array('modified_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>true),
			
			array('opportunity_charge_activity_id, opportunity_id, size, product_description, vam_inbound, uom_inbound, rate_idr_inbound, revenue_sharing_inbound, remarks_inbound, vam_outbound, uom_outbound, rate_idr_outbound, revenue_sharing_outbound, remarks_outbound, vam_storage, uom_storage, rate_idr_storage, revenue_sharing_storage, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'opportunity'	=>	array(self::BELONGS_TO, 'Opportunity', 'opportunity_id')
		);
	}

	public function attributeLabels()
	{
		return array(
		'opportunity_charge_activity_id'	=>	'OPPORTUNITY CHARGE ACTIVITY',
		'opportunity_id'					=>	'OPPORTUNITY',
		'size'								=>	'SIZE',
		'product_description'				=>	'PRODUCT DESCRIPTION',
		'vam_inbound'						=>	'VOLUME ASSUMPTION PER/MONTH INBOUND',
		'uom_inbound'						=>	'UOM INBOUND',
		'rate_idr_inbound'					=>	'RATE IDR INBOUND',
		'revenue_sharing_inbound'			=>	'REVENUE SHARING INBOUND',
		'remarks_inbound'					=>	'REMARKS INBOUND',
		'vam_outbound'						=>	'VOLUME ASSUMPTION PER/MONTH OUTBOUND',
		'uom_outbound'						=>	'UOM OUTBOUND',
		'rate_idr_outbound'					=>	'RATE IDR OUTBOUND',
		'revenue_sharing_outbound'			=>	'REVENUE SHARING OUTBOUND',
		'remarks_outbound'					=>	'REMARKS OUTBOUND',
		'vam_storage'						=>	'VOLUME ASSUMPTION PER/MONTH STORAGE',
		'uom_storage'						=>	'UOM STORAGE',
		'rate_idr_storage'					=>	'RATE IDR STORAGE',
		'revenue_sharing_storage'			=>	'REVENUE SHARING STORAGE',
		'remarks_storage'					=>	'REAMRKS STORAGE',
		'aipo_charge'						=>	'AVERAGE ITEM PER ORDER CHARGE',
		'appi_charge'						=>	'AVERAGE PRICE PER ITEM CHARGE',
		'created_date'						=>	'CREATED DATE',
		'modified_date'						=>	'MODIFIED DATE',
		'created_by'						=>	'CREATED BY',
		'modified_by'						=>	'MODIFIED BY',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		if($this->search_by == 'code')
			$criteria->compare('t.code', $this->search_value, true);
		if($this->search_by=='opportunity_name')
			$criteria->compare('t.opportunity_name', $this->search_value, true);
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