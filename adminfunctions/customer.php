<?php include('../includes/connection.php') ?>
<!DOCTYPE html>

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Auditorium Management System</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          
          <div class="input-group-append">
           
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
       
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Users</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Add Users:</h6>
            <!-- <a class="dropdown-item" href="login.html">Login</a> -->
            <a class="dropdown-item" href="register.php">User Registration</a>
            <!-- <a class="dropdown-item" href="forgot-password.html">Forgot Password</a> -->
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Update:</h6>
            <a class="dropdown-item" href="customer.php">Customer</a>
            <a class="dropdown-item" href="e_manager.php">Events</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sales.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Sales Report</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Annual revenu reort.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Annual Report</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="event_confirm.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Event Confirmation</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Admin/lite/create_event.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Create Event</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <h1>Update Customers</h1>
            </li>
          <!-- <li class="breadcrumb-item active">Overview</li> -->
          </ol>
</div>
   <div class="container">
     <div class-col-8>

    <?php 
    if (isset($_POST['submitDeleteBtn'])) {
      $key=$_POST['id'];
      $check=mysqli_query($connection,"SELECT * FROM users WHERE'$key'");
        if (mysqli_num_rows($check)>0) {
         $queryDelete=mysqli_query($connection,"UPDATE users SET usertype = 'deleted' WHERE  id='$key';");
         if(! $queryDelete){
  // echo "sfdfdf";
}
         ?>

           <div class="alert alert-warning"> 
            <p>Record deleted !!</p>
          </div> 

      <?php


        }


        else{
          //give warning that record not exsit
          ?>
          <div class="alert alert-warning">
            <p>Record does not exist</p>
          </div>


        <?php }

    }
    ?>
     <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
   <?php
    $sql="SELECT * FROM users WHERE usertype='c' ";
    
    $result=mysqli_query($connection,$sql);
    
    while($row=mysqli_fetch_array($result)){
  ?>
  <tbody>
    <tr>
      <form action="customer.php" method="post">
      <td ><?php echo $row['id']; ?></td>
      <td><?php echo $row['f_name']; ?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['mobile']?></td>

      <td>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    
      
      

        <input type="submit" name="submitDeleteBtn" value="Delete" class="btn btn-info">
        </form>
      </td>
    </tr>
   <?php


 }
 ?>
  </tbody>
</table>
</div>

    
      
     
     
        
    </div>
    
    
  </div>
</div>
   </div>
    
        

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
   

  </body>

</html>
