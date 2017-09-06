<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Auction Website
 *
 * @package     Online Auction
 * @author      American Auctioneers Dev Team
 * @copyright   Copyright (c) 2013, American Auctioneers
 * @since       Version 1.0
 * @category    Controllers
 * @description Manage Controller
 * @Files       ./system/application/views/manage/*
 * @Files       ./system/application/models/manage_model.php
 */

// ------------------------------------------------------------------------

class Manage extends CI_Controller {
		

/*
|--------------------------------------------------------------------------
| CONSTRUCTOR
|--------------------------------------------------------------------------
|
*/
		
	public function __construct()
	{
		parent::__construct();
		
		if( ! $this->session->userdata('logged_in') && $this->session->userdata('user_role_id') <= 2)
		{
			redirect('manage_login/index', 'refresh');
		}
		
		$this->load->model('manage_model');
	}

	public function index()
	{
		$data['error'] = '';

		$this->load->view('manage/index', $data);
	}
	
/*
|--------------------------------------------------------------------------
| DASHBOARD MODULE
|--------------------------------------------------------------------------
|
*/	
	public function dashboard()
	{
		$total_sales = $this->manage_model->get_total_gross_sales();
		
		$data['gross_sales_total'] = $total_sales['invoice_total'];
		$data['invoice_total'] = $this->manage_model->get_invoice_total();
		$data['buyer_total'] = $this->manage_model->get_buyer_total();
		$data['auction_total'] = $this->manage_model->get_auction_total();
		
		$this->load->helper('states_countries');
		$data['states'] = states();
		$data['roles'] = $this->manage_model->get_user_roles();
		
		// Page Details
		$hdata['page_title'] = 'Dashboard';
		$hdata['current_page'] = ucfirst($this->router->fetch_method());
		
		$this->load->view('manage/header');
		$this->load->view('manage/navigation', $hdata);
		$this->load->view('manage/dashboard', $data);
		$this->load->view('manage/footer');
	}
	
	
/*
|--------------------------------------------------------------------------
| AUCTIONS MODULE
|--------------------------------------------------------------------------
|
*/

	public function auctions()
	{
		
        $this->load->library('table');

		if($this->uri->segment(3))
		{
			$query_type = $this->uri->segment(3);
		}
		else
		{
			$query_type = 'all';
		}
		
		$data['title'] = $this->uri->segment(2, 0);
		
		$data['sellers'] = $this->manage_model->get_auction_sellers();
		$data['auction_types'] = $this->manage_model->get_auction_types();
		$data['auction_categories'] = $this->manage_model->get_auction_categories();
		$data['auction_auctioneers'] = $this->manage_model->get_auction_auctioneers();
		$data['auction_status'] = $this->manage_model->get_auction_status();
		
		// Page Details
		$hdata['page_title'] = 'Auctions (' . ucfirst($query_type) . ')';
		$hdata['current_page'] = ucfirst($this->router->fetch_method());
		
		$this->load->helper('states_countries');

		$data['states'] = states();
		
		$firstofmonth = mktime(0, 0, 0, date("n"), 1);	
		$end_of_day = mktime(23, 0, 0); // today at midnight
		$data['start_date'] = ($this->input->post('start_date')) ? $this->input->post('start_date') : unix_to_human($firstofmonth);
		$data['end_date'] = ($this->input->post('end_date')) ? $this->input->post('end_date') : unix_to_human($end_of_day);

		$data['type'] = $query_type;
		
        //set table id in table open tag
        $tmpl = array ( 'table_open'  => '<table id="auctionslist" class="table table-bordered table-striped table-hover">' );
        $this->table->set_template($tmpl);
		
		$this->table->set_heading('ID','End Date', 'Type', 'Name', 'Company', 'First', 'Last', 'Actions');
		
		$this->load->view('manage/header');
		$this->load->view('manage/navigation', $hdata);
        $this->load->view('manage/auctions', $data);
		$this->load->view('manage/footer');
		
	}
	
	  // Retreive Ajax Data
	  public function get_auctions()
	  {
			 $this->manage_model->get_auctions($this->uri->segment(3, 0), $this->uri->segment(4, 0), $this->uri->segment(5, 0));
	  }
	  
	  public function get_auction_data()
	  {
			 $this->manage_model->get_auction_data($this->uri->segment(3, 0));
	  }
	  
	  public function get_max_bids()
	  {
	  		$this->manage_model->get_max_bids($this->uri->segment(3, 0));
	  }
	  
	  public function get_lot_amounts()
	  {
	  		$this->manage_model->get_lot_amounts($this->uri->segment(3, 0));
	  }
	  	
      
	  // Ajax Action Data
	  public function auction_crud()
	  {
			 $this->manage_model->auction_crud($this->input->post());
	  }

	  public function auction_delete()
	  {
			$this->manage_model->auction_delete($this->uri->segment(3, 0));
	  }
  
