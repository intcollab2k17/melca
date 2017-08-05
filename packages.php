
    <a id="packages"></a>
    <div class="banner">

        <div class="container">

           
            <div class="row">
<?php
include('admin/dbcon.php');

    $query=mysqli_query($con,"select * from package order by package_name")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['package_id'];
        $package=$row['package_name'];
        $price=$row['package_price'];
       
?>               
                <div class="col-lg-3">
                    <div class="card">
                        <div class="header bg-light-green">
                            <h3>
                                <?php echo $package;?>
                            </h3>
                            <h4>P<?php echo $price;?></h4>
                            <h4><?php echo $row['package_inclusion'];?> menu/s</h4>
                        </div>
                       
                   </div>
                </div>     
<?php }?>                
            </div>

        </div>
        <!-- /.container -->

    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Any questions? Feel free to contact us.</h4>
                    </div>
                    <form action="#" method="post" accept-charset="utf-8">
                    <div class="modal-body" style="padding: 5px;">
                          <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="firstname" placeholder="Firstname" type="text" required autofocus />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="lastname" placeholder="Lastname" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                    <input class="form-control" name="email" placeholder="E-mail" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                    <input class="form-control" name="subject" placeholder="Subject" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6" name="comment" required></textarea>
                                </div>
                            </div>
                        </div>  
                        <div class="panel-footer" style="margin-bottom:-14px;">
                            <input type="submit" class="btn btn-success" value="Send"/>
                                <!--<span class="glyphicon glyphicon-ok"></span>-->
                            <input type="reset" class="btn btn-danger" value="Clear" />
                                <!--<span class="glyphicon glyphicon-remove"></span>-->
                            <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-map-marker"></span> Our Location</h4>
                    </div>
                    <form action="#" method="post" accept-charset="utf-8">
                        <div class="modal-body">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.7189404925193!2d122.97442331987814!3d10.79912852509859!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aed61d404e12af%3A0xe6d9a60896fb9a46!2sNatalio+G.+Velez+Sports+and+Cultural+Complex%2C+Bonifacio+St%2C+Silay+City%2C+Negros+Occidental!5e1!3m2!1sen!2sph!4v1489306066718" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>  
                        <div class="panel-footer" style="margin-bottom:-14px;">
                           
                            <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
     
    