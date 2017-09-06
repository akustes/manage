		
		<div class="row">
			 <? if($display):?> <a href="<?= site_url('manage/live')?>" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Back</a><? endif?>
			<div class="pad margin no-print">
	          <div class="callout callout-info" style="margin-bottom: 0!important;"> 										
	            <h4><i class="fa fa-info"></i> Still Under Development, Not Fully Functional at This Time</h4>
	          </div>
	        </div>
			<div class="col-md-10 col-lg-10">
				<form action="<?= site_url('manage/live')?>" method="post">
					<div class="col-md-4 col-lg-4">
						<div class="form-group">
							<?= form_dropdown('event_id', $auctions, $event_id, 'id="event_id" class="form-control"')?>
						</div>
					</div>
					<div class="col-md-2 col-lg-2">
						<input type="submit" class="form-control btn btn-primary" value="Go" />
					</div>
				</form>
			</div>
			<div class="col-md-2 col-lg-2">
				  <? if($display):?>
				  <a href="#" data-user-type="buyer" class="btn btn-primary pull-right" data-toggle="modal" data-target="#user-crud" data-action="add" title="Add Buyer" data-backdrop="static"><span class="glyphicon glyphicon-plus"></span> Add Buyer</a>
			     <? endif?>
			</div>
		</div>
        <? if($display):?>
		<form id="liveForm">
		<div class="row">
			
			<div class="col-md-5 col-lg-5">
				<div class="pad margin no-print">
		          <div class="callout callout-default" style="margin-bottom: 0!important;">												
		            <h4><i class="fa fa-dollar"></i> 
					<span id="highBidder"></span>: <span id="currentBid"></span><br />
					Min Bid: <span id="min_bid"></span>  <small style="color: red;">Max Bid: <span id="max_bid"></span></small> </h4>
		          </div>
		        </div>
			</div>
			<div class="col-md-4 col-lg-4">
				<div class="pad margin no-print">
		          <div class="callout callout-info" style="margin-bottom: 0!important;"> 										
		            <h4><i class="fa fa-info"></i> <div id="message"></div></h4>
		          </div>
		        </div>
			</div>
			<div class="col-md-3 col-lg-3">
				<div class="pad margin no-print">
		          <div class="callout callout-warning" style="margin-bottom: 0!important;">												
		            <h4><i class="fa fa-thumbs-up"></i> <span id="bid_type"></span></h4> <!-- fa-rss for online  -->
		          </div>
		        </div>
			</div>
			
		</div>

		<div class="row">
			
			<div class="col-md-4 col-lg-4">
				<img src="" width="300" height="300" alt="" />
			</div>
			<div class="col-md-8 col-lg-8">
				<div style="height: 300px; overflow: auto">
				  <div class="feed">
                        <table id="history" class="table table-striped">
                            <tbody></tbody>
                        </table>
				</div>
			</div>
			</div>
			
		</div>
		<hr />
		<div class="row">
			<div class="col-md-4 col-lg-4">
				<?= form_dropdown('lot_id', $auction_lots, NULL, 'id="lot_id" class="form-control"')?>
				<table class="table">
					<tr>
						<td><strong>Name</strong></td>
						<td><span id="lot_name"></span></td>
					</tr>
					<tr>
						<td><strong>Number</strong></td>
						<td><span id="lot_number"></span></td>
					</tr>
					<tr>
						<td><strong>Tag</strong></td>
						<td><span id="lot_tag"></span></td>
					</tr>
					<tr>
						<td colspan="2"><strong>Description</strong></td>
					</tr>
					<tr>
						<td colspan="2"><span id="lot_description"></span></td>
					</tr>
				</table>
			</div>
			<div class="col-md-8 col-lg-8">
				<div class="input-group">
			      	<input type="text" id="free-message" name="free-message" class="form-control" placeholder="Send a Message" />
			      	<span class="input-group-btn">
			        	<button id="bid-message" class="btn btn-primary" data-loading-text="Sending" autocomplete="off" type="button">Send</button>
			      	</span>
        	     </div>
				 <br />
				<div class="row">
					<div class="col-md-8 col-lg-8">
						<div class="form-group">
						 <button id="inc1" class="btn btn-primary" type="button" data-loading-text="+" >10+</button>
						 <button id="inc2" class="btn btn-primary" type="button" data-loading-text="+" >20+</button>
						 <button id="inc3" class="btn btn-primary" type="button" data-loading-text="+" >30+</button>
						 <button id="inc4" class="btn btn-primary" type="button" data-loading-text="+" >40+</button>
						 <button id="inc5" class="btn btn-primary" type="button" data-loading-text="+" >50+</button>
						 <button id="inc6" class="btn btn-primary" type="button" data-loading-text="+" >60+</button>
						</div>
					</div>
					<div class="col-md-4 col-lg-4">
						<div class="input-group">
					      	<input type="text" id="free_bid" type="number" autocomplete="off" class="form-control" placeholder="Adjust Bid" />
					      	<span class="input-group-btn">
					        	<button id="bid-free" class="btn btn-success" data-loading-text="Bidding" type="button">Bid</button>
					      	</span>
		        	     </div>
					</div>
				</div>
				<div class="row">
						<div class="col-md-8 col-lg-8">
							<div class="form-group">
							 <button class="btn btn-danger bid-final" type="button" data-loading-text="Calling" >Final Call</button>
							 <button class="btn btn-success" type="button" id="lot-sold" data-loading-text="Selling" >Sold</button>
							 <button class="btn btn-info bid-closed" type="button" data-loading-text="Closing" >Close</button>
							</div>
							<div class="form-group">
							 <button class="btn btn-default bid-active" type="button" data-loading-text="Starting" >Start</button>
							 <button class="btn btn-default bid-start-in-five" type="button" data-loading-text="Warning" >Warning</button>
							 <button class="btn btn-default bid-standby" type="button" data-loading-text="Standing By" >Stand By</button>
							 <button id="bid-restart" class="btn btn-default" type="button" data-loading-text="Restarting" >Restart</button>
							 <button class="btn btn-default paid-pulled" type="button" data-loading-text="Pulling" >Pull</button>
							</div>
						</div>
						<div class="col-md-4 col-lg-4">
						 	<button id="previous" class="btn btn-default" type="button" data-loading-text="Loading"><span class="glyphicon glyphicon-chevron-left"></span>Previous</button>&nbsp;&nbsp;
						 	<button id="next" class="btn btn-default" type="button" data-loading-text="Loading">Next<span class="glyphicon glyphicon-chevron-right"></span></button>
						</div>
				</div>
				 
			</div>
		</div>
		</form>
		
		
		
 	   <div class="modal fade" id="user-crud" tabindex="-1" role="dialog" aria-labelledby="Modalcrud" aria-hidden="true">
 	          <div class="modal-dialog">
 	              <div class="modal-content">
   
 	                  <div class="modal-header">
 	                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 	                      <h4 class="modal-title" id="Modalcrud"><span id="user_header"></span> <span class="user_text"></span></h4>
 	                  </div>
   
 	                  <div class="modal-body">
 					  	  <p align="center"><span id="user_message" style="color: red; font-weight: bold; font-size: 1.2em;"></span> <span id="crud_message" style="font-weight: bold; font-size: 1.2em;"></span></p>
 	                      <form id="crudUserForm">
 							  <input type="hidden" name="action" id="action" />
 							  <input type="hidden" name="crud_user_id" id="crud_user_id" />
 						  	<div class="form-group">
 						      <label class="control-label" for="user_company_name">Company Name</label>
 						      <input type="text" class="form-control" name="user_company_name" id="user_company_name" placeholder="Enter Company Name">
 						    </div>
 							  <div class="row">
 									<div class="col-md-6 col-lg-6">
 									  	<div class="form-group">
 									      <label class="control-label" for="user_first_name">First Name</label>
 									      <input type="text" class="form-control" name="user_first_name" id="user_first_name" placeholder="Enter First Name">
 									    </div>
 									</div>
 									<div class="col-md-6 col-lg-6">
 									  	<div class="form-group">
 									      <label class="control-label" for="user_last_name">Last Name</label>
 									      <input type="text" class="form-control" name="user_last_name" id="user_last_name" placeholder="Enter Last Name">
 									    </div>
 									</div>
 							  </div>
							
 						  	  <div class="row">
 									<div class="col-md-6 col-lg-6">
 										<div class="form-group">
 									      <label class="control-label" for="user_email">Email Address</label>
 									      <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Enter email">
 									    </div>
 									</div>
 									<div class="col-md-6 col-lg-6">
 									    <div class="form-group">
 									      <label class="control-label" for="user_phone">Phone</label>
 									      <input type="text" class="form-control" name="user_phone" id="user_phone" placeholder="Username">
 									    </div>
 									</div>
 							  </div>
							  
 						  	  <div class="row">
 									<div class="col-md-6 col-lg-6">
 										<div class="form-group">
 									      <label class="control-label" for="user_address">Address</label>
 									      <input type="text" class="form-control" name="user_address" id="user_address" placeholder="Enter Address">
 									    </div>
 									</div>
 									<div class="col-md-6 col-lg-6">
 									    <div class="form-group">
 									      <label class="control-label" for="user_city">City</label>
 									      <input type="text" class="form-control" name="user_city" id="user_city" placeholder="Enter City">
 									    </div>
 									</div>
 							  </div>
							  
							  
 						  	  <div class="row">
 									<div class="col-md-3 col-lg-3">
 										<div class="form-group">
 									      <label class="control-label" for="user_state">State</label>
 									      <?= form_dropdown('user_state', $states, NULL, 'id="user_state" class="form-control"')?>
 									    </div>
 									</div>
 									<div class="col-md-3 col-lg-3">
 									    <div class="form-group">
 									      <label class="control-label" for="user_zip">Zip</label>
 									      <input type="text" class="form-control" name="user_zip" id="user_zip" placeholder="Enter Zip">
 									    </div>
 									</div>
 									<div class="col-md-6 col-lg-6">
 									    <div class="form-group">
 									      <label class="control-label" for="user_county">County</label>
 									      <input type="text" class="form-control" name="user_county" id="user_county" placeholder="Enter County">
 									    </div>
 									</div>
 							  </div>
							  
 						  	  <div class="row">
 									<div class="col-md-3 col-lg-3">
 										<div class="form-group">
 									    <div class="checkbox">
 									      <label>
 									        <input type="checkbox" id="user_buyer" name="user_buyer" value="1" /> Buyer
 									      </label>
 									    </div>
 									    </div>
 									</div>
 									<div class="col-md-3 col-lg-3">
 									    <div class="form-group">
 									    <div class="checkbox">
 									      <label>
 									        <input type="checkbox" id="user_seller" name="user_seller" value="1" /> Seller
 									      </label>
 									    </div>
 									    </div>
 									</div>
 									<div class="col-md-6 col-lg-6">
 									    <div class="form-group">
 									      <label class="control-label" for="user_role_id">User Role</label>
 									      <?= form_dropdown('user_role_id', $roles, NULL, 'id="user_role_id" class="form-control"')?>
 									    </div>
 									</div>
 							  </div>
							  
 								<div class="panel panel-default">
 								    <div class="panel-heading" role="tab" id="headingTwo">
 								      <h4 class="panel-title">
 								        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
 								         Additional Information <span class="glyphicon glyphicon-chevron-down pull-right"></span>
 								        </a>
 								      </h4>
 								    </div>
 								    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
 								      <div class="panel-body">
 								    <div class="form-group">
 								      <label class="control-label" for="user_resell">Resell Number</label>
 								      <input type="text" class="form-control" name="user_resell" id="user_resell" placeholder="Enter Resell Number">
 								    </div>
 								  	  <div class="row">
 											<div class="col-md-6 col-lg-6">
 											    <div class="form-group">
 											      <label class="control-label" for="user_username">Username</label>
 											      <input type="text" class="form-control" name="user_username" id="user_username" placeholder="Username">
 											    </div>
 											</div>
 												<div class="col-md-6 col-lg-6">
 												    <div class="form-group">
 												      <label class="control-label" for="user_password">Password</label>
 												      <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Password">
 												    </div>
 												</div>
 								  	  </div>
					  
											
							
 										    <div class="checkbox">
 										      <label>
 										        <input type="checkbox" id="user_active" name="user_active" value="1" /> Active
 										      </label>
 										    </div>
 								      </div>
 								    </div>
 								  </div>
				  
		
 						  </form>
 	                  </div>
       
 	                  <div class="modal-footer">
					  
 	                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 	                      <a href="#" id="crud-user" class="btn btn-primary primary"><span class="user_text"></span></a>
 	                  </div>
 	              </div>
 	          </div>
 	      </div>
		
		<!-- JAVASCRIPT -->		  
		<script type="text/javascript">
		$(document).ready(function(){
	
			/* Get Current Bid */
			setInterval(getbid, 0500);
   
		   $(document).on('change', 'input:radio[name="amount"]', function (e) {
		    	 e.preventDefault();
		   		 var increment_value = $('input:radio[name="amount"]:checked').val();

			   	$('#increment').val(increment_value);
		   });
	
		
			/* Submit Bid */
			$('#bid-free').click(function(e){
				e.preventDefault();
				$('#bid-free').button('loading');
				var confirm_bid = $('#free_bid').val();
				postBid('free', confirm_bid);
				$('#bid-free').button('reset');
			});
	
			$('#bid-up').click(function(e){
				  e.preventDefault();
		  		  $('#bid-up').button('loading');
			 	  postBid('up');
				  $('#bid-up').button('reset');
			});
	
			$('#inc1').click(function(e){
				e.preventDefault();
		  	    $('#inc1').button('loading');
				var confirm_bid = $('#inc1').html();
				postBid('upinc', confirm_bid);
				$('#inc1').button('reset');
			});
	
			$('#inc2').click(function(e){
				 e.preventDefault();
		  	    $('#inc2').button('loading');
			 	var confirm_bid = $('#inc2').html();
				postBid('upinc', confirm_bid);
				$('#inc2').button('reset');
			});
	
			$('#inc3').click(function(e){
				 e.preventDefault();
		  	   	$('#inc3').button('loading');
			 	 var confirm_bid = $('#inc3').html();
				 postBid('upinc', confirm_bid);
				 $('#inc3').button('reset');
			});
	
			$('#inc4').click(function(e){
				e.preventDefault();
		  	    $('#inc4').button('loading');
			 	var confirm_bid = $('#inc4').html();
				postBid('upinc', confirm_bid);
				$('#inc4').button('reset');
			});
	
			$('#inc5').click(function(e){
				 e.preventDefault();
		  	     $('#inc5').button('loading');
			 	 var confirm_bid = $('#inc5').html();
				 postBid('upinc', confirm_bid);
				 $('#inc5').button('reset');
			});
	
			$('#inc6').click(function(e){
				e.preventDefault();
		        $('#inc6').button('loading');
			 	var confirm_bid = $('#inc6').html();
				postBid('upinc', confirm_bid);
				$('#inc6').button('reset');
			});
	
			$('#incFixed1').click(function(e){
				e.preventDefault();
		         $('#incFixed1').button('loading');
			 	var confirm_bid = $('#inc_fixed1').val();
				postBid('upinc', confirm_bid);
				$('#incFixed1').button('reset');
			});
	
			$('#incFixed2').click(function(e){
				e.preventDefault();
		         $('#incFixed2').button('loading');
			 	var confirm_bid = $('#inc_fixed2').val();
				postBid('upinc', confirm_bid);
				$('#incFixed2').button('reset');
			});
	
			$('#incFixed3').click(function(e){
				e.preventDefault();
		  	    $('#incFixed3').button('loading');
			 	var confirm_bid = $('#inc_fixed3').val();
				postBid('upinc', confirm_bid);
				$('#incFixed3').button('reset');
			});
	
			$('#bid-down').click(function(e){
				  e.preventDefault();
		  		  $('#bid-down').button('loading');
			 	  postBid('down');
				  $('.bid-down').button('reset');
			});
	
			$('.bid-final').click(function(e){
				  e.preventDefault();
		  		  $('.bid-final').button('loading');
			 	  postBid('final');
				  $('.bid-final').button('reset');
			});
	
			$('.bid-active').click(function(e){
				  e.preventDefault();
		  		  $('.bid-active').button('loading');
			 	  postBid('active');
				  $('.bid-active').button('reset');
			});

		    $('.bid-closed').click(function(e){
		        e.preventDefault();
				$('.bid-closed').button('loading');
		        postBid('closed');
				$('.bid-closed').button('reset');
		    });
    
		    $('.bid-standby').click(function(e){
				  e.preventDefault();
		  		  $('.bid-standby').button('loading');
			 	  postBid('standby');
				  $('.bid-standby').button('reset');
			});
	
			$('.bid-start-in-five').click(function(e){
				  e.preventDefault();
		  		  $('.bid-start-in-five').button('loading');
			 	  postBid('start-in-five');
				  $('.bid-start-in-five').button('reset');
			});
	
			$('.paid-pulled').click(function(e){
				   e.preventDefault();
		   		  $('.paid-pulled').button('loading');
			 	  postBid('free');
			 	  postBid('paid-pulled');
				  $('.paid-pulled').button('reset');
			});
	
			$('#bid-restart').click(function(e){
				  e.preventDefault();
				   $('#bid-restart').button('loading');
			 	  postBid('restart');
				  $('#bid-restart').button('reset');
			});
	
			$('#lot-sold').click(function(e){		  
				  e.preventDefault();
				  $('#lot-sold').button('loading');
			 	  postBid('sold');
				  $('#lot-sold').button('reset');
			});	
	
			$('#bid-message').click(function(e){
				  e.preventDefault();
				  
				  $('#bid-message').button('loading');
			 	  postBidMessage();
				  $('#bid-message').button('reset');
			});
	
	
			 function getbid(){
		
				var bid_id = $('#bid_id').val();
		
				//data = $(this).serialize() + '&bid_id=' + bid_id;
				
				$.ajax({			
		            type: 'POST',
					dataType: "json",
		            url: base_url + 'manage/get_high_bid/'+ bid_id,			
			      
					success: function(data) {							
														
							$("#currentBid").html(parseFloat(data.bid['bid_amount']).toFixed(2));
					
							/* BEGIN Increment Bid Buttons */
							$('#min_bid').html(parseFloat(data.bid['min_bid']).toFixed(2));
					
							$('#max_bid').html(parseFloat(data.bid['proxy']).toFixed(2));
							//$('#max_bid').html(10);
					
							$('#inc1').html(data.bid['inc1']);
							$('#inc2').html(data.bid['inc2']);
							$('#inc3').html(data.bid['inc3']);
							$('#inc4').html(data.bid['inc4']);
							$('#inc5').html(data.bid['inc5']);
							$('#inc6').html(data.bid['inc6']);
					
					
							$('#incFixed1').html(data.bid['incFixed1']);
							$('#incFixed2').html(data.bid['incFixed2']);
							$('#incFixed3').html(data.bid['incFixed3']);
					
							$('#inc_fixed1').val(data.bid['inc_fixed1']);
							$('#inc_fixed2').val(data.bid['inc_fixed2']);
							$('#inc_fixed3').val(data.bid['inc_fixed3']);
					
					
					
							/* END Increment Bid Buttons */
					
							if(data.bid['user_role_id'] <= 2){
								$("#highBidder").html(
								"Onsite"
								);								
							}
							else{
								$("#highBidder").html(
								bid['user_username']
								);
							}
					
					
							$("#current_bidder_id").val(data.bid['bid_user_id']);
					
							$('#bid_type').html(data.bid['bid_type']);
					
							if(data.bid['bid_type'] == 'online') {
								$("#bid_types").addClass("bg-danger");
								$("#bid_types").removeClass("bg-info");
							}
					
							if(data.bid['bid_type'] == 'onsite') {
								$("#bid_types").addClass("bg-info");
								$("#bid_types").removeClass("bg-danger");
							}
					
					
							$("#message").html(
								data.bid['bid_message']
							);
					
							$("#lotId").html(
								data.bid['bid_lot_id']
							);
					
							$("#event_lot_id").val(
								data.bid['lot_event_id']
							);
					
							$('#buyer').html(data.bid['user_id']);
							$('#buyer_first_name').html(data.bid['user_first_name']);
							$('#buyer_last_name').html(data.bid['user_last_name']);
							$('#lot_tag').html(data.bid['lot_tag']);
					
							if(data.bid['lot_buyer'] != 0 && data.bid['user_id'] == data.bid['lot_buyer'])
							{
								$('#buyer_display').html('Buyer');
							}
							else
							{
								$('#buyer_display').html('Bidder');
							}

							// Show Lot Active Or Not Active
							if(data.bid['lot_active'] == 0){
								$("#lot_active").html("SOLD");
						
								if(data.bid['bid_type'] == 'online') {
									$("#lot_buyer").html('ONLINE');
								}
						
								if(data.bid['bid_type'] == 'onsite') {
									$("#lot_buyer").html('ONSITE');
									$( "#show_link" ).show();
							
								}
						
								/*
								if(bid['user_role_id'] <= 2) {
									$("#lot_buyer").html('Onsite');								
								}
								else {
									$("#lot_buyer").html(bid['lot_buyer']);									
								}
								*/
						
								$('#inc1').prop('disabled', true);
								$('#inc2').prop('disabled', true);
								$('#inc3').prop('disabled', true);
								$('#inc4').prop('disabled', true);
								$('#inc5').prop('disabled', true);
								$('#inc6').prop('disabled', true);
								$('#incFixed1').prop('disabled', true);
								$('#incFixed2').prop('disabled', true);
								$('#incFixed3').prop('disabled', true);
								$('#bid-free').prop('disabled', false);
						
						
						
							}
							else{
								$("#lot_active").html(
								"ACTIVE"
								);
								$("#lot_buyer").html('');
								$( "#show_link" ).hide();
						
						
								$('#inc1').prop('disabled', false);
								$('#inc2').prop('disabled', false);
								$('#inc3').prop('disabled', false);
								$('#inc4').prop('disabled', false);
								$('#inc5').prop('disabled', false);
								$('#inc6').prop('disabled', false);
								$('#incFixed1').prop('disabled', false);
								$('#incFixed2').prop('disabled', false);
								$('#incFixed3').prop('disabled', false);
								$('#bid-free').prop('disabled', false);
						
							}
					
					
							//alert("Form submitted successfully.\nReturned json: " + data["json"]);
						}
						
						var history_date;
						var bid_amount_format;
						var bid_amount;
						var feed = [];
		
		                $.each(data.history, function (i, v) {
		
		                   history_date = formatDate(data.history[i]['bid_history_created_date']);
		
		                   if(data.history[i]['bid_history_amount'] === 0 || data.history[i]['bid_history_amount'] === 0.00){
		
		               			bid_amount = 'No Bid';
		
		                   }else{
		
		                   		bid_amount_format = parseFloat(data.history[i]['bid_history_amount']).toFixed(2);
		               			bid_amount = '$' + bid_amount_format.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		
		                   }
		
		                   var username;
		                   
		                   if(data.history[i]['user_role_id'] <= 2){
		                   	
		                   		username = 'Auctioneer';
		                   }
		                   else
		                   {
		                   		var parse_username1 = data.history[i]['user_username'].substr(0,3).replace(/./g, '*');
		                   		var parse_username2 = data.history[i]['user_username'].substr(4,10);
		                   		username = parse_username1 + parse_username2;
		                   }
		                   
		                   feed.push('<tr><td class="table-small" width="175" align="center"><small>' + history_date + '</small></td><td  class="table-small" align="center"><small>' + bid_amount + '</small></td><td  class="table-small" align="center"><small>' + data.history[i]['bid_history_type'] + '</small></td><td  class="table-small" align="center"><small>' + username + '</small></td><td  class="table-small" align="center"><small><i>' + data.history[i]['bid_history_message'] + '</i></small></td></tr>');
		
		
		                });
		                
		               $('#history tbody').html(feed);
			
			
			

		        });
		
			 } //getbid	 
	
	
			 function postBid(bid_type, bid) {		
	 
				  var bid_id = $('#bid_id').val();
				  var user_id = $('#user_id').val();
				  var current_bidder_id = $('#current_bidder_id').val();
				  var status = $('#lot_active').html();
		  
				  if(bid_type == 'free'){
				  	var bid_amount = $('#free_bid').val();			
				  }else{
				  	var bid_amount = $('#increment').val();
				  }
		  
				  if((bid_type == 'up' || 'down') && (status == 'SOLD')) {		  
					$('#message').html(status);
						var bid_amount = 0;
					}
			
				  if(bid_type == 'upinc')
				  {
				  		var bid_amount = bid;
				  }
		  
		  
				  var bid_type = bid_type;		  
				  var formData = 'bid='+ bid_amount + '&bid_type=' + bid_type + '&user_id=' + user_id + '&current_bidder_id=' + current_bidder_id;
		  
				  $.ajax({
				     type: 'GET',
				     url: base_url + 'manage/bidding/' + bid_id + '/',
				     dataType: "json",
				     data: formData,
					 cache: false,
				     success: function(result) {
		     
						//$('#message').html(result);
				
						 // display the bidder outbid
		                 var notification = result['notification'];
		                 $("#message").html(notification).show(0).delay(1500).fadeOut(3000);
                
		                 // display the bidder outbid
			
				     }
				  });
		
			}
	
			function postBidMessage() {		

				  var bid_id = $('#bid_id').val();
				  var user_id = $('#user_id').val();
				  var message = $('#free-message').val();	  
				  var formData = 'message='+ message + '&user_id=' + user_id;

				  $.ajax({
				     type: 'GET',
				     url: base_url + 'manage/bidding_message/' + bid_id + '/',
				     data: formData,
					 cache: false,
				     success: function(result) {

						$('#message').html(result);
						$('#message-display').html('<strong>Message Sent</strong>: ' + result);
						$('#free-message').val('');
						$('#bid-message').button('reset');

				     }

				  });
			}
			
			
			
		    $('#user-crud').on('show.bs.modal', function(e) {
 
			  	  var user_id = $(e.relatedTarget).attr('data-uid');
				  var user_type = $(e.relatedTarget).attr('data-user-type');
				  var user_action = $(e.relatedTarget).attr('data-action');
				  var action;
				  var user_header;
		  
				  switch(user_action)
				  {
					  case 'add':
						  action = 'Add';
		  				  $('#crudUserForm')[0].reset();
						  $('#action').val('add');
						  $('#user_role_id').val(3);
						  $('#user_active').prop('checked', true);
				  
						  switch(user_type)
						  {
						  	  case 'user':
								  $('#user_buyer').prop('checked', false);
								  $('#user_seller').prop('checked', false);
								  $('#user_role_id').val(3);
								  user_header = 'User';
							  break;
						  	  case 'buyer':
								  $('#user_buyer').prop('checked', true);
								  $('#user_seller').prop('checked', false);
								  $('#user_role_id').val(3);
								   user_header = 'Buyer';
							  break;
						  	  case 'seller':
								  $('#user_buyer').prop('checked', false);
								  $('#user_seller').prop('checked', true);
								  $('#user_role_id').val(3);
								   user_header = 'Seller';
							  break;
						  	  case 'auctioneer':
								  $('#user_buyer').prop('checked', false);
								  $('#user_seller').prop('checked', true);
								  $('#user_role_id').val(2);
								  user_header = 'Auctioneer';
							  break;
						  	  default:
								  $('#user_buyer').prop('checked', true);
								  $('#user_seller').prop('checked', false);
								  $('#user_role_id').val(3);
								  user_header = 'Buyer';
						  }
		  
					  break;
				  	  case 'edit':
					  	  action = 'Update';
				  
						  user_data(user_id);
				  
						  user_header = 'User';
				  
					  break;
				  }

				  $('#user_header').html(user_header);
				  $('.user_text').html(action);

		    });
	 
	 
			 $('#crud-user').click(function() {
  
				  var form_data = $("#crudUserForm").serialize();
				  var get_user_action = $('#action').val();
				  var user_message;
		  
				  switch(get_user_action)
				  {
				  	  case 'add':
					  	user_message = 'Added';
					 break;
					 case 'edit':
						user_message = 'Updated';
					 break;
				  }
  
			  	  $.ajax({
			  	     type: 'POST',
			  	     url: '<?= base_url()?>manage/user_crud',
					 data: form_data,
			  		 cache: false,
			  	     success: function(user) {
			  			  $('#crud_message').html('User ' + user_message + '..');
						  $('#user_message').html('#' + user);
				  
						  if((parseFloat(user) == parseInt(user)) && !isNaN(user)){
							  $('#crudUserForm')[0].reset();
							  $('#action').val('add');
							  $('#user_role_id').val(3);
							  $('#user_buyer').prop('checked', true);
							  $('#user_active').prop('checked', true);
					  	  }
			  	     }
			  	  });

		      });
	  
			  function user_data(id)
			  {
				  /* Load User Data */
				  $.ajax({			
				     	type: 'GET',
						dataType: 'json',
			      		url: base_url + 'manage/get_user_data/' + id,
						success: function(user){
						  $('#action').val('edit');					
		  				  $('#crud_user_id').val(user['user_id']);
				  
						  var user_active_check = (user['user_active'] == true) ? true : false;
						  $('#user_active').prop('checked', user_active_check);

						  var user_buyer_check = (user['user_buyer']  == true) ? true : false;
						  $('#user_buyer').prop('checked', user_buyer_check);
				  
						  var user_seller_check = (user['user_seller'] == true) ? true : false;
						  $('#user_seller').prop('checked', user_seller_check);
				  
						  $('#user_first_name').val(user['user_first_name']);
						  $('#user_last_name').val(user['user_last_name']);
						  $('#user_phone').val(user['user_phone']);
						  $('#user_email').val(user['user_email']);
						  $('#user_company_name').val(user['user_company_name']);
						  $('#user_resell').val(user['user_resell']);
						  $('#user_role_id').val(user['user_role_id']);
						  $('#user_username').val(user['user_username']);
						  $('#user_address').val(user['user_address']);
						  $('#user_city').val(user['user_city']);
						  $('#user_state').val(user['user_state']);
						  $('#user_zip').val(user['user_zip']);
						  $('#user_county').val(user['user_county']);
				  
						}
			  	  });
		
			  }
	
		});
		</script>
		
		
		<? endif?>