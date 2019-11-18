<?
session_start();
require '../../../connect.php';
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Suppliers</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../../bower_components/select2/dist/css/select2.min.css">

    <link rel="stylesheet" href="../../../bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../../../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="../../../home_users.php" class="logo">
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
                                <img src="../../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

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
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-home"></i> <span>Home</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../../../home_users.php"><i class="fa fa-user-plus"></i> Users</a></li>
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
                                    <li><a href="../../../pages/hr/master/hr_master_designation.php"><i class="fa fa-table"></i> Designation</a></li>
                                    <li><a href="../../../pages/hr/master/hr_master_employee.php"><i class="fa fa-users"></i> Employees</a></li>
                                    <li><a href="../../../pages/hr/master/hr_master_parameters.php"><i class="fa fa-list"></i> Parameters</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Transaction
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="../../../pages/hr/transaction/hr_transaction_salary_generation.php"><i class="fa fa-calculator" aria-hidden="true"></i> Salary generator</a></li>
                                    <li><a href="../../../pages/hr/transaction/hr_transaction_allowance_and_deduction.php"><i class="fa fa-percent" aria-hidden="true"></i></i> Allowance & Deduction</a></li>
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
                                    <li><a href="../../../pages/hr/report/hr_report_repots.php"><i class="fa fa-files-o"></i> Reports</a></li>
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
                                    <li><a href="../../../pages/Inventory/master/inventory_master_item_category.php"><i class="fa fa-sitemap"></i> Item Category</a></li>
                                    <li><a href="../../../pages/Inventory/master/inventory_master_tax.php"><i class="fa fa-calculator"></i> Tax</a></li>
                                    <li><a href="../../../pages/Inventory/master/inventory_master_item.php"><i class="fa fa-inbox"></i> Item</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Transaction
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="../../../pages/Inventory/transaction/inventory_transaction_discount_and_flat.php"><i class="fa fa-tag" aria-hidden="true"></i> Discount & Flat</a></li>
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
                                    <li><a href="../../../pages/Inventory/report/Inventory_report_reports.php"><i class="fa fa-files-o"></i> Reports</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- ################################################################################################################################################## -->

                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i> <span> Purchase & sales</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active treeview">
                                <a href="#"><i class="fa fa-link"></i> Master
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="../../../pages/PurchaseAndsales/master/purchaseAndsales_master_customers.php"><i class="fa fa-male"></i> Customers</a></li>
                                    <li class="active"><a href="../../../pages/PurchaseAndsales/master/purchaseAndsales_master_supplier.php"><i class="fa fa-industry"></i> Supplier</a></li>
                                    <li><a href="../../../pages/PurchaseAndsales/master/purchaseAndsales_master_credit_limit.php"><i class="fa fa-dashboard"></i> Credit Limit</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Transaction
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_purchase.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Purchase</a></li>
                                    <li><a href="../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_sales.php"><i class="fa fa-bar-chart" aria-hidden="true"></i></i> Sales</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Processing
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="../../../pages/PurchaseAndsales/processing/PurchaseAndsales_processing_purchase_payment.php"><i class="fa fa-money"></i> Purchase Payment</a></li>
                                    <li><a href="../../../pages/PurchaseAndsales/processing/PurchaseAndsales_processing_sales_payment.php"><i class="fa fa-inr"></i> Sales Payment</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-book"></i> Report
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="../../../pages/PurchaseAndsales/report/purchaseAndsales_report_reports.php"><i class="fa fa-files-o"></i> Reports</a></li>
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
            <!-- ####################################################################################################### -->
            <!-- Add employee -->
            <div class="modal fade" id="addNewSupplier" tabindex="-1" role="dialog" aria-labelledby="addNewSupplierTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="addNewSupplierTitle"> Add Company Or Supplier </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="../../../pages/PurchaseAndsales\master\add_supplier.php" method="POST">
                            <div class="modal-body">
                                <label for="supplierId">Supplier ID</label>
                                <input style="background-color: transparent; border: transparent;" type="text" name="supplierId" class="form-control" id="supplierId" readonly required>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="gstin">Gstin</label>
                                            <input type="text" name="gstin" class="form-control" id="gstin" placeholder="Enter Gstin Number" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <label for="supplierName">Company Name</label>
                                            <input type="text" name="supplierName" class="form-control" id="supplierName" placeholder="Enter Company Name OR Supplier Name" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">

                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <select class="form-control select2" name="state" id="state" style="width: 100%;">
                                                <option value="-select-">-select-</option>
                                                <?
                                                $sqlDisplayDesignation = "SELECT distinct(`state`) FROM `statelist`";
                                                if ($rawDate = $connect->query($sqlDisplayDesignation)) {
                                                    while ($displayState = $rawDate->fetch_assoc()) {
                                                        $state = $displayState['state'];
                                                        ?>
                                                        <option value="<? echo $state ?>"><? echo $state ?></option>
                                                <?
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="selectCity">Select City</label>
                                        <select class="form-control select2" name="selectCity" id="selectCity" style="width: 100%;" required>
                                            <option value="-select-">-select-</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="cityPinCode">City Pincode</label>
                                            <input type="number" name="cityPinCode" class="form-control" id="cityPinCode" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="supplierNumber">Phone Number </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="supplierNumber" placeholder="Enter Phone Number" id="supplierNumber" data-inputmask="'mask': ['999-999-9999', '+099 99 99 9999[9]-9999']" data-mask required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="supplierEmail">Email</label>
                                            <input type="email" name="supplierEmail" class="form-control" id="supplierEmail" placeholder="Jon@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="supplierAddress">Address</label>
                                            <textarea class="form-control" rows="3" name="supplierAddress" id="supplierAddress" placeholder="Enter The supplier Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="addSupplierOrCompanyButton">Add Supplier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ###################################################################################################### -->
            <!-- ####################################################################################################### -->
            <!-- Edit designation -->
            <div class="modal fade" id="editSupplier" tabindex="-1" role="dialog" aria-labelledby="editSupplier" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="editSupplierHeading"> Edit Supplier OR Company </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="../../../pages/PurchaseAndsales/master/update_supplier.php" method="POST">
                            <div class="modal-body">
                                <label for="editSupplierId">Supplier ID</label>
                                <input style="background-color: transparent; border: transparent;" type="text" name="editSupplierId" class="form-control" id="editSupplierId" readonly required>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="editGstin">Gstin</label>
                                            <input type="text" name="editGstin" class="form-control" id="editGstin" placeholder="Enter Gstin Number" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <label for="editSupplierName">Company Name OR Supplier Name</label>
                                            <input type="text" name="editSupplierName" class="form-control" id="editSupplierName" placeholder="Enter Company Name OR Supplier Name" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">

                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="editState">State</label>
                                            <select class="form-control select2" name="editState" id="editState" style="width: 100%;">
                                                <option value="-select-">-select-</option>
                                                <?
                                                $sqlDisplayDesignation = "SELECT distinct(`state`) FROM `statelist`";
                                                if ($rawDate = $connect->query($sqlDisplayDesignation)) {
                                                    while ($displayState = $rawDate->fetch_assoc()) {
                                                        $state = $displayState['state'];
                                                        ?>
                                                        <option value="<? echo $state ?>"><? echo $state ?></option>
                                                <?
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="editSelectCity">Select City</label>
                                        <select class="form-control select2" name="editSelectCity" id="editSelectCity" style="width: 100%;" required>
                                            <option value="-select-">-select-</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="editCityPinCode">City Pincode</label>
                                            <input type="number" name="editCityPinCode" class="form-control" id="editCityPinCode" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="editSupplierNumber">Phone Number </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="editSupplierNumber" placeholder="Enter Phone Number" id="editSupplierNumber" data-inputmask="'mask': ['999-999-9999', '+099 99 99 9999[9]-9999']" data-mask required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="editSupplierEmail">Email</label>
                                            <input type="email" name="editSupplierEmail" class="form-control" id="editSupplierEmail" placeholder="Jon@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="editSupplierAddress">Address</label>
                                            <textarea class="form-control" rows="3" name="editSupplierAddress" id="editSupplierAddress" placeholder="Enter The Supplier Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="updateSupplierButton">Update Designation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ###################################################################################################### -->
        <!-- ####################################################################################################### -->
        <!-- Delete designation -->
        <div class="modal fade" id="deleteSupplier" tabindex="-1" role="dialog" aria-labelledby="deleteSupplier" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="deleteSupplierHeading"> Delete Supplier Or Company </h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../../../pages/PurchaseAndsales/master/delete_supplier.php" method="POST">
                            <h3 id='displayBox'></h3>
                            <input type="hidden" id="deleteSupplierId" name="deleteSupplierId" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="deleteSupplierButton">Delete Supplier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ###################################################################################################### -->
        <section class="content">
            <?
            if (isset($_SESSION['addSupplier'])) {
                if (($_SESSION['addSupplier'] == 'yes')) {
                    $NewSupplierAdd =  '<div class="alert alert-success alert-dismissible" id="NewSupplierAddAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>New Supplier Added. </strong>
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#NewSupplierAddAlert").fadeOut().empty();
                            }</script>';
                    unset($_SESSION['addSupplier']);
                    echo $NewSupplierAdd;
                } else {
                    $SupplierNotAdd =  '<div class="alert alert-danger alert-dismissible" id="SupplierNotAddAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>New New Supplier Added !!!</strong>
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#SupplierNotAddAlert").fadeOut().empty();
                            }</script>';
                    unset($_SESSION['addSupplier']);
                    echo $SupplierNotAdd;
                }
            }
            if (isset($_SESSION['updateSupplier'])) {
                if (($_SESSION['updateSupplier'] == 'yes')) {
                    $SupplierUpdate =  '<div class="alert alert-success alert-dismissible" id="SupplierUpdateAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Updated Supplier Successfully. </strong> 
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#SupplierUpdateAlert").fadeOut().empty();
                            }</script>';
                    unset($_SESSION['updateSupplier']);
                    echo $SupplierUpdate;
                } else {
                    $SupplierNotUpdate =  '<div class="alert alert-danger alert-dismissible" id="SupplierNotUpdateAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> Supplier Not Updated!!!</strong> 
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#SupplierNotUpdateAlert").fadeOut().empty();
                            }</script>';
                    unset($_SESSION['updateSupplier']);
                    echo $SupplierNotUpdate;
                }
            }
            if (isset($_SESSION['deleteSupplier'])) {
                if (($_SESSION['deleteSupplier'] == 'yes')) {
                    $SupplierDeleted =  '<div class="alert alert-warning alert-dismissible" id="SupplierDeletedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Supplier  Deleted!!!.</strong>
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#SupplierDeletedAlert").fadeOut().empty();
                            }</script>';
                    unset($_SESSION['deleteSupplier']);
                    echo $SupplierDeleted;
                } else {
                    $SupplierNotDeleted =  '<div class="alert alert-danger alert-dismissible" id="SupplierNotDeletedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Supplier</strong> cannot be deleted  because the User is used in User Login Credentials. 
                            </div>   <script>setTimeout(fade_out, 10000);
                            function fade_out() {
                            $("#$SupplierNotDeletedAlert").fadeOut().empty();
                            }</script>';
                    unset($_SESSION['deleteSupplier']);
                    echo $SupplierNotDeleted;
                }
            }
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Supplier</h3>

                            <div class="box-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewSupplier">
                                    <strong><i class="fa fa-plus"></i> Add Supplier</strong></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <a class="box-body table-responsive no-padding">
                            <table style="color: black;" class="table table-hover" id="SupplierTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>GSTIN</th>
                                        <th>Company Name</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Pin Code</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $sqlDisplaySupplier = "SELECT * FROM `supplier_or_company`";
                                    if ($rawDate = $connect->query($sqlDisplaySupplier)) {
                                        while ($displaySup = $rawDate->fetch_assoc()) {
                                            $Supplier_id = $displaySup['supplier_id'];
                                            $gstin = $displaySup['gstin'];
                                            $supplier_name = $displaySup['supplier_name'];
                                            $state = $displaySup['state'];
                                            $city = $displaySup['city'];
                                            $city_pincode = $displaySup['city_pincode'];
                                            $s_phone_number = $displaySup['s_phone_number'];
                                            $s_email = $displaySup['s_email'];
                                            $s_address = $displaySup['s_address'];
                                            ?>

                                            <tr>
                                                <td><? echo $Supplier_id; ?></td>
                                                <td><? echo $gstin; ?></td>
                                                <td><? echo $supplier_name; ?></td>
                                                <td><? echo $state; ?></td>
                                                <td><? echo $city; ?></td>
                                                <td><? echo $city_pincode; ?></td>
                                                <td><? echo $s_phone_number; ?></td>
                                                <td><? echo $s_email; ?></td>
                                                <td><? echo $s_address; ?></td>
                                                <td>
                                                    <p><button class="btn btn-primary btn-xs editSupplier" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button> <span><button class="btn btn-danger btn-xs deleteSupplier" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></span> </p>
                                                </td>
                                            </tr>
                                    <?
                                        }
                                    }
                                    ?>
                                </tbody>
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
    <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../../bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="../../../bower_components/raphael/raphael.min.js"></script>
    <script src="../../../bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../../../bower_components/moment/min/moment.min.js"></script>
    <script src="../../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.js"></script>
    <!-- Select2 -->
    <script src="../../../bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <!-- ###################################################################################### -->
    <!-- my scripts -->
    <script src="../../../scripts/PurchaseAndsales/purchaseAndsales_master_supplier.js"></script>
    <!-- ###################################################################################################################################### -->
</body>

</html>