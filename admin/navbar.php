<nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="home.php">Admin Melca's Catering Services</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="pull-right"><a href="logout.php" class="js-right-sidebar">Sign out</a></li>
                    <li class="pull-right"><a href="profile.php" class="js-right-sidebar">Profile</a></li>
<?php
   //$date11=date('Y-m-d');
   //$end11=date("Y-m-d",strtotime($date. " + 7 days"));
   //$query11 = mysqli_query($con,"select COUNT(*) from reservation where reserve_date<='$end11' and reserve_date>='$date11'") or die(mysqli_error($con));
     // $count=mysqli_num_rows($query11);
        
?>                       
                    <li class="pull-right"><a href="reminder.php" class="js-right-sidebar"><span class=""><?php //echo $count;?></span>Reminders</a></li>
                </ul>
            </div>
        </div>
    </nav>