	  public function auction_recover()
	  {
			$this->manage_model->auction_recover($this->uri->segment(3, 0));
	  }
  
	  public function auction_cancelled()
	  {
			$this->manage_model->auction_cancelled($this->uri->segment(3, 0));
      
	  }
	  
/*
|--------------------------------------------------------------------------
| LOTS MODULE
|--------------------------------------------------------------------------
|
*/
	  
	  public function lots()
	  {
            
			$this->load->library('table');

	  		if($this->uri->segment(4))
	  		{
	  			$query_type = $this->uri->segment(4);
	  		}
	  		else
	  		{
	  			$query_type = 'all';
	  		}
		
	  		$data['title'] = $this->uri->segment(2, 0);
			
  		    $data['event_id'] = $this->uri->segment(3, 0);
			$data['type'] = $query_type;
			$data['buyers'] = $this->manage_model->get_auction_buyers();
			$data['lot_categories'] = $this->manage_model->get_lot_categories();
		
            //set table id in table open tag
            $tmpl = array ( 'table_open'  => '<table id="lotslist" class="table table-bordered table-striped table-hover">' );
            $this->table->set_template($tmpl);
			
			if($query_type == 'sold' || $query_type == 'deactive')
			{
				$this->table->set_heading('ID', 'Lot Number', 'Name', 'Amount', 'B. FirstName', 'B. LastName', 'Actions');
			}
			else
			{
				$this->table->set_heading('ID', 'Lot Number', 'Name', 'Sold', 'Amount', 'Actions');
			}
			
			// Page Details
			$hdata['page_title'] = 'Lots';
			$hdata['current_page'] = ucfirst($this->router->fetch_method());
			$hdata['previous_page'] = 'Auctions';
			$hdata['previous_page_url'] = 'auctions';
			
			$this->load->view('manage/header');
			$this->load->view('manage/navigation', $hdata);
		    $this->load->view('manage/lots', $data);
			$this->load->view('manage/footer');
		
	  }
	  
	  
	  // Retreive Ajax Data
	  public function get_lots()
	  {
			 $this->manage_model->get_lots($this->uri->segment(3, 0), $this->uri->segment(4));
	  }
	  
	  public function get_lot_data()
	  {
			 $this->manage_model->get_lot_data($this->uri->segment(3, 0));
	  }
	  
	  public function get_lot_auto_number()
	  {
			 $this->manage_model->get_lot_auto_number($this->uri->segment(3, 0));
	  }
      
	  // Ajax Action Data
	  public function lot_crud()
	  {
			 $this->manage_model->lot_crud($this->input->post());
	  }

	  public function lot_crud_inline()
	  {

	  		 $this->load->model('lot_model');

			 if($this->input->post('columnName') == 'ID')
			 {
			 	 echo $this->input->post('value');
			 }
			 else
			 {

				 if($this->input->post('columnName')  == 'Lot Number')
				 {
				 	$fields['lot_number'] = $this->input->post('value');
				 }

				 if($this->input->post('columnName')  == 'Name')
				 {
				 	$fields['lot_name'] = $this->input->post('value');
				 }

				 if($this->input->post('columnName')  == 'Sold')
				 {
				 	$fields['lot_sold'] = $this->input->post('value');
				 }

				 if($this->input->post('columnName')  == 'Amount')
				 {
				 	$fields['lot_amount'] = $this->input->post('value');
				 }

				 $lot_id = $this->input->post('id');

				 $this->lot_model->update($fields, $lot_id);

				 echo $this->input->post('value');
			 }
	  }
	  
	  public function lot_image_crud()
	  {
			 $this->manage_model->lot_image_crud($this->input->post());
	  }

	  public function lot_delete()
	  {
			$this->manage_model->lot_delete($this->uri->segment(3, 0));
	  }
  
	  public function lot_recover()
	  {
			$this->manage_model->lot_recover($this->uri->segment(3, 0));
	  }
  
	  public function lot_reactivate()
	  {
			$this->manage_model->lot_reactivate($this->uri->segment(3, 0));
      
	  }
	  
	  public function lot_cancel_sale()
	  {
			$this->manage_model->lot_cancel_sale($this->uri->segment(3, 0));
      
	  }
	  
	  
	  public function get_lot_images()
	  {
	  		$this->manage_model->get_lot_images($this->uri->segment(3, 0));
	  }
	  
