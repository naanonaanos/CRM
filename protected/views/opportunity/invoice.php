<?php
	$baseUrl = Yii::app()->theme->baseUrl; 
?>

<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.4 -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/font-awesome/css/font-awesome.min.css">
<!-- NProgress -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/nprogress/nprogress.css"> 
<!-- Custom styling plus plugins -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/build/css/custom.min.css">
<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/build/css/custom.min.css">



<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
	    	<div class="row">
	      		<div class="col-md-12">
	        		<div class="x_panel">
	          			<div class="x_content">
	            			<section class="content invoice">
	              				<div class="row">
	                				<div class="  invoice-header">
		                  				<h1>
		                    				&nbsp;<a class="logo" href="#"><img src="themes/GentelellaMaster/production/images/logo-system.png"></img></a> &nbsp;
		                    				<small class="pull-right"><h3>Fulfillment Proposal</h3></small>
		                    			</h1>
	                				</div>
	             				</div>

              				<br>

            				<div class="row invoice-info">
				                <div class="col-sm-4 invoice-col">
				                  <h4><strong>Client Profile</strong></h4>
				                  <br>
				                  <address>
				                      <strong>Client Name: </strong><strong><?php echo $model->leads->name; ?></strong>
				                      <br><br>
				                      <strong>Product Category: </strong><?php echo $model->product_category; ?>
				                      <br><br>
				                      <strong>Product Description: </strong><?php echo $model->product_description; ?>
				                      <br><br>
				                      <strong>Monthly GMV: </strong><?php echo $model->monthly_gmv_client; ?>
				                      <br><br>
				                      <strong>AOV ( Average Order Value ): </strong><?php echo $model->aov_client; ?>
				                      <br><br>
				                      <strong>APPI ( Average Price Per Item: </strong><?php echo $model->appi_client; ?>
				                      <br><br>
				                      <strong>Month Sales Order: </strong><?php echo $model->mso_client; ?>
				                      <br><br>
				                      <strong>AIPO ( Average Item Per Order ): </strong><?php echo $model->aipo_client; ?>
				                      <br><br>
				                      <strong>Monthly Item Sold Volume: </strong><?php echo $model->misv_client; ?>
				                      <br><br>
				                      <strong>First Mile Delivery ( FMD ): </strong><?php echo $model->remarks_fmd; ?>
				                      <br><br>
				                      <strong>Last Mile Delivery ( LMD ): </strong><?php echo $model->remarks_lmd; ?>
				                      <br><br>
				                    </address>
				                </div>
 
				                <div class="col-sm-7 invoice-col">
				                  <small class="pull-right"><b><h4><strong>Invoice Date: <?php echo Yii::app()->dateFormatter->format("d MMMM yyyy",strtotime($model->created_date)); ?></strong></h4></b>
				                  </small>
				                </div>
             				</div>

              				<h3><strong>Business Assumption</strong></h3>

              				
				            	<div class="row">
					                <div class="table">
					                	<div class="card-box table-responsive">
						                	<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
							                    <thead>
							                      <tr>
							                        <th style="width: 100%"><center>Warehouse</center></th>
							                      </tr>
							                    </thead>
							                    <tbody>
							                    	<?php
							                    		// echo var_dump($location);exit;
							                    		foreach ($location as $loc)
							                    		{
							                    			echo'
							                    			<tr>
							                    			<td style="text-align:center">'.$loc['name'].'</td>
							                    			</tr>';	
							                    		}
							                    	?>
							                    </tbody>
							                </table>
							            </div>
					                </div>
				              	</div>
			             

			              	<br>


			              	<div class="row">
				                <div class="table">
				                	<div class="card-box table-responsive">
					                	<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
						                    <thead>
						                      <tr>
						                        <th><center>Product Sizing</center></th>
						                        <th><center>Percentage</center></th>
						                        <th><center>Description</center></th>
						                      </tr>
						                    </thead>
						                    <tbody>
						                    	<tr>
						                    		<td><center>Very Small Item</center></td>
						                    		<td><center><?php echo $model->very_small_item;?> %</center></td>
						                    		<td><center>10 cm x 10 cm x 10 cm, or 0,3 Kg</center></td>
						                    	</tr>
						                    	<tr>
						                    		<td><center>Small Item</center></td>
						                    		<td><center><?php echo $model->small_item;?> %</center></td>
						                    		<td><center>20 cm x 20 cm x 20 cm, or 1 Kg</center></td>
						                    	</tr>
						                    	<tr>
						                    		<td><center>Medium Item</center></td>
						                    		<td><center><?php echo $model->very_small_item;?> %</center></td>
						                    		<td><center>30 cm x 30 cm x 30 cm, or 8,4 Kg</center></td>
						                    	</tr>
						                    	<tr>
						                    		<td><center>Large Item</center></td>
						                    		<td><center><?php echo $model->large_item;?> %</center></td>
						                    		<td><center>50 cm x 50 cm x 50 cm, or 20 Kg</center></td>
						                    	</tr>
						                    	<tr>
						                    		<td><center>Very Large Item</center></td>
						                    		<td><center><?php echo $model->very_large_item;?> %</center></td>
						                    		<td><center>More than 50 cm x 50 cm x 50 cm</center></td>
						                    	</tr>
						                    	<tr>
						                    		<td><center><b>Total</b></center></td>
						                    		<td><center><b><?php echo $model->total;?> %</b></center></td>
						                    		<td></td>
						                    	</tr>
						                    </tbody>
						                </table>
						            </div>
				                </div>
			              	</div>

			              	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


			              	<div class="row">
				                <div class="table">
				                	<div class="card-box table-responsive">
					                	<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
					                		<tbody>
						                    	<?php
						                    	if(!empty($productdescription))
						                    	{
						                    		foreach ($productdescription as $pd)
						                    		{
						                    			foreach($judul as $jd)
							                			{
							                				echo
										                '<thead>
									                      		<tr>
									                        '.$jd.'
									                      		</tr>
									                    </thead>';
									                    }

						                    			echo
						                    			'<tr>
							                    			<td style="text-align:center" colspan="2">'.$model->product_category.'</td>
							                    			<td style="text-align:center" colspan="2">'.$pd['product_description'].'</td>
							                    			<td style="text-align:center" colspan="2">'.$pd['size'].'</td>
						                    			</tr>';
						                    			
						                    			echo '<thead>
						                    			<tr>
						                    				<th><center>Charge Activity</center></th>
									                        <th><center>Volume Assumption Per / Month</center></th>
									                        <th><center>UOM</center></th>
									                        <th><center>Rate IDR</center></th>
									                        <th><center>% Revenue Sharing</center></th>
									                        <th><center>Remarks</center></th>
						                    			</tr>
						                    			</thead>';
						                    			
						                    			echo
						                    			'<tr>
						                    				<td style="text-align:center">Inbound</td>
							                    			<td style="text-align:center">'.$pd['vam_inbound'].'</td>
							                    			<td style="text-align:center">'.$pd['uom_inbound'].'</td>
							                    			<td style="text-align:center">'.$pd['rate_idr_inbound'].'</td>
							                    			<td style="text-align:center">'.$pd['revenue_sharing_inbound'].'</td>
							                    			<td style="text-align:center">'.$pd['remarks_inbound'].'</td>
						                    			</tr>';
						                    			
						                    			
						                    			echo '<tr>
						                    				<td style="text-align:center">Outbound</td>
							                    			<td style="text-align:center">'.$pd['vam_outbound'].'</td>
							                    			<td style="text-align:center">'.$pd['uom_outbound'].'</td>
							                    			<td style="text-align:center">'.$pd['rate_idr_outbound'].'</td>
							                    			<td style="text-align:center">'.$pd['revenue_sharing_outbound'].'</td>
							                    			<td style="text-align:center">'.$pd['remarks_outbound'].'</td>
						                    			</tr>';
						                    			
						                    			
						                    			echo '<tr>
						                    				<td style="text-align:center">Storage</td>
							                    			<td style="text-align:center">'.$pd['vam_storage'].'</td>
							                    			<td style="text-align:center">'.$pd['uom_storage'].'</td>
							                    			<td style="text-align:center">'.$pd['rate_idr_storage'].'</td>
							                    			<td style="text-align:center">'.$pd['revenue_sharing_storage'].'</td>
							                    			<td style="text-align:center">'.$pd['remarks_storage'].'</td>
						                    			</tr>';

						                    			echo '<tr>
						                    				<td style="text-align:center">AIPO</td>
						                    				<td style="text-align:center"colspan="10">'.$pd['aipo_charge'].'</td>
						                    				</tr>';

						                    			echo '<tr>
						                    				<td style="text-align:center">APPI</td>
						                    				<td style="text-align:center"colspan="10">'.$pd['appi_charge'].'</td>
						                    				</tr>';
					                    			}
						                    	}
					                    		?>
						                    </tbody>
						                </table>
						            </div>
				                </div>
			              	</div>

			              	<br><br><br><br><br><br><br><br><br><br><br>


			              	<div class="row">
				                <div class="table">
				                	<div class="card-box table-responsive">
					                	<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
						                    <thead>
						                      <tr>
						                        <th><center>Charge Point</center></th>
						                        <th><center>Rate_IDR</center></th>
						                        <th><center>Remarks</center></th>
						                      </tr>
						                    </thead>
						                    <tbody>
						                    	<?php
						                    			echo'
						                    			<tr>
						                    			<td style="text-align:center">First Mile Delivery (FMD)</td>
						                    			<td style="text-align:center">'.$pd['fmd_rateidr'].'</td>
						                    			<td style="text-align:center">'.$pd['remarks_fmd_rateidr'].'</td>
						                    			</tr>';	

						                    			echo'
						                    			<tr>
						                    			<td style="text-align:center">Last Mile Delivery (LMD)</td>
						                    			<td style="text-align:center">'.$pd['lmd_rateidr'].'</td>
						                    			<td style="text-align:center">'.$pd['remarks_lmd_rateidr'].'</td>
						                    			</tr>';							                    
						                    	?>
						                    </tbody>
						                </table>
						            </div>
				                </div>
			              	</div>

			              	<br>


			              	<div class="row">
				                <div class="table">
				                	<div class="card-box table-responsive">
					                	<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
						                    <thead>
						                      <tr>
						                        <th><center>Store Operation</center></th>
						                        <th><center>Description SO</center></th>
						                        <th><center>Management Fee</center></th>
						                        <th><center>Description MF</center></th>
						                      </tr>
						                    </thead>
						                    <tbody>
						                    	<?php
					                    			echo'
					                    			<tr>
					                    			<td style="text-align:center">'.$pd['store_operation'].'</td>
					                    			<td style="text-align:center">'.$pd['remarks_store_operation'].'</td>
					                    			<td style="text-align:center">'.$pd['management_fee'].'</td>
					                    			<td style="text-align:center">'.$pd['remarks_management_fee'].'</td>
					                    			</tr>';							                    
						                    	?>
						                    </tbody>
						                </table>
						            </div>
				                </div>
			              	</div>

			              	<br>


			              	<div class="row">
				                <div class="table">
				                	<div class="card-box table-responsive">
					                	<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
						                    <thead>
						                      <tr>
						                        <th><center>Adds On</center></th>
						                        <th><center>Description</center></th>
						                      </tr>
						                    </thead>
						                    <tbody>
						                    	<?php
						                    		foreach ($addson as $ad)
						                    		{
						                    			echo'
						                    			<tr>
						                    			<td style="text-align:center">'.$ad['adds_on'].'</td>
						                    			<td style="text-align:center">'.$ad['remarks_adds_on'].'</td>
						                    			</tr>';
					                    			}							                    
						                    	?>
						                    </tbody>
						                </table>
						            </div>
				                </div>
			              	</div>

			              	<br>




							<div class="row">
            				<!-- accepted payments column -->
                				<div class="col-md-6">
                  					<p class="lead"><b>Terms & Condition</b></p>
                  					<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    					- Pricing calculated based on minimum volume assumption, subject for review within 3 months.
                    					<br>
										- If the product exceed one of the size and weight limits given, it will go into a larger type of product.
										<br>
										- Marketplace fee pass on cost to client.
										<br>
										- If there is a free shipping program from the marketplace, then all shipping costs will be charged to the client (depends on the provisions of each marketplace).
										<br>
										- This rate to cover normal working days and working time, if any additional overtime is subject to be charged to client.
										<br>
										- If the product exceeds the maximum size or weight limit given: subject to be discussed.
										<br>
										- If there any changes conditions or request : subject to be discussed.
										<br>
										- If there is a change in prices due to macroeconomic conditions, the rate is subject for discussion between both parties.
										<br>
										- All Rate are before Tax.
										<br>
										- Return activity will be charged same as inbound rate.
										<br>
										- The client must provide the master SKU (parent-child) and its contents as well (including size dimensions and weight).
                  					</p>
                				</div>
              				</div>

							<!-- this row will not appear when printing -->
							<div class="row no-print">
								<div class=" ">
									<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
								</div>
							</div>
            			</section>
          			</div>
        		</div>
      		</div>
		</div>
  	</div>
</div>

<script type="text/javascript">
	
	function myFunction() 
	{
		$("#print").attr("style","display:none");
		window.print();
		var ids = [<?php echo json_encode($model->opportunity_id);?>];
		
		jQuery.ajax(
		{
			type: 'POST',
			async: false,
			dataType: "json",
			url: uri,
			data: {
				ids:ids
			},
			success: function(result)
			{
				var msgs = result.split("-");
				if(msgs[0] != "OK")
					alert('error : '+msgs[1]);
			}
		});
		 
		$("#print").removeAttr("style");
	}
</script>

<!-- jQuery -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jquery/dist/jquery.min.js"></script>   
<!-- Bootstrap -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/nprogress/nprogress.js"></script>  
<!-- Custom Theme Scripts -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/build/js/custom.js"></script>