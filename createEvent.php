<?php  include_once "App/autoload.php"; ?>
<?php  
  
  $user = new User;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard | Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

    <?php
		 if( isset($_POST['create_event']) ){

			// Get value 
			$eName = $_POST['eName'];
			$banner = $_POST['banner'];
			$eType = $_POST['eType'];
			$eCatagory = $_POST['eCatagory'];
			$money = $_POST['money'];
			$contact = $_POST['contact'];
			$details = $_POST['details'];
			$venue = $_POST['venue'];


            $mess1 = "Test";

			if( empty($eName) || empty($banner))
		 	{
				$mess1 = "<p style='color:red;text-align:center; font-size:14px; font-weight:normal;'>All fields are required !</p>";
             }else {
				$data = $user -> createEvent($eName, $banner, $eType, $eCatagory, $money, $contact, $details,$venue);
				if(  $data  == true ){
				  $mess1 = "<p style='color:green;text-align:center; font-size:14px; font-weight:normal;'> Create successfull </p>";
				}
		   }
  
  
  
		 }

	?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Fundbox</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="./login.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                    <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="./adminDashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="./allSponsor.php">
                                <div class="sb-nav-link-icon"><i class="far fa-handshake"></i></i></div>
                                All Sponsors
                            </a>
                            <a class="nav-link" href="./allUser.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-ninja"></i></i></div>
                                All User
                            </a>
                            <a class="nav-link" href="./allOrg.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hands"></i></i></div>
                                All Organization
                            </a>
                            <div class="sb-sidenav-menu-heading">Events</div>
                            <a class="nav-link" href="./allEvents.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                All Events
                            </a>
                            <a class="nav-link" href="./createEvent.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Create Event
                            </a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="./allTransaction.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                All Transaction
                            </a>
                            <a class="nav-link" href="./profile.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Profile
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Create Event</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Event
                            </div>
                            <div class="card-body">
                                <?php 
                                    echo "<h1>" .$mess1 . "</h1>";
                                ?>
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <?php  
                                        if( isset($mess1) ){
                                            echo $mess1;
                                        }
                                    ?>
                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleInputEmail1" class="form-label">Event Name</label>
                                            <input type="text" class="form-control" name="eName">
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1" class="form-label">Banner</label>
                                            <input type="file" class="form-control" name="banner">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleInputEmail1" class="form-label">Details</label>
                                            <input type="text" class="form-control" name="details">
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1" class="form-label">Contact</label>
                                            <input type="text" class="form-control" name="contact">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleInputEmail1" class="form-label">Venue</label>
                                            <input type="text" class="form-control" name="venue">
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1" class="form-label">Target Money</label>
                                            <input type="text" class="form-control" name="money">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="validationCustom04" class="form-label">Event Catagoty</label>
                                            <select class="form-select" name="eCatagory" id="validationCustom04" required>
                                            <option>Blood Donation</option>
                                            <option>Volunteer</option>
                                            <option>Money Collection</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="validationCustom05" class="form-label">Event Type</label>
                                            <select class="form-select" name="eType" id="validationCustom05" required>
                                            <option>Donation</option>
                                            <option>Collection</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <button type="submit" class="btn btn-primary mt-4">Submit</button> -->
                                    <input name="create_event" class="btn btn-primary mt-4 name="create_event" type="submit"  value="Create Event">
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="assets/js/datatables-simple-demo.js"></script>
    </body>
</html>