	  public function lot_image_upload()
	  {
		
		  $this->load->model('lot_model'); 
		  $this->load->model('image_model'); 
		  
		
		  // Upload Images
			$images = $this->image_model->upload_multi($_FILES['userfile']['name'], $this->input->post('image_lot_name'));

			if($images)
			{
				foreach($images as $image)
					{
	                	
		                	$lot_images_fields['lot_image_event_id'] = $this->input->post('image_lot_event_id');
		                	$lot_images_fields['lot_image_lot_id'] = $this->input->post('image_lot_id');		                	
	                        $lot_images_fields['lot_image_file'] = $image;
		                	$this->lot_model->create_images($lot_images_fields);
	                	
					}
			}
		  
		  
	  }
	  
	  
	public function event_quick_add_lots()
	{
			if($this->input->post())
			{
				$event_id = $this->uri->segment(3, 0);
		
				$lots_add = $this->input->post('event_quick_add_lots');
				$lots_add_name = $this->input->post('event_quick_add_lots_name');
		
				$this->load->model('lot_model');
			
				$type = $this->event_model->get_event_type_id($event_id);
				$event_seller = $this->event_model->get_event_seller_id($event_id);
	
				if($type['event_event_type_id'] == 1) {
		
					$endtime = strtotime('+14 days',  now());
					$lendtime = $endtime;
		
				} else {
		
					$endtime = $this->event_model->get_event_end_date($event_id);
					$lendtime = $endtime['event_end_date'];
		
				}
				$i =  1;
				while( $i <= $lots_add )
	
				{
	
					$fields['lot_event_id'] = $event_id;
					$fields['lot_name'] = $lots_add_name;
					$fields['lot_tag'] = '';
					$fields['lot_description'] = 'Miscellaneous Lot Added';
					$fields['lot_category_id'] = '24';
					$fields['lot_seller'] = $event_seller['event_user_id'];
					$fields['lot_created_date'] = now();
					$fields['lot_end_date'] = $lendtime;
					$fields['lot_active'] = 1;
					$fields['lot_hidden'] = 1;
	
					$lot_number = $this->lot_model->get_lot_number($event_id);
	
					if( ! $lot_number)
					{
						$auto_number = 101;
					}
					else
					{
						$auto_number = $lot_number['lot_number'] + 1;
					}
	
					$fields['lot_number'] = $auto_number;
	
					$lot_id = $this->lot_model->create($fields);
		
					$bid_fields['bid_event_id'] = $event_id;
					$bid_fields['bid_lot_id'] = $lot_id;
					$bid_fields['bid_amount'] = 0;
					$bid_fields['bid_created_date'] = now();
			   	  	$bid_id = $this->event_model->create_bid($bid_fields);
  	
		        	$i++;
		
				}
		
				redirect('manage/lots/' . $event_id);
			}
	}
	

/*
|--------------------------------------------------------------------------
| LIVE SALE MODULE
|--------------------------------------------------------------------------
|
*/
	
	public function live()
	{
		
		$event_id = ($this->input->post('event_id')) ? $this->input->post('event_id') : '';
		
		$data['event_id'] = $event_id;
		$data['display'] = ($this->input->post()) ? true : false;
		$data['auctions'] = $this->manage_model->get_dual_auctions();
		$data['auction_lots'] = $this->manage_model->get_auction_lots($event_id);
		
		// Auction Details
		// Open or close Bidding For this Lot
		
		$this->manage_model->bid_status($this->uri->segment(3, 0), $event_id);
		
		$event = $this->event_model->get_event($this->uri->segment(3, 0));
				
		$data['event_id'] = $event['event_id'];
		$data['event_event_type_id'] = $event['event_event_type_id'];
		$data['event_type_name'] = $event['event_type_name'];
		$data['event_name'] = $event['event_name'];		
		$data['event_description'] = $event['event_description'];
		$data['event_city'] = $event['event_city'];
		$data['event_state'] = $event['event_state'];
		$data['event_end_date'] = $event['event_end_date'];
		$data['user_first_name'] = $event['user_first_name'];
		$data['num_lots'] = $event['num_lots'];
		$data['previous'] = $this->manage_model->get_live_pagination($this->uri->segment(3, 0), $this->uri->segment(4, 0), 'previous');
		$data['next'] = $this->manage_model->get_live_pagination($this->uri->segment(3, 0), $this->uri->segment(4, 0), 'next');
		
		$lot = $this->event_model->get_lot_bid($this->uri->segment(4, 0));
		
		$data['bid_id'] = $lot['bid_id'];	
		$data['lot_id'] = $lot['lot_id'];		
		$data['lot_number'] = $lot['lot_number'];
		$data['lot_tag'] = $lot['lot_tag'];
		$data['lot_name'] = $lot['lot_name'];
		$data['lot_buyer'] = $lot['lot_buyer'];
		$data['lot_end_date'] = $lot['lot_end_date'];		
		$data['lot_description'] = $lot['lot_description'];
		$data['lot_image_file'] = $lot['lot_image_file'];
		$data['lot_active'] = $lot['lot_active'];
		$data['buyer_first_name'] = $lot['buyer_first_name'];
		$data['buyer_last_name'] = $lot['buyer_last_name'];
		
		$this->load->helper('states_countries');

		$data['states'] = states();
		$data['roles'] = $this->manage_model->get_user_roles();
		
		// Page Details
		$hdata['page_title'] = 'Live Sale';
		$hdata['current_page'] = ucfirst($this->router->fetch_method());
		
		$this->load->view('manage/header');
		$this->load->view('manage/navigation', $hdata);
        $this->load->view('manage/live', $data);
		$this->load->view('manage/footer');
	}
	
	
	public function get_high_bid()
	{
		// Get current bid
	   $data['bid'] = $this->event_model->get_bid($this->uri->segment(3, 0));
	   $data['history'] = $this->event_model->get_history($this->uri->segment(3, 0));
	   $data['default_image'] = $this->lot_model->get_image_lot_default($check_lot['lot_id']);
	  
	   echo json_encode($bid);
	}
	
	
	
