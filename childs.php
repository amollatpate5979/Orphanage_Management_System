<?php
session_start();
//datbase connection file
include('includes/config.php');
error_reporting(0);
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>

    <title>Orphanage Management System | | About Us</title>


    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->


    <!-- header-start -->
 <?php include_once('includes/header.php');?>

    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Children's</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->


 

   

    <!-- our_volunteer_area_start  -->
    <div class="our_volunteer_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>Our Children's</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                

$isactive=1;

$sql = "SELECT ChildName,ChildGender,Age,ChildPhoto,ID  from tblchild where IsActive=:isactive";
$query = $dbh -> prepare($sql);
$query->bindParam(':isactive',$isactive,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ 
    ?>
                <div class="col-lg-4 col-md-6">
                    <br>
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <img src="admin/childimages/<?php echo htmlentities($row->ChildPhoto);?>" alt="">
                        </div>
                        <div class="voolenteer_info d-flex align-items-end">
                  
                            <div class="info_inner">
                                <h4><?php echo htmlentities($row->ChildName);?></h4>
                                <a href="child-details.php?cid=<?php echo htmlentities($row->ID);?>" class="btn-def bnt-2 small">View Details</a>
                            </div>
                        </div>
                    </div>
                </div><hr>
            <?php } } ?>

            
                
       
            </div>
        </div>
    </div>
    <!-- our_volunteer_area_end  -->


    <!-- footer_start  -->
    <?php include_once('includes/footer.php');?>
    <!-- footer_end  -->

    <!-- link that opens popup -->

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
</body>

</html>