
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12">
								
								<!-- Split button -->
								<div class="btn-group">
								  <a href="<?= site_url('manage/auctions/all')?>" class="btn btn-info">All</a>
								  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								    <span class="caret"></span>
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <ul class="dropdown-menu" role="menu">
								    <li><a href="#" data-auction-type="auction" data-action="add" data-toggle="modal" data-target="#auction-crud" title="Add Auction" data-backdrop="static"><span class="glyphicon glyphicon-plus"></span> Add New</a></li>
								  </ul>
								</div>
								
								<!-- Split button -->
								<div class="btn-group">
								  <a href="<?= site_url('manage/auctions/onsite')?>" class="btn btn-success">Onsite</a>
								  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								    <span class="caret"></span>
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <ul class="dropdown-menu" role="menu">
								    <li><a href="#" data-auction-type="onsite" data-action="add" data-toggle="modal" data-target="#auction-crud" title="Add Onsite" data-backdrop="static"><span class="glyphicon glyphicon-plus"></span> Add New</a></li>
								  </ul>
								</div>
								
								
								<!-- Split button -->
								<div class="btn-group">
								  <a href="<?= site_url('manage/auctions/online')?>" class="btn btn-warning">Online</a>
								  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								    <span class="caret"></span>
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <ul class="dropdown-menu" role="menu">
								    <li><a href="#" data-auction-type="online" data-action="add" data-toggle="modal" data-target="#auction-crud" title="Add Online" data-backdrop="static"><span class="glyphicon glyphicon-plus"></span> Add New</a></li>
								  </ul>
								</div>
								
								<!-- Split button -->
								<div class="btn-group">
								  <a href="<?= site_url('manage/auctions/dual')?>" class="btn btn-danger">Dual</a>
								  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								    <span class="caret"></span>
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <ul class="dropdown-menu" role="menu">
								    <li><a href="#" data-auction-type="dual" data-action="add" data-toggle="modal" data-target="#auction-crud" title="Add Dual" data-backdrop="static"><span class="glyphicon glyphicon-plus"></span> Add New</a></li>
								  </ul>
								</div>
								<a href="<?= site_url('manage/auctions/cancelled')?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancelled</a>
								<a href="<?= site_url('manage/auctions/trash')?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span> Trash</a>
								
							</div>
							
						</div>
						
						<div class="row">&nbsp;</div>
						
						<div class="row">
							
						</div>	
						
						
				
			<div class="box">
                 <div class="box-header">

                 </div><!-- /.box-header -->
                 <div class="box-body">
					<div class="row">
						<form action="<?= site_url('manage/auctions/dates')?>" method="post">
						<div class="col-md-5 col-lg-4">
            		  	<div class="input-group date">
                			<input type="text" id="start_date" name="start_date" class="form-control" placeholder="Start Date" value="<?= $start_date?>" />
                			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            		  	</div>
						</div>
						<div class="col-md-5 col-lg-4">
	            		  	<div class="input-group date">
	                			<input type="text" id="end_date" name="end_date" class="form-control" placeholder="End Date" value="<?= $end_date?>" />
	                			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
	            		  	</div>
						</div>
						<div class="col-md-2 col-lg-2">
							<input type="submit" class="btn btn-primary" value="Filter" />
						</div>
						</form>
					</div>
					<br />
				   <?= $this->table->generate()?>
                   
                 </div><!-- /.box-body -->
               </div><!-- /.box -->
			   

			   
			   
			   
			   <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="Modaldelete" aria-hidden="true">
			          <div class="modal-dialog">
			              <div class="modal-content">
            
			                  <div class="modal-header">
			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                      <h4 class="modal-title" id="Modaldelete">Confirm Delete</h4>
			                  </div>
            
			                  <div class="modal-body">
			                      <p>You are about to delete this auction</p>
			                      <p>Do you want to proceed?</p>
			                      <!-- <p class="debug-url"></p> -->
			                  </div>
                
			                  <div class="modal-footer">
								  <input type="hidden" name="auction_id" id="auction_id">
			                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			                      <a href="#" id="delete-auction" class="btn btn-danger danger">Delete</a>
			                  </div>
			              </div>
			          </div>
			      </div>
				  
				  
   			   <div class="modal fade" id="confirm-recover" tabindex="-1" role="dialog" aria-labelledby="Modalrecover" aria-hidden="true">
   			          <div class="modal-dialog">
   			              <div class="modal-content">
            
   			                  <div class="modal-header">
   			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
   			                      <h4 class="modal-title" id="Modalrecover">Confirm Recover</h4>
   			                  </div>
            
   			                  <div class="modal-body">
   			                      <p>You are about to recover this auction</p>
   			                      <p>Do you want to proceed?</p>
   			                      <!-- <p class="debug-url"></p> -->
   			                  </div>
                
   			                  <div class="modal-footer">
   								  <input type="hidden" name="recover_auction_id" id="recover_auction_id">
   			                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
   			                      <a href="#" id="recover-auction" class="btn btn-primary danger">Recover</a>
   			                  </div>
   			              </div>
   			          </div>
   			      </div>
				  
				  
      			   <div class="modal fade" id="confirm-active" tabindex="-1" role="dialog" aria-labelledby="Modalactive" aria-hidden="true">
      			          <div class="modal-dialog">
      			              <div class="modal-content">
            
      			                  <div class="modal-header">
      			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      			                      <h4 class="modal-title" id="Modalactive">Confirm Active</h4>
      			                  </div>
            
      			                  <div class="modal-body">
      			                      <p>You are about to relist this auction</p>
      			                      <p>Do you want to proceed?</p>
      			                      <!-- <p class="debug-url"></p> -->
      			                  </div>
                
      			                  <div class="modal-footer">
      								  <input type="hidden" name="active_auction_id" id="active_auction_id">
      			                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      			                      <a href="#" id="active-auction" class="btn btn-default danger">Relist</a>
      			                  </div>
      			              </div>
      			          </div>
      			      </div>
			
				  
      			   <div class="modal fade" id="auction-crud" tabindex="-1" role="dialog" aria-labelledby="Modalauction" aria-hidden="true">
      			          <div class="modal-dialog">
      			              <div class="modal-content">
            
      			                  <div class="modal-header">
      			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      			                      <h4 class="modal-title" id="Modalauction"><span id="auction_header"></span> <span class="auction_text"></span></h4>
      			                  </div>
								  
								  <div id="searchBlock">
									<button class="closeSearch">Close</button>
									<input type="text" name="search_name" placeholder="last 4 of phone or last name">
								  </div>
								  <style>
									#searchBlock {
										display:none;
										position: absolute;
										border: 0px solid black;
										width: 50%;
										height: 300px;
										top:0px;
										z-index: 200;
										background-color: #F2F2F2;
										-webkit-box-shadow: 4px 4px 4px 0px rgba(0,0,0,0.25);
										-moz-box-shadow: 4px 4px 4px 0px rgba(0,0,0,0.25);
										box-shadow: 4px 4px 4px 0px rgba(0,0,0,0.25);
									}
									
									#searchBlock .closeSearch {
										position: absolute;
										bottom: 0px;
										right: 0px;
									}
									
									#searchBlock input[type="text"] {
										width: 90%;
									}
									
									#searchBlock input[type="text"]:focus {
										background-color: #F2F4F4;
									}
									
								  </style>
								  <div id="link"><button class="closeSearchtr">Close</button></div>
								  
            
      			                  <div class="modal-body">
								  
									
   								  	  <p align="center"><span id="auction_message" style="color: red; font-weight: bold;"></span> <span id="crud_message" class="text-success" style="font-weight: bold;"></span></p>
      			                      
	      			                    <form id="crudAuctionForm">
									    <input type="hidden" name="action" id="action" />
									    <input type="hidden" name="crud_auction_id" id="crud_auction_id" />
										
										  <div role="tabpanel">

										    <!-- Nav tabs -->
										    <ul class="nav nav-tabs" role="tablist">
										      <li role="presentation" class="active"><a href="#details" id="details-tab" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>
											  <li role="presentation"><a href="#seller" aria-controls="seller" role="tab" data-toggle="tab">Seller</a></li>
										      <li role="presentation"><a href="#max" aria-controls="max" id="max-auction" role="tab" data-toggle="tab">Max Bids</a></li>											  
											  <li role="presentation"><a href="#amounts" aria-controls="amounts" id="auction-amounts" role="tab" data-toggle="tab">Amounts</a></li>
										      
										    </ul>
											

										    <!-- Tab panes -->
										    <div class="tab-content">
										      <div role="tabpanel" class="tab-pane active" id="details">
											  
											  
											  <!-- Seller Panel -->
												<div class="form-group">
											  <label class="control-label" for="event_user_id">Seller</label>
	  									      <?= form_dropdown('event_user_id', $sellers, NULL, 'id="event_user_id" class="form-control"')?>
										  	</div>
											
											<h3>OR <small>Quick Add New Seller Below</small></h3>
										  	<div class="form-group">
										      <label class="control-label" for="seller_company_name">Company Name</label>
										      <input type="text" class="form-control" name="seller_company_name" id="seller_company_name" placeholder="Enter Company Name">
										    </div>
											  <div class="row">
													<div class="col-md-6 col-lg-6">
													  	<div class="form-group">
													      <label class="control-label" for="seller_first_name">First Name</label>
													      <input type="text" class="form-control" name="seller_first_name" id="seller_first_name" placeholder="Enter First Name">
													    </div>
													</div>
													<div class="col-md-6 col-lg-6">
													  	<div class="form-group">
													      <label class="control-label" for="seller_last_name">Last Name</label>
													      <input type="text" class="form-control" name="seller_last_name" id="seller_last_name" placeholder="Enter Last Name">
													    </div>
													</div>
											  </div>
										
										  	  <div class="row">
													<div class="col-md-6 col-lg-6">
														<div class="form-group">
													      <label class="control-label" for="seller_email">Email Address</label>
													      <input type="email" class="form-control" name="seller_email" id="seller_email" placeholder="Enter email">
													    </div>
													</div>
													<div class="col-md-6 col-lg-6">
													    <div class="form-group">
													      <label class="control-label" for="seller_phone">Phone</label>
													      <input type="text" class="form-control" name="seller_phone" id="seller_phone" placeholder="Username">
													    </div>
													</div>
											  </div>
										  
										  	  <div class="row">
													<div class="col-md-6 col-lg-6">
														<div class="form-group">
													      <label class="control-label" for="seller_address">Address</label>
													      <input type="text" class="form-control" name="seller_address" id="seller_address" placeholder="Enter Address">
													    </div>
													</div>
													<div class="col-md-6 col-lg-6">
													    <div class="form-group">
													      <label class="control-label" for="seller_city">City</label>
													      <input type="text" class="form-control" name="seller_city" id="seller_city" placeholder="Enter City">
													    </div>
													</div>
											  </div>
										  
										  
										  	  <div class="row">
													<div class="col-md-3 col-lg-3">
														<div class="form-group">
													      <label class="control-label" for="seller_state">State</label>
													      <?= form_dropdown('seller_state', $states, NULL, 'id="seller_state" class="form-control"')?>
													    </div>
													</div>
													<div class="col-md-3 col-lg-3">
													    <div class="form-group">
													      <label class="control-label" for="seller_zip">Zip</label>
													      <input type="text" class="form-control" name="seller_zip" id="seller_zip" placeholder="Enter Zip">
													    </div>
													</div>
													<div class="col-md-6 col-lg-6">
													    <div class="form-group">
													      <label class="control-label" for="seller_county">County</label>
													      <input type="text" class="form-control" name="seller_county" id="seller_county" placeholder="Enter County">
													    </div>
													</div>
											  </div>
											  <!-- Seller Panel -->
			      			                   
											<div class="checkbox">
										      <label>
										        <input type="checkbox" id="event_featured" name="event_featured" value="1" /> Featured
										      </label>
										    </div>
											  
											  <div class="row">
	  												<div class="col-md-6 col-lg-6">
	  												  	<div class="form-group">
	  												      <label class="control-label" for="event_name">Name</label>
	  												      <input type="text" class="form-control" name="event_name" id="event_name" placeholder="Enter Name">
	  												    </div>
	  												</div>
	  												<div class="col-md-6 col-lg-6">
	  												  	<div class="form-group">
													      <label class="control-label" for="event_event_type_id">Type</label>
													      <?= form_dropdown('event_event_type_id', $auction_types, NULL, 'id="event_event_type_id" class="form-control"')?>
	  												    </div>
	  												</div>
	  										  </div>
											  
											  <div class="form-group">
												  <label class="control-label" for="event_description">Description</label>
												  <textarea id="event_description" name="event_description"></textarea>
											  </div>
											  
											  <div class="row">
	  												<div class="col-md-6 col-lg-6">
	  												  	<div class="form-group">
	  												      <label class="control-label" for="event_video_link">Video URL</label>
	  												      <input type="text" class="form-control" name="event_video_link" id="event_video_link" placeholder="Example: http://www.youtube.com/embed/djudu0EfkNk">
	  												    </div>
	  												</div>
	  												<div class="col-md-6 col-lg-6">
	  												  	<div class="form-group">
				  									      <label class="control-label" for="event_phone">Phone</label>
				  									      <input type="text" class="form-control" name="event_phone" id="event_phone" placeholder="Enter Phone">
	  												    </div>
	  												</div>
	  										  </div>
											  <div class="form-group">
												   <label class="control-label" for="auction-date">Date</label>
					  	            		  	<div class="input-group date">
					  	                			<input type="text" id="auction-date" autocomplete="off" name="event_end_date" class="form-control" placeholder="Choose Date" />
					  	                			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
					  	            		  	</div>
											  </div>

												<div class="form-group">
												
												    <div class="row">
														<div class="col-md-6 col-lg-6">
															<div class="checkbox">
														      <label>
														        <input type="checkbox" id="event_hide_address" name="event_hide_address" value="1" /> Hide Address and show 3 days before auction date
														      </label>
														    </div>
														</div>
														<div class="col-md-6 col-lg-6">
														    <div class="checkbox">
														      <label>
														        <input type="checkbox" id="event_hide_address_always" name="event_hide_address_always" value="1" /> Never Show Address
														      </label>
														    </div>
														</div>
													</div>
											    </div>
											
											  
										  	  <div class="row">
													<div class="col-md-6 col-lg-6">
														<div class="form-group">
													      <label class="control-label" for="event_address">Address</label> <span class="glyphicon glyphicon-exclamation-sign" data-toggle="tooltip" data-placement="top" title="If you leave the address fields blank it will default to the sellers address information"></span>
													      <input type="text" class="form-control" name="event_address" id="event_address" placeholder="Enter Address">
													    </div>
													</div>
													<div class="col-md-6 col-lg-6">
													    <div class="form-group">
													      <label class="control-label" for="event_city">City</label>
													      <input type="text" class="form-control" name="event_city" id="event_city" placeholder="Enter City">
													    </div>
													</div>
											  </div>
										  
										  
										  	  <div class="row">
													<div class="col-md-3 col-lg-3">
														<div class="form-group">
													      <label class="control-label" for="event_state">State</label>
													      <?= form_dropdown('event_state', $states, NULL, 'id="event_state" class="form-control"')?>
													    </div>
													</div>
													<div class="col-md-3 col-lg-3">
													    <div class="form-group">
													      <label class="control-label" for="event_zip">Zip</label>
													      <input type="text" class="form-control" name="event_zip" id="event_zip" placeholder="Enter Zip">
													    </div>
													</div>
													<div class="col-md-6 col-lg-6">
													    <div class="form-group">
													      <label class="control-label" for="event_county">County</label>
													      <input type="text" class="form-control" name="event_county" id="event_county" placeholder="Enter County">
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
  											      <label class="control-label" for="event_terms">Terms</label>
  											      <input type="text" class="form-control" name="event_terms" id="event_terms" placeholder="Enter Terms">
  											    </div>

  										  	  <div class="row">
													<div class="col-md-3 col-lg-3">
  														<div class="form-group">
  													      <label class="control-label" for="event_buyer_premium">Buyer's Premium</label>
  													      <input type="text" class="form-control" name="event_buyer_premium" id="event_buyer_premium" placeholder="%">
  													    </div>
  													</div>
  													<div class="col-md-3 col-lg-3">
  													    <div class="form-group">
  													      <label class="control-label" for="event_seller_premium">Seller's Premium</label>
  													      <input type="text" class="form-control" name="event_seller_premium" id="event_seller_premium" placeholder="%">
  													    </div>
  													</div>
  													<div class="col-md-3 col-lg-3">
  													    <div class="form-group">
  													      <label class="control-label" for="event_sales_tax">Sales Tax</label>
  													      <input type="text" class="form-control" name="event_sales_tax" id="event_sales_tax" placeholder="0.00">
  													    </div>
  													</div>
  											  </div>
												
												
												
  											  	  <div class="row">
 
  														<div class="col-md-4 col-lg-4">
  														    <div class="form-group">
				    											      <label class="control-label" for="event_num_lots">Number of Lots</label><span class="glyphicon glyphicon-exclamation-sign" data-toggle="tooltip" data-placement="top" title="If you leave the number of lots field blank it will default to the actual lot count of the auction"></span>
																	  <input type="text" class="form-control" name="event_num_lots" id="event_num_lots" placeholder="Enter Number of Lots">
  														    </div>
  														</div>
  															<div class="col-md-8 col-lg-8">
  															    <div class="form-group">
  															      <label class="control-label" for="event_event_category_id">Category</label>
  															      <?= form_dropdown('event_event_category_id', $auction_categories, NULL, 'id="event_event_category_id" class="form-control"')?>
  															    </div>
  															</div>
  											  	  </div>
												   
												   <div class="row">&nbsp;</div>
												   
												    <div class="form-group">
												      <label class="control-label" for="event_auctioneer_id">Auctioneer</label>
												      <?= form_dropdown('event_auctioneer_id', $auction_auctioneers, NULL, 'id="event_auctioneer_id" class="form-control"')?>
												    </div>
													
												    <div class="form-group">
												      <label class="control-label" for="event_status_type_id">Status</label>
												      <?= form_dropdown('event_status_type_id', $auction_status, NULL, 'id="event_status_type_id" class="form-control"')?>
												    </div>
													
								  				  	<div class="row">
														
  													    <div class="col-md-6 col-lg-6">
														<div class="checkbox">
  													      <label>
  													        <input type="checkbox" id="event_lockcut_service" name="event_lockcut_service" value="1" /> Needs Lockcutting Service?
  													      </label>
  													    </div>
														</div>
														<div class="col-md-6 col-lg-6">
  													    <div class="checkbox">
  													      <label>
  													        <input type="checkbox" id="cancel_lockcut" name="cancel_lockcut" value="1" /> Cancel Lock Cut
  													      </label>
  													    </div>
														</div>
														
													</div>
														
		  											  <div class="form-group">
		  												   <label class="control-label" for="lockcut-date">Lock Cut Date</label>
		  					  	            		  	<div class="input-group date">
		  					  	                			<input type="text" id="lockcut-date" autocomplete="off" name="event_lockcut_date" class="form-control" placeholder="Choose Lock Cut Date" />
		  					  	                			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		  					  	            		  	</div>
		  											  </div>
														
  											      </div>
  											    </div>

  											  </div>
											  		
										      </div>
											  
										      <div role="tabpanel" class="tab-pane" id="max">
											      	<div style="height: 300px; overflow: auto;">
														<div class="table-responsive">
		
															<table id="max-bids" class="table table-striped table-hover table-bordered">
															  <thead>
			  
															  	 <tr>
															  	 	 <th>ID/#</th>
															  	 	 <th>Name</th>
													  			 	 <th>Bidder</th>
													  			 	 <th>Max Bid</th>
															  	 </tr>
			  
															  </thead>
		  
															  <tbody></tbody>
															  
														  </table>
														  </div>
												      </div>
													  
													  <p class="lead" align="right">Total: <span id="max-bid-total"></span></p>
													  
										  </div>
										  
											<div role="tabpanel" class="tab-pane" id="amounts">
												<div style="height: 300px; overflow: auto;">
													<div class="table-responsive">
														<table id="lot-amounts" class="table table-striped table-hover table-bordered">
															<thead>	  
																<tr>
																	<th>ID/#</th>
																	<th>Name</th>
																	<th>Bidder</th>
																	<th>Lot Amount</th>
																</tr>	  
															</thead>	  
															<tbody></tbody>
															Amounts Section coming soon. 
														</table>
													</div>
												</div>													  
													<p class="lead" align="right">Total: <span id="max-bid-total"></span></p>													  
											</div>
										  
										  <div role="tabpanel" class="tab-pane" id="seller">											  
										  </div>
										
										 </form>
									 
      			                  </div>
                
      			                  <div class="modal-footer">
      			                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      			                      <a href="#" id="crud-auction" class="btn btn-primary primary"><span class="auction_text"></span></a>
      			                  </div>
      			              </div>
      			          </div>
      			      </div>


