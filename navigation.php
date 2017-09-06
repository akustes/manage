
	  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
  
          <!-- search form 
          <form action="" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search Not Functional Yet"/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
			<li><a href="<?= site_url('manage/dashboard')?>"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-tasks"></i> <span>Auctions</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<? if($current_page == 'Auctions' || $current_page == 'Lots'):?>
					<li class="dropdown-header" style="font-weight: bold; color: #fff; border-bottom: 2px solid #969696; border-top: 2px solid #969696;"><span class="glyphicon glyphicon-plus"></span> ADD</li>
					<li><a href="#" data-user-type="auction" data-toggle="modal" data-target="#auction-crud" data-action="add" title="Add Auction" data-backdrop="static">Auction</a></li>
					                <li><a href="#" data-user-type="onsite" data-toggle="modal" data-target="#auction-crud" data-action="add" title="Add Onsite Auction" data-backdrop="static"> Onsite</a></li>
					                <li><a href="#" data-user-type="online" data-toggle="modal" data-target="#auction-crud" data-action="add" title="Add Online Auction" data-backdrop="static"> Online</a></li>
									<li><a href="#" data-user-type="dual" data-toggle="modal" data-target="#user-crud" data-action="add" title="Add Dual Auction" data-backdrop="static">Dual</a></li>
				<li class="dropdown-header" style="font-weight: bold; color: #fff; border-bottom: 2px solid #969696; border-top: 2px solid #969696;"><span class="glyphicon glyphicon-th-list"></span> VIEW</li>
				<? endif?>
                <li><a href="<?= site_url('manage/auctions')?>">All Auctions</a></li>
				
				<li><a href="<?= site_url('manage/auctions/cancelled')?>"><i class="glyphicon glyphicon-ban-circle"></i> Cancelled</a></li>
				<li><a href="<?= site_url('manage/auctions/trash')?>"><i class="glyphicon glyphicon-trash"></i> Trash</a></li>
				<li><a href="<?= site_url('manage/live')?>"><i class="glyphicon glyphicon-flash"></i> Live Sale</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-user"></i>
                <span>Users</span>
				<i class="fa fa-angle-left pull-right"></i>
                <!-- <span class="label label-primary pull-right">4</span> -->
              </a>
              <ul class="treeview-menu">
				<? if($current_page == 'Users'):?>
				<li class="dropdown-header" style="font-weight: bold; color: #fff; border-bottom: 2px solid #969696; border-top: 2px solid #969696;"><span class="glyphicon glyphicon-plus"></span> ADD</li>
				<li><a href="#" data-user-type="user" data-toggle="modal" data-target="#user-crud" data-action="add" title="Add User" data-backdrop="static">User</a></li>
                <li><a href="#" data-user-type="buyer" data-toggle="modal" data-target="#user-crud" data-action="add" title="Add Buyer" data-backdrop="static"> Buyer</a></li>
                <li><a href="#" data-user-type="seller" data-toggle="modal" data-target="#user-crud" data-action="add" title="Add Seller" data-backdrop="static"> Seller</a></li>
				<li><a href="#" data-user-type="auctioneer" data-toggle="modal" data-target="#user-crud" data-action="add" title="Add Auctioneer" data-backdrop="static">Auctioneer</a></li>
				<li class="dropdown-header" style="font-weight: bold; color: #fff; border-bottom: 2px solid #969696; border-top: 2px solid #969696;"><span class="glyphicon glyphicon-th-list"></span> VIEW</li>
				<? endif?>
                <li><a href="<?= site_url('manage/users/all')?>">All Users</a></li>
                <li><a href="<?= site_url('manage/users/buyers')?>">Buyers</a></li>
                <li><a href="<?= site_url('manage/users/sellers')?>">Sellers</a></li>
				<li><a href="<?= site_url('manage/users/auctioneers')?>">Auctioneers</a></li>
				<li><a href="<?= site_url('manage/users/deactivated')?>"><i class="glyphicon glyphicon-ban-circle"></i> Deactive</a></li>
				<li><a href="<?= site_url('manage/users/trash')?>"><i class="glyphicon glyphicon-trash"></i> Trash</a></li>
              </ul>
            </li>
			<li><a href="<?= site_url('manage/invoices')?>"><i class="glyphicon glyphicon-usd"></i> Invoices</a></li>
            <li><a href="<?= site_url('manage/reports')?>"><i class="glyphicon glyphicon-file"></i> Reports</a></li>
			<li><a href="<?= site_url('manage/schedule')?>"><i class="glyphicon glyphicon-time"></i> Schedule</a></li>
			<li><a href="http://americanauctioneers.com" target="_blank"><i class="glyphicon glyphicon-home"></i> AA Website</a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?= $page_title?>
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?= site_url('manage/dashboard')?>"><i class="glyphicon glyphicon-dashboard"></i> Home</a></li>
		  <? if(isset($previous_page)):?><li><a href="<?= site_url('manage/' . $previous_page_url)?>"><?= $previous_page?></a></li><? endif?>
          <li class="active"><?= $current_page?></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="invoice">
		  