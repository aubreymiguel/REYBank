<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  <title>REYBank</title>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="icon" type="image/png" sizes="96x96" href="assets/img/R-logo.jpg">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    
    
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" data-class="fixed-left">
				<div class="p-4 pt-5">
          <div class="user-logo">
            <!-- <a href="{{ url('/profile_image') }}" id="image_change" 
            class="img logo rounded-circle mb-5" 
            style="background-image: url(/assets/img/user/{{ Auth::user()->image }});"></a> -->

            <h5 style="color: white; text-align: center;"><img src="assets/img/R-logo.jpg" height="50px" width="50px" style="margin-right: 2%; margin-bottom: 10%"></h5>
            
            <h3><?php echo $_SESSION['uName'] ?></h3>
          </div>
	        <ul class="list-unstyled components mb-5">

	          <li>
              <?php if ($_SESSION['uType'] == '3') { ?>
                <a href="ahome.php"><i class="fa fa-home"></i> &nbsp; Home</a>
              <?php } ?>

              <?php if ($_SESSION['uType'] == '2') { ?>
                <a href="report.php"><i class="fa fa-home"></i> &nbsp; Home</a>
              <?php } ?>

              <?php if ($_SESSION['uType'] == '1') { ?>
                <a href="chome.php"><i class="fa fa-home"></i> &nbsp; Home</a>
              <?php } ?>
            </li>
        

          

	          <li>
              <?php if ($_SESSION['uType'] == '1') { ?>
                <a href="cdeta.php"><i class="fa fa-user"></i> &nbsp; Details</a>
              <?php } ?>

    
              <?php if ($_SESSION['uType'] == '3') { ?>
                <a href="#aboutSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user"></i> &nbsp; About</a>
              <?php } ?>

              <ul class="collapse list-unstyled" id="aboutSubmenu">
            
                  <li>
                      <a href="adeta.php"><i class="fa fa-chevron-right"></i> &nbsp; Details</a>
                  </li>

                  <li>
                      <a href="add.php"><i class="fa fa-chevron-right"></i> &nbsp; Add Users</a>
                  </li>

                  <li>
                    <a href="ad_users.php"><i class="fa fa-chevron-right"></i> &nbsp; Users</a>
                  </li>

              </ul>
	          </li>

	          <li>
              <?php if ($_SESSION['uType'] == '2') { ?>
                <a href="tpending.php"><i class="fa fa-random"></i> &nbsp; Transactions</a>
              <?php } ?>

              <?php if ($_SESSION['uType'] == '1') { ?>
                <a href="#tranSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-random"></i> &nbsp; Transactions</a>

                <ul class="collapse list-unstyled" id="tranSubmenu">
                    <li>
                      <a href="withdraw.php"><i class="fa fa-chevron-right"></i> &nbsp; Withdraw</a>
                    </li>
                    <li>
                      <a href="deposit_cash.php"><i class="fa fa-chevron-right"></i> &nbsp; Deposit (Cash / Check)</a>
                    </li>
                    <li>
                      <a href="transfer.php"><i class="fa fa-chevron-right"></i> &nbsp; Transfer Fund</a>
                    </li>
                    <li>
                      <a href="cpending.php"><i class="fa fa-chevron-right"></i> &nbsp; Pending Transaction</a>
                    </li>
                </ul>
              <?php } ?>
            </li>

            <li>

                <?php if($_SESSION['uType'] == '3') { ?>
                    
                    <a href="report.php"><i class="fa fa-clipboard"></i> &nbsp; Report</a>
                
                <?php } ?>

                <?php if($_SESSION['uType'] == '1') { ?>
                    
                    <a href="report.php"><i class="fa fa-clipboard"></i> &nbsp; History</a>
                
                <?php } ?>

            </li>
              

          </ul>

          <br>
	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        
                © <script> document.write(new Date().getFullYear()) </script> REYBank | You deserve better!
           
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <div id="content" class="p-4 p-md-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
    
          <?php if ($_SESSION['uType'] == '3' || $_SESSION['uType'] == '2' || $_SESSION['uType'] == '1') { ?>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-chevron-down"></i>
            </button>
        <?php } ?>
    

          <?php if ($_SESSION['uType'] == '3' || $_SESSION['uType'] == '2' || $_SESSION['uType'] == '1') { ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
              <br>
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                  <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
              </ul>
            </div>
            <?php } ?>

          </div>
        </nav>
