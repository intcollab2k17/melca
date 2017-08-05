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

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Details
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                Reservation Details, Payments, Attachments
                            </h2>
                           
                        </div>
                        <div class="body">
                            <!-- Tabs With Custom Animations -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="row clearfix">
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li role="presentation" class="active"><a href="#home_animation_2" data-toggle="tab">RESERVATION</a></li>
                                        <li role="presentation"><a href="#profile_animation_2" data-toggle="tab">PAYMENTS</a></li>
                                        <li role="presentation"><a href="#messages_animation_2" data-toggle="tab">ATTACHMENTS</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane animated fadeInRight active" id="home_animation_2">
                                            <?php include('tab_details.php');?>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated fadeInRight" id="profile_animation_2">
                                            <b>Payments</b>
                                            <?php include('tab_payments.php');?>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated fadeInRight" id="messages_animation_2">
                                            <b>Attachments</b>
                                            <?php include('tab_attach.php');?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Custom Animations -->    
                        </div><!--body-->
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
    </section>
<!-- Modal Dialogs ====================================================================================================================== -->
           
<?php include 'scripts.php';?>
</body>

</html>