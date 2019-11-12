<?
require '../../../connect.php';


if ($_POST['date'] != NULL) {
    $currentFiscalYear= $_POST['date'];
    $sqlIdSelect = "SELECT MAX(CAST(SUBSTRING(`discount_id`, 10, length(`discount_id`)-9) AS UNSIGNED))AS id FROM discounts_and_flats WHERE discount_id LIKE 'DAF-$currentFiscalYear-%'";
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