	public function update_lot_amount()
	{				
		$this->load->model('lot_model');
		
		$lot_id = $this->uri->segment(3, 0);
		$lot_amount = $this->input->get('lot_amount');
		
		$lot_fields['lot_amount'] = $lot_amount;			
		$this->lot_model->update($lot_fields, $lot_id);	
		
	}
	  
	
	
	
	public function bidding()
	{
			
		   $this->load->model('lot_model');
		   $bid_id = $this->uri->segment(3, 0);
		   $user_id = $this->input->get('user_id');
		   $current_bidder_id = $this->input->get('current_bidder_id');

		   // Get current bid
		   $get_bid = $this->event_model->get_bid($bid_id);
		   
		   $bid = $this->input->get('bid');
			
		   $type = $this->input->get('bid_type');
		   
		   // Format Number for Currency Display
		   $bid_type = $get_bid['bid_type'];
		   $current_bid = $get_bid['bid_amount'];
		   $lot_id = $get_bid['lot_id'];
		   $event_id = $get_bid['lot_event_id'];
		   $lot_active = $get_bid['lot_active'];
		   $min_bid = $get_bid['min_bid'];
		   $online_pause = $get_bid['bid_online_pause'];
		   	
	
		   // Type of bid Handler
		   switch($type)
		   {
			   
			   	case 'free':					
						if($online_pause == 1) 
						{
							$set_user_id = $user_id;
							$message = '';
		                    $status = 'open';
		                    $updated_bid = $bid;
						}
						else 
						{
							$unique = $this->proxy_bid_check($lot_id, $user_id, $bid, $min_bid, FALSE, $current_bid);
							$updated_bid = $unique['bid'];
		                    $status = 'open';
		                    $set_user_id = $unique['user_id'];
		       				$fields['bid_user_id'] = $unique['user_id'];
							$fields['bid_type'] = $unique['bid_type'];
							$message = $unique['message'];
						}				
			   	break;
			   	
			   	case 'up':
			   		$unique = $this->proxy_bid_check($lot_id, $user_id, $bid, $min_bid);
			   		$updated_bid = $unique['bid'];
                    $status = 'open';
                    $set_user_id = $unique['user_id'];
					$fields['bid_user_id'] = $unique['user_id'];
					$fields['bid_type'] = $unique['bid_type'];
					$message = $unique['message'];

			   	break;
			    case 'upinc':
			    	$unique = $this->proxy_bid_check($lot_id, $user_id, $bid, $min_bid);
			   		$updated_bid = $unique['bid'];
                    $status = 'open';
                    $set_user_id = $unique['user_id'];
                    $fields['bid_user_id'] = $unique['user_id'];
					$fields['bid_type'] = $unique['bid_type'];
					$message = $unique['message'];
				
					
			   	break;
				case 'final':
					$set_user_id = $user_id;
					$message = ($lot_active == 1) ? 'FINAL CALL !' : '';
                    $status = 'open';
                    $updated_bid = $current_bid;
					
				break;
				case 'standby':
					$set_user_id = $user_id;
					$message = ($lot_active == 1) ? 'STAND BY' : '';
                    $status = 'open';

					$updated_bid = $current_bid;
				break;
				case 'active':
					$set_user_id = $user_id;
                    $status = 'open';
					$message = ($lot_active == 1) ? 'ACTIVE' : '';

					$updated_bid = $current_bid;
                break;				
				
				case 'bid-online-start':
					$fields['bid_online_pause'] = 0;
					$status = 'open';
					$message = 'Continue Online Bidding';
				break;
				
				case 'bid-online-stop':
					$fields['bid_online_pause'] = 1;
					$status = 'open';
					$message = 'Online Bidding Stopped';
				break;				
				
                case 'closed':
                	$set_user_id = $user_id;
                    $status = '';
					$message = ($lot_active == 1) ? 'Closed' : '';

					$updated_bid = $current_bid;
				break;
				case 'start-in-five':
					$set_user_id = $user_id;
					$message = ($lot_active == 1) ? 'Live bidding starting soon' : '';
                    $status = 'open';

                    $updated_bid = $current_bid;
				break;
				case 'paid-pulled':
					$set_user_id = $user_id;
					$message = ($lot_active == 1) ? 'Lot Has Been Paid And Pulled From the Sale' : '';

                    $status = '';
                    $updated_bid = $current_bid;
					$lot_fields['lot_active'] = 0;						
					$this->lot_model->update($lot_fields, $lot_id);			
																
				break;
				case 'sold':
					$set_user_id = $user_id;
				
					$fields['bid_user_id'] = $current_bidder_id;
					$status = '';

					$message = 'SOLD';
					$updated_bid = $current_bid;
					
					$lot = $this->lot_model->get_lot($lot_id);
		
					$percentage = $lot['event_buyer_premium_online'];
							
					$percentage_calc = $lot['event_buyer_premium_online'] / 100;
					
					$buyer_premium_calc = $percentage_calc * $lot['bid_amount'];
					 
					$premium = $percentage * $lot['bid_amount'];
					
					$amount = $premium;
					
					$lot_paid = $lot['lot_paid'];
					$billingid = ($lot['user_billing_id']) ? $lot['user_billing_id'] : '';
					
					$lot_fields['lot_active'] = 0;
					$lot_fields['lot_date_closed'] = now();
                    $lot_fields['lot_buyer'] = $current_bidder_id;
					$lot_fields['lot_buyer_premium_online'] = $buyer_premium_calc;
					$lot_fields['lot_amount'] = $lot['bid_amount'];
					
					$this->lot_model->update($lot_fields, $lot_id);
					
					if($bid_type == 'online') 
					{
						$online_bidder_id = $get_bid['bid_user_id'];
						
						//$bmessage = $this->payment($event_id, $billingid, $amount, $lot_id, $lot_paid, $online_bidder_id);
						
						// Send Emails
						$this->load->model('email_model');
						$this->email_model->winning_users_email($lot_id);
					}
				break;
				case 'restart':
					$set_user_id = $user_id;
					$message = ($lot_active == 0) ? 'Resume Bidding' : '';
                    $status = 'open';
                    $updated_bid = $current_bid;
					$lot_fields['lot_active'] = 1;
                    $lot_fields['lot_buyer'] = '';
                    $lot_fields['lot_paid'] = 0;
                    $lot_fields['lot_amount_collected'] = 0;
                    $lot_fields['lot_premium_collected'] = 0;
                    $lot_fields['lot_tax_collected'] = 0;
                    $lot_fields['lot_total_collected'] = 0;
					$lot_fields['lot_date_closed'] = 0;
                    $this->lot_model->update($lot_fields, $lot_id);
				break;
				default:
					$set_user_id = '';
					$message = '';
					$updated_bid = '';
		   }
		   

		   
	   	  
	   	  
	   	  if(isset($updated_bid))
	   	  {
	   	   	  $fields['bid_amount'] = $updated_bid; 
	   	  }

		  
          $fields['bid_status'] = $status;
          $fields['bid_message'] = $message;
	   	  $this->event_model->update_bid($fields, $bid_id);
	   	  
	   	   /* TURN HISTORY OFF FOR TESTING  */
          $hfields['bid_history_amount'] = $updated_bid;
          $hfields['bid_history_bid_id'] = $bid_id;
          $hfields['bid_history_lot_id'] = $get_bid['bid_lot_id'];
          $hfields['bid_history_user_id'] = $set_user_id;
          $hfields['bid_history_message'] = $message;
          $hfields['bid_history_type'] = 'onsite';
          $hfields['bid_history_created_date'] = now();
          $this->event_model->create_bid_history($hfields);
          /* TURN HISTORY OFF FOR TESTING  */
             
    	
    	// Output Message
    	
		// Output Message
		    //$notification = array('notification' => $message);
		    //echo json_encode($notification);

		
	}
	
