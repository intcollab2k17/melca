 <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'];?></div>
                    <div class="email"><?php echo $_SESSION['user'];?></div>
                   
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li><a href="reminder.php">Upcoming Events</a></li>
                    <li><a href="approved.php">Approved Reservations</a></li>
                    <li><a href="pending.php">Pending Reservations</a></li>
                    <li><a href="finished.php">Finished Reservations</a></li>
                    <li><a href="cancelled.php">Cancelled Reservations</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="category.php">Category</a></li>
                    <li><a href="occasion.php">Occasion</a></li>
                    <li><a href="package_list.php">Package</a></li>
                    <li><a href="user.php">Admin</a></li>
                    <li><a href="reservation_report.php">Reservation Report</a></li>
                    <li><a href="monthly_sales.php">Monthly Sales Report</a></li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                
            </div>
            <!-- #Footer -->
        </aside>