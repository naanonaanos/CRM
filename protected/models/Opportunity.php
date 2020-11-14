<?php
class Opportunity extends CActiveRecord
{
	public $search_by;
	public $search_value;
	public $leads_id;
	public $status_id;
	public $status_name;
	public $code;
	public $opportunity_name;
	public $margin;
	public $parent_type;
	public $name;
	public $product_category;
	public $monthly_gmv_client;
	public $general_product_description;
	public $aipo_client;
	public $aov_client;
	public $mso_client;
	public $appi_client;
	public $misv_client;
	public $location_id;
	public $location_name;
	public $remarks_very_small_item;
	public $remarks_small_item;
	public $remarks_medium_item;
	public $remarks_large_item;
	public $remarks_very_large_item;
	public $size;
	public $opportunity_charge_activity_id;
	public $product_description;
	public $vam_inbound;
	public $uom_inbound;
	public $rate_idr_inbound;
	public $revenue_sharing_inbound;
	public $remarks_inbound;
	public $vam_outbound;
	public $uom_outbound;
	public $rate_idr_outbound;
	public $revenue_sharing_outbound;
	public $remarks_outbound;
	public $vam_storage;
	public $uom_storage;
	public $rate_idr_storage;
	public $revenue_sharing_storage;
	public $remarks_storage;
	public $appi_charge;
	public $aipo_charge;
	public $adds_on;
	public $remarks_adds_on;
	public $remarks;
	public $status_detail;
	// public $action_add_location;


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'opportunity';
	}

	public function rules()
	{
		return array(
			
			array('leads_id, status_id, code, opportunity_name, parent_type, margin, full_name, product_category, general_product_description, monthly_gmv_client, aov_client, appi_client, mso_client, aipo_client, misv_client', 'required'),

			array('leads_id, status_id, status_detail, margin, mso_client, monthly_gmv_client, aov_client, appi_client, aipo_client, misv_client, very_small_item, small_item, medium_item, large_item, very_large_item, , rate_idr_storage, revenue_sharing_storage, revenue_sharing_outbound, fmd_rateidr, lmd_rateidr, store_operation, management_fee, total', 'numerical', 'integerOnly'=>true),

			array('code, opportunity_name', 'unique'),

			array('code, opportunity_name, parent_type, full_name, remarks_negotiation, remarks_feedback, product_category, general_product_description, remarks_fmd, remarks_lmd, size, product_description, uom_inbound, remarks_inbound, uom_outbound,  remarks_outbound, uom_storage, remarks_storage, remarks_fmd_rateidr,  remarks_lmd_rateidr,  remarks_store_operation, remarks_management_fee, adds_on, remarks_adds_on', 'length', 'max'=>100),

			array('term_condition', 'length', 'max'=>500),	

			array('search_by, search_value', 'safe'),

			array('created_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>true, 'on'=>'insert'),
			array('modified_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false),
			array('created_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false, 'on'=>'insert'),
			array('modified_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>true),
			
			array('opportunity_id, remarks_negotiation, leads_id, status_id, location_id, code, opportunity_name, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'leads'						=>array(self::BELONGS_TO, 'Leads', 'leads_id'),
			'status'					=>array(self::BELONGS_TO, 'Status', 'status_id'),
			'statusdetail'				=>array(self::BELONGS_TO, 'Status', 'status_detail')
		);
	}

	public function attributeLabels()
	{
		return array(
		'opportunity_id'					=>	'OPPORTUNITY',
		'leads_id'							=>	'LEADS',
		'status_id'							=>	'STATUS',
		'status_detail'						=>	'STATUS DETAIL',
		'code'								=>	'CODE',
		'opportunity_name'					=>	'OPPORTUNITY NAME',
		'parent_type'						=>	'PARENT TYPE',
		'margin'							=>	'MARGIN',
		'remarks_negotiation'				=>	'REMARKS NEGOTIATION',
		'remarks_feedback'					=>	'REMARKS FEEDBACK',
		'product_category'					=>	'PRODUCT CATEGORY',
		'general_product_description'		=>	'GENERAL PRODUCT DESCRIPTION',
		'monthly_gmv_client'				=>	'MONTHLY GROSS MERCHANDISE VALUE',
		'aov_client'						=>	'AVERAGE ORDER VALUE CLIENT',
		'appi_client'						=>	'AVERAGE PRICE PER ITEM CLIENT',
		'mso_client'						=>	'MONTHLY SALES ORDER CLIENT',
		'aipo_client'						=>	'AVERAGE ITEM PER ORDER CLIENT',
		'misv_client'						=>	'MONTHLY ITEM SOLD VOLUME CLIENT',
		'remarks_fmd'						=>	'REMARKS FIRST MILE DELIVERY',
		'remarks_lmd'						=>	'REMARKS LAST MILE DELIVERY',
		'very_small_item'					=>	'VERY SMALL ITEM',
		'small_item'						=>	'SMALL ITEM',
		'medium_item'						=>	'MEDIUM ITEM',
		'large_item'						=>	'LARGE ITEM',
		'very_large_item'					=>	'VERY LARGE ITEM',
		'total'								=>	'TOTAL',
		'fmd_rateidr'						=>	'FIRST MILE DELIVERY RATE IDR',
		'remarks_fmd_rateidr'				=>	'REMARKS FIRST MILE DELIVERY RATE IDR',
		'lmd_rateidr'						=>	'LAST MILE DELIVERY RATE IDR',
		'remarks_lmd_rateidr'				=>	'REMARKS LAST MILE DELIVERY RATE IDR',
		'store_operation'					=>	'STORE OPERATION',
		'remarks_store_operation'			=>	'REMARKS STORE OPERATION',
		'management_fee'					=>	'MANAGEMENT FEE',
		'remarks_management_fee'			=>	'REMARKS MANAGEMENT FEE',
		'term_condition'					=>	'TERM CONDITION',
		'full_name'							=>	'FULL NAME',
		'created_date'						=>	'CREATED DATE',
		'modified_date'						=>	'MODIFIED DATE',
		'created_by'						=>	'CREATED BY',
		'modified_by'						=>	'MODIFIED BY',
		);
	}

	// Function untuk penampilan di index
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

	// Function untuk menampilkan Quotation Status di index Opportunity yg berasal dari tabel OpportunityDetail
	public function getStatus($id)
	{
		$status = Yii::app()->db->createCommand('
			SELECT b.name FROM opportunitydetail a 
			JOIN status b 
			ON a.status_id = b.status_id 
			WHERE a.opportunity_id = "'.$id.'"
			')->queryScalar();

		return $status;
	}
}
?>