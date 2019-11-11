<?
require '../../../connect.php';


if ($_POST['catCode'] != NULL) {
    $catCode = $_POST['catCode'];
    $sqlGetItem = "SELECT GROUP_CONCAT(item.item_id SEPARATOR ',') AS itemId,GROUP_CONCAT(item.item_name SEPARATOR ',')as itemName FROM item as item INNER JOIN item_category as itemCat ON item.item_category = itemCat.item_category_id WHERE itemCat.item_category_id='$catCode'";
    if ($rawData = $connect->query($sqlGetItem)) {
        while ($data = $rawData->fetch_assoc()) {
            $item[]= array("itemCode"=>$data['itemId'],"item"=>$data['itemName']);
        }
        echo json_encode($item);
    }else{
        echo json_encode("nothing");
    }
}
?>