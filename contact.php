<?php
	session_start();
	require_once("arrays.inc.php");
	//$admin_email="sanjays.weblink@gmail.com";
	$msg="";
	$admin_email="info@cbsllc.us";
	$admin_name="Admin"; 
	$website_name="Certitude Business Solutions llc"; 
    
    if(@$_POST['actions']=="Submit"){
    @extract($_POST);
    //$name,$email,$contact_number,$company_name,$subjects,$enquiryType,$description,$verification_code
	   
	    @$form_check_alert=dynamic_check_form_values(array("rp-2-Please enter your first name" => "".$_POST['first_name']."", "rp--Please enter your mobile number" => "".$_POST['mobile_number']."", "rp-4-Please enter valid email id" => "".$_POST['email']."", "rp--Please write your message!" => "".$_POST['message'].""), $validation_ans_arr);
		if($_POST['verification_code']=="") {
			$form_check_alert.="<li>Please enter word verification code.</li>";
		}elseif($_SESSION['verification_code'] != $_POST['verification_code']) {
			$form_check_alert.="<li>Verification Word Mismatch ... Please try again with correct verification word.</li>";
		}
		
		if(!strlen($form_check_alert)>0) 
		{
			
				
			//mail sent to customer
				$to_email=$_POST['email']; 
				$from_email=$admin_email;
				$fromName=$admin_name;
				$name=$_POST['first_name'].' '.$_POST['last_name'];
				
				$mess="Your Enquiry has been sent successully, we will get back to you very shortly.";
				
				$subject="Enquiry @ ".$website_name;
				$msg='Dear '.ucwords($name).',<br/><br/>'.$mess.'<br /><br />Regards<br /><br />Customer Support Team<br />'.$admin_name;
				$headers = "From: $fromName<$from_email> \n";
				$headers .= "Reply-To: $to_email\r\n";
				$headers .= "X-Mailer: PHP/". phpversion();
				$headers .= "X-Priority: 3 \n";
				$headers .= "MIME-version: 1.0\n";
				$headers .= "Content-Type: text/html; charset=UTF-8\n";
				//echo $to_email,$subject,$msg,$headers;
				@mail($to_email,$subject,$msg,$headers);
			//mail send to Admin
							
				$to_email="$admin_email";
				$from_email=$_POST['email'];
				$fromName=$name;
				$subject="Enquiry @ ".$website_name;
				$msg='Dear '.$admin_name.',<br/><br/>New Enquiry:-<br />';
				$msg.='Name : '.ucwords($name);
				if($_POST['mobile_number']!=""){
					$msg.='<br/>Mobile Number : '.$_POST['mobile_number'].'<br/>';
				}
				if($_POST['phone_number']!=""){
					$msg.='<br/>Phone Number : '.$_POST['phone_number'].'<br/>';
				}
				$msg.='<br/>Email : '.$_POST['email'].'<br/>';
				$msg.='</br>Message : '.$_POST['message'].'<br />Regards<br /><br />Customer Support Team<br />'.$admin_name;
				$headers = "From: $fromName<$from_email> \n";
				$headers .= "Reply-To: $to_email \r\n";
				$headers .= "X-Mailer: PHP/". phpversion();
				$headers .= "X-Priority: 3 \n";
				$headers .= "MIME-version: 1.0\n";
				$headers .= "Content-Type: text/html; charset=UTF-8\n";
				//echo $to_email,$subject,$msg,$headers;
				@mail($to_email,$subject,$msg,$headers);
			// ---------
				header("Location:thankyou.htm");
				exit();
		}
	
		if($form_check_alert!="")
		{
			$msg=html_head();
			$msg.=$form_check_alert;
			$msg.=html_foot();
		}
		
	}else{
    
    $first_name='';
	$last_name='';
    $email='';
	$phone_number='';
	$mobile_number='';
    $message='';
    
    }?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Certitude Business Solutions llc	</title>
