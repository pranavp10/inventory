<?
session_start();
require '../../../connect.php';

if (isset($_POST['addCustomerOrCompanyButton'])) {

    if ($_POST['customerId'] != NULL) {
        $customer_Id = $_POST['customerId'];
    } else {
        echo "Customer or Company ID Not Entered";
        exit;
    }

    if ($_POST['gstin'] != NULL) {
        $gstin = strtoupper($_POST['gstin']);
    }
    else
    {
        $gstin = "";
    }
    if ($_POST['customerName'] != NULL) {
        $customerName = ucfirst(strtolower($_POST['customerName']));
    }
    else
    {
        echo "Customer or Company Not Entered";
        exit;
    }
    if ($_POST['state'] !== '-select-') {
        $state = $_POST['state'];
    }
    else
    {
        echo "State Not Entered";
        exit;
    }
    if ($_POST['selectCity'] !== '-select-') {
        $city = $_POST['selectCity'];
    }
    else
    {
        echo "City Not Entered";
        exit;
    }
    if ($_POST['cityPinCode'] != NULL) {
        $cityPinCode = $_POST['cityPinCode'];
    }
    else
    {
        echo "city PinCode Not Entered";
        exit;
    }

    if ($_POST['customerNumber'] != NULL) {
        $rawCustomerNumber = $_POST['customerNumber'];
        $processNumber = explode("-", $rawCustomerNumber);
        $customerNumber = "$processNumber[0]$processNumber[1]$processNumber[2]";
    }
    else
    {
        echo "customerNumber Not Entered";
        exit;
    }
    if ($_POST['customerEmail'] != NULL) {
        $customerEmail = $_POST['customerEmail'];
    }
    else
    {
        $customerEmail = "";
    }

    if ($_POST['customerAddress'] != NULL) {
        $customerAddress = $_POST['customerAddress'];
    }
    else
    {
        $customerAddress = "";
    }
    $sqlInsertCustomer = "INSERT INTO `customer_or_company`(`customer_id`, `gstin`, `cust_comp_name`, `state`, `city`, `city_pincode`, `c_phone_number`, `c_email`, `c_address`) VALUES ('$customer_Id','$gstin','$customerName','$state','$city','$cityPinCode','$customerNumber','$customerEmail','$customerAddress')";

    if ($connect->query($sqlInsertCustomer)) {
        $_SESSION["addCustomer"] = 'yes';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_customers.php");
    }else {
        $_SESSION["addCustomer"] = 'no';
        header("Location: ../../../pages/PurchaseAndsales/master/purchaseAndsales_master_customers.php");
    }
}else{
    echo 'You did not click the button';
}
?>
