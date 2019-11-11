<?
require '../../../connect.php';


if ($_POST['date'] != NULL) {
    $currentFiscalYear= $_POST['date'];
    $sqlIdSelect = "SELECT max(`discount_id`) as id FROM discounts_and_flats WHERE discount_id LIKE 'DAF-$currentFiscalYear-%'";
    if ($rawId = $connect->query($sqlIdSelect)) {
        while ($id = $rawId->fetch_assoc()) {

            if ($id['id'] == NULL) {
                $id = 0;
                echo json_encode($id);
            } else {
                $idNum = explode("-", $id['id']);
                echo json_encode($idNum[2]);
            }
        }
    }
}
?>