<!-- JAVASCRIPT -->		  
<script type="text/javascript">			  
$(document).ready(function(){
   
    var start_date = $('#start_date').val();
	var end_date = $('#end_date').val();
  
	var oTable = $('#auctionslist').dataTable( {
	"bProcessing": true,
	"bServerSide": true,
	"sAjaxSource": '<?= base_url()?>manage/get_auctions/<?= $type?>/' + encodeURIComponent(start_date) + '/' + encodeURIComponent(end_date),
            "bJQueryUI": true,
            "bPaginate": true,
			"bSort": true,
			"bInfo": true,
            "iDisplayStart ":20,			
            "oLanguage": {
        "sProcessing": '<img src=<?= base_url()?>assets/manage/images/ajax-loader_dark.gif>'
    },  
    "fnInitComplete": function() {
            //oTable.fnAdjustColumnSizing();
     },
            'fnServerData': function(sSource, aoData, fnCallback)
        {
          $.ajax
          ({
            'dataType': 'json',
            'type'    : 'POST',
            'url'     : sSource,
            'data'    : aoData,
            'success' : fnCallback
          });
        }
	});
	
	oTable.fnSort( [ [1,'asc'] ] );
	
	$('.close').click(function(e){		  
		e.preventDefault();
		
		$('#lot-amounts tbody').empty();
		
		
		clear_max_bids();		
	 	$('#auction-crud').modal('hide');
	 	$('#auctionslist').dataTable().fnStandingRedraw(); 
		
	});
	
	
  $('#event_description').summernote({
	height: 75,
    toolbar: [
      //[groupname, [button list]]

      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
    ]
  });
	
    /* Confirmation Modals */
    $('#confirm-delete').on('show.bs.modal', function(e) {
	 
  	  var auction_id = $(e.relatedTarget).attr('data-id');

  	  $('#auction_id').val(auction_id);

    });
  
     $('#delete-auction').click(function() {
	  
	  	  var auction_id = $('#auction_id').val();
	  
	  	  $.ajax({
	  	     type: 'GET',
	  	     url: '<?= base_url()?>manage/auction_delete/' + auction_id,
	  		 cache: false,
	  	     success: function() {
	  			 $('#auctionslist').dataTable().fnStandingRedraw();
	  			 $('#crud_message').html('Auction Deleted..').show(0).delay(1500).fadeOut(3000);
	  	     }
	  	  });
	  
	  	  $('#confirm-delete').modal('hide');
      });
	  
	  
      $('#confirm-recover').on('show.bs.modal', function(e) {
	 
    	  var auction_id = $(e.relatedTarget).attr('data-uid');

    	  $('#recover_auction_id').val(auction_id);

      });
  
       $('#recover-auction').click(function() {
	  
    	  var auction_id = $('#recover_auction_id').val();
	  
    	  $.ajax({
    	     type: 'GET',
    	     url: '<?= base_url()?>manage/auction_recover/' + auction_id,
    		 cache: false,
    	     success: function() {
    			 $('#auctionslist').dataTable().fnStandingRedraw();
    			 $('#crud_message').html('Auction Recovered..').show(0).delay(1500).fadeOut(3000);
    	     }
    	  });
	  
    	  $('#confirm-recover').modal('hide');
        });
		
		
        $('#confirm-active').on('show.bs.modal', function(e) {
	 
      	  var auction_id = $(e.relatedTarget).attr('data-uid');

      	  $('#active_auction_id').val(auction_id);

        });
  
         $('#active-auction').click(function() {
	  
      	  var auction_id = $('#active_auction_id').val();
	  
      	  $.ajax({
      	     type: 'GET',
      	     url: '<?= base_url()?>manage/auction_cancelled/' + auction_id,
      		 cache: false,
      	     success: function() {
      			 $('#auctionslist').dataTable().fnStandingRedraw();
      			 $('#crud_message').html('Auction Relisted..').show(0).delay(1500).fadeOut(3000);
      	     }
      	  });
	  
      	  $('#confirm-active').modal('hide');
          });
	  
  
     
    $('#auction-crud').on('show.bs.modal', function(e) {
		//alert('Testing');
		
		    // Select tab by name
			$('.nav-tabs a[href="#details"]').tab('show');
			
	  	  //$('#details-tab a[href="#details"]').tab('show');
		  
		  var auction_id = $(e.relatedTarget).attr('data-uid');
		  var auction_type = $(e.relatedTarget).attr('data-auction-type');
		  var auction_action = $(e.relatedTarget).attr('data-action');
		  var action;
		  var auction_header;
		  
		  $('#crud_message').html('');
		  $('#auction_message').html('');

		  switch(auction_action)
		  {
			  case 'add':
				  action = 'Add';
  				  $('#crudAuctionForm')[0].reset();
				  $('#action').val('add');
				  $('#event_status_type_id').val(1);
				  $('#event_event_type_id').val(2);
				  $('#event_buyer_premium').val(13);
				  $('#event_seller_premium').val(13);
				  $('#event_sales_tax').val(8.775);
				  $('#event_user_id').val(0);
				  $('#event_num_lots').val(0);
 	  			  $('#crud_message').html('');
 				  $('#auction_message').html('');
				  $('#max-bids tbody').html('');
				  
				  switch(auction_type)
				  {
				  	  case 'all':
						  $('#event_status_type_id').val(1);
						  $('#event_event_type_id').val(2);
						  $('#event_buyer_premium').val(13);
						  $('#event_seller_premium').val(13);
						  $('#event_sales_tax').val(8.775);
						  $('#event_num_lots').val(0);
						  auction_header = 'Auction';
					  break;
				  	  case 'onsite':
						   $('#event_status_type_id').val(1);
						   $('#event_event_type_id').val(2);
		 				   $('#event_buyer_premium').val(13);
		 				   $('#event_seller_premium').val(13);
						   $('#event_sales_tax').val(8.775);
						   $('#event_num_lots').val(0);
						   auction_header = 'Onsite';
					  break;
				  	  case 'online':
						   $('#event_status_type_id').val(1);
						   $('#event_event_type_id').val(1);
		 				   $('#event_buyer_premium').val(13);
		 				   $('#event_seller_premium').val(13);
						   $('#event_sales_tax').val(8.775);
						   $('#event_num_lots').val(0);
						   auction_header = 'Online';
					  break;
				  	  case 'dual':
						  $('#event_status_type_id').val(1);
						  $('#event_event_type_id').val(3);
						  $('#event_buyer_premium').val(13);
						  $('#event_seller_premium').val(13);
						  $('#event_sales_tax').val(8.775);
						  $('#event_num_lots').val(0);
						  auction_header = 'Dual';
					  break;
				  	  default:
						 
						  auction_header = 'Auction';
						  $('#event_status_type_id').val(1);
						  $('#event_event_type_id').val(2);
						  $('#event_buyer_premium').val(13);
						  $('#event_seller_premium').val(13);
						  $('#event_sales_tax').val(8.775);
						  $('#event_num_lots').val(0);
				  }
		  
			  break;
		  	  case 'edit':
			  	  action = 'Update';
				  
				  $('#max-bids tbody').html('');
				  
				  auction_data(auction_id);
				  
				  auction_header = 'Auction';
				  
			  break;
		  }

		  $('#auction_header').html(auction_header);
		  $('.auction_text').html(action);

    });
	 
	 
	 $('#crud-auction').click(function() {
		 
		 
  
		 // Get content from Summernote
	     var content = $('#event_description').code();
		 var text;

	     // Add content from summernote to textarea
	     $('#event_description').html( content );
		  
		  var form_data = $("#crudAuctionForm").serialize();
		  var get_auction_action = $('#action').val();
		  var auction_message;

		  switch(get_auction_action)
		  {
		  	  case 'add':
			  	auction_message = 'Added';
			 break;
			 case 'edit':
				auction_message = 'Updated';
			 break;
		  }
		  
	  	  $.ajax({
	  	     type: 'POST',
	  	     url: '<?= base_url()?>manage/auction_crud',
			 data: form_data,
	  		 cache: false,
	  	     success: function(auction) {
	  			 $('#auctionslist').dataTable().fnStandingRedraw();
	  			 $('#crud_message').html('Auction ' + auction_message + '..');
				
				 if((parseFloat(auction) == parseInt(auction)) && !isNaN(auction)){

					 text = 'ID# ' + auction;
					 auction_data(auction);
					
				 }
				 else
				 {
				 	 text = '';
				 }
				 
				 $('#auction_message').html(text);
				  
				  $('#crudAuctionForm')[0].reset();
				  $('#action').val('add');
				  $('#event_status_type_id').val(1);
				  $('#event_event_type_id').val(2);
				  $('#event_buyer_premium').val(13);
				  $('#event_seller_premium').val(13);
				  $('#event_sales_tax').val(4.775);
				  $('#event_user_id').val(0);
				  $('#event_num_lots').val(0);
 	  			  $('#crud_message').html('');
 				  $('#auction_message').html('');
				  $('#max-bids tbody').html('');
				  $('#event_name').html('');
				  
				  $('#auction-crud').modal('hide');
				  //$('#auction-crud').trigger('click');

	  	     }
	  	  });
  
      });
	  
	   $('#max-auction').click(function(e) {
		     
			 e.preventDefault();
			 
			 $(this).tab('show');
			 
			 var auction_id = $('#crud_auction_id').val();
			
			/* Get Max Bids */
			  $.ajax({			
			     	type: 'GET',
					dataType: 'json',
		      		url: base_url + 'manage/get_max_bids/' + auction_id,
					success: function(bids){
						
				  			/* Display Max Bids */
				  			var bid_amount_format;
				  			var bid_amount;
						    var max_bid_total = 0;
				  			var feed = [];

				  		      $.each(bids, function (i, v) {
								
								max_bid_total = parseInt(bids[i]['proxy_bid']) + parseInt(max_bid_total);
				  		        
				  		        bid_amount_format = parseFloat(bids[i]['proxy_bid']).toFixed(2);
				  		     	bid_amount = '$' + bid_amount_format.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
								
				  		         feed.push('<tr><td>' + bids[i]['lot_id'] + '-' + bids[i]['lot_number'] + '</td><td>' + bids[i]['lot_name'] + '</td><td>#' + bids[i]['user_id'] + '-' + bids[i]['user_first_name'] + ' ' + bids[i]['user_last_name'] + '</td><td>' + bid_amount + '</td></tr>');
									
				  		      });
      
				  		     $('#max-bids tbody').html(feed);
							 
			  		         bid_total_format = parseFloat(max_bid_total).toFixed(2);
			  		     	 bid_total_amount = '$' + bid_total_format.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
							 $('#max-bid-total').html(bid_total_amount);

					}
		  	  });
 	 });
	 
	 
	 
	$('#auction-amounts').click(function(e) {
		
		
		$('#lot-amounts tbody').empty();
		$(".nav-tabs a").removeData("cache.tabs");
		
		e.preventDefault();
			 
		$(this).tab('show');
			 
		var auction_id = $('#crud_auction_id').val();
		
		//alert(auction_id);
			
			/* Get Lot Amounts */
			  $.ajax({			
			     	type: 'GET',
					dataType: 'json',
		      		url: base_url + 'manage/get_lot_amounts/' + auction_id,
					success: function(lots){
						
				  			/* Display Lot Amounts */
				  			var lot_amount_format;
				  			var lot_amount;
						    var lot_bid_total = 0;
				  			var feed = [];

				  		      $.each(lots, function (i, v) {
								
								//max_bid_total = parseInt(lots[i]['proxy_bid']) + parseInt(max_bid_total);
				  		        
				  		        lot_amount_format = parseFloat(lots[i]['lot_amount']).toFixed(2);
				  		     	lot_amount = '$' + lot_amount_format.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
								
				  		         feed.push('<tr><td>' + lots[i]['lot_id'] + '-' + lots[i]['lot_number'] + '</td><td>' + lots[i]['lot_name'] + '</td><td contenteditable="true" onClick="showSearch(this);">#' + lots[i]['user_id'] + '-' + lots[i]['user_first_name'] + ' ' + lots[i]['user_last_name'] + '</td><td contenteditable="true" onClick="showEdit(this);" onblur="saveIt(this, ' + lots[i]['lot_id'] + ')">' + lot_amount + '</td></tr>');
									
				  		      });
      
				  		     $('#lot-amounts tbody').html(feed);
							 
			  		         //bid_total_format = parseFloat(max_bid_total).toFixed(2);
			  		     	 //bid_total_amount = '$' + bid_total_format.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
							 //$('#lot-bid-total').html(bid_total_amount);

					}
		  	  });
 	 });
	 
	 
	
	 
	 
   	function clear_max_bids() {
	     
		 var feed = [];
		 $('#max-bids tbody').html(feed);
		 $('#max-bid-total').html('');
 	}
	
	
	 
	 
	 function auction_data(id)
	 {
		  /* Load User Data */
		  $.ajax({			
		     	type: 'GET',
				dataType: 'json',
	      		url: base_url + 'manage/get_auction_data/' + id,
				success: function(auction){
				  $('#action').val('edit');					
	 			  $('#crud_auction_id').val(auction['event_id']);
				  $('#event_name').val(auction['event_name']);
				  $('#event_user_id').val(auction['event_user_id']);
				  $('#event_description').code(auction['event_description']);
				  $('#event_terms').val(auction['event_terms']);
				  $('#event_phone').val(auction['event_phone']);
				  $('#event_address').val(auction['event_address']);
				  $('#event_city').val(auction['event_city']);
				  $('#event_state').val(auction['event_state']);
				  $('#event_zip').val(auction['event_zip']);
				  $('#event_county').val(auction['event_county']);
				  $('#auction-date').val(auction['event_end_date']);
				  $('#event_event_category_id').val(auction['event_event_category_id']);
				  $('#event_event_type_id').val(auction['event_event_type_id']);
				  $('#event_status_type_id').val(auction['event_status_type_id']);
				  $('#event_auctioneer_id').val(auction['event_auctioneer_id']);
				  $('#event_lockcutter_id').val(auction['event_lockcutter_id']);
				  $('#event_video_link').val(auction['event_video_link']);
				  $('#event_num_lots').val(auction['event_num_lots']);
			  
				  var auction_lockcut_check = (auction['event_lockcut_service'] == true) ? true : false;
				  $('#event_lockcut_service').prop('checked', auction_lockcut_check);

				  $('#lockcut-date').val(auction['event_lockcut_date']);
				  $('#event_sales_tax').val(auction['event_sales_tax']);
				  $('#event_buyer_premium').val(auction['event_buyer_premium']);
				  $('#event_seller_premium').val(auction['event_seller_premium']);
			  
				  var auction_featured_check = (auction['event_featured'] == true) ? true : false;
				  $('#event_featured').prop('checked', auction_featured_check);
			  
				  var auction_hide_address_check = (auction['event_hide_address'] == true) ? true : false; 
				  $('#event_hide_address').prop('checked', auction_hide_address_check); 
				  
				   var auction_hide_address_always_check = (auction['event_hide_address_always'] == true) ? true : false;
				  $('#event_hide_address_always').prop('checked', auction_hide_address_always_check); 
			} 
		});
		
	 }
	 
	 
	 $('#auction-date').datetimepicker({
	   format:'Y-m-d h:i A',
	   formatTime:'h:i A'
	 });

	 $('#lockcut-date').datetimepicker({
	   format:'Y-m-d h:i A',
	   formatTime:'h:i A'
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

<script>

	function showEdit(amount) {
			$(amount).css("background","#f3f3f3");
			var dollar_amount = amount.innerHTML;
			var raw_amount = dollar_amount.replace("$", "");
			$(amount).text(raw_amount);
		}
		
		
		
	$('#lot-amounts').keypress(function (e){
		if (e.keyCode == 10 || e.keyCode == 13)
		{
			e.preventDefault();
			alert('Please use the tab key or simply click outside the amount');
		}
			
	});
	
	//$('#lot-amounts').on('keydown', function (e) {
        //alert('test enter key');
		//if (e.keyCode == 13) e.keyCode = 9;
        //return false;
    //});
	

	function saveIt(amount, lot_id) {	
		
		var string_amount = amount.innerHTML;
		var lot_amount = string_amount.replace(/\s+|&amp|&nbsp;|&lt;|&gt;|<br>|,/g, '');
		
		var formData = 'lot_amount='+ lot_amount; 
		$(amount).css("background","#fff url(http://app.americanauctioneers.com/assets/manage/images/loaderIcon.gif) no-repeat right");
		
		$.ajax({
			type: 'GET',
			url: base_url + 'manage/update_lot_amount/' + lot_id + '/',
			
			data: formData,			
			success: function(result){
				$(amount).css("background","#fff");
				//$('#auction-amounts').trigger('click');
				$(amount).text("$" + lot_amount.replace(/\s+/g, ""));
				
			}        
	    });		
	}


	
	
	
	function showSearch(name) {
			$(name).css("background","#D1D1D1");
			//$(name).html('');
			$('#searchBlock').css('display', 'block');
		}
		
	
	$('.closeSearch').click(function(){
		$('#searchBlock').hide();		
	});
	
	$('.closeSearchtr').click(function(){		
		$('#link').hide();
	});
	
	
	
	
	$( '#searchBlock input[type="text"]' ).keyup(function() {
		alert( "Handler for .keyup() called." );
	});
	
	
	
	
	$("#lot-amounts").on('click', 'td', function() {
		
		var row = $(this).closest('tr');
		$('#link').insertAfter(row);
		$('#link').show();
       
        
	});
	
	//$("#lot-amounts").on('click', 'td', function() {
		//var tdheight = td.height();
		//alert(tdheight);
		
        //var td = $(this);
        //var position = td.position();
        //$('#link').css({
        //    top: position.top + (td.height() + td.height() + 8),
        //    left: position.left + td.width() - td.width(),
		//	width: td.width()
        //}).show();
	//});
	
	
	
	
</script>

<style>
#link {    
    height:120px;
	width: 30%;
    background-color:#ddd; 
    display:none;  
    position:absolute;
	z-index: 400;
	
}
</style>