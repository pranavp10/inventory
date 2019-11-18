<?
require '../../../connect.php';

$sqlIdSelect = "SELECT MAX(CAST(SUBSTRING(`supplier_id`, 5, length(`supplier_id`)-4) AS UNSIGNED))AS id FROM supplier_or_company WHERE `supplier_id` LIKE 'SUP-%'";
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
