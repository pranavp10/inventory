<?
require '../../../connect.php';


if ($_POST['supplierId'] != '-Select-') {
    $supplierId = $_POST['supplierId'];
    $sqlTotalPayment = "SELECT SUM(`total_amount_tax`) AS totalAmount FROM purchase WHERE `supplier_id` = '$supplierId'";
    if ($rawPayment = $connect->query($sqlTotalPayment)) {
        if(mysqli_num_rows($rawPayment))
        while ($amount = $rawPayment->fetch_assoc()) {
            $payment =array("totalAmountSupplier"=> $amount['totalAmount']); 
        }
        echo json_encode($payment);
    }else{
        echo json_encode("nothing");
    }
}else{
    echo json_encode("nothing");
}
?>
