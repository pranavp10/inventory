<?
session_start();
require '../../../connect.php';

$sqlDisplayItemCategory = "SELECT GROUP_CONCAT(`item_category_id` SEPARATOR ',') AS catId,GROUP_CONCAT(`item_category_name` SEPARATOR ',') AS catName FROM `item_category`";
if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
    while ($displayCat = $rawDate->fetch_assoc()) {
        $itemCategoryId = $displayCat['catId'];
        $ItemCategory = $displayCat['catName'];

        $itemCategoryList[]= array("catId"=> $itemCategoryId,"catName"=>$ItemCategory); 
    }
    echo (json_encode($itemCategoryList));
}
