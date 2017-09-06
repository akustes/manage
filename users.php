
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-12">
								
								<!-- Split button -->
								<div class="btn-group">
								  <a href="<?= site_url('manage/users/all')?>" class="btn btn-info">All Users</a>
								  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								    <span class="caret"></span>
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <ul class="dropdown-menu" role="menu">
								    <li><a href="#" data-user-type="user" data-action="add" data-toggle="modal" data-target="#user-crud" title="Add User" data-backdrop="static"><span class="glyphicon glyphicon-plus"></span> Add New</a></li>
								  </ul>
								</div>
								
								<!-- Split button -->
								<div class="btn-group">
								  <a href="<?= site_url('manage/users/buyers')?>" class="btn btn-success">Buyers</a>
								  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								    <span class="caret"></span>
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <ul class="dropdown-menu" role="menu">
								    <li><a href="#" data-user-type="buyer" data-action="add" data-toggle="modal" data-target="#user-crud" title="Add Buyer" data-backdrop="static"><span class="glyphicon glyphicon-plus"></span> Add New</a></li>
								  </ul>
								</div>
								
								
								<!-- Split button -->
								<div class="btn-group">
								  <a href="<?= site_url('manage/users/sellers')?>" class="btn btn-warning">Sellers</a>
								  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								    <span class="caret"></span>
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <ul class="dropdown-menu" role="menu">
								    <li><a href="#" data-user-type="seller" data-action="add" data-toggle="modal" data-target="#user-crud" title="Add Seller" data-backdrop="static"><span class="glyphicon glyphicon-plus"></span> Add New</a></li>
								  </ul>
								</div>
								
								<!-- Split button -->
								<div class="btn-group">
								  <a href="<?= site_url('manage/users/auctioneers')?>" class="btn btn-danger">Auctioneers</a>
								  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								    <span class="caret"></span>
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <ul class="dropdown-menu" role="menu">
								    <li><a href="#" data-user-type="auctioneer" data-action="add" data-toggle="modal" data-target="#user-crud" title="Add Seller" data-backdrop="static"><span class="glyphicon glyphicon-plus"></span> Add New</a></li>
								  </ul>
								</div>
								<a href="<?= site_url('manage/users/deactive')?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Deactive Users</a>
								<a href="<?= site_url('manage/users/trash')?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span> Trash</a>
								
							</div>
							
						</div>
						
						<div class="row">&nbsp;</div>
						
						<div class="row">
							
						</div>	
						
						
				
			<div class="box">
                 <div class="box-header">
					 	<div align="center"><span id="crud_message" class="text-success" style="font-weight: bold; font-size: 1.4em;"></span></div>
                 </div><!-- /.box-header -->
                 <div class="box-body">
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
			                      <p>You are about to delete this user</p>
			                      <p>Do you want to proceed?</p>
			                      <!-- <p class="debug-url"></p> -->
			                  </div>
                
			                  <div class="modal-footer">
								  <input type="hidden" name="user_id" id="user_id">
			                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			                      <a href="#" id="delete-user" class="btn btn-danger danger">Delete</a>
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
   			                      <p>You are about to recover this user</p>
   			                      <p>Do you want to proceed?</p>
   			                      <!-- <p class="debug-url"></p> -->
   			                  </div>
                
   			                  <div class="modal-footer">
   								  <input type="hidden" name="recover_user_id" id="recover_user_id">
   			                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
   			                      <a href="#" id="recover-user" class="btn btn-primary danger">Recover</a>
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
      			                      <p>You are about to reactivate this user</p>
      			                      <p>Do you want to proceed?</p>
      			                      <!-- <p class="debug-url"></p> -->
      			                  </div>
                
      			                  <div class="modal-footer">
      								  <input type="hidden" name="active_user_id" id="active_user_id">
      			                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      			                      <a href="#" id="active-user" class="btn btn-default danger">Reactivate</a>
      			                  </div>
      			              </div>
      			          </div>
      			      </div>
			
				  
      			   <div class="modal fade" id="user-crud" tabindex="-1" role="dialog" aria-labelledby="Modalcrud" aria-hidden="true">
      			          <div class="modal-dialog">
      			              <div class="modal-content">
            
      			                  <div class="modal-header">
      			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      			                      <h4 class="modal-title" id="Modalcrud"><span id="user_header"></span> <span class="user_text"></span></h4>
      			                  </div>
            
      			                  <div class="modal-body">
   								  	  <p align="center"><span id="user_message" style="color: red; font-weight: bold; font-size: 1.2em;"></span> <span id="crud_modal_message" class="text-success" style="font-weight: bold; font-size: 1.2em;"></span></p>
      			                      <form id="crudUserForm">
										  <input type="hidden" name="action" id="action" />
										  <input type="hidden" name="crud_user_id" id="crud_user_id" />
									  <div role="tabpanel">

									    <!-- Nav tabs -->
									    <ul class="nav nav-tabs" role="tablist">
									      <li role="presentation" class="active"><a href="#details" id="#details-tab" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>
										  <li role="presentation"><a href="#stats" aria-controls="stats" id="winning-lots" role="tab" data-toggle="tab">Lots Won</a></li>
										  <li role="presentation"><a href="#sold" aria-controls="sold" id="sold-lots" role="tab" data-toggle="tab">Lots Sold</a></li>
									    </ul>
										

									    <!-- Tab panes -->
									    <div class="tab-content">
									      <div role="tabpanel" class="tab-pane active" id="details">
									  
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
							  				</div>
											<div role="tabpanel" class="tab-pane" id="stats">
										      	<div style="height: 300px; overflow: auto;">
													<div class="table-responsive">
	
														<table id="lots" class="table table-striped table-hover table-bordered">
														  <thead>
		  
														  	 <tr>
														  	 	 <th>ID/#</th>
														  	 	 <th>Name</th>
												  			 	 <th>Auction</th>
												  			 	 <th>Amount</th>
														  	 </tr>
		  
														  </thead>
	  
														  <tbody></tbody>
														  
													  </table>
													  </div>
											      </div>
												  
												  <p class="lead" align="right">Total: <span id="lot-total"></span></p>
											</div>
											
											
											<div role="tabpanel" class="tab-pane" id="sold">
										      	<div style="height: 300px; overflow: auto;">
													<div class="table-responsive">
	
														<table id="lots-sold" class="table table-striped table-hover table-bordered">
														  <thead>
		  
														  	 <tr>
														  	 	 <th>ID/#</th>
														  	 	 <th>Name</th>
												  			 	 <th>Auction</th>
												  			 	 <th>Amount</th>
														  	 </tr>
		  
														  </thead>
	  
														  <tbody></tbody>
														  
													  </table>
													  </div>
											      </div>
												  
												  <p class="lead" align="right">Total: <span id="sold-total"></span></p>
											</div>
					
									  </form>
      			                  </div>
                
      			                  <div class="modal-footer">
   								  
      			                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      			                      <a href="#" id="crud-user" class="btn btn-primary primary"><span class="user_text"></span></a>
      			                  </div>
      			              </div>
      			          </div>
      			      </div>


