<?
require '../../../connect.php';

$sqlIdSelect = "SELECT MAX(CAST(SUBSTRING(`item_category_id`, 5, length(`item_category_id`)-4) AS UNSIGNED))AS id FROM item_category WHERE `item_category_id` LIKE 'CAT-%'";
if ($rawId=$connect->query($sqlIdSelect)) {
    while($id = $rawId->fetch_assoc())
    {

        if ($id['id'] == NULL) {
            $id = 0;
            echo json_encode($id);
        } else {
            echo json_encode($id['id']);
        }
    }
}
?>
