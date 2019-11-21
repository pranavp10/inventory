<?
require '../../../connect.php';


if ($_POST['presentPurchaseId'] != '-Select-') {
    $presentPurchaseId = $_POST['presentPurchaseId'];
    $sqlPayment = "SELECT `total_amount_tax` FROM purchase WHERE `purchase_id`= '$presentPurchaseId'";
    if ($rawPayment = $connect->query($sqlPayment)) {
        if(mysqli_num_rows($rawPayment))
        while ($amount = $rawPayment->fetch_assoc()) {
            $payment =array("totalAmount"=> $amount['total_amount_tax']); 
        }
        echo json_encode($payment);
    }else{
        echo json_encode("nothing");
    }
}else{
    echo json_encode("nothing");
}
?>