<!-- JAVASCRIPT -->		  
<script type="text/javascript">			  
$(document).ready(function(){
   
  
	var oTable = $('#userslist').dataTable( {
	"bProcessing": true,
	"bServerSide": true,
	"sAjaxSource": '<?= base_url()?>manage/get_users/<?= $type?>',
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
	
	
	$('.close').click(function(e){		  
		e.preventDefault();
		clear_won_lots();
		clear_sold_lots();
	 	$('#user-crud').modal('hide');
	 	$('#userslist').dataTable().fnStandingRedraw(); 
	});
	
    /* Confirmation Modals */
    $('#confirm-delete').on('show.bs.modal', function(e) {
	 
  	  var user_id = $(e.relatedTarget).attr('data-id');

  	  $('#user_id').val(user_id);

    });
  
     $('#delete-user').click(function() {
	  
	  	  var user_id = $('#user_id').val();
	  
	  	  $.ajax({
	  	     type: 'GET',
	  	     url: '<?= base_url()?>manage/user_delete/' + user_id,
	  		 cache: false,
	  	     success: function() {
	  			 $('#userslist').dataTable().fnStandingRedraw();
	  			 $('#crud_message').html('User Deleted..').show(0).delay(1500).fadeOut(3000);
	  	     }
	  	  });
	  
	  	  $('#confirm-delete').modal('hide');
      });
	  
	  
      $('#confirm-recover').on('show.bs.modal', function(e) {
	 
    	  var user_id = $(e.relatedTarget).attr('data-uid');

    	  $('#recover_user_id').val(user_id);

      });
  
       $('#recover-user').click(function() {
	  
    	  var user_id = $('#recover_user_id').val();
	  
    	  $.ajax({
    	     type: 'GET',
    	     url: '<?= base_url()?>manage/user_recover/' + user_id,
    		 cache: false,
    	     success: function() {
    			 $('#userslist').dataTable().fnStandingRedraw();
    			 $('#crud_message').html('User Recovered..').show(0).delay(1500).fadeOut(3000);
    	     }
    	  });
	  
    	  $('#confirm-recover').modal('hide');
        });
		
		
        $('#confirm-active').on('show.bs.modal', function(e) {
	 
      	  var user_id = $(e.relatedTarget).attr('data-uid');

      	  $('#active_user_id').val(user_id);

        });
  
         $('#active-user').click(function() {
	  
      	  var user_id = $('#active_user_id').val();
	  
      	  $.ajax({
      	     type: 'GET',
      	     url: '<?= base_url()?>manage/user_reactivate/' + user_id,
      		 cache: false,
      	     success: function() {
      			 $('#userslist').dataTable().fnStandingRedraw();
      			 $('#crud_message').html('User Reactivated..').show(0).delay(1500).fadeOut(3000);
      	     }
      	  });
	  
      	  $('#confirm-active').modal('hide');
          });
	  
  
     
    $('#user-crud').on('show.bs.modal', function(e) {
 	   	  
		  $('#details-tab a[href="#details"]').tab('show');
		  
	  	  var user_id = $(e.relatedTarget).attr('data-uid');
		  var user_type = $(e.relatedTarget).attr('data-user-type');
		  var user_action = $(e.relatedTarget).attr('data-action');
		  var action;
		  var user_header;
		  
		  $('#crud_message').html('');
		  $('#crud_modal_message').html('');
		  $('#user_message').html('');
		  
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
	  			 $('#userslist').dataTable().fnStandingRedraw();
	  			 $('#crud_message').html('User ' + user_message + '..').show(0).delay(1500).fadeOut(3000);
				 $('#crud_modal_message').html('User ' + user_message + '..');
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
	  
	  
   $('#winning-lots').click(function(e) {
	     
		 e.preventDefault();
		 
		 $(this).tab('show');
		 
		 var user_id = $('#crud_user_id').val();
		
		/* Get Max Bids */
		  $.ajax({			
		     	type: 'GET',
				dataType: 'json',
	      		url: base_url + 'manage/get_user_winning_lots/' + user_id,
				success: function(lots){
					
			  			/* Display Max Bids */
			  			var amount_format;
			  			var amount;
					    var total = 0;
			  			var feed = [];

			  		      $.each(lots, function (i, v) {
							
							if(lots[i]['lot_amount']){
								total = parseInt(lots[i]['lot_amount']) + parseInt(total);
	  			  		        amount_format = parseFloat(lots[i]['lot_amount']).toFixed(2);
	  			  		     	amount = '$' + amount_format.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						 	}else{
								amount = 0;
							}
						
							lot_id = (lots[i]['lot_id'] == null) ? '' : lots[i]['lot_id'];
							lot_number = (lots[i]['lot_number'] == null) ? '' : lots[i]['lot_number'];
							lot_name = (lots[i]['lot_name'] == null) ? '' : lots[i]['lot_name'];
							event_name = (lots[i]['event_name'] == null) ? '' : lots[i]['event_name'];
							
			  		         feed.push('<tr><td>' + lot_id + '-' + lot_number + '</td><td>' + lot_name + '</td><td>' + event_name + '</td><td>' + amount + '</td></tr>');
								
			  		      });
     
			  		     $('#lots tbody').html(feed);
						 
		  		         total_format = parseFloat(total).toFixed(2);
		  		     	 total_amount = '$' + total_format.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						 $('#lot-total').html(total_amount);

				}
	  	  });
	 });
	 
	 
     $('#sold-lots').click(function(e) {
	     
  		 e.preventDefault();
		 
  		 $(this).tab('show');
		 
  		 var user_id = $('#crud_user_id').val();
		
  		/* Get Max Bids */
  		  $.ajax({			
  		     	type: 'GET',
  				dataType: 'json',
  	      		url: base_url + 'manage/get_user_sold_lots/' + user_id,
  				success: function(lots){
					
  			  			/* Display Max Bids */
  			  			var amount_format;
  			  			var amount;
  					    var total = 0;
  			  			var feed = [];

  			  		      $.each(lots, function (i, v) {
							
								if(lots[i]['lot_amount']){
									total = parseInt(lots[i]['lot_amount']) + parseInt(total);
		  			  		        amount_format = parseFloat(lots[i]['lot_amount']).toFixed(2);
		  			  		     	amount = '$' + amount_format.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
							 	}else{
									amount = 0;
								}
							
								lot_id = (lots[i]['lot_id'] == null) ? '' : lots[i]['lot_id'];
								lot_number = (lots[i]['lot_number'] == null) ? '' : lots[i]['lot_number'];
								lot_name = (lots[i]['lot_name'] == null) ? '' : lots[i]['lot_name'];
								event_name = (lots[i]['event_name'] == null) ? '' : lots[i]['event_name'];
							
  			  		         feed.push('<tr><td>' + lot_id + '-' + lot_number + '</td><td>' + lot_name + '</td><td>' + event_name + '</td><td>' + amount + '</td></tr>');
								
  			  		      });
     
  			  		     $('#lots-sold tbody').html(feed);
						 
  		  		         total_format = parseFloat(total).toFixed(2);
  		  		     	 total_amount = '$' + total_format.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  						 $('#sold-total').html(total_amount);

  				}
  	  	  });
  	 });
	 
	 function clear_won_lots(){
		 var feed = [];
	 	$('#lots tbody').html(feed);
	 }
	 
	 function clear_sold_lots(){
		 var feed = [];
	 	$('#lots-sold tbody').html(feed);
	 }
	  
	  
});
</script>
				  