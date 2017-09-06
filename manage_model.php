<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Auction Website
 *
 * @package     Online Auction
 * @author      American Auctioneers Dev Team
 * @copyright   Copyright (c) 2013, American Auctioneers
 * @since       Version 1.0
 * @category    Models
 * @description Manage Model
 * @Files       
 */

// ------------------------------------------------------------------------

class Manage_model extends CI_Model {

/* =================================================================================
* User Authentification
* ================================================================================= */

      
	  function __construct()
	  {
	       parent::__construct();
		   $this->load->library('Datatables');
		   $this->load->helper('datatables');
	   }
	  
	  
	  function validate_user($username, $password)
      {
      
      	$query = $this->db->select('user_id, user_role_id, user_username, user_email, user_buyer, user_buyer, user_seller')
      	->like('user_username', $username)
      	->or_like('user_email', $username)
	  	->where('user_password', $password)
      	->where('user_deleted', 0)
      	->limit(1)
      	->get('users');
      	
      	if($query->result_array())
		{
			foreach($query->result_array() as $row)
			{

				$result_arr = $row;				
			}
			
			return $result_arr;
		}
		else
		{
			return FALSE;
		}
      
      }
      
/* =================================================================================
* Dashboard
* ================================================================================= */    
      function get_total_gross_sales()
      {
	      		      	
	      	$query = $this->db->select_sum('invoice_total')
	      	->get('invoices');
	      	
	      	if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
	
					$result_arr = $row;				
				}
				
				return $result_arr;
			}
			else
			{
				return 0;
			}
      }
      
      function get_buyer_total()
      {
	      	
	      	$query = $this->db->select('user_buyer')
	      	->where('user_buyer', 1)
	      	->from('users')
	      	->count_all_results();

		  	if($query)
		  	{
				
				return $query;
			}
			else
			{
				return 0;
			}
      }

      function get_auction_total()
      {
	      	
	      	$query = $this->db->select('event_status_type_id, event_deleted')
	      	->where('event_status_type_id', 1)
	      	->where('event_deleted', 0)
	      	->from('events')
	      	->count_all_results();

		  	if($query)
		  	{
				
				return $query;
			}
			else
			{
				return 0;
			}
      }

  
      function get_invoice_total()
      {
	      	
	      	$query = $this->db->select('invoice_paid')
	      	->where('invoice_paid', 0)
	      	->from('invoices')
	      	->count_all_results();

		  	if($query)
		  	{
				
				return $query;
			}
			else
			{
				return 0;
			}
      }
      
