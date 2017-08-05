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
<?php

	session_destroy();
	
 echo '<meta http-equiv="refresh" content="2;url=../index.php">';
 
?>
</div>
</body>
</html>
