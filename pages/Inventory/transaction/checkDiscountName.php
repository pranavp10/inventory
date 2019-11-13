<?
session_start();
require '../../../connect.php';
if($_POST['name'] != NULL){
    $name = $_POST['name'];
    $sqlCheckDiscountName="SELECT `discount_name` FROM `discounts_and_flats` WHERE `discount_name`='$name'"; 
    if($rawData = $connect->query($sqlCheckDiscountName)){
        $data = mysqli_fetch_assoc($rawData);
        if($data['discount_name'] == NULL){
            echo (json_encode('yes'));
        }else{
            echo (json_encode('no'));
        }
    }
}else{

    echo (json_encode('no'));
}
?>