<link rel="shortcut icon" href="favcon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no;user-scalable=0;"/>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/conditional_ml.css">
<link rel="stylesheet" href="css/fluid_dg.css">
<link href="css/owl.theme.default.min.css" rel="stylesheet">
<script type="text/javascript">
function validate_contactus() {
	//$name,$email,$contact_number,$company_name,$subjects,$enquiryType,$description,$verification_code
	var frm=document.contactus;
	var namefilter=/^[a-zA-Z ]*$/;
    var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	if (frm.first_name.value==0) {
		alert("Please enter your first name");
		frm.first_name.focus();
		return false;
	}
	if (!namefilter.test(frm.first_name.value)) {
    	 alert("Only letters and white space allowed");
    	 frm.first_name.focus();
     	 return false;
    }
	if (frm.mobile_number.value==0) {
		alert("Please enter mobile number");
		frm.mobile_number.focus();
		return false;
	}
    if (!emailfilter.test(frm.email.value)) {
		alert("Please enter valid email address");
		frm.email.focus();
		return false;
	}
/*	if (frm.address.value==0) {
		alert("Please write your address");
		frm.address.focus();
		return false;
	}*/
	if (frm.message.value==0) {
		alert("Please write your message");
		frm.message.focus();
		return false;
	}
	if (frm.verification_code.value==0) {
		alert("Please enter verification code");
		frm.verification_code.focus();
		return false;
	}
	
	
}
</script>
</head>
<body id="con"><!-- #BeginLibraryItem "/Library/header.lbi" -->
<header class="top2 trans_eff">
<div class="top_bg">
<div class="container">
<div class="row">
<div class="col-xs-5 col-sm-6 col-md-6">
<!--<p class="top-social">
<a href="" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
<a href="" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
<a href="" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
<a href="" title="Linked In" target="_blank"><i class="fa fa-linkedin"></i></a>
<a href="" title="Whatsapp" target="_blank"><i class="fa fa-whatsapp"></i></a>
</p>-->
<div class="shownext call_dis">
<p><a href="javascript:void(0)"><i class="fa fa-phone"></i><img src="images/cart-down-arrow.png" class="ml12" alt=""></a></p>
</div>
<div class="call_dis2 fl">
<p class="call_sec"><span><i class="fa fa-envelope fs18"></i><a class="withe" href="mailto:info@cbsllc.us">info@cbsllc.us</a></span></p>
</div>
</div>
<div class="col-xs-7 col-sm-6 col-md-6">
<div class="shownext call_dis">
<p><a href="javascript:void(0)"><i class="fa fa-phone"></i><img src="images/cart-down-arrow.png" class="ml12" alt=""></a></p>
</div>
<div class="call_dis2">
<p class="call_sec1"><span><i class="fa fa-map-marker"></i>1812 Front Street Scotch Plains, NJ 07076</span></p>
<p class="call_sec"><span class="pl10"><i class="fa fa-phone"></i><a href="tel:8373929796" class="white">8373929796</a></span></p>
</div></div></div></div></div>
<div class="cleafix"></div>
<!--top-div-end-->
<div class="header-bg">
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
<div class="logo-area">
<a href="index.htm" title="Certitude Business Solutions llc"><img src="images/logo.png" alt="Certitude Business Solutions llc" title="Certitude Business Solutions llc" class="img-responsive center-block"/></a>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 no_pad">
<nav class="navbar navbar-static-top" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">navigation</span>
</button>
</div>
<div class="clearfix visible-xs-block"></div>   
<div id="navbar" class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li><a href="index.htm" title="Home" class="hom">Home</a></li>
<li><a href="about-us.htm" title="About Us" class="abo">About Us</a></li>
<li><a href="work-force-solutions.htm" title="Work Force Solutions" class="sta">Work Force Solutions</a></li>
<li><a href="service.htm" title="Services" class="ser">Services</a></li>
<li><a href="labor-categories.htm" title="Labor Categories" class="ind">Labor Categories</a></li>
<li><a href="job-seekers.htm" title="Job Seekers" class="see">Job Seekers</a></li>
<!--<li><a href="../contingent-workforce.htm" title="Contingent Workforce" class="cont">Contingent Workforce</a></li>-->
<li><a href="contact.htm" title="Contact Us" class="con">Contact Us</a></li>
</ul>
<div class="clearfix"></div></div></nav></div><div class="cb"></div></div></div></header><!-- #EndLibraryItem --><div class="clearfix"></div>

