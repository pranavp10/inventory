<?
require '../../../connect.php';

$sqlIdSelect = "SELECT MAX(CAST(SUBSTRING(`customer_id`, 5, length(`customer_id`)-4) AS UNSIGNED))AS id FROM customer_or_company WHERE `customer_id` LIKE 'CMS-%'";
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
