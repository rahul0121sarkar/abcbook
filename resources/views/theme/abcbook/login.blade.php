<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Book Shop</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/icon/favicon.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/slicknav.css">
<link rel="stylesheet" href="assets/css/animate.min.css">
<link rel="stylesheet" href="assets/css/price_rangs.css">
<link rel="stylesheet" href="assets/css/magnific-popup.css">
<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
<link rel="stylesheet" href="assets/css/themify-icons.css">
<link rel="stylesheet" href="assets/css/slick.css">
<link rel="stylesheet" href="assets/css/nice-select.css">
<link rel="stylesheet" href="assets/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <?php
    if (isset($_REQUEST['error'])) {
               echo "<script>
               Swal.fire({
                   position: 'center',
                   icon: 'error',
                   title: 'Incorrect Email ID or Password',
                   showConfirmButton: false,
                   timer: 1500
               })
               </script>";
           }
   ?>
<main class="login-bg">

<div class="login-form-area">
<div class="login-form">

<div class="login-heading">
<span>Login</span>
<p>Enter Login details to get access</p>
</div>

<form action="loginsert" method="POST">
    @csrf
<div class="input-box">
<div class="single-input-fields">
<label>Username or Email Address</label>
<input type="text" name="email" placeholder="Username / Email address">
</div>
<div class="single-input-fields">
<label>Password</label>
<input type="password" name="password" placeholder="Enter Password">
</div>
<div class="single-input-fields login-check">
<input type="checkbox" id="fruit1" name="keep-log">
<label for="fruit1">Keep me logged in</label>
<a href="#" class="f-right">Forgot Password?</a>
</div>
</div>

<div class="login-footer">
<p>Don’t have an account? <a href="contact">Sign Up</a> here</p>
<button class="submit-btn3">Login</button>
</div>
</div>
</div>
</form>

</main>


<script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>

<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.magnific-popup.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/price_rangs.js"></script>

<script src="assets/js/contact.js"></script>
<script src="assets/js/jquery.form.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/mail-script.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>

<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
<script defer="" src="../../beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"81aa198d2bd75f9d","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>
</html>