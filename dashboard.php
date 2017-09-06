

 
       
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?= number_format($gross_sales_total, 2)?></h3>
                  <p>Total Sales</p>
                </div>
                <div class="icon">
                  <i class="glyphicon glyphicon-usd"></i>
                </div>
                <a href="<?= site_url('manage/reports')?>" class="small-box-footer">View <i class="glyphicon glyphicon-chevron-right"></i></a>
              </div>
            </div><!-- ./col -->
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?= number_format($invoice_total)?></h3>
                  <p>Unpaid Invoices</p>
                </div>
                <div class="icon">
                  <i class="glyphicon glyphicon-file"></i>
                </div>
                <a href="<?= site_url('manage/invoices')?>" class="small-box-footer">View <i class="glyphicon glyphicon-chevron-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?= number_format($auction_total)?></h3>
                  <p>Active Auctions</p>
                </div>
                <div class="icon">
                  <i class="glyphicon glyphicon-tags"></i>
                </div>
                <a href="<?= site_url('manage/auctions')?>" class="small-box-footer">View <i class="glyphicon glyphicon-chevron-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?= number_format($buyer_total)?></h3>
                  <p>Registered Buyers</p>
                </div>
                <div class="icon">
                  <i class="glyphicon glyphicon-user"></i>
                </div>
                <a href="<?= site_url('manage/users')?>" class="small-box-footer">View <i class="glyphicon glyphicon-chevron-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
		  <br /><br />
		  <div class="row">
			  
              <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- small box -->
                <div class="small-box">
                  <div class="inner">
                    &nbsp;
                  </div>
                  <div class="icon">
                   &nbsp;
                  </div>
                </div>
              </div><!-- ./col -->
		
  			 <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-purple">
				  <a href="#" data-user-type="buyer" data-action="add" data-toggle="modal" data-target="#user-crud" title="Add Buyer">
                  <span class="info-box-icon"><i class="glyphicon glyphicon-ok"></i></span>
			  	  </a>
                  <div class="info-box-content">
                    <a href="#" data-user-type="buyer" data-action="add" data-toggle="modal" data-target="#user-crud" title="Add Buyer" style="color: #fff;"><span class="info-box-text"><h4>Buyer<br />Checkin</h4></span></a>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- /.col -->
			  
			 <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-blue">
				<a href="<?= site_url('manage/live')?>">
                <span class="info-box-icon"><i class="glyphicon glyphicon-flash"></i></span>
		   		</a>
                <div class="info-box-content">
                  <a href="<?= site_url('manage/live')?>" style="color: #fff;"><span class="info-box-text"><h4>Live<br />Sale</h4></span></a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
			  
              <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- small box -->
                <div class="small-box">
                  <div class="inner">
                    &nbsp;
                  </div>
                  <div class="icon">
                   &nbsp;
                  </div>
                </div>
              </div><!-- ./col -->
		  </div>
		  
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


<script type="text/javascript">			  
$(document).ready(function(){
	
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