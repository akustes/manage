	<? if($this->session->userdata('user_role_id') == 1):?>
		<div class="page-header">
			<div class="row">
				<div class="col-sm-8 col-md-8 col-lg-8">
					<h3 class="hidden-print"><?= ucfirst($report_type)?></h3>
					<p class="visible-print"><img src="<?= base_url()?>assets/front/themes/<?= $this->config->item('front_theme')?>/images/logo.png" alt="American Auctioneers"></p>
					<? if($display):?><p class="lead"><?= ucfirst($report_type)?> Report: <?= ($start_date) ? $start_date : ''?> - <?= ($end_date) ? $end_date : ''?></p><? endif?>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4" align="right">
					<a href="<?= site_url(($report_type == 'auctions') ? 'manage/reports/lots' : 'manage/reports')?>" class="btn btn-warning hidden-print"><span class="glyphicon glyphicon-file"></span> <?= ($report_type == 'auctions') ? 'Lots' : 'Auctions' ?></a>&nbsp;
					<button type="button" id="print-report" class="btn btn-default hidden-print"><span class="glyphicon glyphicon-print"></span> Print</button>
				</div>
			</div>
		</div>
				

		<form action="<?= site_url(($report_type == 'auctions') ? 'manage/reports' : 'manage/reports/lots')?>" role="form" method="post">
		<div class="row hidden-print">
			<div class="col-sm-6 col-md-6 col-lg-6">
					   <div class="form-group">
						 
						  <select class="form-control" id="user_id" name="user_id">
						  	<? if($users):?>
						  		<option value="">By Auctioneer</option>
						  		<? foreach($users as $user):?>
						  			<? $user_selected = ($user['user_id'] == $auctioneer) ? 'selected' : ''?>
						    		<option <?= $user_selected?> value="<?= $user['user_id']?>" id="user"><?= $user['user_last_name']?>, <?= $user['user_first_name']?> </option>
						    	<? endforeach?>
						    	</select>
						    <? endif?>
					  	   <br />
						  <select class="form-control" id="event_type_id" name="event_type_id">
						  	<? if($types):?>
						  		<option value="">By Auction Type</option>
						  		<? foreach($types as $type):?>
						  			<? $type_selected = ($type['event_type_id'] == $event_type) ? 'selected' : ''?>
						    		<option <?= $type_selected?> value="<?= $type['event_type_id']?>" id="type"><?= $type['event_type_name']?></option>
						    	<? endforeach?>
						    	</select>
						    <? endif?>
							<br />
					 </div>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6">

				  	<div class="input-group date" id="start-date">
            			<input type="text" id="start_date" name="start_date" class="form-control" placeholder="Start Date" value="<?= $start_date?>" />
            			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
        		  	</div>
 					<br />
				  	<div class="input-group date" id="end-date">
            			<input type="text" id="end_date" name="end_date" class="form-control" placeholder="End Date" value="<?= $end_date?>" />
            			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
        		  	</div>
			</div>
		</div>
		
		<div class="row hidden-print" align="center"><br><div class="col-sm-3 col-md-3 col-lg-3 pull-right"><input type="submit" class="form-control btn btn-primary" value="Generate Report" /></div></div>
		
		<div class="row hidden-print">
    			<hr style="color: #adadad; background-color: #adadad; height: 2px;" />
    	</div>
		
		<? if($display):?>
		
		<div class="row">
		
		<div class="table-responsive">
		
			<table class="table table-striped table-hover table-bordered">
			  <thead>
			  	<?  if($report_type == 'auctions'):?>
			  	 <tr>
			  	 	 <th class="table-header">ID</th>
			  	 	 <th class="table-header">Type</th>
	  			 	 <th class="table-header">Date</th>
	  			 	 <th class="table-header">Name</th>
	  			 	 <th class="table-header">Address</th>
	  			 	 <th class="table-header">Lots</th>
	  			 	 <th class="table-header">Auctioneer</th>
	  			 	 <th class="table-header">Total</th>
	  			 	 <th class="table-header">Tax</th>
	  			 	 <th class="table-header">Comm.</th>
			  	 </tr>
			  	<? endif?>
			  	
			  	<?  if($report_type == 'lots'):?>
			  	 <tr>
			  	 	 <th class="table-header">L.ID</th>
			  	 	 <th class="table-header">E.ID</th>
			  	 	 <th class="table-header">Type</th>
	  			 	 <th class="table-header">Date</th>
	  			 	 <th class="table-header">Name</th>
	  			 	 <th class="table-header">Buyer</th>
	  			 	 <th class="table-header">Seller</th>
	  			 	 <th class="table-header">Auctioneer</th>
	  			 	 <th class="table-header">Status</th>
	  			 	 <th class="table-header">Total</th>
	  			 	 <th class="table-header">Tax</th>
	  			 	 <th class="table-header">Comm.</th>
			  	 </tr>
			  	<? endif?>
			  </thead>
		  
			  <tbody>
            	<?  if($report_type == 'auctions'):?>
            	
            			<? if($reports):?>

		            	<?
		            		$lot_total = 0;
		            		$total = 0;
					    	$tax_total = 0;
					    	$commission_total = 0;
		            	?>
	            	
					  	<? foreach($reports as $report):?>
					  	
					  	<?
					  		$lot_total = $report['num_lots'] + $lot_total;
					  		$total = $report['total_amount_lots'] + $total;
					    	$tax_total = $report['total_tax_lots'] + $tax_total;
					    	$commission_total = $report['commission'] + $commission_total;
					    	
					    	switch($report['event_type_name'])
					    	{
					    		case 'Online':
					    			$label = 'info';
					    		break;
					    		case 'Onsite':
					    			$label = 'default';
					    		break;
					    		case 'Dual':
					    			$label = 'danger';
					    		break;
					    	}
					  	?>
					  	
					  	<tr>
					  		<td align="center"><?= $report['event_id']?></td>
					  		<td align="center"><span class="label label-<?= $label?>"><?= $report['event_type_name']?></span></td>
							<td align="center"><?= convert_to_human($report['event_end_date'])?></td>
							<td align="center"><?= ($report['seller_company_name']) ? word_limiter($report['seller_company_name'], 8) : word_limiter($report['event_name'], 8) ?></td>
							<td align="center"><?= $report['event_address']?> <?= $report['event_city']?> <?= $report['event_state']?> <?= $report['event_zip']?></td>
							<td align="center"><?= number_format($report['num_lots'])?></td>
							<td align="center"><?= $report['user_first_name']?> <?= $report['user_last_name']?></td>
							<td align="center"><?= number_format($report['total_amount_lots'], 2)?></td>
							<td align="center"><?= number_format($report['total_tax_lots'], 2)?></td>
							<td align="center"><?= number_format($report['commission'], 2)?></td>
					  	</tr>
					  	<? endforeach?>
				    <? else:?>
				    	<tr>
				    		<td colspan="10" align="center">No Results Found</td>
				    	</tr>
				    <? endif?>
				    	<tr>
				    		<td colspan="5" align="right"><strong>Totals</strong></td>
				    		<td align="center"><?= isset($lot_total) ? number_format($lot_total) : ''?></td>
				    		<td>&nbsp;</td>
				    		<td align="center"><?= isset($total) ? number_format($total, 2) : ''?></td>
				    		<td align="center"><?= isset($tax_total) ? number_format($tax_total, 2) : ''?></td>
				    		<td align="center"><?= isset($commission_total) ? number_format($commission_total, 2) : ''?></td>
				    	</tr>
			    <? endif?>
			    
			    <?  if($report_type == 'lots'):?>
			    
			    		<? if($reports):?>

		            	<?
		            		$total = 0;
					    	$tax_total = 0;
					    	$commission_total = 0;
		            	?>
	            	
					  	<? foreach($reports as $report):?>
					  	
					  	<?
					  		$total = $report['total_amount'] + $total;
					    	$tax_total = $report['total_tax'] + $tax_total;
					    	$commission_total = $report['commission'] + $commission_total;
					    	
					    	switch($report['event_type_name'])
					    	{
					    		case 'Online':
					    			$label = 'info';
					    		break;
					    		case 'Onsite':
					    			$label = 'default';
					    		break;
					    		case 'Dual':
					    			$label = 'danger';
					    		break;
					    	}
					  	?>
					  	
					  	<tr>
					  		<td align="center"><?= $report['lot_id']?></td>
					  		<td align="center"><?= $report['event_id']?></td>
					  		<td align="center"><span class="label label-<?= $label?>"><?= $report['event_type_name']?></span></td>
							<td align="center"><?= convert_to_human($report['lot_end_date'])?></td>
							<td align="center"><?= $report['lot_name']?></td>
							<td align="center"><?= $report['user_first_name']?> <?= $report['user_last_name']?></td>
							<td align="center"><?= $report['seller_first_name']?> <?= $report['seller_last_name']?></td>
							<td align="center"><?= $report['auctioneer_first_name']?> <?= $report['auctioneer_last_name']?></td>
							<td align="center"><?= ($report['lot_paid'] == 1) ? '<span class="label label-success">Paid</span>' : '<span class="label label-warning">Due</span>'?></td>
							<td align="center"><?= number_format($report['total_amount'], 2)?></td>
							<td align="center"><?= number_format($report['total_tax'], 2)?></td>
							<td align="center"><?= number_format($report['commission'], 2)?></td>
					  	</tr>
					  	<? endforeach?>
				    <? else:?>
				    	<tr>
				    		<td colspan="12" align="center">No Results Found</td>
				    	</tr>
				    <? endif?>
				    	<tr>
				    		<td colspan="9" align="right"><strong>Totals</strong></td>
				    		<td align="center"><?= isset($total) ? number_format($total, 2) : ''?></td>
				    		<td align="center"><?= isset($tax_total) ? number_format($tax_total, 2) : ''?></td>
				    		<td align="center"><?= isset($commission_total) ? number_format($commission_total, 2) : ''?></td>
				    	</tr>
			    	
			    <? endif?>
			    
			    
				</tbody>
		  </table>
		  
		  </div>

		</div>
		
	<? endif?>
		
		</form>
		
	<? endif?>
	
	<!-- JAVASCRIPT -->		  
	<script type="text/javascript">			  
		$(document).ready(function(){
			
	   	 $('#start_date').datetimepicker({	
	   	   format:'Y-m-d h:i A',
	   	   formatTime:'h:i A',
	   	   step:30
	   	 });

	   	  $('#end_date').datetimepicker({
	   	   format:'Y-m-d h:i A',
	   	   formatTime:'h:i A'
	   	 });
			
			$('#print-report').click(function() {		
					window.print();
			});
		});
	</script>