<?
require '../../../connect.php';


if ($_POST['presentPurchaseId'] != '-Select-') {
    $presentPurchaseId = $_POST['presentPurchaseId'];
    $sqlPayment = "SELECT pList.total_amount_tax, MAX(paymentPurchase.amount_paid) AS totalAmountPayed FROM purchase_payment_list as paymentPurchase INNER JOIN purchase AS pList ON paymentPurchase.purchase_id= pList.purchase_id WHERE pList.purchase_id = '$presentPurchaseId'";
    if ($rawPayment = $connect->query($sqlPayment)) {
        if(mysqli_num_rows($rawPayment))
        while ($amount = $rawPayment->fetch_assoc()) {
            if(empty($amount['totalAmountPayed'])){
                $payment =array("totalAmount"=> $amount['total_amount_tax'],"amountPaid"=>$amount['total_amount_tax']); 
            }else {
                $payment =array("totalAmount"=> $amount['total_amount_tax'],"amountPaid"=>$amount['totalAmountPayed']); 
            }
        }
        echo json_encode($payment);
    }else{
        echo json_encode("nothing");
    }
}else{
    echo json_encode("nothing");
}
?>