/* =================================================================================
* Auctions
* ================================================================================= */  

	  function get_auctions($type = NULL, $start_date = 0, $end_date = 0)
	  {
        
		$this->datatables->select('event_id, event_id as id, from_unixtime(event_end_date), event_types.event_type_name, event_name, users.user_company_name, users.user_first_name, users.user_last_name');
        $this->datatables->unset_column('event_id');
        $this->datatables->from('events');
		
		// Type of Query
		if( ! empty($type))
		{
			switch($type)
			{
				case 'onsite':
					$this->datatables->add_column('Actions', get_auction_buttons('$1'), 'event_id');
					$this->datatables->where('event_event_type_id', 2);
					$this->datatables->where('event_status_type_id', 1);
					$this->datatables->where('event_deleted', 0);
					$this->db->order_by("event_end_date", "desc");
				break;
				case 'online':
					$this->datatables->add_column('Actions', get_auction_buttons('$1'), 'event_id');
					$this->datatables->where('event_event_type_id', 1);
					$this->datatables->where('event_status_type_id', 1);
					$this->datatables->where('event_deleted', 0);
					$this->db->order_by("event_end_date", "desc");
				break;
				case 'dual':
					$this->datatables->add_column('Actions', get_auction_buttons('$1'), 'event_id');
					$this->datatables->where('event_event_type_id', 3);
					$this->datatables->where('event_status_type_id', 1);
					$this->datatables->where('event_deleted', 0);
					$this->db->order_by("event_end_date", "desc");
				break;
				case 'trash':
					$this->datatables->add_column('Actions', get_auction_recover_buttons('$1'), 'event_id');
					$this->datatables->where('event_deleted', 1);
					$this->db->order_by("event_end_date", "desc");
				break;
				case 'cancelled':
					$this->datatables->add_column('Actions', get_auction_cancelled_buttons('$1'), 'event_id');
					$this->datatables->where('event_status_type_id', 2);
					$this->db->order_by("event_end_date", "desc");
				break;
				case 'dates':
					$sdate = urldecode($start_date);
					$edate = urldecode($end_date);
					$start_date_format = human_to_unix($sdate);
					$end_date_format = human_to_unix($edate);
					
					$this->datatables->add_column('Actions', get_auction_buttons('$1'), 'event_id');
					$this->datatables->where('event_end_date >=', $start_date_format);
					$this->datatables->where('event_end_date <=', $end_date_format);
				break;
				case 'all':
				default:
					$this->datatables->add_column('Actions', get_auction_buttons('$1'), 'event_id');
					$this->datatables->where('event_status_type_id', 1);
					$this->datatables->where('event_deleted', 0);
					$this->db->order_by("event_end_date", "desc");
			}
		}
		
		
		$this->datatables->join('users', 'users.user_id = event_user_id', 'left');
		$this->datatables->join('event_types', 'event_types.event_type_id = event_event_type_id', 'left');

        echo $this->datatables->generate();
	  }
	  
  
	  function get_auction_data($auction_id)
	  {
	  		 $auction = $this->get_auction($auction_id);
	  		 echo json_encode($auction);
	  }
  
	  function auction_crud($data)
	  {
			 $auction = $this->auction_update($data);
			 echo json_encode($auction);
	  }

	  function auction_delete($auction_id)
	  {
			$this->load->model('event_model');
			$this->event_model->delete($auction_id);
      
	  }
  
	  function auction_recover($auction_id)
	  {
			$this->load->model('event_model');
			$this->event_model->recover($auction_id);
      
	  }
  
	  function auction_cancelled($auction_id)
	  {
			$this->load->model('event_model');
			$this->event_model->reactivate($auction_id);
      
	  }
	  
	  function get_auction($id)
	  {
	      	$query = $this->db->select('
				event_id,
				event_user_id,
				event_name,
				event_description,
				event_terms,
				event_phone,
				event_address,
				event_city,
				event_state,
				event_zip,
				event_county,
				event_end_date,
				event_event_category_id,
				event_event_type_id,
				event_status_type_id,
				event_auctioneer_id,
				event_lockcutter_id,
				event_video_link,
				event_num_lots,
				event_lockcut_service,
				event_lockcut_date,
				event_sales_tax,
				event_buyer_premium,
				event_seller_premium,
				event_featured,
				event_hide_address,
				event_hide_address_always,
				event_deleted
			')
			->where('event_id', $id)
			->limit(1)
	      	->get('events');
      	
	      	if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{

					$row['event_end_date'] = unix_to_human($row['event_end_date']);
					$row['event_lockcut_date'] = unix_to_human($row['event_lockcut_date']);
					$result_arr = $row;		
				}
			
				return $result_arr;
			}
			else
			{
				return FALSE;
			}
	  }
	  
	  function auction_update($data)
	  {
	        // Set Form Validation Rules
			$this->form_validation->set_rules('action', 'Action', 'trim|xss_clean');
			$this->form_validation->set_rules('crud_auction_id', 'AuctionID', 'trim|xss_clean');
			$this->form_validation->set_rules('event_end_date', 'Date', 'trim|xss_clean');
			$this->form_validation->set_rules('event_phone', 'Phone', 'trim|xss_clean');
			$this->form_validation->set_rules('event_video_link', 'Video Link', 'trim|xss_clean');
	        $this->form_validation->set_rules('event_name', 'Name', 'trim|xss_clean');
	        $this->form_validation->set_rules('event_address', 'Address', 'trim|xss_clean');
	        $this->form_validation->set_rules('event_city', 'City', 'trim|xss_clean');
	        $this->form_validation->set_rules('event_state', 'State', 'trim|xss_clean');
	        $this->form_validation->set_rules('event_zip', 'Zip Code', 'trim|xss_clean');
	        $this->form_validation->set_rules('event_county', 'County', 'trim|xss_clean');
			$this->form_validation->set_rules('event_user_id', 'Seller', 'trim|xss_clean');
			$this->form_validation->set_rules('event_terms', 'Terms', 'trim|xss_clean');
			$this->form_validation->set_rules('event_event_category_id', 'Category', 'trim|xss_clean');
			$this->form_validation->set_rules('event_event_type_id', 'Type', 'trim|xss_clean');
			$this->form_validation->set_rules('event_status_type_id', 'Status', 'trim|xss_clean');
			$this->form_validation->set_rules('event_auctioneer_id', 'Auctioneer', 'trim|xss_clean');
			$this->form_validation->set_rules('event_lockcutter_id', 'Lock Cutter', 'trim|xss_clean');
			$this->form_validation->set_rules('event_num_lots', 'Number of Lots', 'trim|xss_clean');
			$this->form_validation->set_rules('event_lockcut_service', 'Lock Cutting Service', 'trim|xss_clean');
			$this->form_validation->set_rules('event_lockcut_date', 'Lock Cutting Date', 'trim|xss_clean');
			$this->form_validation->set_rules('event_sales_tax', 'Sales Tax', 'trim|xss_clean');
			$this->form_validation->set_rules('event_buyer_premium', 'Buyer Premium', 'trim|xss_clean');
			$this->form_validation->set_rules('event_seller_premium', 'Seller Premium', 'trim|xss_clean');
			$this->form_validation->set_rules('event_featured', 'Featured', 'trim|xss_clean');
			$this->form_validation->set_rules('event_hide_address', 'Hide Address', 'trim|xss_clean');
			$this->form_validation->set_rules('event_hide_address_always', 'Never Show Address', 'trim|xss_clean');
			$this->form_validation->set_rules('cancel_lockcut', 'Cancel Lock Cut', 'trim|xss_clean');
			$this->form_validation->set_rules('seller_company_name', 'Seller Company Name', 'trim|xss_clean');
			$this->form_validation->set_rules('seller_first_name', 'Seller First Name', 'trim|xss_clean');
			$this->form_validation->set_rules('seller_last_name', 'Seller Last Name', 'trim|xss_clean');
	        $this->form_validation->set_rules('seller_phone', 'Phone', 'trim|xss_clean');
	        $this->form_validation->set_rules('seller_email', 'Email', 'trim|valid_email|xss_clean');
	        $this->form_validation->set_rules('seller_address', 'Address', 'trim|xss_clean');
	        $this->form_validation->set_rules('seller_city', 'City', 'trim|xss_clean');
	        $this->form_validation->set_rules('seller_state', 'State', 'trim|xss_clean');
	        $this->form_validation->set_rules('seller_zip', 'Zip Code', 'trim|xss_clean');
			$this->form_validation->set_rules('seller_county', 'County', 'trim|xss_clean');
			
	        // Checks to see if Form data passes the validation
	        if( ! $this->form_validation->run())
	        {
				return validation_errors();
			}
			else
			{
				
				$fields['event_end_date'] = human_to_unix(set_value('event_end_date'));
              	$fields['event_name'] = set_value('event_name');
				$fields['event_description'] = $data['event_description'];
				$fields['event_address'] = set_value('event_address');
	            $fields['event_city'] = set_value('event_city');
	            $fields['event_state'] = set_value('event_state');
	            $fields['event_zip'] = set_value('event_zip');
	            $fields['event_county'] = set_value('event_county');
				$fields['event_phone'] = set_value('event_phone');
				$fields['event_video_link'] = set_value('event_video_link');
				$fields['event_terms'] = set_value('event_terms');
				$fields['event_event_category_id'] = set_value('event_event_category_id');
				$fields['event_event_type_id'] = set_value('event_event_type_id');
				$fields['event_status_type_id'] = set_value('event_status_type_id');
				$fields['event_auctioneer_id'] = set_value('event_auctioneer_id');
				$fields['event_lockcutter_id'] = set_value('event_lockcutter_id');
				$fields['event_num_lots'] = set_value('event_num_lots');
				$fields['event_sales_tax'] = set_value('event_sales_tax');
				$fields['event_buyer_premium'] = set_value('event_buyer_premium');
				$fields['event_seller_premium'] = set_value('event_seller_premium');
				$fields['event_featured'] = set_value('event_featured');
				$fields['event_hide_address'] = set_value('event_hide_address');
				$fields['event_hide_address_always'] = set_value('event_hide_address_always');
				$update_auction_id = set_value('crud_auction_id');
				
				// Seller
				if(
				set_value('seller_company_name') != '' 
				|| set_value('seller_address') != '' 
				|| set_value('seller_city') != '' 
				|| set_value('seller_state') != '' 
				|| set_value('seller_zip') != '' 
				|| set_value('seller_county') != ''
				)
				{
					$this->load->model('user_model');
					
					$sfields['user_company_name'] = set_value('seller_company_name');
					$sfields['user_address'] = set_value('seller_address');
					$sfields['user_city'] = set_value('seller_city');
					$sfields['user_state'] = set_value('seller_state');
					$sfields['user_zip'] = set_value('seller_zip');
					$sfields['user_county'] = set_value('seller_county');
					$sfields['user_seller'] = 1;
					$sfields['user_active'] = 1;
					$sfields['user_created_date'] = now();
					
					if(set_value('seller_first_name') == '')
					{
						$first_name = 'Guest';
					}
					else
					{
						$first_name = set_value('seller_first_name');
					}
					
					if(set_value('seller_last_name') == '')
					{
						$last_name = 'User';
					}
					else
					{
						$last_name = set_value('seller_last_name');
					}
					
					
					$first_letter = substr($first_name, 0, 1);
					$username = strtolower($first_letter) . strtolower($last_name) . '1';
			
					$pass_str = random_string('alnum', 6);
					$password = $this->encrypt->sha1($pass_str);
					
	                $sfields['user_first_name'] = $first_name;
	                $sfields['user_last_name'] = $last_name;
	                $sfields['user_username'] = $username;
	                $sfields['user_password'] = $password;
					
					$insert_seller_id = $this->user_model->create($sfields);
					
					$seller_id = $insert_seller_id;
				}
				else
				{
					$seller_id = set_value('event_user_id');
				}
				
				$fields['event_user_id'] = $seller_id;
				
				if(set_value('cancel_lockcut'))
				{
					$fields['event_lockcut_service'] = 0;
					$fields['event_lockcut_date'] = 0;
					// Send Email
					$this->load->model('email_model');
					$this->email_model->lockcut_email(set_value('event_user_id'), set_value('event_lockcut_date'), 'cancel');
				}
				else
				{
					$fields['event_lockcut_service'] = set_value('event_lockcut_service');
					$fields['event_lockcut_date'] = human_to_unix(set_value('event_lockcut_date'));
					
					if(set_value('event_lockcut_service'))
					{
						// Send Email
	                	$this->load->model('email_model');
	                	$this->email_model->lockcut_email(set_value('event_user_id'), set_value('event_lockcut_date'), 'request');
					}
				}
				
				$this->load->model('event_model');
				
				switch(set_value('action'))
				{
					case 'add':
						$fields['event_created_date'] = now();
						$fields['event_start_date'] = now();
						$auction_id = $this->event_model->create($fields);
						
						return $auction_id;
					break;
					case 'edit':
						$update = $this->event_model->update($fields, $update_auction_id);
						
						
		                // Update All Lots For This Event Get Event Type Id Only Update For Onsite - Dual
		                $type = $this->event_model->get_event_type_id($update_auction_id);
						
						$check_lot = $this->lot_model->get_lot_by_event_id($update_auction_id);
	                
		                if($check_lot) {
	                	
		                	if($type['event_event_type_id'] != 1) {
								$lfields['lot_end_date'] = $fields['event_end_date'];
								$lfields['lot_seller'] = $seller_id;
		            			$this->lot_model->update_all_lots($lfields, $update_auction_id);

							}
		                }

						if($update)
						{
							return (int) $update_auction_id;
						}
						else
						{
							return 'Error Updating';
						}
						
					break;
				}
			}
			
	  }
	  
	  function get_max_bids($auction_id)
	  {
	  		
			$query = $this->db->select('
					lots.lot_id,
					lots.lot_number,
					lots.lot_name,
					bids_proxy.proxy_user_id,
					bids_proxy.proxy_lot_id,
					bids_proxy.proxy_bid,
					users.user_id,
					users.user_first_name,
					users.user_last_name
				')
				->where('lots.lot_event_id', $auction_id)
				->where('bids_proxy.proxy_bid !=', 0)
				->join('bids_proxy', 'bids_proxy.proxy_lot_id = lots.lot_id', 'left')
				->join('users', 'users.user_id = bids_proxy.proxy_user_id', 'left')
	  			->get('lots');
			
		  		if($query->num_rows() > 0)
		  		{
					echo json_encode($query->result_array());
		  		}
		  		else
		  		{
		  			return FALSE;
		  		}
	  }
	  
	  function get_lot_amounts($auction_id)
	  {
	  		
			$query = $this->db->select('
					lots.lot_id,
					lots.lot_number,
					lots.lot_name,
					lots.lot_amount,
					users.user_id,
					users.user_first_name,
					users.user_last_name
				')
				->where('lots.lot_event_id', $auction_id)				
				->join('users', 'users.user_id = lots.lot_buyer', 'left')
	  			->get('lots');
			
		  		if($query->num_rows() > 0)
		  		{
					echo json_encode($query->result_array());
		  		}
		  		else
		  		{
		  			return FALSE;
		  		}
	  }
	  
	  
	  function get_auction_sellers()
	  {
	  	
  			$query = $this->db->select('user_id, user_company_name, user_first_name, user_last_name')
			->where('user_seller', 1)
			->where('user_active', 1)
			->where('user_deleted', 0)
			->order_by('user_company_name', 'asc')
			->order_by('user_last_name', 'asc')
			->get('users');
			
			$result_arr = array();
			
  			if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
	
					if( ! empty($row['user_company_name']))
					{
						$display = '#' . $row['user_id'] . '-' . $row['user_company_name'] . '(' . $row['user_last_name'] . ', ' . $row['user_first_name'] . ')';
					}
					else
					{
						$display = '#' . $row['user_id'] . '-' . $row['user_last_name'] . ', ' . $row['user_first_name'];
					}
					
					$result_arr[$row['user_id']] = $display;
				}
				
				return $result_arr;
			}
			else
			{
				return array();
			}
		
	  }
	  
	  function get_auction_types()
	  {
	  	
  			$query = $this->db->get('event_types');
			
			$result_arr = array();
			
  			if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
					
					$result_arr[$row['event_type_id']] = $row['event_type_name'];
				}
				
				return $result_arr;
			}
			else
			{
				return array();
			}
		
	  }
	  
	  
	  function get_auction_categories()
	  {
	  	
  			$query = $this->db->get('event_categories');
			
			$result_arr = array();
			
  			if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
					
					$result_arr[$row['event_category_id']] = $row['event_category_name'];
				}
				
				return $result_arr;
			}
			else
			{
				return array();
			}
		
	  }
	  
	  function get_auction_auctioneers()
	  {
	  	
  			$query = $this->db->select('user_id, user_role_id, user_first_name, user_last_name')
			->where('user_role_id <=', 2)
			->order_by('user_last_name', 'asc')
			->get('users');
			
			$result_arr = array();
			
  			if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
					
					$result_arr[$row['user_id']] = $row['user_last_name'] . ', '  . $row['user_first_name'];
				}
				
				return $result_arr;
			}
			else
			{
				return array();
			}
		
	  }  

	  function get_auction_status()
	  {
	  	
			$query = $this->db->get('status_types');
		
			$result_arr = array();
		
			if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
				
					$result_arr[$row['status_type_id']] = $row['status_type_name'];
				}
			
				return $result_arr;
			}
			else
			{
				return array();
			}
		
	  }
	  
	  function get_lot_count($id)
	  {
	  	  
		    $query = $this->db->select('COUNT(lot_event_id) as total')
		    ->where('lot_event_id', $id)
			->get('lots');
          
			if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
			
					$result_arr = $row;
				}
		
				return $result_arr;
			}
			else
			{
				return FALSE;
			}
		
	  }
	  
	  
  /* =================================================================================
  * LOTS
  * ================================================================================= */  


	  function get_lots($id, $type = NULL)
	  {
	  		
	  		// Type of Query
	  		if( ! empty($type))
	  		{
	  			switch($type)
	  			{
	  				case 'trash':
				  		$this->datatables->select('lot_id, lot_id as id, lot_number, lot_tag, lot_name');
				        $this->datatables->unset_column('lot_id');
				        $this->datatables->from('lots');
						$this->datatables->where('lot_event_id', $id);
	  					$this->datatables->add_column('Actions', get_lot_recover_buttons('$1'), 'lot_id');
	  					$this->datatables->where('lot_deleted', 1);
	  				break;
	  				case 'sold':
				  		$this->datatables->select('lot_id, lot_id as id, lot_number, lot_name, lot_amount, users.user_first_name, users.user_last_name');
				        $this->datatables->unset_column('lot_id');
				        $this->datatables->from('lots');
						$this->datatables->where('lot_event_id', $id);
	  					$this->datatables->add_column('Actions', get_lot_sold_buttons('$1'), 'lot_id');
	  					$this->datatables->where('lot_sold', 1);
						$this->datatables->join('users', 'users.user_id = lots.lot_buyer', 'left');
	  				break;
	  				case 'deactive':
				  		$this->datatables->select('lot_id, lot_id as id, lot_number, lot_name, lot_amount, users.user_first_name, users.user_last_name');
				        $this->datatables->unset_column('lot_id');
				        $this->datatables->from('lots');
						$this->datatables->where('lot_event_id', $id);
	  					$this->datatables->add_column('Actions', get_lot_active_buttons('$1'), 'lot_id');
	  					$this->datatables->where('lot_active', 0);
						$this->datatables->join('users', 'users.user_id = lots.lot_buyer', 'left');
	  				break;
	  				case 'all':
	  				default:
				  		$this->datatables->select('lot_id, lot_id as id, lot_number, lot_name, lot_sold, lot_amount');
				        $this->datatables->unset_column('lot_id');
				        $this->datatables->from('lots');
						$this->datatables->where('lot_event_id', $id);
	  					$this->datatables->add_column('Actions', get_lot_buttons('$1'), 'lot_id');
	  					$this->datatables->where('lot_active', 1);
	  					$this->datatables->where('lot_deleted', 0);
	  			}
	  		}
			
           echo $this->datatables->generate();
	  }
	  
	  function get_lot($id)
	  {
  
			$query = $this->db->select('lot_id, lot_event_id, lot_number, lot_name, lot_tag, lot_description, lot_seller, lot_buyer, lot_category_id, lot_hidden, lot_active, lot_sold, lot_amount, lot_end_date')
			->where('lot_id', $id)
			->limit(1)
	      	->get('lots');
    	
	      	if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
					
					if($row['lot_seller'] == 0)
					{
						$row['seller'] = $this->event_model->get_seller($row['lot_event_id']);
					}
					else
					{
						$row['seller'] = $row['lot_seller'];
					}
					
					$reserve = $this->event_model->get_max_bid($row['seller'], $row['lot_id']);
					
					$row['lot_reserve'] = $reserve['proxy_bid'];
					
					$result_arr = $row;
				}
		
				return $result_arr;
			}
			else
			{
				return FALSE;
			}
	
	  }
	  
	  
	  function get_lot_by_auction($id)
	  {
  
			$query = $this->db->select('lot_id, lot_event_id, lot_number, lot_name, lot_tag, lot_description, lot_seller, lot_buyer, lot_category_id, lot_hidden, lot_active, lot_sold, lot_amount, lot_end_date, events.event_name, events.event_buyer_premium, events.event_sales_tax, events.event_user_id')
			->where('lot_event_id', $id)
			->join('events', 'events.event_id = lots.lot_event_id', 'left')
			->limit(1)
	      	->get('lots');
    	
	      	if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
					
					if($row['lot_seller'] == 0)
					{
						$row['seller'] = $this->event_model->get_seller($row['lot_event_id']);
					}
					else
					{
						$row['seller'] = $row['lot_seller'];
					}
					
					$result_arr = $row;
				}
		
				return $result_arr;
			}
			else
			{
				return FALSE;
			}
	
	  }
	  
	  
	  function lot_update($data)
	  {
	  	
	        // Set Form Validation Rules
			$this->form_validation->set_rules('action', 'Action', 'trim|xss_clean');
			$this->form_validation->set_rules('crud_lot_id', 'LotID', 'trim|xss_clean');
			$this->form_validation->set_rules('crud_event_id', 'LotID', 'trim|xss_clean');
	        $this->form_validation->set_rules('lot_name', 'Lot Name', 'trim|xss_clean');
	      	$this->form_validation->set_rules('lot_number', 'Lot Number', 'trim|xss_clean');
			$this->form_validation->set_rules('lot_description', 'Lot Description', 'trim|xss_clean');
			$this->form_validation->set_rules('lot_category_id', 'Lot Category', 'trim|xss_clean');
			$this->form_validation->set_rules('lot_active', 'Lot Active', 'trim|xss_clean');
			$this->form_validation->set_rules('lot_hidden', 'Lot Hidden', 'trim|xss_clean');
			$this->form_validation->set_rules('lot_sold', 'Lot Sold', 'trim|xss_clean');
			$this->form_validation->set_rules('lot_amount', 'Lot Amount', 'trim|xss_clean');
			$this->form_validation->set_rules('lot_reserve', 'Lot Reserve', 'trim|xss_clean');
			$this->form_validation->set_rules('lot_seller', 'Lot Seller', 'trim|xss_clean');
			$this->form_validation->set_rules('lot_buyer', 'Lot Buyer', 'trim|xss_clean');
			$this->form_validation->set_rules('lot_end_date', 'Lot End Date', 'trim|xss_clean');
			
	        // Checks to see if Form data passes the validation
	        if( ! $this->form_validation->run())
	        {
				return validation_errors();
			}
			else
			{
				
				$fields['lot_name'] = set_value('lot_name');
				$fields['lot_event_id'] = set_value('crud_event_id');
				$fields['lot_seller'] = set_value('lot_seller');
				$fields['lot_buyer'] = set_value('lot_buyer');
				$fields['lot_number'] = set_value('lot_number');
				$fields['lot_description'] = set_value('lot_description');
				$fields['lot_category_id'] = set_value('lot_category_id');
				$fields['lot_active'] = set_value('lot_active');
				$fields['lot_hidden'] = set_value('lot_hidden');
				$fields['lot_sold'] = set_value('lot_sold');
				$fields['lot_amount'] = set_value('lot_amount');
				$fields['lot_end_date'] = set_value('lot_end_date');
				
				$update_lot_id = set_value('crud_lot_id');
				
				
				$max = $this->event_model->get_max_bid(set_value('lot_seller'), $update_lot_id);
				
				if($max == 0)
				{
					$pfields['proxy_user_id'] = set_value('lot_seller');
	   				$pfields['proxy_lot_id'] = $update_lot_id;
	   				$pfields['proxy_bid'] = set_value('lot_reserve');
				
					$this->event_model->create_proxy_bid($pfields);
				}
				else
				{
					$pfields['proxy_bid'] = set_value('lot_reserve');
					$this->event_model->update_proxy_bid($pfields, set_value('lot_seller'), $update_lot_id);
				}
				
				if($fields['lot_sold'] == 1)
				{
					$fields['lot_active'] = 0;
				}
				
				$this->load->model('lot_model');
				
				switch(set_value('action'))
				{
					case 'add':
						$fields['lot_created_date'] = now();
						
						$end_date = $this->event_model->get_end_date(set_value('crud_event_id'));
						$fields['lot_end_date'] = $end_date['event_end_date'];
						
						$lot_id = $this->lot_model->create($fields);
						$bid_fields['bid_event_id'] = set_value('crud_event_id');
						$bid_fields['bid_lot_id'] = $update_lot_id;
						$bid_fields['bid_amount'] = 0;
						$bid_fields['bid_created_date'] = now();
				   	  	$bid_id = $this->event_model->create_bid($bid_fields);
						
						return $lot_id;
					break;
					case 'edit':
						$update = $this->lot_model->update($fields, $update_lot_id);

						if($update)
						{
							return (int) $update_lot_id;
						}
						else
						{
							return 'Error Updating';
						}
						
					break;
				}
				
				
			}
			
	  }
	  
	  
	  function get_lot_images($id)
	  {
  		    $this->load->helper('file');
	      	
			$query = $this->db->select('lot_image_id, ,lot_image_event_id, lot_image_lot_id, lot_image_name, lot_image_file, lot_image_main')
			->where('lot_image_lot_id', $id)
	      	->get('lot_images');
    	
	      	if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
					
					if( ! empty($row['lot_image_file']))
					{
						$image_info = get_file_info($_SERVER['DOCUMENT_ROOT'] . "/dev/auction/images/" . $row['lot_image_file']);
						$row['image_size'] = get_byte_size($image_info['size']);
					}
					else
					{
						$row['image_size'] = 0;
					}
					
					$result_arr[] = $row;
				}
		
				echo json_encode($result_arr);
			}
			else
			{
				return FALSE;
			}
	
	  }
	  
	  function get_lot_auto_number($id)
	  {
		  	$this->load->model('lot_model');
		
			$lot_number = $this->lot_model->get_lot_number($id);

			if( ! $lot_number)
			{
				$auto_number = 101;
			}
			else
			{
				$auto_number = $lot_number['lot_number'] + 1;
			}
		
			echo json_encode($auto_number);
	  }
	  
	  
	  function get_lot_categories()
	  {
	  	
  			$query = $this->db->get('lot_categories');
			
			$result_arr = array();
			
  			if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
					
					$result_arr[$row['lot_category_id']] = $row['lot_category_name'];
				}
				
				return $result_arr;
			}
			else
			{
				return array();
			}
		
	  }
	  
	  function get_lot_data($lot_id)
	  {
	  		 $lot = $this->get_lot($lot_id);
	  		 echo json_encode($lot);
	  }
  
	  function lot_crud($data)
	  {
			 $lot = $this->lot_update($data);
			 echo json_encode($lot);
	  }

	  function lot_crud_inline($data)
	  {
			 if($data['columnName'] == 'ID')
			 {

			 }

			 if($data['columnName'] == 'Lot Number')
			 {
			 	$fields['lot_number'] = $data['value'];
			 }

			 if($data['columnName'] == 'Name')
			 {
			 	$fields['lot_name'] = $data['value'];
			 }

			 if($data['columnName'] == 'Sold')
			 {
			 	$fields['lot_sold'] = $data['value'];
			 }

			 if($data['columnName'] == 'Amount')
			 {
			 	$fields['lot_amount'] = $data['value'];
			 }

			 $fields['crud_lot_id'] = $data['id'];
			 $fields['action'] = 'edit';

			 $this->lot_update($fields);
			 echo $data['value'];
	  }

	  function lot_delete($lot_id)
	  {
			$this->load->model('lot_model');
			$this->lot_model->delete($lot_id);
      
	  }
  
	  function lot_recover($lot_id)
	  {
			$this->load->model('lot_model');
			$this->lot_model->recover($lot_id);
      
	  }
  
	  function lot_reactivate($lot_id)
	  {
			$this->load->model('lot_model');
			$this->lot_model->reactivate($lot_id);
      
	  }
	  
	  function lot_cancel_sale($lot_id)
	  {
			$this->load->model('lot_model');
			$this->lot_model->cancel_sale($lot_id);
      
	  }
	  
	  function lot_image_crud($data)
	  {
          
		  $this->load->model('lot_model');
		  
		  if($data['images'])
          {
          		foreach($data['images'] as $image_id)
          		{

          			$this->lot_model->delete_image($image_id);
          		}
          }
		  
		  $lot_image_id = $data['featured'];
		  $this->lot_model->main_image($data['images_lot_id'], $lot_image_id);	
		
	  }
	  
	  function get_auction_buyers()
	  {
	  	
  			$query = $this->db->select('user_id, user_company_name, user_first_name, user_last_name')
			->where('user_buyer', 1)
			->where('user_active', 1)
			->where('user_deleted', 0)
			->get('users');
			
			$result_arr = array();
			
  			if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
	
					if( ! empty($row['user_company_name']))
					{
						$display = '#' . $row['user_id'] . '-' . $row['user_company_name'] . '(' . $row['user_first_name'] . ' ' . $row['user_last_name'] . ')';
					}
					else
					{
						$display = '#' . $row['user_id'] . '-' . $row['user_first_name'] . ' ' . $row['user_last_name'];
					}
					
					$result_arr[$row['user_id']] = $display;
				}
				
				return $result_arr;
			}
			else
			{
				return array();
			}
		
	  }
	  
	
	  