	public function bidding_message()
	{
		  
		  $bid_id = $this->uri->segment(3, 0);
		  
		  $get_bid = $this->event_model->get_bid($bid_id);
		  $user_id = $this->input->get('user_id');
		  $message = $this->input->get('message');
		   	
		  $fields['bid_message'] = $message;			  
	   	  $this->event_model->update($fields, $bid_id);
	   	  
		  $hfields['bid_history_amount'] = 0;
	      $hfields['bid_history_bid_id'] = $bid_id;
	      $hfields['bid_history_lot_id'] = $get_bid['bid_lot_id'];
	      $hfields['bid_history_user_id'] = $user_id;
	      $hfields['bid_history_message'] = $message;
	      $hfields['bid_history_type'] = 'online';
	      $hfields['bid_history_created_date'] = now();
	      $this->event_model->create_history($hfields);
	      
	      echo json_encode($message);
	}
	
	
	function proxy_bid_check($lot_id, $user_id, $bid, $min_bid, $update_bid = TRUE, $current_bid = NULL)
	{
		// Get the user with the highest proxy bid
		$proxy = $this->event_model->get_proxy_bid($lot_id);
		
		if($proxy)
		{
			
			$proxy_high_bid = $proxy['proxy_bid'];
			$proxy_user_id = $proxy['proxy_user_id'];
			
			if($proxy_high_bid >= $bid)
			{
				$user = $proxy_user_id;
				$bid = ($update_bid) ? $min_bid : $current_bid;
				$message = 'An Online Max Bid is Greater';
				$bid_type = 'online';
			}
			else
			{
				$user = $user_id;
				$bid = $bid;
				$message = 'Onsite Bid Accepted';
				$bid_type = 'onsite';
			}
		
		}
		else
		{
			$user = $user_id;
			$bid_type = 'onsite';
			$message = 'Onsite Bid Accepted';
			$bid = $bid;
		}

		return array('user_id' => $user, 'bid' => $bid, 'message' => $message, 'bid_type' => $bid_type);
	}
	
/*
|--------------------------------------------------------------------------
| INVOICE MODULE
|--------------------------------------------------------------------------
|
*/	
	
