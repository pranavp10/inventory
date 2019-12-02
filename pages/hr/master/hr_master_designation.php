<?
session_start();
require '../../../connect.php';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Designation</title>
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
    <!-- Morris chart -->
    <link rel="stylesheet" href="../../../bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../../../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.20/datatables.min.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

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

                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-user-circle"></i> <span>HR</span>
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
                                    <li class="active"><a href="../../../pages/hr/master/hr_master_designation.php"><i class="fa fa-table"></i> Designation</a></li>
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
                                    <li><a href="../../../pages/PurchaseAndsales/master/purchaseAndsales_master_customers.php"><i class="fa fa-male"></i> Customers</a></li>
                                    <li><a href="../../../pages/PurchaseAndsales/master/purchaseAndsales_master_supplier.php"><i class="fa fa-industry"></i> Supplier</a></li>
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
            <!-- Add Designation -->
            <div class="modal fade" id="addNewDesignation" tabindex="-1" role="dialog" aria-labelledby="addNewDesignation" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="addNewDesignation"> Add New Designation </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../pages/hr/master/add_designation.php" method="POST">
                                <label for="designationId">Designation ID</label>
                                <input style="background-color: transparent; border: transparent;" type="text" name="designationId" class="form-control" id="designationId" readonly required>
                                <div class="form-group">
                                    <label for="DesignationName">Designation Name</label>
                                    <input type="text" name="designationName" class="form-control" id="DesignationName" placeholder="Enter Designation Name" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addDesignationButton">Add Designation</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Export the xml file -->
            <div class="modal fade" id="importXLS" tabindex="-1" role="dialog" aria-labelledby="importXLS" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="importXLSTitle"> Import Excel File </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../pages/hr/master/importXml.php" method="POST" enctype="multipart/form-data" >
                                <li>The file type should be in xml</li>
                                <li>The file type should be corrupt</li>
                                <li>The file content should contain  Designation Id And Designation Name and it should be in same order</li>
                                <li>The file Designation Id should in DES- and number and it should be unique</li>
                                <div class="form-group">
                                <div class="input-group input-file">
                                    <label for="importXLSFiles">Choose File </label>
                                    <input class="input-group input-file"  type="file" name="importXLSFiles" id="importXLSFiles" accept=".xls,.xlsx">
                                </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addDesignationButton">Import</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ###################################################################################################### -->
            <!-- ####################################################################################################### -->
            <!-- Edit designation -->
            <div class="modal fade" id="editDesignation" tabindex="-1" role="dialog" aria-labelledby="editDesignation" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="editDesignation"> Edit Designation </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../pages/hr/master/update_designation.php" method="POST">
                                <label for="designationId">Designation ID</label>
                                <input style="background-color: transparent; border: transparent;" type="text" name="editDesignationId" class="form-control" id="editDesignationId" readonly required>
                                <div class="form-group">
                                    <label for="editDesignationName">Designation Name</label>
                                    <input type="text" name="editDesignationName" class="form-control" id="editDesignationName" placeholder="Enter Designation Name" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="updateDesignationButton">Update Designation</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ###################################################################################################### -->
            <!-- ####################################################################################################### -->
            <!-- Delete designation -->
            <div class="modal fade" id="deleteDesignation" tabindex="-1" role="dialog" aria-labelledby="editDesignation" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="deleteDesignationHeading"> Delete Designation </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../pages/hr/master/delete_designation.php" method="POST">
                                <h3 id='displayBox'></h3>
                                <input type="hidden" id="deleteId" name="deleteId" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="deleteDesignationButton">Delete Designation</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ###################################################################################################### -->
            <section class="content">
                <?
                    if(isset($_SESSION['addDesignation'])){
                        if(($_SESSION['addDesignation']=='yes')){
                            $newDesignationAdded =  '<div class="alert alert-success alert-dismissible" id="newDesignationAddedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>New </strong> Designation Added
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#newDesignationAddedAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['addDesignation']);
                            echo $newDesignationAdded;
                        }else{
                            $designationNotAdded =  '<div class="alert alert-danger alert-dismissible" id="designationNotAddedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Designation</strong> Not Added
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#designationNotAddedAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['addDesignation']);
                            echo $designationNotAdded;
                        }
                    }
                    if(isset($_SESSION['updateDesignation'])){
                        if(($_SESSION['updateDesignation']=='yes')){
                            $designationUpdate =  '<div class="alert alert-success alert-dismissible" id="designationUpdateAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Updated </strong> Designation Successfully.
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#designationUpdateAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['updateDesignation']);
                            echo $designationUpdate;
                        }else{
                            $designationNotUpdate =  '<div class="alert alert-danger alert-dismissible" id="designationNotUpdateAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Designation</strong> Not Updated.
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#designationNotUpdateAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['updateDesignation']);
                            echo $designationNotUpdate;
                        }
                    }
                    if(isset($_SESSION['deleteDesignation'])){
                        if(($_SESSION['deleteDesignation']=='yes')){
                            $designationDelete =  '<div class="alert alert-warning alert-dismissible" id="designationDeleteAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Designation </strong> Deleted!!!.
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#designationDeleteAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['deleteDesignation']);
                            echo $designationDelete;
                        }else{
                            $designationNotDelete =  '<div class="alert alert-danger alert-dismissible" id="designationNotDeleteAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Designation</strong> cannot be deleted  because the designation is used by the one of the employee So you cannot perform this action. 
                            </div>   <script>setTimeout(fade_out, 10000);
                            function fade_out() {
                            $("#$designationNotDeleteAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['deleteDesignation']);
                            echo $designationNotDelete;
                        }
                    }
                    if(isset($_SESSION['importXLS'])){
                        if(($_SESSION['importXLS']=='yes')){
                            $importXLS =  '<div class="alert alert-warning alert-dismissible" id="designationDeleteAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>'.$_SESSION['message'].'</strong>
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#designationDeleteAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['importXLS']);
                            echo $importXLS;
                        }else{
                            $importXLSNot =  '<div class="alert alert-danger alert-dismissible" id="designationNotDeleteAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>'.$_SESSION['message'].'</strong> 
                            </div>   <script>setTimeout(fade_out, 10000);
                            function fade_out() {
                            $("#$designationNotDeleteAlert").fadeOut().empty();
                            }</script>';
                            unset($_SESSION['importXLS']);
                            unset($_SESSION['message']);
                            echo $importXLSNot;
                        }
                    }
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Designation</h3>

                                <div class="box-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewDesignation" onclick="addDesignation()">
                                        <strong><i class="fa fa-plus"></i> Add Designation</strong></button>
                                </div>

                                <div class="box-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importXLS" onclick="addDesignation()">
                                        <strong><i class="fa fa-upload"></i> Import Excel </strong></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <a class="box-body table-responsive no-padding">
                                <table style="color: black;" class="table table-hover" id="designationTable">
                                    <thead>
                                        <tr>
                                            <th>Designation ID</th>
                                            <th>Designation</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        $sqlDisplayDesignation = "SELECT `designation_id`,`description` FROM `designation`";
                                        if ($rawDate = $connect->query($sqlDisplayDesignation)) {
                                            while ($displayDes = $rawDate->fetch_assoc()) {
                                                $designationId = $displayDes['designation_id'];
                                                $designation = $displayDes['description'];
                                                ?>

                                                <tr>
                                                    <td><? echo $designationId; ?></td>
                                                    <td><? echo $designation; ?></td>
                                                    <td><button class="btn btn-primary btn-xs editDesignation" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p>
                                                    </td>
                                                    <td><button class="btn btn-danger btn-xs deleteDesignation" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p>
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
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js"></script>

    <!-- ###################################################################################### -->
    <!-- my scripts -->

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.20/datatables.min.js"></script>
    <script src="../../../scripts/hr/hr_master_designation.js"></script>
    <!-- ###################################################################################################################################### -->
</body>

</html>
?>