<div class="rel"><img src="images/contact-banner.jpg" class="center-block img-responsive"></div>

<div class="clearfix"></div>

<div class="breadcrumb_outer hidden-xs">
<div class="container">
<ul class="breadcrumb">
<li class="pl5"><a href="index.htm">Home</a></li>
<li class="active">Contact Us</li>
</ul>
</div>
</div>

<div class="container">
<div class="mid_area">
    <div class="cms_area contact_box">
        <h1 class="mb20 heading">Contact Us</h1>
        <?php if($msg!="") { ?><div class="red ac b"><?php echo $msg;?></div><?php } ?>
        <div class="col-md-8 col-xs-12">
        <form name="contactus" id="contactus" method="post" action="" onsubmit="return validate_contactus();">
        <fieldset class="contact_form mt15" style="border:none;">
        <div class="mt5">
        <input type="text" id="first_name" name="first_name"  value="<?php echo $first_name;?>" placeholder="First Name *">
        <input type="text" class="text" id="last_name" name="last_name"  value="<?php echo $last_name;?>" placeholder="Last Name">
        </div>
        <div class="mt5">
        <input type="text" id="mobile_number" name="mobile_number"  value="<?php echo $mobile_number;?>" placeholder="Mobile Number *">
        <input type="text" class="text" id="phone_number" name="phone_number"  value="<?php echo $phone_number;?>" placeholder="Phone No. ">
        </div>
        <div class="mt5">
        <input type="text" id="email" name="email" value="<?php echo $email;?>" placeholder="Email *" class="large">
        </div>
        <div class="mt5">
        <textarea name="message" id="message" class="large" cols="45" rows="4" placeholder="Messsage *"><?php echo $message;?></textarea>
        </div>
        <div class="mt5">
        <input type="text" name="verification_code" id="verification_code" placeholder="Enter Code *" class="vam" style="width:140px;">
        <img src="CaptchaSecurityImages.php?width=77&height=21&characters=6" id="captcha" alt="" class="vam"> <a href="javascript:void(0);" onclick="document.getElementById('captcha').src='CaptchaSecurityImages.php?'+Math.random();"><img src="images/ref2.png" alt="" class="vam"></a> </div>
        <div class="">
            <input id="actions" name="actions" type="submit" value="Submit" class="btn7" >
            <input name="reset" type="reset" value="Reset" class="btn2 ml3">
        </div>
        </fieldset>
        </form>
        </div>
    <div class="visible-xs visible-sm bb mb40">&nbsp;</div>
    
    <div class="col-xs-12 col-md-4">
    <div class="fs20 blue">Administration And Operations</div>
    <p class="gray fs16 mt5">Feel free to call us, we will be very happy to assist you.</p>
    <div class="row mt20">
    <div class="col-xs-12 col-sm-12">
    <div class="add">
    <p class="ttu weight600">Address :{Head Office}</p>
    <p class="weight300 fs16 gray">1812 Front Street Scotch Plains, NJ 07076</p>
    </div>
    <p class="ttu weight600">Address :Our Global Delivery Cente</p>
    <p class="weight300 fs16 gray">F-296, E Block, Sector 63, Noida, Uttar Pradesh 201301</p>
    
    </div>
    <div class="clearfix"></div>
    <hr>
    
    <div class="col-xs-12 col-sm-12">
    <div class="call">
    <p class="ttu weight600">Call Us:</p>
    <p class="weight300 fs16 gray"><a class="blue" href="tel:908-663-2104">908-663-2104</a></p>
    </div>
    </div>
    <div class="clearfix"></div>
    <hr>
    
    <div class="col-xs-12 col-sm-12">
    <div class="email">
    <p class="ttu weight600">Email:</p>
    <p class="weight300 fs16 gray"><a href="mailto:info@cbsllc.us" class="blue">info@cbsllc.us</a></p>
    </div>
    </div>
    <div class="clearfix"></div>
    <hr>
    
    <div class="col-xs-12 col-sm-12">
    <div class="fax">
    <p class="ttu weight600">Fax:</p>
    <p class="weight300 fs16 gray"><a class="blue" href="tel:908-322-8961">908-322-8961</a></p>
    </div>
    </div>
    <div class="clearfix"></div>
    
    </div>
    </div>
    
    
    </div>