		public function invoices()
		{
		
			$event_id = ($this->input->post('event_id')) ? $this->input->post('event_id') : 0;
		
	        $this->load->library('table');

			if($this->uri->segment(3))
			{
				$query_type = $this->uri->segment(3);
			}
			else
			{
				$query_type = 'all';
			}
		
			$data['event_id'] = $event_id;
			$data['auctions'] = $this->manage_model->get_invoice_auctions(); 
		
			$data['type'] = $query_type;
		
			$firstofmonth = mktime(0, 0, 0, date("n"), 1);	
			$end_of_day = mktime(23, 0, 0); // today at midnight
			$data['start_date'] = ($this->input->post('start_date')) ? $this->input->post('start_date') : unix_to_human($firstofmonth);
			$data['end_date'] = ($this->input->post('end_date')) ? $this->input->post('end_date') : unix_to_human($end_of_day);
		
	        //set table id in table open tag
	        $tmpl = array ( 'table_open'  => '<table id="invoiceslist" class="table table-bordered table-striped table-hover">' );
	        $this->table->set_template($tmpl);
		
			$this->table->set_heading('ID', 'Number', 'Date', 'Amount', 'Buyer F.Name', 'Buyer L.Name', 'Actions');
		
			// Page Details
			$hdata['page_title'] = 'Invoices';
			$hdata['current_page'] = ucfirst($this->router->fetch_method());
		
			$this->load->view('manage/header');
			$this->load->view('manage/navigation', $hdata);
	        $this->load->view('manage/invoices/index', $data);
			$this->load->view('manage/footer');
		}
	
