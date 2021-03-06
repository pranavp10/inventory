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

<body class="hold-transition skin-blue sidebar-mini  sidebar-collapse">
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
                            <li class="active treeview">
                                <a href="#"><i class="fa fa-link"></i> Transaction
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_purchase.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Purchase</a></li>
                                    <li class="active"><a href="../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_sales.php"><i class="fa fa-bar-chart" aria-hidden="true"></i></i> Sales=>Edit</a></li>
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
            <section class="content">
                <form action="../../../pages/PurchaseAndsales/transaction/save_sales.php" method="post">
                    <div class="alert alert-danger alert-dismissible" id="alert" hidden>
                    </div>
                    <div class="row">
                        <div class="col-xs-12"></div>
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Add Sales</h3>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <label for="salesId">Sales ID</label>
                                                <input style="background-color: transparent; border: transparent;" type="text" name="salesId" class="form-control" id="salesId" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <label for="customerId">Customer Or Company Name</label>
                                                <select class="form-control select2" name="customerId" id="customerId">
                                                    <option value="-Select-">-Select</option>
                                                    <?
                                                    $sqlDisplayCustomer = "SELECT `customer_id`,`cust_comp_name` FROM `customer_or_company`";
                                                    if ($rawDate = $connect->query($sqlDisplayCustomer)) {
                                                        while ($displayCustomer = $rawDate->fetch_assoc()) {
                                                            $customer_Id = $displayCustomer['customer_id'];
                                                            $customer_name = $displayCustomer['cust_comp_name'];
                                                            ?>
                                                            <option value="<? echo $customer_Id ?>"><? echo $customer_name ?></option>
                                                    <?
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <label for="salesDate">Sales Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right" name="salesDate" id="salesDate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <label for="lrNumber">LR Number</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-truck"></i>
                                                    </div>
                                                    <input type="text" class="form-control" name="lrNumber" id="lrNumber">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-bordered table-hover" id="tableData">
                                        <thead>
                                            <tr>
                                                <th>Sl-No</th>
                                                <th>List of ItemCategory Name</th>
                                                <th>Item Code (Based on category) </th>
                                                <th>Item Name (Based on category) </th>
                                                <th>Tax</th>
                                                <th>Quantity</th>
                                                <th>Remaining Quantity</th>
                                                <th>Item Type</th>
                                                <th>Price Per Unit</th>
                                                <th>Total Amount</th>
                                                <th>Total Amount with Tax</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td id="0">1</td>
                                                <td> <select class="form-control itemCategory" name="itemCategory[]" id="itemCategory0">
                                                        <option value="-Select-">-Select-</option>
                                                        <?
                                                        $sqlDisplayItemCategory = "SELECT `item_category_id`,`item_category_name` FROM `item_category`";
                                                        if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
                                                            while ($displayCat = $rawDate->fetch_assoc()) {
                                                                $itemCategoryId = $displayCat['item_category_id'];
                                                                $ItemCategory = $displayCat['item_category_name'];
                                                                ?>
                                                                <option value="<? echo $itemCategoryId ?>"><? echo $ItemCategory ?></option>
                                                        <?
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td> <select class="form-control itemCode" name="itemCode[]" id="itemCode0">
                                                        <!-- <option selected="selected">Alabama</option> -->
                                                        <option value="-Select-">-Select-</option>

                                                    </select>
                                                </td>
                                                <td> <select class="form-control item" name="item[]" id="item0">
                                                        <option value="-Select-">-Select-</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input style="background-color: transparent; border: transparent;" type="text" name="tax[]" class="form-control tax" id="tax0" readonly required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" onkeypress="return isNumberKey(event)" name="quantity[]" class="form-control quantity" id="quantity0" disabled required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input style="background-color: transparent; border: transparent;" type="text" name="remainingQuantity[]" class="form-control remainingQuantity" id="remainingQuantity0" readonly required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input style="background-color: transparent; border: transparent;" type="text" name="itemType[]" class="form-control itemType" id="itemType0" readonly required>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="pricePerUnit[]" onkeypress="return isNumberKey(event)" class="form-control pricePerUnit" id="pricePerUnit0" disabled required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input style="background-color: transparent; border: transparent;" type="text" name="totalAmount[]" class="form-control totalAmount" id="totalAmount0" readonly required>

                                                </td>
                                                <td>
                                                    <input style="background-color: transparent; border: transparent;" type="text" name="totalAmountWithTax[]" class="form-control totalAmountWithTax" id="totalAmountWithTax0" readonly required>

                                                </td>
                                                <td><button class="btn btn-danger btn-xs deleteRow" disabled><span class="glyphicon glyphicon-trash"></span></button></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <td colspan="5">Total Amount:</td>
                                            <td>
                                                <input type="text" name="totalQuantityOfSales" class="form-control totalQuantityOfSales" id="totalQuantityOfSales" readonly required>
                                            </td>
                                            <td colspan="2"></td>
                                            <td>
                                                <input type="text" name="totalAmountOfSales" class="form-control totalAmountOfSales" id="totalAmountOfSales" readonly required>
                                            </td>
                                            <td colspan="2">
                                                <input type="text" name="totalAmountWithTaxOfSales" class="form-control totalAmountWithTaxOfSales" id="totalAmountWithTaxOfSales" readonly required>
                                            </td>

                                        </tfoot>
                                    </table>
                                    <div class="box-tools">
                                        <button type="button" class="btn btn-primary" onclick="addNewRow()">
                                            <strong><i class="fa fa-plus"></i> Add New Item </strong></button>
                                    </div>
                                    <button type="submit" class="btn pull-right btn-success" id="readySubmitButton" disabled>Submit<i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-danger pull-right" id="submitButton" onclick="checkData()">Stock Check <i class="fa fa-question-circle"></i></button>
                                    <button type="button" class="btn btn-default pull-right" onClick="location.href='../../../pages/PurchaseAndsales/transaction/purchaseAndsales_transaction_purchase.php'">Cancel</button>
                                </div>

                                <!-- /.box-header -->
                            </div>

                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
        </div>
        <!-- /.row -->
        </form>
        </section>

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
    <script src="../../../scripts/PurchaseAndsales/add_sales.js"></script>
    <!-- ###################################################################################################################################### -->
</body>

</html>