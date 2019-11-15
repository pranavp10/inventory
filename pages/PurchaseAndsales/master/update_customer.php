<?
session_start();
require '../../../connect.php';

if (isset($_POST['updateCustomerButton'])) {

    if ($_POST['editCustomerId'] != NULL) {
        $editCustomerId = $_POST['editCustomerId'];
    } else {
        echo "Customer or Company ID Not Entered";
        exit;
    }

    if ($_POST['editGstin'] != NULL) {
        $editGstin = strtoupper($_POST['editGstin']);
    }
    else
    {
        $editGstin = "";
    }
    if ($_POST['editCustomerName'] != NULL) {
        $editCustomerName = ucfirst(strtolower($_POST['editCustomerName']));
    }
    else
    {
        echo "Customer or Company Not Entered";
        exit;
    }
    if ($_POST['editState'] !== '-select-') {
        $editState = $_POST['editState'];
    }
    else
    {
        echo "State Not Entered";
        exit;
    }
    if ($_POST['editSelectCity'] !== '-select-') {
        $editSelectCity = $_POST['editSelectCity'];
    }
    else
    {
        echo "City Not Entered";
        exit;
    }
    if ($_POST['editCityPinCode'] != NULL) {
        $editCityPinCode = $_POST['editCityPinCode'];
    }
    else
    {
        echo "city PinCode Not Entered";
        exit;
    }

    if ($_POST['editCustomerNumber'] != NULL) {
        $rawCustomerNumber = $_POST['editCustomerNumber'];
        $processNumber = explode("-", $rawCustomerNumber);
        $editCustomerNumber = "$processNumber[0]$processNumber[1]$processNumber[2]";
    }
    else
    {
        echo "customerNumber Not Entered";
        exit;
    }
    if ($_POST['editCustomerEmail'] != NULL) {
        $editCustomerEmail = $_POST['editCustomerEmail'];
    }
    else
    {
        $editCustomerEmail = "";
    }

    if ($_POST['editCustomerAddress'] != NULL) {
        $editCustomerAddress = $_POST['editCustomerAddress'];
    }
    else
    {
        $editCustomerAddress = "";
    }
    $sqlUpdateCustomer = "UPDATE `customer_or_company` SET `gstin` = '$editGstin', `cust_comp_name` = '$editCustomerName', `state` = '$editState', `city` = '$editSelectCity', `city_pincode` = '$editCityPinCode', `c_phone_number` = '$editCustomerNumber', `c_email` = '$editCustomerEmail', `c_address` = '$editCustomerAddress' WHERE `customer_or_company`.`customer_id` = '$editCustomerId';";

    if ($connect->query($sqlUpdateCustomer)) {
        $_SESSION["updateCustomer"] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_customers.php");
    }else {
        $_SESSION["updateCustomer"] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_customers.php");
    }
}else{
    echo 'You did not click the button';
}
?>