		public function invoice()
		{
		
			$action = $this->uri->segment(4, 0);
			$event_id = ($this->input->post('event_id')) ? $this->input->post('event_id') : 0;

			switch($action)
			{
				case 'add':
					// Generate Invoice Number
					$invoice_number = $this->manage_model->get_invoice_number();

					if( ! $invoice_number)
					{
						$data['invoice_number'] = 1000;
					}
					else
					{
						$data['invoice_number'] = $invoice_number['invoice_number'] + 1;
					}
			
					$data['date'] = convert_to_human(now());
					
					$info = $this->manage_model->get_lot_by_auction($event_id);
					
					$data['auction_name'] = $info['event_name'];
					$data['event_buyer_premium'] = $info['event_buyer_premium'];
					$data['invoice_premium'] = 0;
					$data['event_sales_tax'] = $info['event_sales_tax'];
					$data['invoice_tax'] = 0;
					$data['paid'] = 0;
					$data['invoice_sub_total'] = 0;
					$data['invoice_total'] = 0;
					$data['invoice_notes'] = '';
					
					// Get Seller Information
					$this->load->model('user_model'); 
					$company = $this->user_model->get_user($info['event_user_id']);
					$data['company'] = $company['user_company_name'];
					$data['address'] = $company['user_address'];
					$data['city'] = $company['user_city'];
					$data['state'] = $company['user_state'];
					$data['zip'] = $company['user_zip'];
					$data['phone'] = $company['user_phone'];
					$data['email'] = $company['user_email'];
					
					$data['company_buyer'] = '';
					$data['name_buyer'] = '';
					$data['address_buyer'] ='';
					$data['city_buyer'] = '';
					$data['state_buyer'] ='';
					$data['zip_buyer'] = '';
					$data['phone_buyer'] = '';
					$data['email_buyer'] = '';
					$data['resell'] = '';
					
					$data['lots'] = $this->manage_model->get_invoice_lots($event_id);
					
				break;
				case 'edit':
					$invoice = $this->manage_model->get_invoice($this->uri->segment(3, 0));
		
					// Get Auction Info
					$info = $this->manage_model->get_lot_by_auction($invoice['invoice_event_id']);
		
					$data['auction_name'] = $info['event_name'];
					$data['event_buyer_premium'] = $info['event_buyer_premium'];
					$data['invoice_premium'] = $invoice['invoice_premium'];
					$data['event_sales_tax'] = $info['event_sales_tax'];
					$data['invoice_tax'] = $invoice['invoice_tax'];
					$data['paid'] = $invoice['invoice_paid'];
					$data['invoice_sub_total'] = $invoice['invoice_sub_total'];
					$data['invoice_total'] = $invoice['invoice_total'];
					$data['invoice_notes'] = $invoice['invoice_notes'];
		
					// Get Seller Information
					$this->load->model('user_model'); 
					$company = $this->user_model->get_user($invoice['invoice_seller_id']);
					$data['company'] = $company['user_company_name'];
					$data['address'] = $company['user_address'];
					$data['city'] = $company['user_city'];
					$data['state'] = $company['user_state'];
					$data['zip'] = $company['user_zip'];
					$data['phone'] = $company['user_phone'];
					$data['email'] = $company['user_email'];
		
		
					// Get Buyer Information
					$buyer = $this->user_model->get_user($invoice['invoice_buyer_id']);
					$data['company_buyer'] = $buyer['user_company_name'];
					$data['name_buyer'] = $buyer['user_first_name'] . ' ' . $buyer['user_last_name'];
					$data['address_buyer'] = $buyer['user_address'];
					$data['city_buyer'] = $buyer['user_city'];
					$data['state_buyer'] = $buyer['user_state'];
					$data['zip_buyer'] = $buyer['user_zip'];
					$data['phone_buyer'] = $buyer['user_phone'];
					$data['email_buyer'] = $buyer['user_email'];
					$data['resell'] = $buyer['user_resell'];
					$data['invoice_number'] = $invoice['invoice_number'];
					$data['date'] = convert_to_human($invoice['invoice_date_created']);
					
					// Calculate Totals
			        $total = 0;
			        $buyers_premium = 0;
			        $lot_tax = 0;
			        $tax_total = 0;
			        $lot_total = 0;
			        $lot_buyers_premium_total = 0;
			        $lot_tax_total = 0;
        
			        $buyers_premium_rate = $data['event_buyer_premium'] / 100;

			        if($data['resell'])
			        {
			        	$data['sellers_tax_rate'] = 0;
			        }
			        else
			        {
			            $data['sellers_tax_rate'] = $data['event_sales_tax'] / 100;
			        }
		
		
					$data['lots'] = $this->manage_model->get_invoice_lots($invoice['invoice_event_id'], $invoice['invoice_buyer_id']);
				break;
			}

			// Page Details
			$hdata['page_title'] = 'Invoice';
			$hdata['current_page'] = ucfirst($this->router->fetch_method());
			$hdata['previous_page'] = 'Invoices';
			$hdata['previous_page_url'] = 'invoices';
		
			$this->load->view('manage/header');
			$this->load->view('manage/navigation', $hdata);
	        $this->load->view('manage/invoices/invoice', $data);
			$this->load->view('manage/footer');
		}
	
	   
	   // Retreive Ajax Data
	   public function get_invoices()
	   {
		   $this->manage_model->get_invoices($this->uri->segment(3, 0), $this->uri->segment(4, 0), $this->uri->segment(5, 0), $this->uri->segment(6, 0));
	   }
	
	
	  public function invoice_payment()
	  {
		  $this->manage_model->payment($this->input->post());
	  }

	  public function invoice_delete()
	  {
			$this->manage_model->invoice_delete($this->uri->segment(3, 0));
	  }
	  
	  public function invoice_recover()
	  {
			$this->manage_model->invoice_recover($this->uri->segment(3, 0));
	  }
	
	
/*
|--------------------------------------------------------------------------
| USERS MODULE
|--------------------------------------------------------------------------
|
*/
	
	public function users()
	{
	
        $this->load->library('table');

		$query_type = ($this->uri->segment(3, 0)) ? $this->uri->segment(3, 0) : 'all';

		
		$data['title'] = $this->uri->segment(2, 0);
		
		// Page Details
		$hdata['page_title'] = 'Users (' . ucfirst($query_type) . ')';
		$hdata['current_page'] = ucfirst($this->router->fetch_method());
		
		$this->load->helper('states_countries');

		$data['states'] = states();
		$data['roles'] = $this->manage_model->get_user_roles();
		$data['type'] = $query_type;
		
        //set table id in table open tag
        $tmpl = array ( 'table_open'  => '<table id="userslist" class="table table-bordered table-striped table-hover">' );
        $this->table->set_template($tmpl); 
		
		$this->table->set_heading('ID','First Name','Last Name','Email', 'Phone', 'Buyer', 'Seller', 'Company Name', 'Actions');

		$this->load->view('manage/header');
		$this->load->view('manage/navigation', $hdata);
        $this->load->view('manage/users', $data);
		$this->load->view('manage/footer');
	}
	
	  // Retreive Ajax Data
	  public function get_users()
	  {
			$this->manage_model->get_users($this->uri->segment(3, 0));
	  }
	  
	  public function get_user_data()
	  {
			 $this->manage_model->get_user_data($this->uri->segment(3, 0));
	  }
	  
