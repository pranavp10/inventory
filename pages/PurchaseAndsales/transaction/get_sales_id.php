<?
require '../../../connect.php';


if ($_POST['financialYear'] != NULL) {
    $currentFiscalYear= $_POST['financialYear'];
    $sqlIdSelect = "SELECT MAX(CAST(SUBSTRING(`sales_id`, 11, length(`sales_id`)-10) AS UNSIGNED))AS id FROM sales WHERE `sales_id` LIKE 'STNO-$currentFiscalYear-%'";
    if ($rawId = $connect->query($sqlIdSelect)) {
        while ($id = $rawId->fetch_assoc()) {

            if ($id['id'] == NULL) {
                $id = 0;
                echo json_encode($id);
            } else {
                echo json_encode($id['id']);
            }
        }
    }
}
?>