</div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3027.101729320786!2d-74.40141708459697!3d40.64968787933876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b08404f47309%3A0x88a9c60064dbdd5!2s1812+Front+St%2C+Scotch+Plains%2C+NJ+07076%2C+USA!5e0!3m2!1sen!2sin!4v1510641398054" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
<div class="clearfix"></div><!-- #BeginLibraryItem "/Library/footer.lbi" -->
<footer>
<div class="foot1">
<div class="container">
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
<div class="contct-dtls">
<div class="ft-logo"><a href="index.htm">
<img src="images/logo.png" class="img-responsive center-block" alt="Certitude Business Solutions llc" title="Certitude Business Solutions llc"></a></div>
<p>Copyright © 2017, Certitude Business Solutions llc All rights reserved. </p>
<p class="top-social">
<a href="" target="_blank" title="Facebook"><i class="fa fa-facebook-square" style="color:#3b5a9b;"></i></a>
<a href="" title="Linked In" target="_blank"><i class="fa fa-linkedin-square" style="color:#007bb6;"></i></a>
</p>
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
<h4 class="desk_show">Quick Links</h4>
<p class="mob_only dd_next mob-div white">Quick Links</p>
<div class="f_dd_box">
<div class="link-width">
<ul class="ft_links">
<li><a href="index.htm" title="Home" class="hom">Home</a></li>               
<li><a href="about-us.htm" title="About Us">About Us</a></li>
<li><a href="work-force-solutions.htm" title="Work Force Solutions">Work Force Solutions</a></li>
<li><a href="service.htm" title="Services">Services</a></li>
</ul>
</div>
<div class="link-width">
<ul class="ft_links">
<li><a href="labor-categories.htm" title="Labor Categories">Labor Categories</a></li>
<li><a href="job-seekers.htm" title="Industry">Job Seekers</a></li>

<li><a href="contact.htm" title="Contact Us">Contact Us</a></li>
<li><a href="sitemap.htm" title="Sitemap">Sitemap</a></li>
</ul>
</div>
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
<h4 class="desk_show">Contact Details</h4>
<p class="mob_only dd_next mob-div white">Contact Details</p>
<div class="f_dd_box">
<div class="contct_dtls">
<p class="ft-add1"><span><i class="fa fa-home"></i></span>1812 Front Street Scotch Plains, NJ 07076</p>
<p class="ft-add"><span><i class="fa fa-phone"></i></span><a href="tel:908-663-2104">908-663-2104</a></p>
<p class="ft-add"><span><i class="fa fa-fax"></i></span><a href="tel:908-322-8961">908-322-8961</a></p>
<p class="ft-add"><span><i class="fa fa-envelope-o"></i></span><a href="mailto:info@cbsllc.us">info@cbsllc.us</a></p>
</div>
</div>
</div>
</div>
</div>
</footer><!-- #EndLibraryItem --><p id="back-top" style="display: block;"><a href="#top"><span>&nbsp;</span></a></p>
<script src="//ajax.aspnetcdn.com/ajax/jquery/jquery-1.10.2.min.js"></script>
<script type="text/javascript">var Page='';</script> 
<script type="text/javascript" src="Scripts/script.int.dg.js"></script>
</body>
</html>