	  public function get_user_winning_lots()
	  {
			 $this->manage_model->get_user_winning_lots($this->uri->segment(3, 0));
	  }
	  
	  public function get_user_sold_lots()
	  {
			 $this->manage_model->get_user_sold_lots($this->uri->segment(3, 0));
	  }
	  
	   // Action Ajax Data
	  public function user_crud()
	  {
		 	$this->manage_model->user_crud($this->input->post());
	  }

	  public function user_delete()
	  {
			$this->manage_model->user_delete($this->uri->segment(3, 0));
	  }
	  
	  public function user_recover()
	  {
			$this->manage_model->user_recover($this->uri->segment(3, 0));
	  }
	  
	  public function user_reactivate()
	  {
			$this->manage_model->user_reactivate($this->uri->segment(3, 0));
	  }
	
/*
|--------------------------------------------------------------------------
| REPORTS MODULE
|--------------------------------------------------------------------------
|
*/	
  
	public function reports()
	{
		
		$report_type = ($this->uri->segment(3, 0)) ? $this->uri->segment(3, 0) : 'auctions';
		
		$post = ($this->input->post()) ? $this->input->post() : NULL;
		$data['display'] = ($this->input->post()) ? true : false;
		$data['reports'] = $this->manage_model->get_reports($post, $report_type);
		$data['report_type'] = $report_type;
		$data['users'] = $this->manage_model->get_auctioneers_list();
		$data['types'] = $this->manage_model->get_event_types();
		$data['auctioneer'] = ($this->input->post('user_id')) ? $this->input->post('user_id') : '';
		$data['event_type'] = ($this->input->post('event_type_id')) ? $this->input->post('event_type_id') : '';
		$firstofmonth = mktime(0, 0, 0, date("n"), 1);
		$data['start_date'] = ($this->input->post('start_date')) ? $this->input->post('start_date') : unix_to_human($firstofmonth);
		$data['end_date'] = ($this->input->post('end_date')) ? $this->input->post('end_date') : unix_to_human(now());
		
		// Page Details
		$hdata['page_title'] = 'Reports';
		$hdata['current_page'] = ucfirst($this->router->fetch_method());
		
		$this->load->view('manage/header');
		$this->load->view('manage/navigation', $hdata);
        $this->load->view('manage/reports', $data);
		$this->load->view('manage/footer');
		
	}
	
/*
|--------------------------------------------------------------------------
| SCHEDULE MODULE
|--------------------------------------------------------------------------
|
*/	
	
	public function schedule()
	{			
		
		$this->load->model('user_model');
		
		$post = ($this->input->post()) ? $this->input->post() : '';
		
		$user_id = ($this->input->post('user_id')) ? $this->input->post('user_id') : 0;
		
		
		$data['display'] = ($this->input->post()) ? true : false;
		$data['schedules'] = ($post) ? $this->manage_model->get_schedule($post) : '';
		$data['users'] = $this->manage_model->get_auctioneers_list();
		$data['types'] = $this->manage_model->get_event_types();
		$user = $this->user_model->get_user($user_id );
		$data['name'] = ($user) ? $user['user_first_name'] . ' ' . $user['user_last_name'] : '';
		$data['auctioneer'] = ($this->input->post('user_id')) ? $this->input->post('user_id') : '';
		$data['event_type'] = ($this->input->post('event_type_id')) ? $this->input->post('event_type_id') : '';
		$firstofmonth = mktime(0, 0, 0, date("n"), 1);
		$data['start_date'] = ($this->input->post('start_date')) ? $this->input->post('start_date') : unix_to_human($firstofmonth);
		$data['end_date'] = ($this->input->post('end_date')) ? $this->input->post('end_date') : unix_to_human(now());
		$data['message'] = ($this->uri->segment(3, 0)) ? $this->uri->segment(3, 0) : '';
		
		// Page Details
		$hdata['page_title'] = 'Schedule';
		$hdata['current_page'] = ucfirst($this->router->fetch_method());
		
		$this->load->view('manage/header');
		$this->load->view('manage/navigation', $hdata);
        $this->load->view('manage/schedule', $data);
		$this->load->view('manage/footer');
	}
	
	public function schedule_send()
	{
			$this->load->model('email_model');
			$post = ($this->input->post()) ? $this->input->post() : '';
			$details = ($post) ? $this->manage_model->get_schedule($post) : '';
			$this->email_model->schedule_send_mail($details, $this->input->post('auctioneer'), $this->input->post('start_date'), $this->input->post('end_date'), $this->input->post('email_message'));
			
			redirect('manage/schedule/1');
	}

	public function schedule_export()
	{
			$post = ($this->input->post()) ? $this->input->post() : '';
			$details = ($post) ? $this->manage_model->get_schedule($post, true) : '';

			$this->load->helper('download');
			force_download("schedule.csv", $details);
			exit();
		
	}
	
	function search()
	{
		
		
		
	}
}

/* End of file manage.php */
/* Location: ./application/controllers/manage.php */