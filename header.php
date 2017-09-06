<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Auction Manager | American Auctioneers</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	
    <!-- jQuery 2.1.3 -->
    <script src="<?= base_url()?>assets/manage/js/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
	  
    <!-- Bootstrap 3.3.2 -->
    <link href="<?= base_url()?>assets/manage/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
	
	<!-- DATA TABLES -->
	<link href="<?= base_url()?>assets/manage/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	
    <!-- Theme style -->
    <link href="<?= base_url()?>assets/manage/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?= base_url()?>assets/manage/css/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?= base_url()?>assets/manage/css/blue.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?= base_url()?>assets/manage/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="<?= base_url()?>assets/manage/css/jquery.datetimepicker.css" />
	
	<!-- add summernote -->
	<link href="<?= base_url()?>assets/manage/css/summernote.css" rel="stylesheet">
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?= site_url('manage/index')?>" class="logo">AA <b>Manager</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="glyphicon glyphicon-user"></span>
                  <span class="hidden-xs"><?= $this->session->userdata('username')?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <span class="glyphicon glyphicon-user" style="font-size: 4.5em"></span>
                    <p>
                      <?= $this->session->userdata('username')?>
					  
                    	<? 
						switch($this->session->userdata('user_role_id'))
						{
							case 1:
								$user_title = 'Administrator';
							break;
							case 2:
								$user_title = 'Auctioneer';
							break;
							default:
								$user_title = '';
						}
						?>
                      <small>
                      	<?= $user_title?>
                      </small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div>
					  <? if( ! $this->session->userdata('logged_in')):?>
					    <a href=""<?= site_url('manage_login/index')?>" class="btn btn-default btn-flat">Sign In</a>
				      <? else:?>
                       <a href="<?= site_url('manage_login/logout')?>" class="btn btn-default btn-flat">Sign out</a>
				     <? endif?>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
