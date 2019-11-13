<?
session_start();
require '../../../connect.php';

$fromAndToDate = $_POST['betweenDate'];
$splitDate = explode("-", $fromAndToDate);
$trimTheValue =trim($splitDate[2]," ");
$discountStartDate = "$trimTheValue-$splitDate[1]-$splitDate[0]";
$trimTheValue =trim($splitDate[3]," ");
$discountEndDate = "$splitDate[5]-$splitDate[4]-$trimTheValue";
$lengthOfItems = count($_POST['itemCategory']);

for ($i = 0; $i < $lengthOfItems; $i++) {
    $itemCategory = $_POST['itemCategory'][$i];
    $itemCode = $_POST['itemCode'][$i];

    $sqlCheck = "SELECT disDet.item_category, disDet.item FROM discounts_and_flats as dis INNER JOIN discounts_and_flats_details as disDet ON dis.discount_id = disDet.discount_id WHERE '$discountStartDate' BETWEEN dis.discount_from_date AND dis.discount_to_date OR '$discountEndDate' BETWEEN dis.discount_from_date AND dis.discount_to_date HAVING disDet.item_category='$itemCategory' AND disDet.item ='$itemCode'";

    if ($rawData = $connect->query($sqlCheck)) {
        $data = mysqli_fetch_assoc($rawData);
        if(isset($data)){
            $checkedList[]=array('value'=> "yes");
        }else{
            $checkedList[]=array('value'=> "no");
        }
    }
}
echo(json_encode($checkedList));
?>