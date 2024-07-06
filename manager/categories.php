<?php 
session_start();
include_once '../includes/connect.php';

    $manager_email = $_SESSION['manager_email'];
    
    $selecting_user_details = mysqli_query($connect,"SELECT * FROM `manager` WHERE email = '$manager_email'");

    $fetching_user_detail = mysqli_fetch_assoc($selecting_user_details);

    $manager_username = $fetching_user_detail['username'];

if (isset($_POST["add_category"])) {
    $category_name = $_POST["category_name"];

    $sql = mysqli_query($connect,"INSERT INTO `category` (category_name) VALUES ('$category_name')");

    if ($sql) {
        echo '
            <div class="alert alert-success position-absolute top-0 end-0 js-invalid-credential">
                Category Added 
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
    }else {
        echo '
        <script>
            alert('. mysqli_error($connect) .');
        </script>
    ';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>StoreSmart - Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Icon Font Stylesheet -->
    <link href="../fontawesome/css/all.min.css" rel="stylesheet">
    <link href="../bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .js-invalid-credential{
            margin: 70px 0px 0px 0px;
            z-index: 999;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="../signin" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">SmartStore</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $manager_username;?></h6>
                        <span>Manager</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="products" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Products</a>
                    <a href="categories" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Categories</a>
                    <a href="update-profile" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Update Profile</a>
                    <a href="support" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Support</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $manager_username;?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Selecting Categories Start -->
            <?php 
                $selecting_categories = mysqli_query($connect,'SELECT * FROM `category`');
            ?>
            <!-- Selecting Categories End -->


            <!-- Inner Start -->
            <div class="row p-5">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="mb-3">Category List</h4>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
                        <i class="fas fa-plus"></i> Add Category
                        </button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive rounded mb-3">
                    <table class="data-tables table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>#</th>
                                <th>Categories</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            <?php 
                                $row_number = 0;
                                while ($row = mysqli_fetch_assoc($selecting_categories)) {
                                    $row_number++;
                                    $category_name = $row["category_name"];
                                    echo '
                                        <tr>
                                            <td>'. $row_number .'</td>
                                            <td>'. $category_name .'</td>
                                                <td>
                                                    <div class="d-flex align-items-center list-action">
                                                        <a class="badge badge-info mr-2" title="View" href="#"><i class="fas fa-eye me-0"></i></a>
                                                        <a class="badge bg-success mr-2" title="Edit" href="#"><i class="fas fa-pencil me-0"></i></a>
                                                        <a class="badge bg-warning mr-2" title="Delete" href="#"><i class="fas fa-trash me-0"></i></a>
                                                    </div>
                                                </td>
                                        </tr>      
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>

                    <!-- Add product Modal Start -->
                    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-dark">Add a New Category</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="./categories" method="post">
                                <div class="row mb-3">
                                    <div class="col-md-6">                      
                                        <div class="form-group">
                                            <label>Category Name *</label>
                                            <input type="text" class="form-control" name="category_name" placeholder="Enter Name" required>
                                        </div>
                                    </div>    
                                </div>                            
                                <button type="submit" name="add_category" class="btn btn-primary me-2">Add Category</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </form>
                          </div>
                           
                        </div>
                      </div>
                    </div>
                    
                    <!-- Add product Modal End -->
                    </div>
                </div>
            </div>
            <!-- Inner End -->

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>