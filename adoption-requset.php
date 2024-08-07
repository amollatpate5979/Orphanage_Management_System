<?php
session_start();
//datbase connection file
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['usrid'])==0)
    {   
echo "<script>alert('Login is  required for adoption request.');</script>";
echo "<script>window.location.href='signin.php'</script>"; 
}
else{
if(isset($_POST['submit']))
{

// Getting Post values
  $uid= $_SESSION['usrid'];
  $cid=intval($_GET['cid']);
  $requestno= mt_rand(100000000,999999999);
$address=$_POST['address'];
$occupation=$_POST['occupation'];
$income=$_POST['income'];   
$reasonfadoption=$_POST['reasonfadoption']; 
$maritalstatus=$_POST['maritalstatus']; 
$sname=$_POST['sname']; 
$sphonenum=$_POST['sphonenum'];
$semail=$_POST['semail'];
$soccupation=$_POST['soccupation']; 
$sincome=$_POST['sincome'];
$status=1;
// query for data insertion
$sql="INSERT INTO tbladoption(Userid,Childid,Requestnumber,Address,Occupation,Income,Reasonforadoption,MaritalStatus,SpouseName,SpousePhonenumber,SpouceEmail,SpouseOccupation,SpouseIncome,IsActive) VALUES(:uid,:cid,:requestno,:address,:occupation,:income,:reasonfadoption,:maritalstatus,:sname,:sphonenum,:semail,:soccupation,:sincome,:status)";
//preparing the query
$query = $dbh->prepare($sql);
//Binding the values
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->bindParam(':requestno',$requestno,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':occupation',$occupation,PDO::PARAM_STR);
$query->bindParam(':income',$income,PDO::PARAM_STR);
$query->bindParam(':reasonfadoption',$reasonfadoption,PDO::PARAM_STR);
$query->bindParam(':maritalstatus',$maritalstatus,PDO::PARAM_STR);
$query->bindParam(':sname',$sname,PDO::PARAM_STR);
$query->bindParam(':sphonenum',$sphonenum,PDO::PARAM_STR);
$query->bindParam(':semail',$semail,PDO::PARAM_STR);
$query->bindParam(':soccupation',$soccupation,PDO::PARAM_STR);
$query->bindParam(':sincome',$sincome,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
//Execute the query
$query->execute();
//Check that the insertion really worked
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo '<script>alert("Your adoption request has successfully sent. Request number is "+"'.$requestno.'")</script>';
    echo "<script type='text/javascript'> document.location ='profile.php'; </script>";  
}
else 
{
echo "<script>alert('Error : Something went wrong. Please try again');</script>";   
}

}

    ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OMS || Registration</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

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
    <script>
function checkusernameAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'uname='+$("#username").val(),
type: "POST",
success:function(data){
$("#username-availabilty-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->


    <!-- header-start -->
 <?php include_once('includes/header.php');?>
    <!-- header-end -->

    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Adoption Form</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
               
    
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Adoption Request Form:</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Address" name="address" required="true">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Occupations"  name="occupation" id="occupation" required="true" >
                                   
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="Estimated Income(per month)" class="form-control" name="income" required="true">
                                    </div>
                                </div>
                               <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea  placeholder="Reason For Adoption" class="form-control" name="reasonfadoption" required="true"></textarea>
                                    </div>
                                </div>

                                  <div class="col-12">
                                    <div class="form-group">
                                        <select name="maritalstatus" id="maritalstatus" required="true" class="form-control">
<option value="">Select Marital Status</option> 
<option value="Married">Married</option>
<option value="Unmarried">Unmarried</option>

</select>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row" id=spousedetails>
                                  <h4>Spouse Details:</h4>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" id="sname" name="sname" required="true">
                                    </div>
                                </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Phone Number" pattern="[0-9]{10}" maxlength="10" name="sphonenum" id="sphonenum" required="true" >
                                   
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" class="form-control" name="semail" id="semail" required="true">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Occupations"  name="soccupation" id="soccupation" required="true" >
                                   
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="Estimated Income" class="form-control" name="sincome" id="sincome" required="true">
                                    </div>
                                </div>
                            

                             
                                
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="genric-btn primary e-large" name="submit">Submit</button>
                            </div>
                        </form>
                        
                    </div>
              
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    

    <!-- footer_start  -->
    <?php include_once('includes/footer.php');?>
    <!-- footer_end  -->
    
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
        <script>
            $('#datepicker').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                 rightIcon: '<span class="fa fa-caret-down"></span>'
             }
            });
            $('#datepicker2').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                 rightIcon: '<span class="fa fa-caret-down"></span>'
             }
    
            });
        </script>
        <script type="text/javascript">

  //For report file
  $('#spousedetails').hide();
  $(document).ready(function(){
  $('#maritalstatus').change(function(){
  if($('#maritalstatus').val()=='Cash on Delivery')
  {
  $('#spousedetails').hide();
    jQuery("#txnnumber").prop('required',false);  
  } else if($('#maritalstatus').val()==''){
      $('#spousedetails').hide();
        jQuery("#sname").prop('required',false);  
        jQuery("#sphonenum").prop('required',false);  
        jQuery("#semail").prop('required',false);  
        jQuery("#soccupation").prop('required',false);  
        jQuery("#sincome").prop('required',false);  
  }
else if($('#maritalstatus').val()=='Unmarried'){
      $('#spousedetails').hide();
              jQuery("#sname").prop('required',false);  
        jQuery("#sphonenum").prop('required',false);  
        jQuery("#semail").prop('required',false);  
        jQuery("#soccupation").prop('required',false);  
        jQuery("#sincome").prop('required',false);  
  }

   else{
    $('#spousedetails').show();
      jQuery("#sname").prop('required',true);  
        jQuery("#sphonenum").prop('required',true);  
        jQuery("#semail").prop('required',true);  
        jQuery("#soccupation").prop('required',true);  
        jQuery("#sincome").prop('required',true);  
  }
})}) 
</script>
    </body>
    
    </html><?php } ?>