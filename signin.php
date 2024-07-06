<?php 
session_start();
include_once 'includes/connect.php';


if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $chck_login_detail = mysqli_query($connect,"SELECT * FROM `manager` WHERE email = '$email' AND password = '$password'");

    if (mysqli_num_rows($chck_login_detail) > 0) {
        // Passing user detail to the next page i.e Dashboard
        $fetching_user_detail = mysqli_fetch_assoc($chck_login_detail);
        $_SESSION['manager_email'] = $fetching_user_detail['email'];

        // Displaying 'Login success' message
        echo '
        <div class="position-absolute w-100 h-100  d-flex justify-content-center align-items-center success-message">
            <p class="fs-3"><i class="fa fa-check-circle text-success"></i>Login successful</p>
        </div>      
            ';
        echo "
            <script>
                setInterval(()=>{
                    window.location.href='./manager/dashboard';
                },2000);
            </script>
        ";
    }else {
        echo '
        <div class="alert alert-danger position-absolute top-0 end-0 js-invalid-credential">
            Invalid Credential 
            <button type="button" class="btn fs-5" aria-label="Close" data-bs-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
        ';
        echo '
            <script>
                setInterval(()=>{
                    let invalidCredentialElement = document.querySelector(".js-invalid-credential");

                    invalidCredentialElement.style.display="none";
                },2500);
                
            </script>
        ';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SmartStore - Login with your credentials</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="manager/img/user.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="fontawesome/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .success-message{
            z-index: 999;
            background-color: black;
        }
    </style>
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="./" class="">
                                    <h3 class="text-primary"></i>SmartStore</h3>
                                </a>
                                <h3>Sign In</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="remember_me" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                </div>
                                <a href="" class="js-forgot-password">Forgot Password</a>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                            <p class="text-center mb-0">Don't have an Account? <a href="./signup">Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/mine.js"></script>

</body>

</html>