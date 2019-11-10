<?
session_start();
require '../../../connect.php';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Item Category</title>
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
                                    <li class="active"><a href="../../../pages/Inventory/master/inventory_master_item_category.php"><i class="fa fa-sitemap"></i> Item Category</a></li>
                                    <li><a href="../../../pages/Inventory/master/inventory_master_item.php"><i class="fa fa-inbox"></i> Item</a></li>
                                    <li><a href="../../../pages/Inventory/master/inventory_master_tax.php"><i class="fa fa-calculator"></i> Tax</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-link"></i> Transaction
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="../../../pages/Inventory/transaction/inventory_transaction_discount_and_flat.php/"><i class="fa fa-tag" aria-hidden="true"></i> Discount & Flat</a></li>
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
            <!-- Add Designation -->
            <div class="modal fade" id="addNewItemCategory" tabindex="-1" role="dialog" aria-labelledby="addNewItemCategory" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="addNewItemCategoryHeading"> Add New Item Category </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../pages/Inventory/master/add_category_item.php" method="POST">
                                <label for="itemCategoryId">Item Category ID</label>
                                <input style="background-color: transparent; border: transparent;" type="text" name="itemCategoryId" class="form-control" id="itemCategoryId" readonly required>
                                <div class="form-group">
                                    <label for="itemCategoryName">Item Category Name</label>
                                    <input type="text" name="itemCategoryName" minlength="3" class="form-control" id="itemCategoryName" placeholder="Enter Item Category Name" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addItemCategoryButton">Add Item Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ###################################################################################################### -->
            <!-- ####################################################################################################### -->
            <!-- Edit designation -->
            <div class="modal fade" id="editItemCategory" tabindex="-1" role="dialog" aria-labelledby="editItemCategory" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="editItemCategoryHeading"> Edit Item Category </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../pages/Inventory/master/update_category_item.php" method="POST">
                                <label for="editItemCategoryId">Item Category ID</label>
                                <input style="background-color: transparent; border: transparent;" type="text" name="editItemCategoryId" class="form-control" id="editItemCategoryId" readonly required>
                                <div class="form-group">
                                    <label for="editItemCategoryName">Item Category Name</label>
                                    <input type="text" name="editItemCategoryName" minlength="3" class="form-control" id="editItemCategoryName" placeholder="Enter Item Category Name" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="updateItemCategoryButton">Update Item Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ###################################################################################################### -->
            <!-- ####################################################################################################### -->
            <!-- Delete designation -->
            <div class="modal fade" id="deleteItemCategory" tabindex="-1" role="dialog" aria-labelledby="deleteItemCategory" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="deleteItemCategoryHeading"> Delete Item Category </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../../../pages/Inventory/master/delete_category_item.php" method="POST">
                                <h3 id='displayBox'></h3>
                                <input type="hidden" id="deleteId" name="deleteId" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="deleteItemCategoryButton">Delete Item Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ###################################################################################################### -->
            <section class="content">
                <?
                if (isset($_SESSION['addItemCategory'])) {
                    if (($_SESSION['addItemCategory'] == 'yes')) {
                        $newItemCategoryAdded =  '<div class="alert alert-success alert-dismissible" id="newItemCategoryAddedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> New Item Category Added. </strong>
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#newItemCategoryAddedAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['addItemCategory']);
                        echo $newItemCategoryAdded;
                    } else {
                        $ItemCategoryNotAdded =  '<div class="alert alert-danger alert-dismissible" id="ItemCategoryNotAddedAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>New Item Category Not Added!!!</strong>
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#ItemCategoryNotAddedAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['addItemCategory']);
                        echo $ItemCategoryNotAdded;
                    }
                }
                if (isset($_SESSION['updateItemCategory'])) {
                    if (($_SESSION['updateItemCategory'] == 'yes')) {
                        $itemCategoryUpdate =  '<div class="alert alert-success alert-dismissible" id="itemCategoryUpdateAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Updated Item Category Successfully</strong>.
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#itemCategoryUpdateAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['updateItemCategory']);
                        echo $itemCategoryUpdate;
                    } else {
                        $itemCategoryNotUpdate =  '<div class="alert alert-danger alert-dismissible" id="itemCategoryNotUpdateAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> Item Category Not Updated !!!</strong>
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#itemCategoryNotUpdateAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['updateItemCategory']);
                        echo $itemCategoryNotUpdate;
                    }
                }
                if (isset($_SESSION['deleteItemCategory'])) {
                    if (($_SESSION['deleteItemCategory'] == 'yes')) {
                        $itemCategoryDelete =  '<div class="alert alert-warning alert-dismissible" id="itemCategoryDeleteAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Item Category Deleted!!!</strong>
                            </div>   <script>setTimeout(fade_out, 5000);
                            function fade_out() {
                            $("#itemCategoryDeleteAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['deleteItemCategory']);
                        echo $itemCategoryDelete;
                    } else {
                        $itemCategoryNotDelete =  '<div class="alert alert-danger alert-dismissible" id="itemCategoryNotDeleteAlert" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Item Category cannot be deleted  because the Item Category is used by the one of the Item So you cannot perform this action.</strong>
                            </div>   <script>setTimeout(fade_out, 10000);
                            function fade_out() {
                            $("#$itemCategoryNotDeleteAlert").fadeOut().empty();
                            }</script>';
                        unset($_SESSION['deleteItemCategory']);
                        echo $itemCategoryNotDelete;
                    }
                }
                ?>
                <div class="row">
                    <div class="col-xs-12">

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Item Category</h3>

                                <div class="box-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewItemCategory" onclick="addItemCategory()">
                                        <strong><i class="fa fa-plus"></i> Add Item Category</strong></button>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="itemCategoryTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Item Category ID</th>
                                                <th>Item Category Name</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                            $sqlDisplayItemCategory = "SELECT `item_category_id`,`item_category_name` FROM `item_category`";
                                            if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
                                                while ($displayCat = $rawDate->fetch_assoc()) {
                                                    $ItemCategoryId = $displayCat['item_category_id'];
                                                    $ItemCategoryName = $displayCat['item_category_name'];
                                                    ?>

                                                    <tr>
                                                        <td><? echo $ItemCategoryId; ?></td>
                                                        <td><? echo $ItemCategoryName; ?></td>
                                                        <td><button class="btn btn-primary btn-xs editItemCategory" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p>
                                                        </td>
                                                        <td><button class="btn btn-danger btn-xs deleteItemCategory" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p>
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
        <!-- jQuery 3 -->
        <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../../../bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <!-- Bootstrap 3.3.7 -->
        <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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
        <!-- DataTables -->
        <script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <!-- ###################################################################################### -->
        <!-- my scripts -->

        <script src="../../../scripts/inventory/inventory_master_item_category.js"></script>
        <!-- ###################################################################################################################################### -->
</body>

</html>
?>