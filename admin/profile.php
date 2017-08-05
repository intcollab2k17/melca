<?php include 'inner_header.php';?>

<body class="theme-deep-purple">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
   
    <!-- Top Bar -->
    <?php include 'navbar.php';?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
       <?php include 'aside.php';?>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
       <?php //include 'aside_right.php';?>
        <!-- #END# Right Sidebar -->
    </section>
<?php
include('dbcon.php');
        $id=$_SESSION['id'];
        $query=mysqli_query($con,"select * from user where user_id='$id'")or die(mysqli_error($con));
          $row=mysqli_fetch_array($query);

?>   
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Admin Profile
                </h2>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Update Username</h2>
                            
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" novalidate="novalidate">
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="username"  aria-required="true" value="<?php echo $row['username'];?>" required>
                                        <label class="form-label">Username</label>
                                    </div>
                                </div>
                               
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password" required="true" aria-required="true">
                                        <label class="form-label">Enter Password to confirm change</label>
                                    </div>
                                </div>
                                
                                <button class="btn btn-primary waves-effect" type="submit" name="changeuser">CHANGE</button>
                            </form>
                        </div>
                    </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Update Password</h2>
                            
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" novalidate="novalidate">
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="new"  aria-required="true" required>
                                        <label class="form-label">New Password</label>
                                    </div>
                                </div>
                               
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="old" required="true" aria-required="true">
                                        <label class="form-label">Enter Old Password to confirm change</label>
                                    </div>
                                </div>
                                
                                <button class="btn btn-primary waves-effect" type="submit" name="changepass">CHANGE</button>
                            </form>
                        </div>
                    </div>
                </div>
            
        </div>
    </section>
<?php 
  if (isset($_POST['changeuser']))
  {
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        
        $query=mysqli_query($con,"select * from user where user_id='$id' and password='$password'")or die(mysqli_error($con));
          $count=mysqli_num_rows($query);

          if ($count>0)
          {
            mysqli_query($con,"UPDATE user SET username='$username' where user_id='$id'")
   or die(mysqli_error($con)); 
            echo "<script type='text/javascript'>alert('Username successfully changed!');</script>";
          }
          else
          {
            echo "<script type='text/javascript'>alert('Password mismatch!');</script>";
          }
  }
  if (isset($_POST['changepass']))
  {
        $new=md5($_POST['new']);
        $old=md5($_POST['old']);
        
        $query=mysqli_query($con,"select * from user where user_id='$id' and password='$old'")or die(mysqli_error($con));
          $count=mysqli_num_rows($query);

          if ($count>0)
          {
            mysqli_query($con,"UPDATE user SET password='$new' where user_id='$id'")
   or die(mysqli_error($con)); 
            echo "<script type='text/javascript'>alert('Password successfully changed!');</script>";
          }
          else
          {
            echo "<script type='text/javascript'>alert('Password mismatch!');</script>";
          }
  }
?>

<?php include 'scripts.php';?>
</body>

</html>