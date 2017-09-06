
				<div class="row">
							<div class="col-md-6 col-lg-6">
								
									<a href="<?= site_url('manage/auctions')?>" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
									
									<!-- Split button -->
									<div class="btn-group">
									  <a href="<?= site_url('manage/lots/' . $event_id . '/all')?>" class="btn btn-info">All</a>
									  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									    <span class="caret"></span>
									    <span class="sr-only">Toggle Dropdown</span>
									  </button>
									  <ul class="dropdown-menu" role="menu">
									    <li><a href="#" data-lot-type="lot" data-action="add" data-toggle="modal" data-target="#lot-crud" title="Add Lot" data-backdrop="static"><span class="glyphicon glyphicon-plus"></span> Add New</a></li>
									  </ul>
									</div>
									<a href="<?= site_url('manage/lots/' . $event_id . '/sold')?>" class="btn btn-success"><span class="glyphicon glyphicon-usd"></span> Sold</a>
									<a href="<?= site_url('manage/lots/' . $event_id . '/deactive')?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Deactive</a>
									<a href="<?= site_url('manage/lots/' . $event_id . '/trash')?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span> Trash</a>
							</div>
							
							<div class="col-md-6 col-lg-6">
								<form action="<?= site_url('manage/event_quick_add_lots/' . $event_id)?>" method="post">
								<div class="row">
									<div class="col-md-5 col-lg-4">
			                			<input type="text" id="event_quick_add_lots_name" name="event_quick_add_lots_name" placeholder="Lot Name" class="form-control" />
									</div>
									<div class="col-md-5 col-lg-4">
				                			<input type="text" id="event_quick_add_lots" name="event_quick_add_lots" placeholder="Count" class="form-control" />
									</div>
									<div class="col-md-2 col-lg-2">
										<input type="submit" class="btn btn-primary" value="Quick Add" />
									</div>
								</div>
								</form>
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
			                      <p>You are about to delete this lot</p>
			                      <p>Do you want to proceed?</p>
			                      <!-- <p class="debug-url"></p> -->
			                  </div>
                
			                  <div class="modal-footer">
								  <input type="hidden" name="lot_id" id="lot_id">
			                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			                      <a href="#" id="delete-lot" class="btn btn-danger danger">Delete</a>
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
   			                      <p>You are about to recover this lot</p>
   			                      <p>Do you want to proceed?</p>
   			                      <!-- <p class="debug-url"></p> -->
   			                  </div>
                
   			                  <div class="modal-footer">
   								  <input type="hidden" name="recover_lot_id" id="recover_lot_id">
   			                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
   			                      <a href="#" id="recover-lot" class="btn btn-primary danger">Recover</a>
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
      			                      <p>You are about to relist this lot</p>
      			                      <p>Do you want to proceed?</p>
      			                      <!-- <p class="debug-url"></p> -->
      			                  </div>
                
      			                  <div class="modal-footer">
      								  <input type="hidden" name="active_lot_id" id="active_lot_id">
      			                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      			                      <a href="#" id="active-lot" class="btn btn-default danger">Reactivate</a>
      			                  </div>
      			              </div>
      			          </div>
      			      </div>
					  
					  
         			   <div class="modal fade" id="confirm-sold" tabindex="-1" role="dialog" aria-labelledby="Modalsold" aria-hidden="true">
         			          <div class="modal-dialog">
         			              <div class="modal-content">
            
         			                  <div class="modal-header">
         			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         			                      <h4 class="modal-title" id="Modalsold">Confirm Cancel Sale</h4>
         			                  </div>
            
         			                  <div class="modal-body">
         			                      <p>You are about to cancel this sale for this lot</p>
         			                      <p>Do you want to proceed?</p>
         			                      <!-- <p class="debug-url"></p> -->
         			                  </div>
                
         			                  <div class="modal-footer">
         								  <input type="hidden" name="sold_lot_id" id="sold_lot_id">
         			                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         			                      <a href="#" id="sold-lot" class="btn btn-danger danger">Cancel Sale</a>
         			                  </div>
         			              </div>
         			          </div>
         			      </div>
			
				  
      			   <div class="modal fade" id="lot-crud" tabindex="-1" role="dialog" aria-labelledby="Modallot" aria-hidden="true">
      			          <div class="modal-dialog">
      			              <div class="modal-content">
            
      			                  <div class="modal-header">
      			                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      			                      <h4 class="modal-title" id="Modallot"><span id="lot_header"></span> <span class="lot_text"></span></h4>
      			                  </div>
            
      			                  <div class="modal-body">
   								  	  <p align="center"><span id="lot_message" style="color: red; font-weight: bold;"></span> <span id="crud_message" class="text-success" style="font-weight: bold;"></span></p>
      			                      
									  		
										  <div role="tabpanel">

										    <!-- Nav tabs -->
										    <ul class="nav nav-tabs" role="tablist">
										      <li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>
										      <li role="presentation"><a href="#photos" aria-controls="photos" id="photos-edit" role="tab" data-toggle="tab">Photos</a></li>
										      
										    </ul>

										    <!-- Tab panes -->
										    <div class="tab-content">
										      <div role="tabpanel" class="tab-pane active" id="details">
			      			                    <form id="crudLotForm">
											    <input type="hidden" name="action" id="action" />
											    <input type="hidden" name="crud_lot_id" id="crud_lot_id" />
												<input type="hidden" name="crud_event_id" id="crud_event_id" value="<?= $event_id?>" />
												<input type="hidden" name="lot_seller" id="lot_seller" />
												<input type="hidden" name="lot_end_date" id="lot_end_date" />
											  
											  <div class="row">
	  												<div class="col-md-6 col-lg-6">
	  												  	<div class="form-group">
	  												      <label class="control-label" for="lot_name">Name</label>
	  												      <input type="text" class="form-control" name="lot_name" id="lot_name" placeholder="Enter Name">
	  												    </div>
	  												</div>
	  												<div class="col-md-6 col-lg-6">
	  												  	<div class="form-group">
  	  												      <label class="control-label" for="lot_number">Number</label>
  	  												      <input type="text" class="form-control" name="lot_number" id="lot_number" placeholder="Enter Number">
	  												    </div>
	  												</div>
	  										  </div>
											  
											  
												<div class="row">	  
													<div class="col-md-6 col-lg-6">
													  <div class="form-group">
														  <label class="control-label" for="lot_tag">Tag</label>
														  <input type="text" id="lot_tag" name="lot_tag" class="form-control" placehoder="Enter Tag" />
													  </div>
													 </div>
													 <div class="col-md-6 col-lg-6">
		  											    <div class="form-group">
		  											      <label class="control-label" for="lot_category_id">Category</label>
		  											      <?= form_dropdown('lot_category_id', $lot_categories, NULL, 'id="lot_category_id" class="form-control"')?>
		  											    </div>
												  	</div>
												</div>
											    
											  	<div class="form-group">
												  <label class="control-label" for="lot_description">Description</label><br />
												  <textarea id="lot_description" name="lot_description" class="form-control"></textarea>
											  	</div>
											  
												<div class="row">
													<div class="col-md-3 col-lg-3">
													<div class="form-group">
												
													    <div class="checkbox">
													      <label>
													        <input type="checkbox" id="lot_sold" name="lot_sold" value="1" /> Mark as sold
													      </label>
													    </div>
	
												    </div>
													</div>
													<div class="col-md-6 col-lg-6">
													<div class="form-group">
												
													    <div class="checkbox">
													      <label>
													        <input type="checkbox" id="lot_hidden" name="lot_hidden" value="1" /> Hide Lot From Front End
													      </label>
													    </div>
	
												    </div>
													</div>
													<div class="col-md-3 col-lg-3">
													<div class="form-group">
												
													    <div class="checkbox">
													      <label>
													        <input type="checkbox" id="lot_active" name="lot_active" value="1" /> Active
													      </label>
													    </div>
	
												    </div>
													</div>
												</div>
												

												<div class="row">
													<div class="col-md-3 col-lg-3">
													<div class="form-group">
												      <label class="control-label" for="lot_reserve">Reserve</label><span class="glyphicon glyphicon-exclamation-sign" data-toggle="tooltip" data-placement="top" title="If you enter a reserve amount, bids less than this will not be accepted"></span>
												      <input type="text" class="form-control" name="lot_reserve" id="lot_reserve" placeholder="0.00">
												    </div>
													</div>
													<div class="col-md-3 col-lg-3">
														<div class="form-group">
														  <label class="control-label" for="lot_amount">Sold Amount</label>
														  <input type="text" id="lot_amount" name="lot_amount" class="form-control" placehoder="Sold Amount" />
													    </div>
													</div>
													<div class="col-md-6 col-lg-6">
														<div class="form-group">
															<label class="control-label" for="lot_amount">Buyer</label>
															<?= form_dropdown('lot_buyer', $buyers, NULL, 'id="lot_buyer" class="form-control"')?>
														</div>
													</div>
												</div>
												
												 <p align="right"><a href="#" id="crud-lot" class="btn btn-primary primary"><span class="lot_text"></span></a></p>
												  
												 </form>
										      </div>
										      <div role="tabpanel" class="tab-pane" id="photos">
												    <form id="imagesForm">
													<input type="hidden" name="images_lot_id" id="images_lot_id" />
											      	<div style="height: 200px; overflow: auto;">
															<div class="table-responsive">
		
																<table id="display-photos" class="table table-striped table-hover table-bordered">
																  <thead>
			  
																  	 <tr>
																  	 	 <th>Delete</th>
														  			 	 <th>File Name</th>
														  			 	 <th>Size</th>
																		 <th>Featured</th>
																  	 </tr>
			  
																  </thead>
		  
																  <tbody></tbody>
															  
															  </table>
															  </div>
													      </div>
														 <br />
														 <p align="right"><button type="button" id="crud-lot-images" class="btn btn-primary">Update</button></p>
													    </form>
														<hr />
														<p class="lead">Upload Images</p>
												  		<form action="#" id="imageForm" enctype="multipart/form-data">
															<input type="hidden" id="image_lot_event_id" name="image_lot_event_id" value="<?= $event_id?>" />
															<input type="hidden" id="image_lot_name" name="image_lot_name" />
															<input type="hidden" name="image_lot_id" id="image_lot_id" />
															<div class="row">	  
																<div class="col-md-6 col-lg-6">
													  				<input type="file" name="userfile[]" multiple="multiple" class="form-control" />
																</div>
																<div class="col-md-6 col-lg-6" align="right">
																	<div class="form-group">
												  						<button class="btn btn-sm btn-info upload" type="submit">Upload</button>
												  						<button type="button" class="btn btn-sm btn-danger cancel">Cancel</button>
																	</div>
														    	</div>
															</div>
															
														  			<div class="progress progress-striped">
														  				<div id="pbar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
														  			</div>
																
												  		</form>
											  	</div>

										  </div>
										
									</div>
									 
      			                  </div>
                
      			                  <div class="modal-footer">
      			                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      			                     
      			                  </div>
      			              </div>
      			          </div>
      			      </div>


