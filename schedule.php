	<? if($this->session->userdata('user_role_id') == 1):?>
			<div class="row">
				<div class="col-sm-8 col-md-8 col-lg-8">
					<h1 class="visible-print">Schedule</h1>
					<p class="visible-print"><img src="<?= base_url()?>assets/front/themes/<?= $this->config->item('front_theme')?>/images/logo.png" alt="American Auctioneers"></p>
					<p class="lead"><?= ($start_date) ? $start_date : ''?> - <?= ($end_date) ? $end_date : ''?></p>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4" align="right">
					<form action="<?= site_url('manage/schedule_export')?>" role="form" method="post">
					<input type="hidden" name="auctioneer" value="<?= $auctioneer?>" />
				  	<input type="hidden" name="start_date" value="<?= $start_date?>" />
				  	<input type="hidden" name="end_date" value="<?= $end_date?>" />
					<input type="submit" class="btn btn-default hidden-print" value="Export" />&nbsp;
					<button type="button" id="print-report" class="btn btn-primary hidden-print"><span class="glyphicon glyphicon-print"></span> Print</button>
					</form>
				</div>
			</div>
			
		<form action="<?= site_url('manage/schedule')?>" role="form" method="post">
		<div class="row hidden-print">
			<div class="col-sm-6 col-md-6 col-lg-6">
					   <div class="form-group">
						  <select class="form-control" id="user_id" name="user_id">
						  	<? if($users):?>
						  		<option value="0">By Auctioneer</option>
						  		<? foreach($users as $user):?>
						  			<? $user_selected = ($user['user_id'] == $auctioneer) ? 'selected' : ''?>
						    		<option <?= $user_selected?> value="<?= $user['user_id']?>" id="user"><?= $user['user_last_name']?>, <?= $user['user_first_name']?> </option>
						    	<? endforeach?>
						    	
						    <? endif?>
						    </select>
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
		
		
		<div class="row hidden-print" align="center">
		<br>
		<div class="col-sm-3 col-md-3 col-lg-3 pull-right"><input type="submit" class="form-control btn btn-primary" value="Generate Schedule" /></div>
	    </div>
		
		<? if(! $display):?>
			<? if($message):?>
				<div class="row hidden-print">
	    			<h3 align="center">Schedule Sent...</h3>
	    		</div>
			<? endif?>
		<? endif?>
		
		<div class="row hidden-print">
    			<hr style="color: #adadad; background-color: #adadad; height: 2px;" />
    	</div>
		</form>
		
		<? if($display):?>
		
		<div class="row">
			<p align="center" class="lead"><?= $name?></p>
		</div>
			
		<div class="row">
		
		<div class="table-responsive">
		
			<table class="table table-striped table-hover table-bordered">
			  <thead>
			  
			  	 <tr>
			  	 	 <th class="table-header">ID</th>
			  	 	 <th class="table-header">Type</th>
	  			 	 <th class="table-header">Date</th>
	  			 	 <th class="table-header">Name</th>
	  			 	 <th class="table-header">Address</th>
	  			 	 <th class="table-header">Lots</th>
			  	 </tr>
			  
			  </thead>
		  
			  <tbody>
	            	
				<? if($schedules):?>
					  	
			        <? foreach($schedules as $schedule):?>
					  	
					  	<?
					  	
					    	switch($schedule['event_type_name'])
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
					    	
					    	$lot_count = $this->event_model->get_lot_count($schedule['event_id']); 
					  	?>
					  	
						<? 
						if($schedule['event_status_type_id'] == 2)
						{
						
						$strike = 'strike';
						$strike_bg = 'strike-bg';
						
						}
						else
						{
							$strike = '';
							$strike_bg = '';
						}
					
						?>
						
						<style>
							.strike {							
								text-decoration: line-through;
							}	
							
							.strike-bg {							
								background-color: #aaaaaa;
							}
								
						</style>

					  	
					  	<tr>
					  		<td align="center" class="<?= $strike?>"><?= $schedule['event_id']?></td>
					  		<td align="center" class="<?= $strike?>"><span class="label label-<?= $label?>"><?= $schedule['event_type_name']?></span></td>
							<td align="center" class="<?= $strike?>"><?= convert_to_human($schedule['event_end_date'])?></td>							
							<td align="center" class="<?= $strike?>"><?= $schedule['event_name']?></td>
							<td align="center" class="<?= $strike?>"><?= $schedule['event_address']?> <?= $schedule['event_city']?> <?= $schedule['event_state']?> <?= $schedule['event_zip']?></td>
							<td align="center" class="<?= $strike?>"><?= number_format($lot_count)?></td>
						</tr>
				<? endforeach?>
				   
			 <? else:?>
			    	  <tr>
			    		<td colspan="6" align="center">No Results Found</td>
			    	  </tr>
		    <? endif?>
			    
				</tbody>
		  </table>
		  </div>
		  
		 </div>
		 
		  	  <form action="<?= site_url('manage/schedule_send')?>" role="form" method="post">
			  <div class="row hidden-print">
			
					<div class="form-group">
	        				<strong>Message:</strong>
	            			<input type="text" id="email_message" name="email_message" class="form-control" placeholder="" value="" />
	        		</div>
	        		
	          </div>
	
			  
				  	<input type="hidden" name="auctioneer" value="<?= $auctioneer?>" />
				  	<input type="hidden" name="start_date" value="<?= $start_date?>" />
				  	<input type="hidden" name="end_date" value="<?= $end_date?>" />
			  		<div class="row hidden-print" align="center">
					<br>
					<div class="col-sm-3 col-md-3 col-lg-3 pull-right"><input type="submit" class="form-control btn btn-warning" value="Send to <?= (isset($name)) ? $name : ''?>" /></div></div>
			  </form>

		</div>
		
		<? endif?>
		
	<? endif?>
	
	<!-- JAVASCRIPT -->		  
	<script type="text/javascript">			  
		$(document).ready(function(){
			$('#print-report').click(function() {		
					window.print();
			});
			
	   	 $('#start_date').datetimepicker({	
	   	   format:'Y-m-d h:i A',
	   	   formatTime:'h:i A',
	   	   step:30
	   	 });

	   	  $('#end_date').datetimepicker({
	   	   format:'Y-m-d h:i A',
	   	   formatTime:'h:i A'
	   	 });
		});
	</script>