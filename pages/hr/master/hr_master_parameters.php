<?
session_start();
require '../../../connect.php';
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Parameters</title>
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
    <link rel="stylesheet" href="../../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.20/datatables.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
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
                                    <li><a href="../../../pages/hr/master/hr_master_designation.php"><i class="fa fa-table"></i> Designation</a></li>
                                    <li><a href="../../../pages/hr/master/hr_master_employee.php"><i class="fa fa-users"></i> Employees</a></li>
                                    <li class="active"><a href="../../../pages/hr/master/hr_master_parameters.php"><i class="fa fa-list"></i> Parameters</a></li>
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
            <!-- Add employee -->
            <div class="modal fade" id="addNewParameters" tabindex="-1" role="dialog" aria-labelledby="addNewParameters" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="addNewParametersTitle"> Add New Parameters </h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../pages/hr/master/add_parameters.php" method="POST">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="parametersId">Parameters ID</label>
                                        <input style="background-color: transparent; border: transparent;" type="text" name="parametersId" class="form-control" id="parametersId" readonly required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="parametersDate">Date</label>
                                        <div class="form-group">
                                            <div id="filterDate2">
                                                <!-- Datepicker as text field -->
                                                <div class="input-group date" data-date-format="mm-yyyy">
                                                    <input type="text" class="form-control" name="date" id='dateSelect' placeholder="mm-yyyy" required onchange="designationCheckUsingDate()">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-5">
                                        <div class="form-group">
                                            <label for="designationId">Designation</label>
                                            <select class="form-control" name="designationId" id="designationId" onchange="designationCheckUsingSelect()">
                                                <option value="--select--">--select--</option>
                                                <?
                                                $sqlDisplayDesignation = "SELECT `designation_id`,`description` FROM `designation`";
                                                if ($rawDate = $connect->query($sqlDisplayDesignation)) {
                                                    while ($displayDes = $rawDate->fetch_assoc()) {
                                                        $designationId = $displayDes['designation_id'];
                                                        $designation = $displayDes['description'];
                                                        ?>
                                                        <option value="<? echo $designationId ?>"><? echo $designation ?></option>
                                                <?
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                </label>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <h4 class="text-center">Parameters</h4>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4 class="text-center">Type</h4>
                                    </div>
                                    <div class="col-xs-1">
                                        <h4 class="text-center">%</h4>
                                    </div>
                                    <div class="col-xs-2">
                                        <h4 class="text-center">Flat</h4>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4 class="text-center">Value</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="parameters[]" value="HRA" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="type[]" value="Allowance" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">

                                        <div class="radio">
                                            <label><input type="radio" name="hra" value="percentage" checked>%</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="radio text-center">
                                            <label><input type="radio" name="hra" value="flat">Flat</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input type="number" name="hraValue" id="hra" class="form-control" min="0" placeholder="Enter Value">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="parameters[]" value="Medical" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="type[]" value="Allowance" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">

                                        <div class="radio">
                                            <label><input type="radio" name="medical" value="percentage" checked>%</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="radio text-center">
                                            <label><input type="radio" name="medical" value="flat">Flat</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input type="number" min="0" name="medicalValue" id="medical" class="form-control" placeholder="Enter value">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="parameters[]" value="Transportation" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="type[]" value="Allowance" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">

                                        <div class="radio">
                                            <label><input type="radio" name="transportation" value="percentage" checked>%</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="radio text-center">
                                            <label><input type="radio" name="transportation" value="flat">Flat</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input type="number" min="0" name="transportationValue" id="transportation" class="form-control" placeholder="Enter value">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="parameters[]" value="PF" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="type[]" value="Deductions" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">

                                        <div class="radio">
                                            <label><input type="radio" name="pf" value="percentage" checked>%</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="radio text-center">
                                            <label><input type="radio" name="pf" value="flat">Flat</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input type="number" min="0" name="pfValue" id="pf" class="form-control" id="updateEmployeeLastName" placeholder="Enter value">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="parameters[]" value="Professional Tax" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="type[]" value="Deductions" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">
                                        <div class="radio">
                                            <label><input type="radio" name="professionalTax" value="percentage" checked>%</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="radio text-center">
                                            <label><input type="radio" name="professionalTax" value="flat">Flat</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input type="number" min="0" name="professionalTaxValue" id="professionalTax" class="form-control" placeholder="Enter value">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addParametersButton">Add Parameters</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ###################################################################################################### -->
            <!-- ####################################################################################################### -->
            <!-- Edit designation -->
            <div class="modal fade" id="editParameter" tabindex="-1" role="dialog" aria-labelledby="editParameter" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="editParameterHeading"> Edit Employee </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../pages/hr/master/update_parameters.php" method="POST">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="editParametersId">Parameters ID</label>
                                        <input style="background-color: transparent; border: transparent;" type="text" name="editParametersId" class="form-control" id="editParametersId" readonly required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="editParametersDate">Date</label>
                                        <div class="form-group">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="editParametersDate" class="form-control" id="editParametersDate" readonly required>
                                        </div>
                                    </div>

                                    <div class="col-xs-5">
                                        <div class="form-group">
                                            <label for="editDesignationId">Designation</label>
                                            <input style="background-color: transparent; border: transparent;" type="text" name="editDesignationId" class="form-control" id="editDesignationId" readonly required>
                                        </div>
                                    </div>
                                </div>
                                </label>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <h4 class="text-center">Parameters</h4>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4 class="text-center">Type</h4>
                                    </div>
                                    <div class="col-xs-1">
                                        <h4 class="text-center">%</h4>
                                    </div>
                                    <div class="col-xs-2">
                                        <h4 class="text-center">Flat</h4>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4 class="text-center">Value</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="editParameters[]" value="HRA" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="editType[]" value="Allowance" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">

                                        <div class="radio">
                                            <label><input type="radio" name="editHra" value="percentage">%</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 text-center">
                                        <div class="radio">
                                            <label><input type="radio" name="editHra" value="flat">Flat</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input type="number" name="editHraValue" id="editHra" class="form-control" min="0" placeholder="Enter Value">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="editParameters[]" value="Medical" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="editType[]" value="Allowance" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">

                                        <div class="radio">
                                            <label><input type="radio" name="editMedical" value="percentage">%</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 text-center">
                                        <div class="radio">
                                            <label><input type="radio" name="editMedical" value="flat">Flat</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input type="number" min="0" name="editMedicalValue" id="editMedical" class="form-control" placeholder="Enter value">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="editParameters[]" value="Transportation" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="editType[]" value="Allowance" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">

                                        <div class="radio">
                                            <label><input type="radio" name="editTransportation" value="percentage">%</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="radio text-center">
                                            <label><input type="radio" name="editTransportation" value="flat">Flat</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input type="number" min="0" name="editTransportationValue" id="editTransportation" class="form-control" placeholder="Enter value">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="editParameters[]" value="PF" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="editType[]" value="Deductions" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">

                                        <div class="radio">
                                            <label><input type="radio" name="editPf" value="percentage">%</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="radio text-center">
                                            <label><input type="radio" name="editPf" value="flat">Flat</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input type="number" min="0" name="editPfValue" id='editPf' class="form-control" id="updateEmployeeLastName" placeholder="Enter value">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="editParameters[]" value="Professional Tax" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group text-center">
                                            <input style="background-color: transparent; border: transparent;" type="text" name="editType[]" value="Deductions" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">
                                        <div class="radio">
                                            <label><input type="radio" name="editProfessionalTax" value="percentage">%</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="radio text-center">
                                            <label><input type="radio" name="editProfessionalTax" value="flat">Flat</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input type="number" min="0" name="editProfessionalTaxValue" id='editProfessionalTax' class="form-control" placeholder="Enter value">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="updateEmployeeButton">Update Parameters</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ###################################################################################################### -->
            <!-- ####################################################################################################### -->
            <!-- Delete parameter -->
            <div class="modal fade" id="deleteParameter" tabindex="-1" role="dialog" aria-labelledby="deleteParameter" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="deleteParameterHeading"> Delete Parameter </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../pages/hr/master/delete_parameter.php" method="POST">
                                <h3 id='displayBox'></h3>
                                <input type="hidden" id="deleteParameterId" name="deleteParameterId" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="deleteParameterButton">Delete Parameter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ###################################################################################################### -->
            <section class="content">
                <?
                if (isset($_SESSION['addParameters'])) {
                    if (($_SESSION['addParameters'] == 'yes')) {
                        $parametersAdded =  '<div class="alert alert-success alert-dismissible" id="parametersAddedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>New </strong> Parameters Added
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#parametersAddedAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['addParameters']);
                        echo $parametersAdded;
                    } else {
                        $parametersNotAdded =  '<div class="alert alert-danger alert-dismissible" id="parametersNotAddedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Parameters </strong>Not Added
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#parametersNotAddedAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['addParameters']);
                        echo $parametersNotAdded;
                    }
                }
                if (isset($_SESSION['updateParameters'])) {
                    if (($_SESSION['updateParameters'] == 'yes')) {
                        $parametersUpdate =  '<div class="alert alert-success alert-dismissible" id="parametersUpdateAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Updated </strong> Employee Successfully.
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#parametersUpdateAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['updateParameters']);
                        echo $parametersUpdate;
                    } else {
                        $parametersNotUpdate =  '<div class="alert alert-danger alert-dismissible" id="parametersNotUpdateAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Employee</strong> Not Updated.
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#parametersNotUpdateAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['updateParameters']);
                        echo $parametersNotUpdate;
                    }
                }
                if (isset($_SESSION['deleteParameter'])) {
                    if (($_SESSION['deleteParameter'] == 'yes')) {
                        $parameterDelete =  '<div class="alert alert-warning alert-dismissible" id="parameterDeleteAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Parameter</strong> Deleted!!!.
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#parameterDeleteAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['deleteParameter']);
                        echo $parameterDelete;
                    } else {
                        $parameterNotDelete =  '<div class="alert alert-danger alert-dismissible" id="parameterNotDeleteAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Parameter</strong> cannot be deleted  because the designation is used by the one of the employee So you cannot perform this action. 
                            </div>   <script>setTimeout(fade_out, 10000);
                            function fade_out() {
                            $("#$parameterNotDeleteAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['deleteParameter']);
                        echo $parameterNotDelete;
                    }
                }
                ?>
                <div class="form-inline">
                    <div class="form-group">
                        <label for="month">Month:</label>
                        <select class="form-control" name="month" id="month">
                            <option value='all'>All</option>
                            <option value='01'>January</option>
                            <option value='02'>February</option>
                            <option value='03'>March</option>
                            <option value='04'>April</option>
                            <option value='05'>May</option>
                            <option value='06'>June</option>
                            <option value='07'>July</option>
                            <option value='08'>August</option>
                            <option value='09'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year">Year:</label>
                        <select class="form-control" name="year" id="year">
                        </select>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="getParametersList()">
                        <strong><i class="fa fa-search"></i> Parameters</strong></button>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Parameters</h3>

                                <div class="box-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewParameters" onclick="addParameters()">
                                        <strong><i class="fa fa-plus"></i> Add Parameters</strong></button>
                                </div>
                            </div>

                            <!-- /.box-header -->
                            <a class="box-body table-responsive no-padding">
                                <table style="color: black;" class="table table-bordered table-striped" id="parametersTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Designation</th>
                                            <th>Date</th>
                                            <th>Allowance</th>
                                            <th>Deductions</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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

    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js"></script>

    <!-- ###################################################################################### -->
    <!-- my scripts -->

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.20/datatables.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src="../../../scripts/hr/hr_master_parameters.js"></script>
    <!-- ###################################################################################################################################### -->
</body>

</html>