<!-- JAVASCRIPT -->		  
<script type="text/javascript">			  
$(document).ready(function(){
   
  
	var oTable = $('#lotslist').dataTable( {
	"bProcessing": true,
	"bServerSide": true,
	"sAjaxSource": '<?= base_url()?>manage/get_lots/<?= $event_id?>/<?= $type?>',
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
	}).makeEditable({
			sUpdateURL: "<?= base_url()?>manage/lot_crud_inline"
	});
	
	oTable.fnSort( [ [1,'asc'] ] );
	
    /* Confirmation Modals */
	$('.close').click(function(e){		  
		e.preventDefault();
		clear_images();
	 	$('#lot-crud').modal('hide');
	 	$('#lotslist').dataTable().fnStandingRedraw(); 
	});
	
    $('#confirm-delete').on('show.bs.modal', function(e) {
	 
  	  var lot_id = $(e.relatedTarget).attr('data-id');

  	  $('#lot_id').val(lot_id);

    });
  
     $('#delete-lot').click(function() {
	  
	  	  var lot_id = $('#lot_id').val();
	  
	  	  $.ajax({
	  	     type: 'GET',
	  	     url: '<?= base_url()?>manage/lot_delete/' + lot_id,
	  		 cache: false,
	  	     success: function() {
	  			 $('#lotslist').dataTable().fnStandingRedraw();
	  			 $('#crud_message').html('Auction Deleted..').show(0).delay(1500).fadeOut(3000);
	  	     }
	  	  });
	  
	  	  $('#confirm-delete').modal('hide');
      });
	  
	  
      $('#confirm-recover').on('show.bs.modal', function(e) {
	 
    	  var lot_id = $(e.relatedTarget).attr('data-uid');

    	  $('#recover_lot_id').val(lot_id);

      });
  
       $('#recover-lot').click(function() {
	  
    	  var lot_id = $('#recover_lot_id').val();
	  
    	  $.ajax({
    	     type: 'GET',
    	     url: '<?= base_url()?>manage/lot_recover/' + lot_id,
    		 cache: false,
    	     success: function() {
    			 $('#lotslist').dataTable().fnStandingRedraw();
    			 $('#crud_message').html('Lot Recovered..').show(0).delay(1500).fadeOut(3000);
    	     }
    	  });
	  
    	  $('#confirm-recover').modal('hide');
        });
		
		
        $('#confirm-active').on('show.bs.modal', function(e) {
	 
      	  var lot_id = $(e.relatedTarget).attr('data-uid');

      	  $('#active_lot_id').val(lot_id);

        });
  
         $('#active-lot').click(function() {
	  
	      	  var lot_id = $('#active_lot_id').val();
	  
	      	  $.ajax({
	      	     type: 'GET',
	      	     url: '<?= base_url()?>manage/lot_reactivate/' + lot_id,
	      		 cache: false,
	      	     success: function() {
	      			 $('#lotslist').dataTable().fnStandingRedraw();
	      			 $('#crud_message').html('Lot Relisted..').show(0).delay(1500).fadeOut(3000);
	      	     }
	      	  });
	  
	      	  $('#confirm-active').modal('hide');
          });
		  
		  
	      $('#confirm-sold').on('show.bs.modal', function(e) {
	 
	    	  var lot_id = $(e.relatedTarget).attr('data-uid');

	    	  $('#sold_lot_id').val(lot_id);

	      });
		  
          $('#sold-lot').click(function() {
	  
	       	  var lot_id = $('#sold_lot_id').val();
	  
	       	  $.ajax({
	       	     type: 'GET',
	       	     url: '<?= base_url()?>manage/lot_cancel_sale/' + lot_id,
	       		 cache: false,
	       	     success: function() {
	       			 $('#lotslist').dataTable().fnStandingRedraw();
	       			 $('#crud_message').html('Sale Cancelled..').show(0).delay(1500).fadeOut(3000);
	       	     }
	       	  });
	  
	       	  $('#confirm-sold').modal('hide');
           });
	  
	  
  
     
    $('#lot-crud').on('show.bs.modal', function(e) {
 
	  	  $('#details-tab a[href="#details"]').tab('show');
		  var lot_id = $(e.relatedTarget).attr('data-uid');
		  var lot_type = $(e.relatedTarget).attr('data-lot-type');
		  var lot_action = $(e.relatedTarget).attr('data-action');
		  var action;
		  var lot_header;
		  
		  switch(lot_action)
		  {
			  case 'add':
				  action = 'Add';
  				  $('#crudLotForm')[0].reset();
				  $('#action').val('add');
				  $('#lot_category_id').val(0);
				  $('#lot_buyer').val(0);
	  			  $('#lot_active').prop('checked', true);
		  
	   		   	  $('#crud_message').html('');
	   		   	  $('#lot_message').html('');
				  
				  lot_auto_number();

				  lot_header = 'Lot';
			  break;
		  	  case 'edit':
			  	  action = 'Update';
				  lot_data(lot_id);
				  lot_header = 'Lot';
			  break;
		  }

		  $('#lot_header').html(lot_header);
		  $('.lot_text').html(action);

    });
	 
	 
	 $('#crud-lot').click(function() {
  
		  var form_data = $("#crudLotForm").serialize();
		  var get_lot_action = $('#action').val();
		  var lot_message;

		  switch(get_lot_action)
		  {
		  	  case 'add':
			  	lot_message = 'Added';
			 break;
			 case 'edit':
				lot_message = 'Updated';
			 break;
		  }
		  
	  	  $.ajax({
	  	     type: 'POST',
	  	     url: '<?= base_url()?>manage/lot_crud',
			 data: form_data,
	  		 cache: false,
	  	     success: function(lot) {
	  			 $('#lotslist').dataTable().fnStandingRedraw();
	  			 $('#crud_message').html('Lot ' + lot_message + '..');
				 
				 if((parseFloat(lot) == parseInt(lot)) && !isNaN(lot)){
					 text = 'ID# ' + lot;
					 lot_data(lot);
				 }
				 else
				 {
				 	
					text = '';
				 }
				 
				 $('#lot_message').html(text);
	  	     }
	  	  });
  
      });
	  
	  function lot_data(id)
	  {
	  	
			  /* Load Data */
			  $.ajax({			
			     	type: 'GET',
					dataType: 'json',
		      		url: base_url + 'manage/get_lot_data/' + id,
					success: function(lot){
					  $('#action').val('edit');					
	  				  $('#crud_lot_id').val(lot['lot_id']);
					  $('#lot_name').val(lot['lot_name']);
					  $('#lot_number').val(lot['lot_number']);
					  $('#lot_description').val(lot['lot_description']);
					  $('#lot_category_id').val(lot['lot_category_id']);
					  $('#lot_buyer').val(lot['lot_buyer']);
					  $('#lot_end_date').val(lot['lot_end_date']);
					  $('#lot_seller').val(lot['seller']);
				  
					  var lot_hidden = (lot['lot_hidden'] == true) ? true : false;
					  $('#lot_hidden').prop('checked', lot_hidden);
					  
					  var lot_active = (lot['lot_active'] == true) ? true : false;
					  $('#lot_active').prop('checked', lot_active);
					  
					  var lot_sold = (lot['lot_sold'] == true) ? true : false;
					  $('#lot_sold').prop('checked', lot_sold);
					  
					  $('#lot_amount').val(lot['lot_amount']);
					  
					  $('#lot_reserve').val(lot['lot_reserve']);
					  
					  $('#image_lot_name').val(lot['lot_name']);
					  
					  $('#image_lot_id').val(lot['lot_id']);
				} 
			});
		
	  }
	  
	 $('#crud-lot-images').click(function() { 
		 
	  	  var form_data = $("#imagesForm").serialize();
		  
		  $.ajax({
	  	     type: 'POST',
	  	     url: '<?= base_url()?>manage/lot_image_crud',
			 data: form_data,
	  		 cache: false,
	  	     success: function(image) {
				 images();
	  	     }
	  	  });
	  
  	  });
	  
	  
	  function lot_auto_number(){

			  /* Load Data */
			  $.ajax({			
			     	type: 'GET',
					dataType: 'json',
		      		url: base_url + 'manage/get_lot_auto_number/<?= $event_id?>',
					success: function(auto_lot){
					  $('#lot_number').val(auto_lot);
				} 
			});
		
	  }
	  
	  
	  /* Images */
   	  $('#photos-edit').click(function(e) {
	     
		 e.preventDefault();
		 
		 $(this).tab('show');
		
		 images();
	 });
	  
	  
	  
	   
	 function images(){
	 	
		 var lot_image_id = $('#crud_lot_id').val();
		 var set_main_image;
		
		  /* Get Images */
		  $.ajax({			
		     	type: 'GET',
				dataType: 'json',
	      		url: base_url + 'manage/get_lot_images/' + lot_image_id,
				success: function(lots){
					
			  			  var feed = [];

			  		      $.each(lots, function (i, v) {
							
							 set_main_image = (lots[i]['lot_image_main'] == true) ? 'checked="checked"' : '';
							 
							 feed.push('<tr><td align="center"><input type="checkbox" name="images[]" value="' + lots[i]['lot_image_id'] + '" /></td><td><img class="thumbnail" width="75" src="' + base_url + 'auction/images/thumbs/' + lots[i]['lot_image_file'] + '" ></td><td>' + lots[i]['image_size'] + '</td><td align="center"><input type="radio" id="featured" name="featured" ' + set_main_image + ' value="' + lots[i]['lot_image_id'] + '" /></td></tr>');
								
			  		      });
     
			  		      $('#display-photos tbody').html(feed);
						 
	   					  $.each(lots, function (i, v) {
							  $('#image_lot_event_id').val(lots[i]['lot_image_event_id']);
		   					  $('#image_lot_id').val(lots[i]['lot_image_lot_id']);
		   					  $('#images_lot_id').val(lots[i]['lot_image_lot_id']);
					      });
				}
	  	  });
	 }
	   
		
		$(document).on('submit','#imageForm',function(e){
			e.preventDefault();
			$form = $(this);				
			uploadImage($form);
		});
		
		function uploadImage($form){			
			$('#pbar').removeClass('progress-bar-success');
			$('#pbar').removeClass('progress-bar-danger');
			var formdata = new FormData($form[0]); //formelement
			
			var request = new XMLHttpRequest();
			//progress event...
			request.upload.addEventListener('progress',function(e){
				var percent = Math.round(e.loaded/e.total * 100);
				$('#pbar').width(percent+'%');
				$('#pbar').html(percent+'%');
			});
			//progress completed load event
			request.addEventListener('load',function(e){
				$('#pbar').addClass('progress-bar-success');
				$('#pbar').html('upload completed....');				
				images();
			});
			
			request.open('post', base_url + 'manage/lot_image_upload');
			request.send(formdata);
			
			$form.on('click','.cancel',function(){
				request.abort();
				$('#pbar').addClass('progress-bar-danger');
				$('#pbar').removeClass('progress-bar-success');
				$('#pbar').html('upload aborted...');
			});
			
		}
		
		
   	 function clear_images(){
	 	 var feed = [];
   		 $('#display-photos tbody').html(feed);
   	 }
	  
	 
});
</script>