/* =================================================================================
* Users
* ================================================================================= */  
	  
	  function get_users($type = NULL)
	  {
			$this->datatables->select('user_id, user_id as id, user_first_name, user_last_name, user_email, user_phone, user_buyer, user_seller, user_company_name');
	        $this->datatables->unset_column('user_id');
	        $this->datatables->from('users');
			
			if( ! empty($type))
			{
				
				switch($type)
				{
					case 'buyers':
						$this->datatables->add_column('Actions', get_user_buttons('$1'), 'user_id');
						$this->datatables->where('user_buyer', 1);
						$this->datatables->where('user_active', 1);
						$this->datatables->where('user_deleted', 0);
					break;
					case 'sellers':
						$this->datatables->add_column('Actions', get_user_buttons('$1'), 'user_id');
						$this->datatables->where('user_seller', 1);
						$this->datatables->where('user_active', 1);
						$this->datatables->where('user_deleted', 0);
					break;
					case 'auctioneers':
						$this->datatables->add_column('Actions', get_user_buttons('$1'), 'user_id');
						$this->datatables->where('users.user_role_id <=', 2);
						$this->datatables->where('user_active', 1);
						$this->datatables->where('user_deleted', 0);
					break;
					case 'trash':
						$this->datatables->add_column('Actions', get_user_recover_buttons('$1'), 'user_id');
						$this->datatables->where('user_active', 1);
						$this->datatables->where('user_deleted', 1);
					break;
					case 'deactive':
						$this->datatables->add_column('Actions', get_user_active_buttons('$1'), 'user_id');
						$this->datatables->where('user_active', 0);
						$this->datatables->where('user_deleted', 0);
					break;
					case 'all':
					default:
						$this->datatables->add_column('Actions', get_user_buttons('$1'), 'user_id');
						$this->datatables->where('user_active', 1);
						$this->datatables->where('user_deleted', 0);
				}
				
			}
			
			
			
	        echo $this->datatables->generate();
	  }
  
	  
	  function get_user_data($user_id)
	  {
	  	  $user = $this->get_user($user_id);
	  	  echo json_encode($user);
	  }
	  
	  function user_crud($data)
	  {
  		 $user = $this->user_update($data);
  		 echo json_encode($user);
	  }

	  function user_delete($user_id)
	  {
  		$this->load->model('user_model');
  		$this->user_model->delete($user_id);
	  }
	  
	  function user_recover($user_id)
	  {
  		$this->load->model('user_model');
		$this->user_model->recover($user_id);
	      
	  }
	  
	  function user_reactivate($user_id)
	  {
  		$this->load->model('user_model');
		$this->user_model->reactivate($user_id);
	  }
	  
	  
	  function get_user($id)
      {
	      		      	
	      	$query = $this->db->select('
				user_id, 
				user_company_name,
				user_first_name, 
				user_last_name, 
				user_buyer, 
				user_seller, 
				user_role_id,
				user_email,
				user_phone,
				user_address,
				user_city,
				user_state,
				user_zip,
				user_county, 
				user_resell,
				user_active,
				user_username
			')
			->where('user_id', $id)
			->limit(1)
	      	->get('users');
	      	
	      	if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
	
					$result_arr = $row;				
				}
				
				return $result_arr;
			}
			else
			{
				return FALSE;
			}
      }
	  
	  
	  
	  function get_user_roles()
	  {
	  	
  			$query = $this->db->get('users_roles');
			
			$result_arr = array();
			
  			if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{
	
					$result_arr[$row['user_role_id']] = $row['user_role_name'];	
				}
				
				return $result_arr;
			}
			else
			{
				return array();
			}
		
	  }
	  
	  
	  function user_update($data)
	  {
	  	
	        // Set Form Validation Rules
			$this->form_validation->set_rules('action', 'Action', 'trim|xss_clean');
			$this->form_validation->set_rules('crud_user_id', 'UserID', 'trim|xss_clean');
	        $this->form_validation->set_rules('user_first_name', 'First Name', 'trim|xss_clean');
	        $this->form_validation->set_rules('user_last_name', 'Last Name', 'trim|xss_clean');
			$this->form_validation->set_rules('user_username', 'Username', 'trim|xss_clean|max_length[20]|callback_username_check');
	        $this->form_validation->set_rules('user_password', 'Password', 'trim|xss_clean|sha1');
	        $this->form_validation->set_rules('user_phone', 'Phone', 'trim|xss_clean');
	        $this->form_validation->set_rules('user_email', 'Email', 'trim|valid_email|xss_clean');
	        $this->form_validation->set_rules('user_address', 'Address', 'trim|xss_clean');
	        $this->form_validation->set_rules('user_city', 'City', 'trim|xss_clean');
	        $this->form_validation->set_rules('user_state', 'State', 'trim|xss_clean');
	        $this->form_validation->set_rules('user_zip', 'Zip Code', 'trim|xss_clean');
			$this->form_validation->set_rules('user_county', 'County', 'trim|xss_clean');
			$this->form_validation->set_rules('user_role_id', 'User Role Level', 'trim|xss_clean');
			$this->form_validation->set_rules('user_buyer', 'Buyer', 'trim|xss_clean');
			$this->form_validation->set_rules('user_resell', 'Resell Number', 'trim|xss_clean');
	        $this->form_validation->set_rules('user_seller', 'Seller', 'trim|xss_clean');
			$this->form_validation->set_rules('user_company_name', 'Company Name', 'trim|xss_clean');
			$this->form_validation->set_rules('user_active', 'User Active', 'trim|xss_clean');
			
			
	        // Checks to see if Form data passes the validation
	        if( ! $this->form_validation->run())
	        {
				return validation_errors();
			}
			else
			{
				
				switch(set_value('action'))
				{
					case 'add':
						
						if(set_value('user_first_name') == '')
						{
							$first_name = 'Guest';
						}
						else
						{
							$first_name = set_value('user_first_name');
						}
						
						if(set_value('user_last_name') == '')
						{
							$last_name = 'User';
						}
						else
						{
							$last_name = set_value('user_last_name');
						}
						
						if(set_value('user_username'))
						{
							$username = set_value('user_username');
						}
						else
						{
							$first_letter = substr($first_name, 0, 1);
							$username = strtolower($first_letter) . strtolower($last_name) . '1';
						}
				
						if(set_value('user_password'))
						{
							$password = set_value('user_password');
						}
						else
						{
							$pass_str = random_string('alnum', 6);
							$password = $this->encrypt->sha1($pass_str);
						}
						
						$fields['user_created_date'] = now();
						
					break;
					case 'edit':
	                	$first_name = set_value('user_first_name');
	                	$last_name = set_value('user_last_name');
						$username = set_value('user_username');
						$password = set_value('user_password');
					break;
				}
				
				
				$fields['user_role_id'] = set_value('user_role_id');	
				$fields['user_buyer'] = set_value('user_buyer');
				$fields['user_resell'] = set_value('user_resell');
				$fields['user_seller'] = set_value('user_seller');
				$fields['user_company_name'] = set_value('user_company_name');
                $fields['user_first_name'] = $first_name;
                $fields['user_last_name'] = $last_name;
                $fields['user_username'] = $username;
                $fields['user_password'] = $password;
                $fields['user_phone'] = set_value('user_phone');
                $fields['user_email'] = set_value('user_email');
                $fields['user_address'] = set_value('user_address');
                $fields['user_city'] = set_value('user_city');
                $fields['user_state'] = set_value('user_state');
                $fields['user_zip'] = set_value('user_zip');
				$fields['user_county'] = set_value('user_county');
                $fields['user_active'] = set_value('user_active');	
				
				$update_user_id = set_value('crud_user_id');
				
				$this->load->model('user_model');
				
				switch(set_value('action'))
				{
					case 'add':
						$user_id = $this->user_model->create($fields);
						return $user_id;
					break;
					case 'edit':
						$update = $this->user_model->update($fields, set_value('crud_user_id'));
						
						if($update)
						{
							return (int) $update_user_id;
						}
						else
						{
							return 'Error Updating';
						}
						
					break;
				}
				
				
			}
			
	  }
	  
	  
	  function get_user_winning_lots($user_id)
	  {
	  	
		    $query = $this->db->select('
				users.user_id,
				users.user_first_name,
				users.user_last_name,
				lots.lot_id,
				lots.lot_number,
				lots.lot_name,
				lots.lot_amount,
				events.event_name
			')
			->where('user_id', $user_id)
			->join('lots', 'lots.lot_buyer = users.user_id', 'left')
			->join('events', 'events.event_id = lots.lot_event_id', 'left')
  			->get('users');
		
	  		if($query->num_rows() > 0)
	  		{
				echo json_encode($query->result_array());
	  		}
	  		else
	  		{
	  			return FALSE;
	  		}
	  }
	  
	  function get_user_sold_lots($user_id)
	  {
	  	
		    $query = $this->db->select('
				users.user_id,
				users.user_first_name,
				users.user_last_name,
				lots.lot_id,
				lots.lot_number,
				lots.lot_name,
				lots.lot_amount,
				events.event_name
			')
			->where('user_id', $user_id)
			->join('lots', 'lots.lot_seller = users.user_id', 'left')
			->join('events', 'events.event_id = lots.lot_event_id', 'left')
  			->get('users');
		
	  		if($query->num_rows() > 0)
	  		{
				echo json_encode($query->result_array());
	  		}
	  		else
	  		{
	  			return FALSE;
	  		}
	  }
	  
	  function get_username($username)
	  {
	     
	        $query = $this->db->select('user_username')
	          ->where('user_username', $username)
	          ->limit(1)
	  		  ->get('users');
		
	  		if($query->num_rows() > 0)
	  		{
	  			foreach ($query->result_array() as $row)
	  			{
	  				$result_arr = $row;
	  			}
			
	  			return $result_arr;
	  		}
	  		else
	  		{
	  			return FALSE;
	  		}

	  }
	  
  	  function username_check($str)
  	  {
	    
	  	    $username = $this->get_username($str);
		
	  		if ($username)
	  		{
	  			$this->form_validation->set_message('username_check', 'The %s is already in use');
	  			return FALSE;
	  		}
	  		else
	  		{
	  			return TRUE;
	  		}
  	  }
	  
	  
	  
/* =================================================================================
* Reports
* ================================================================================= */  

    function get_reports($data = NULL, $report_type = 'auctions')
	{
		
		
		switch($report_type)
		{
			case 'auctions':
				$this->db->select('events.*, users.*, lots.*, event_types.event_type_name, 
				seller.user_company_name as seller_company_name, seller.user_id as seller_user_id,
				COUNT(lots.lot_id) as num_lots, SUM(lots.lot_amount_collected) as total_amount_lots, SUM(lots.lot_tax_collected) as total_tax_lots, SUM(lots.lot_premium_collected) as commission');
		
				if( ! empty($data))
				{
					if( ! empty($data['user_id']))
					{
						$this->db->where('users.user_id', $data['user_id']);
					}
					
					if( ! empty($data['event_type_id']))
					{
						$this->db->where('event_event_type_id', $data['event_type_id']);
					}
					
					if( ! empty($data['start_date']) && ! empty($data['end_date']))
					{
						$this->db->where('event_end_date >=', human_to_unix($data['start_date']));
						$this->db->where('event_end_date <=', human_to_unix($data['end_date']));
					}
				
				}
				
				$this->db->join('event_types', 'event_types.event_type_id = events.event_event_type_id', 'left');
				$this->db->join('lots', 'lots.lot_event_id = events.event_id', 'left');
				$this->db->join('users', 'users.user_id = event_auctioneer_id', 'left');
				$this->db->join('users as seller', 'seller.user_id = events.event_user_id');
				$this->db->group_by('events.event_id', 'desc');
				$this->db->order_by('events.event_end_date', 'desc');
				$query = $this->db->get('events');
				
			break;
			case 'lots':
				
				$this->db->select('events.*, users.*, seller.user_first_name as seller_first_name, seller.user_last_name as seller_last_name, auctioneer.user_first_name as auctioneer_first_name, auctioneer.user_last_name as auctioneer_last_name, bids.*, lots.*, , event_types.event_type_name, SUM(lots.lot_amount_collected) as total_amount, SUM(lots.lot_tax_collected) as total_tax, SUM(lots.lot_premium_collected) as commission');
				
				if( ! empty($data))
				{
					if( ! empty($data['user_id']))
					{
						$this->db->where('event_auctioneer_id', $data['user_id']);
					}
					
					if( ! empty($data['event_type_id']))
					{
						$this->db->where('event_event_type_id', $data['event_type_id']);
					}
					
					if( ! empty($data['start_date']) && ! empty($data['end_date']))
					{
						$this->db->where('lot_end_date >=', human_to_unix($data['start_date']));
						$this->db->where('lot_end_date <=', human_to_unix($data['end_date']));
					}
				
				}
				
				$this->db->join('events', 'events.event_id = lots.lot_event_id', 'left');
				$this->db->join('event_types', 'event_types.event_type_id = events.event_event_type_id', 'left');
				$this->db->join('bids', 'bids.bid_lot_id = lots.lot_id', 'left');
				$this->db->join('users', 'users.user_id = bids.bid_user_id', 'left');
				$this->db->join('users as seller', 'seller.user_id = lots.lot_seller', 'left');
				$this->db->join('users as auctioneer', 'auctioneer.user_id = events.event_auctioneer_id', 'left');
	        	$this->db->group_by('lots.lot_id', 'desc');
	        	$this->db->order_by('lots.lot_end_date', 'desc');
	        	$query = $this->db->get('lots');
        		
			break;
		}
		
		
			
		if($query->num_rows() > 0)
		{
	
			// return result set as an associative array
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
		
	}
	
	
	
/* =================================================================================
* Invoice
* ================================================================================= */  
	
    
	
	function get_invoices($type = NULL, $event_id = 0, $start_date = 0, $end_date = 0)
	{
		
		$this->datatables->select("invoice_id, invoice_id as id, invoice_number, from_unixtime(invoice_date_created), invoice_total, users.user_first_name, users.user_last_name");
        $this->datatables->unset_column('invoice_id');
        $this->datatables->from('invoices');
		
		// Type of Query
		if( ! empty($type))
		{
			switch($type)
			{
				case 'paid':
					$this->datatables->add_column('Actions', get_invoice_buttons('$1'), 'invoice_id');
					if($event_id != 0)
					{
						$this->datatables->where('invoice_event_id', $event_id);
					}
					$this->datatables->where('invoice_paid', 1);
					$this->datatables->where('invoice_deleted', 0);
				break;
				case 'unpaid':
					$this->datatables->add_column('Actions', get_invoice_buttons('$1'), 'invoice_id');
					if($event_id != 0)
					{
						$this->datatables->where('invoice_event_id', $event_id);
					}
					$this->datatables->where('invoice_paid', 0);
					$this->datatables->where('invoice_deleted', 0);
				break;
				case 'trash':
					$this->datatables->add_column('Actions', get_invoice_recover_buttons('$1'), 'invoice_id');
					if($event_id != 0)
					{
						$this->datatables->where('invoice_event_id', $event_id);
					}
					$this->datatables->where('invoice_deleted', 1);
				break;
				case 'dates':
					$sdate = urldecode($start_date);
					$edate = urldecode($end_date);
					$start_date_format = human_to_unix($sdate);
					$end_date_format = human_to_unix($edate);
					
					$this->datatables->add_column('Actions', get_invoice_buttons('$1'), 'invoice_id');
					if($event_id != 0)
					{
						$this->datatables->where('invoice_event_id', $event_id);
					}
					$this->datatables->where('invoice_date_created >=', $start_date_format);
					$this->datatables->where('invoice_date_created <=', $end_date_format);
					$this->datatables->where('invoice_deleted', 0);
				break;
				case 'all':
				default:
					$this->datatables->add_column('Actions', get_invoice_buttons('$1'), 'invoice_id');
					if($event_id != 0)
					{
						$this->datatables->where('invoice_event_id', $event_id);
					}
					$this->datatables->where('invoice_deleted', 0);
			}
		}
		
		$this->datatables->join('users', 'users.user_id = invoices.invoice_buyer_id', 'left');

        echo $this->datatables->generate();
	}
	
	
	function get_invoice($id)
	{
		
	      	$query = $this->db->select('
				invoice_id, 
				invoice_event_id,
				invoice_number,
				invoice_seller_id, 
				invoice_buyer_id,
				invoice_sub_total, 
				invoice_total, 
				invoice_tax, 
				invoice_premium, 
				invoice_paid,
				invoice_date_created,
				invoice_notes
			')
			->where('invoice_id', $id)
			->limit(1)
	      	->get('invoices');
      	
	      	if($query->result_array())
			{
				foreach($query->result_array() as $row)
				{

					$result_arr = $row;
				}
			
				return $result_arr;
			}
			else
			{
				return FALSE;
			}
	}
	
	
	function get_invoice_lots($event_id, $user_id = 0)
	{
		
		$query = $this->db->select('lot_id, lot_number, lot_name, lot_description, lot_amount')
		->where('lot_event_id', $event_id)
		->where('lot_buyer', $user_id)
		->where('lot_sold', 1)
		->get('lots');
			
		if($query->num_rows() > 0)
		{
			// return result set as an associative array
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	
	function invoice_create_by_lot($number, $event_id, $seller, $buyer, $sub_total, $total, $tax, $premium, $date)
	{
  	    $fields['invoice_number'] = $number;
		$fields['invoice_event_id'] = $event_id;
		$fields['invoice_seller_id'] = $seller;
		$fields['invoice_buyer_id'] = $buyer;
		$fields['invoice_sub_total'] = $sub_total;
		$fields['invoice_premium'] = $premium;
		$fields['invoice_tax'] = $tax;
		$fields['invoice_total'] = $total;
		$fields['invoice_date_created'] = $date;
		
		$this->db->insert('invoices', $fields);
					
  		return $this->db->insert_id();  
	}
	
	
	function get_invoice_number()
    {
    	$this->db->select('invoice_number');
		$this->db->select_max('invoice_number');
		$this->db->group_by('invoice_number', 'desc');
		$query = $this->db->get('invoices');

		if($query->num_rows() > 0)
		{
	
			foreach($query->result_array() as $row)
			{
				$output = $row;
			}
		
			return $output;

		}
		else
		{
			return FALSE;
		}
    }
	
	
	function get_invoice_auctions()
	{
		
		$query = $this->db
		->select('event_id, event_name')
		->get('events');
		
		$result_arr = array();
		
		if($query->result_array())
		{
			foreach($query->result_array() as $row)
			{

				$result_arr[$row['event_id']] = $row['event_id'] . '-' . $row['event_name'];
			}
			
			return $result_arr;
		}
		else
		{
			return array();
		}
		
	}
	
	
	function payment($event_id, $billingid, $amount, $lot_id, $lot_paid, $buyer_id)
	{				
		
		if($buyer_id != 0 || $amount != 0 || $lot_paid == 0)
		{
	
			$this->load->model('payment_model');
			$cfields['amount'] = $amount;
			$cfields['billingid'] = $billingid;
			$buyer_charge = $this->payment_model->charge($cfields, 'sale');

			// For Buyer
			switch($buyer_charge['status'])
			{
				case 'approved':
				case 'accepted':
				$payment_fields['payment_trans_id'] = $buyer_charge['trans_id'];
				$payment_fields['payment_billing_id'] = $buyer_charge['billing_id'];
				$payment_fields['payment_lot_id'] = $lot_id;
				$payment_fields['payment_status'] = $buyer_charge['status'];
				$payment_fields['payment_response'] = $buyer_charge['response'];
				$payment_fields['payment_user_id'] = $lot['bid_user_id'];
				$payment_fields['payment_type'] = 'sale';
				$buyer_purchase_message = 'Your credit card was successfully charged';
				$this->payment_model->create($payment_fields);
				break;
				case 'decline':
					$buyer_purchase_message = 'Your Card was Declined';
				break;
				case 'rejected':
					$buyer_purchase_message = 'Your Card was Rejected';
				break;
				case 'baddata':
					$buyer_purchase_message = 'Invalid Card Information';
				break;
				default:
					$buyer_purchase_message = 'Card Error';
			}
			
		}
		else
		{
			$buyer_purchase_message = '';
		}
		
		echo json_encode($buyer_purchase_message);
		
	}
	
	
    function invoice_delete($id)
    {
   	
   		$this->db->where('invoice_id', $id);
   	
	   	$fields = array(
	       'invoice_deleted' => 1
	    );

        $this->db->update('invoices', $fields);
		$this->db->limit(1);
    }
	
    function invoice_recover($id)
    {
   	
   		$this->db->where('invoice_id', $id);
   	
	   	$fields = array(
	       'invoice_deleted' => 0
	    );

        $this->db->update('invoices', $fields);
		$this->db->limit(1);
    }
	
	
	
/* =================================================================================
* Live Sale
* ================================================================================= */  
	
	
	function get_dual_auctions()
	{
		
		$query = $this->db
		->select('event_id, event_name')
		->where('event_event_type_id', 3)
		->get('events');
		
		$result_arr = array();
		
		if($query->result_array())
		{
			foreach($query->result_array() as $row)
			{

				$result_arr[$row['event_id']] = $row['event_id'] . '-' . $row['event_name'];
			}
			
			return $result_arr;
		}
		else
		{
			return array();
		}
		
	}
	
	
	function get_auction_lots($event_id)
	{
		
		$query = $this->db->select('lot_id, lot_event_id, lot_name, lot_number')
		->where('lot_event_id', $event_id)
		->where('lot_active', 1)
		->where('lot_deleted', 0)
		->get('lots');
		
		$result_arr = array();
		
		if($query->result_array())
		{
			foreach($query->result_array() as $row)
			{

				$result_arr[$row['lot_id']] = $row['lot_number'] . '-' . $row['lot_name'];
			}
			
			return $result_arr;
		}
		else
		{
			return array();
		}
		
	}
	
	
	
	function bid_status($event_id, $lot_id)  //lot id 
	{
		
		$this->load->model('event_model');
		$this->load->model('lot_model');
		
		$lot = $this->lot_model->get_lot($lot_id);
		
		$bid = $this->event_model->get_bid_by_lot_id($lot_id);
		
		$bfields['bid_status'] = '';
		
		$this->event_model->update_bid_status($bfields, $bid['bid_id'], $event_id, $lot_id);

		if($lot['lot_active'] == 1)
		{
			$fields['bid_status'] = 'open';
	   		$this->event_model->update_bid($fields, $bid['bid_id']);
	   		
		}
		
		
	}
	
	function get_live_pagination($event_id, $lot_id, $type)
	{

      		
		$this->db->select('lot_id');
		
		switch($type)
		{
			case 'previous':
				$this->db->order_by('lot_id', 'desc');
				$query = $this->db->get_where('lots', array('lot_event_id' => $event_id, 'lot_id <' => $lot_id, 'lot_deleted' => 0), 1, 0);
			break;
			case 'next':
				$this->db->order_by('lot_id', 'asc');
  				$query = $this->db->get_where('lots', array('lot_event_id' => $event_id, 'lot_id >' => $lot_id, 'lot_deleted' => 0), 1, 0);
			break;
		}
		
		
		if($query->num_rows() > 0)
		{
			
			foreach($query->result_array() as $row)
			{
				$result_arr = $row;	
			}
			
			return $row;
			
		}	
		else
		{
			return FALSE;
		}

	}
	
/* =================================================================================
* Schedule
* ================================================================================= */  

    function get_schedule($data = NULL, $export = false)
	{
		
		if($export)
		{
			$this->db->select('
				events.event_id as ID,
				event_types.event_type_name as Type,
				events.event_name as Name,
				from_unixtime(events.event_end_date) as Date,
				events.event_address as Address,
				events.event_city as City,
				events.event_state as State,
				events.event_zip as Zip,
				events.event_phone as Phone,
				count(lots.lot_id) as Lots
			');
		}
		else
		{
			$this->db->select('
				events.event_id,
				events.event_name,
				events.event_end_date,
				events.event_event_type_id,
				events.event_status_type_id,
				events.event_auctioneer_id,
				events.event_address,
				events.event_city,
				events.event_state,
				events.event_zip,
				events.event_phone,
				users.user_id,
				users.user_first_name,
				users.user_last_name,
				event_types.event_type_name
			');
		 }
	
			if( ! empty($data))
			{
				if( ! empty($data['user_id']))
				{
					$this->db->where('events.event_auctioneer_id', $data['user_id']);
				}
				
				
				if( ! empty($data['start_date']) && ! empty($data['end_date']))
				{
					$this->db->where('event_end_date >=', human_to_unix($data['start_date']));
					$this->db->where('event_end_date <=', human_to_unix($data['end_date']));
				}
			
			}
			
			$this->db->join('event_types', 'event_types.event_type_id = events.event_event_type_id', 'left');
			$this->db->join('users', 'users.user_id = event_auctioneer_id', 'left');
			
			if($export)
			{
				$this->db->join('lots', 'lots.lot_event_id = events.event_id', 'left');
				$this->db->group_by('events.event_id', 'asc');
			}
			
			$this->db->order_by('events.event_end_date', 'asc');
			$query = $this->db->get('events');
				
			
			if($query->num_rows() > 0)
			{
		
				if($export)
				{
					
					$this->load->dbutil();
					$delimiter = ";";
					$newline = "\r\n";
					
					return $this->dbutil->csv_from_result($query, $delimiter, $newline);
				}
				else
				{
					return $query->result_array();
				}
			}
			else
			{
				return FALSE;
			}
		
	}
	
	
	function get_auctioneers_list()
	{
		
		$query = $this->db->where('user_role_id <=', 2)
		->order_by('user_last_name', 'asc')
		->get('users');
			
		if($query->num_rows() > 0)
		{
			// return result set as an associative array
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_event_types()
	{
		
		$query = $this->db->get('event_types');
			
		if($query->num_rows() > 0)
		{
			// return result set as an associative array
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}
      
}

/* End of file manage_model.php */
/* Location: ./application/models/manage_model.php */