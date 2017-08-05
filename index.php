<?php include 'header.php';?>
    <div id="about"></div>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Melca's Catering Services</h1>
                        <h3>Silay City Negros, Occidental</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="register.php" class="btn btn-default btn-lg reservation"><i class="fa fa-book fa-fw"></i> <span class="network-name">Reserve Now !</span></a>
                            </li>
                          
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->
    <?php include 'menu.php';?>
    <?php include 'packages.php';?>
	<?php include 'services_section.php';?>
    <!-- /.content-section-a -->
    
	<?php include 'contact.php';?>
    <!-- /.banner -->

    <!-- Footer -->
   <?php include 'footer.php';?>
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Login Here</h4>
                    </div>
                    <form action="login1.php" method="post">
                    <div class="modal-body" style="padding: 5px;">
                          <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="email" placeholder="Email Address" type="email" required autofocus />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="password" placeholder="Password" type="password" required />
                                </div>
                            </div>
                        </div>  
                        <div class="panel-footer" style="margin-bottom:-14px;height: 50px">
                                <!--<span class="glyphicon glyphicon-ok"></span>-->
                            <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="login" style="float: right" />Login</button>
                        </div>
                    </div>
                </div>
            </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script>
	$(".about").click(function() {
    $('html,body').animate({
        scrollTop: $("#about").offset().top},
        'slow');
	});
    $(".menu").click(function() {
    $('html,body').animate({
        scrollTop: $("#menu").offset().top},
        'slow');
    });
    $(".packages").click(function() {
    $('html,body').animate({
        scrollTop: $("#packages").offset().top},
        'slow');
    });
	$(".services").click(function() {
    $('html,body').animate({
        scrollTop: $("#services").offset().top},
        'slow');
	});
	$(".contact").click(function() {
    $('html,body').animate({
        scrollTop: $("#contact").offset().top},
        'slow');
    });
	</script>

</body>

</html>
