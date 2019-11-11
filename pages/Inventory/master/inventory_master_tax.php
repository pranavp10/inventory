<?
session_start();
require '../../../connect.php';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tax</title>
    <!-- Tell the browser to be responsive to screen width -->
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

    <!-- Date Picker -->
    <link rel="stylesheet" href="../../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../../bower_components/select2/dist/css/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

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
                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-list-alt"></i> <span> Inventory</span>
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
                                    <li><a href="../../../pages/Inventory/master/inventory_master_item_category.php"><i class="fa fa-sitemap"></i> Item Category</a></li>
                                    <li class="active"><a href="../../../pages/Inventory/master/inventory_master_tax.php"><i class="fa fa-calculator"></i> Tax</a></li>
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
                                    <li><a href="../../../pages/PurchaseAndsales/master/purchaseAndsales_master_tax.php"><i class="fa fa-dashboard"></i> Credit Limit</a></li>
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
            <!-- Add item -->
            <div class="modal fade" id="addNewTax" tabindex="-1" role="dialog" aria-labelledby="addNewTax" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="addNewTaxHeading"> Add New Tax </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../pages/Inventory/master/add_tax.php" method="POST">
                                <label for="taxId">Tax ID</label>
                                <input style="background-color: transparent; border: transparent;" type="text" name="taxId" class="form-control" id="taxId" readonly required>

                                <div class="form-group">
                                    <label for="taxCode">Tax Code</label>
                                    <input type="text" name="taxCode" minlength="3" class="form-control" id="taxCode" placeholder="Enter Tax Code" required>
                                </div>
                                <div class="form-group">
                                <label for="taxPercentage">Tax Percentage(%)</label>

                                    <div class="input-group">
                                    <input type="number" min='0' max='100' name="taxPercentage" class="form-control" id="taxPercentage" placeholder="Enter Percentage(%)" required>
                                            <div class="input-group-addon">
                                                <i class="fa fa-percent"></i>
                                            </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addTaxButton">Add Tax </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ###################################################################################################### -->
            <!-- ####################################################################################################### -->
            <!-- Edit Tax -->
            <div class="modal fade" id="editTax" tabindex="-1" role="dialog" aria-labelledby="editItem" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="editItemHeading"> Edit Tax </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../pages/Inventory/master/update_tax.php" method="POST">
                            <label for="editTaxId">Tax ID</label>
                                <input style="background-color: transparent; border: transparent;" type="text" name="editTaxId" class="form-control" id="editTaxId" readonly required>

                                <div class="form-group">
                                    <label for="editTaxCode">Tax Code</label>
                                    <input type="text" name="editTaxCode" minlength="3" class="form-control" id="editTaxCode" placeholder="Enter Tax Code" required>
                                </div>
                                <div class="form-group">
                                <label for="editTaxPercentage">Tax Percentage(%)</label>
                                    <div class="input-group">
                                    <input type="number" min='0' max='100' name="editTaxPercentage" class="form-control" id="editTaxPercentage" placeholder="Percentage(%)" required>
                                            <div class="input-group-addon">
                                                <i class="fa fa-percent"></i>
                                            </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="updateTaxButton">Update Tax</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ###################################################################################################### -->
            <!-- ####################################################################################################### -->
            <!-- Delete addItem -->
            <div class="modal fade" id="deleteTax" tabindex="-1" role="dialog" aria-labelledby="deleteItem" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="deleteItemHeading"> Delete Item </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../pages/Inventory/master/delete_tax.php" method="POST">
                                <h3 id='displayBox'></h3>
                                <input type="hidden" id="deleteId" name="deleteId" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="deleteTaxButton">Delete Tax</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ###################################################################################################### -->
            <section class="content">
                <?
                if (isset($_SESSION['addTax'])) {
                    if (($_SESSION['addTax'] == 'yes')) {
                        $newTaxAdded =  '<div class="alert alert-success alert-dismissible" id="newTaxAddedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> New Tax Added. </strong>
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#newTaxAddedAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['addTax']);
                        echo $newTaxAdded;
                    } else {
                        $newTaxNotAdded =  '<div class="alert alert-danger alert-dismissible" id="newTaxNotAddedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>New Tax Not Added!!!</strong>
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#newTaxNotAddedAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['addTax']);
                        echo $newTaxNotAdded;
                    }
                }
                if (isset($_SESSION['updateTax'])) {
                    if (($_SESSION['updateTax'] == 'yes')) {
                        $taxUpdated =  '<div class="alert alert-success alert-dismissible" id="taxUpdatedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Updated Tax Successfully</strong>.
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#taxUpdatedAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['updateTax']);
                        echo $taxUpdated;
                    } else {
                        $taxNotUpdated =  '<div class="alert alert-danger alert-dismissible" id="taxNotUpdatedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> Tax Not Updated !!!</strong>
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#taxNotUpdatedAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['updateTax']);
                        echo $taxNotUpdated;
                    }
                }
                if (isset($_SESSION['deleteTax'])) {
                    if (($_SESSION['deleteTax'] == 'yes')) {
                        $taxDeleted =  '<div class="alert alert-warning alert-dismissible" id="taxDeletedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Tax Deleted!!!</strong>
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#taxDeletedAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['deleteTax']);
                        echo $taxDeleted;
                    } else {
                        $taxNotDeleted =  '<div class="alert alert-danger alert-dismissible" id="taxNotDeletedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Tax cannot be deleted  because the tax is used by the one of the Item So you cannot perform this action.</strong>
                            </div>   <script>setTimeout(fade_out, 10000);
                            function fade_out() {
                            $("#$taxNotDeletedAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['deleteTax']);
                        echo $taxNotDeleted;
                    }
                }
                ?>
                <div class="row">
                    <div class="col-xs-12">

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Tax</h3>

                                <div class="box-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewTax" onclick="addTax()">
                                        <strong><i class="fa fa-plus"></i> Add Tax </strong></button>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="taxTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Tax ID</th>
                                                <th>Tax Code</th>
                                                <th>Tax Percentage(%)</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                            $sqlDisplayTax = "SELECT `tax_id`,`tax_code`,`tax_percentage` FROM `tax`";
                                            if ($rawDate = $connect->query($sqlDisplayTax)) {
                                                while ($displayTax = $rawDate->fetch_assoc()) {
                                                    $taxId = $displayTax['tax_id'];
                                                    $taxCode = $displayTax['tax_code'];
                                                    $taxPercentage = $displayTax['tax_percentage'];
                                                    ?>

                                                    <tr>
                                                        <td><? echo $taxId; ?></td>
                                                        <td><? echo $taxCode; ?></td>
                                                        <td><? echo "$taxPercentage%"; ?></td>
                                                        <td><button class="btn btn-primary btn-xs editTax" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p>
                                                        </td>
                                                        <td><button class="btn btn-danger btn-xs deleteTax" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p>
                                                        </td>
                                                    </tr>
                                            <?
                                                }
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
            </section>
            <!-- /.content-wrapper -->
        </div>
        <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../../../bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Sparkline -->
        <script src="../../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
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
        <script src="../../../bower_components/select2/dist/js/select2.full.min.js"></script>
        <!-- DataTables -->
        <script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <!-- ###################################################################################### -->
        <!-- my scripts -->

        <script src="../../../scripts/inventory/inventory_master_tax.js"></script>
        <!-- ###################################################################################################################################### -->
</body>

</html>
?>