<?
session_start();
require './connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="./home_users.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>I</b>MA</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Inventory</b> Manage</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        Alexander Pierce - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- ######################################################################################### -->
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- ################################################################################################################## -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-home"></i> <span>Home</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="../../../inventory/home_users.php"><i class="fa fa-user-plus"></i> Users</a></li>
                        </ul>
                    </li>
                    <!-- ############################################################################################################ -->

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle"></i> <span>HR</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Master
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./pages/hr/master/hr_master_designation.php"><i class="fa fa-table"></i> Designation</a></li>
                                    <li><a href="./pages/hr/master/hr_master_employee.php"><i class="fa fa-users"></i> Employees</a></li>
                                    <li><a href="./pages/hr/master/hr_master_parameters.php"><i class="fa fa-list"></i> Parameters</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Transaction
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./pages/hr/transaction/hr_transaction_salary_generation.php"><i class="fa fa-calculator" aria-hidden="true"></i> Salary generator</a></li>
                                    <li><a href="./pages/hr/transaction/hr_transaction_allowance_and_deduction.php"><i class="fa fa-percent" aria-hidden="true"></i></i> Allowance & Deduction</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Processing
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <!-- <li><a href="#"><i class="fa fa-link"></i> Salary generator</a></li>
                  <li><a href="#"><i class="fa fa-link"></i> Allowance & Deduction</a></li> -->
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-book"></i> Report
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./pages/hr/report/hr_report_repots.php"><i class="fa fa-files-o"></i> Reports</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- ############################################################################################################ -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i> <span> Inventory</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Master
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./pages/Inventory/master/inventory_master_item_category.php"><i class="fa fa-sitemap"></i> Item Category</a></li>
                                    <li><a href="./pages/Inventory/master/inventory_master_tax.php"><i class="fa fa-calculator"></i> Tax</a></li>
                                    <li><a href="./pages/Inventory/master/inventory_master_item.php"><i class="fa fa-inbox"></i> Item</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Transaction
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./pages/Inventory/transaction/inventory_transaction_discount_and_flat.php"><i class="fa fa-tag" aria-hidden="true"></i> Discount & Flat</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Processing
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <!-- <li><a href="#"><i class="fa fa-link"></i> Salary generator</a></li>
                  <li><a href="#"><i class="fa fa-link"></i> Allowance & Deduction</a></li> -->
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-book"></i> Report
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./pages/Inventory/report/Inventory_report_reports.php"><i class="fa fa-files-o"></i> Reports</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- ################################################################################################################################################## -->

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i> <span> Purchase & sales</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Master
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./pages/PurchaseAndsales/master/purchaseAndsales_master_customers.php"><i class="fa fa-male"></i> Customers</a></li>
                                    <li><a href="./pages/PurchaseAndsales/master/purchaseAndsales_master_supplier.php"><i class="fa fa-industry"></i> Supplier</a></li>
                                    <li><a href="./pages/PurchaseAndsales/master/purchaseAndsales_master_tax.php"><i class="fa fa-dashboard"></i> Credit Limit</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Transaction
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_purchase.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Purchase</a></li>
                                    <li><a href="./pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_sales.php"><i class="fa fa-bar-chart" aria-hidden="true"></i></i> Sales</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Processing
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./pages/PurchaseAndsales/processing/PurchaseAndsales_processing_purchase_payment.php"><i class="fa fa-money"></i> Purchase Payment</a></li>
                                    <li><a href="./pages/PurchaseAndsales/processing/PurchaseAndsales_processing_sales_payment.php"><i class="fa fa-inr"></i> Sales Payment</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-book"></i> Report
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./pages/PurchaseAndsales/report/purchaseAndsales_report_reports.php"><i class="fa fa-files-o"></i> Reports</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>


            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- ######################################################################################################## -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!-- sdfsadhf;ksdfhsadfhsfhflsdj-->
                <!-- ####################################################################################################### -->
                <!-- Modal -->
                <div class="modal fade" id="addLoginUser" tabindex="-1" role="dialog" aria-labelledby="addLoginUser" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title" id="addLoginUserHeading"> Add New Login User </h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="./create_user.php" method="post">
                                    <div class="form-group">
                                        <label for="loginId">Login ID</label>
                                        <input style="border: none;" type="text" class="form-control" id="loginId" name="loginId" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="sel1">Select User</label>
                                        <select class="form-control" id="selectUser" name="selectUser">
                                            <option value="-select-">-select-</option>
                                            <?
                                            $sqlDisplayDesignation = "SELECT `emp_id`,`emp_first_name`,`emp_last_name` FROM employees_details WHERE `emp_login_flag`=1";
                                            if ($rawDate = $connect->query($sqlDisplayDesignation)) {
                                                while ($displayUser = $rawDate->fetch_assoc()) {
                                                    $userId = $displayUser['emp_id'];
                                                    $firstName = $displayUser['emp_first_name'];
                                                    $lastName = $displayUser['emp_last_name'];
                                                    ?>
                                                    <option value="<? echo $userId; ?>"><? echo "$firstName $lastName"; ?></option>
                                            <?
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="userLoginName">User Login Name</label>
                                        <input type="text" class="form-control" id="userLoginName" name="userLoginName" placeholder="Enter User Name">
                                        <button type="button" class="btn btn-secondary" onclick="checkUserName()">Check User Name</button>
                                    </div>

                                    <label for="userLoginPassword">User Login Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control pwd" name="userLoginPassword" id="userLoginPassword">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                        </span>
                                    </div>
                                    <button type="button" class="btn btn-secondary" onclick="generate()">Generate Password</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submitLoginDetails" id="submitLoginDetails">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- ########################################################## edit -->
                <div class="modal fade" id="editLoginUser" tabindex="-1" role="dialog" aria-labelledby="editLoginUser" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title" id="editLoginUserHeading"> Edit Login User </h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="./update_user.php" method="post">
                                    <div class="form-group">
                                        <label for="editLoginId">Login ID</label>
                                        <input style="border: none;" type="text" class="form-control" id="editLoginId" name="editLoginId" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="editUser">Selected User</label>
                                        <input style="border: none;" type="text" class="form-control" id="editUser" name="editUser" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="editUserLoginName">User Login Name</label>
                                        <input type="text" class="form-control" id="editUserLoginName" name="editUserLoginName" placeholder="Enter User Name">
                                        <button type="button" class="btn btn-secondary" onclick="editCheckUserName()">Check User Name</button>
                                    </div>

                                    <label for="editUserLoginPassword">User Login Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control pwd" name="editUserLoginPassword" id="editUserLoginPassword">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                        </span>
                                    </div>
                                    <button type="button" class="btn btn-secondary" onclick="editGenerate()">Generate Password</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submitEditLoginDetails" id="submitEditLoginDetails">Update</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- ################################################################# delete-->
                <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="deleteUser" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title" id="deleteUserHeading"> Delete User </h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="./delete_user.php" method="POST">
                                    <h3 id='displayBox'></h3>
                                    <input type="hidden" id="deleteUserId" name="deleteUserId" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="deleteUserButton">Delete User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ###################################################################################################### -->
                <section class="content">
                    <?
                    if (isset($_SESSION['addUser'])) {
                        if (($_SESSION['addUser'] == 'yes')) {
                            $addUserAdded =  '<div class="alert alert-success alert-dismissible" id="addUserAddedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>New </strong> User Added
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#addUserAddedAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['addUser']);
                            echo $addUserAdded;
                        } else {
                            $UserNotAdded =  '<div class="alert alert-danger alert-dismissible" id="UserNotAddedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>User</strong> Not Added
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#UserNotAddedAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['addUser']);
                            echo $UserNotAdded;
                        }
                    }
                    if (isset($_SESSION['updateUser'])) {
                        if (($_SESSION['updateUser'] == 'yes')) {
                            $userUpdated =  '<div class="alert alert-success alert-dismissible" id="userUpdatedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Updated </strong> User Successfully.
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#userUpdatedAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['updateUser']);
                            echo $userUpdated;
                        } else {
                            $userNotUpdated =  '<div class="alert alert-danger alert-dismissible" id="userNotUpdatedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>User</strong> Not Updated.
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#userNotUpdatedAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['updateUser']);
                            echo $userNotUpdated;
                        }
                    }
                    if (isset($_SESSION['deleteUser'])) {
                        if (($_SESSION['deleteUser'] == 'yes')) {
                            $userDeleted =  '<div class="alert alert-warning alert-dismissible" id="userDeletedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>User</strong> Deleted!!!.
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#userDeletedAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['deleteUser']);
                            echo $userDeleted;
                        } else {
                            $userNotDeleted =  '<div class="alert alert-danger alert-dismissible" id="userNotDeletedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>User</strong> cannot be deleted  because. 
                            </div>   <script>setTimeout(fade_out, 10000);
                            function fade_out() {
                            $("#$userNotDeletedAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['deleteUser']);
                            echo $userNotDeleted;
                        }
                    }
                    ?>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">User Login Credentials</h3>

                                    <div class="box-tools">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLoginUser" onclick="getUserId()">
                                            <strong><i class="fa fa-plus"></i> Create New Login User</strong></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <a class="box-body table-responsive no-padding">
                                    <table style="color: black;" class="table table-hover">
                                        <tr>
                                            <th>Login ID</th>
                                            <th>Name</th>
                                            <th>User Id</th>
                                            <th>User Password</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        <?
                                        $sqlUserDisplay = "SELECT user_login_credentials.*, employees_details.* FROM user_login_credentials INNER JOIN employees_details ON user_login_credentials.employees_id=employees_details.emp_id";
                                        if ($rawUser = $connect->query($sqlUserDisplay)) {
                                            while ($users = $rawUser->fetch_assoc()) {
                                                $userId = $users['login_id'];
                                                $userFirstName = $users['emp_first_name'];
                                                $userLastName = $users['emp_last_name'];
                                                $userName = $users['user_name'];
                                                $userPassword = $users['user_password'];
                                                ?>
                                                <tr>
                                                    <td><? echo $userId; ?></td>
                                                    <td><? echo "$userFirstName $userLastName"; ?></td>
                                                    <td><? echo $userName; ?></td>
                                                    <td><? echo $userPassword; ?></td>
                                                    <td><button class="btn btn-primary btn-xs editLoginUser" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p>
                                                    </td>
                                                    <td><button class="btn btn-danger btn-xs deleteUser" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p>
                                                    </td>
                                                </tr>
                                        <?
                                            }
                                        }
                                        ?>
                                    </table>
                                    <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </section>

                <!-- sdjksdhdkfjshfkasjfhdlskadjfhskldjfhsakf -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Sparkline -->
    <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- daterangepicker -->
    <script src="bower_components/moment/min/moment.min.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <!-- ###################################################################################### -->
    <!-- my scripts -->
    <script src="./scripts/home/home_user.js"></script>
    <!-- ###################################################################################################################################### -->
</body>

</html>
