<?
session_start();
require '../../../connect.php';

if ($_POST['date'] != NULL) {
    if ($_POST['designation'] != NULL) {
        $date = date('Y-m-d', strtotime($_POST['date']));
        $designation = $_POST['designation'];

        $sqlCheck = "SELECT `designation_id` FROM `parameters` WHERE `parameter_date`='$date' LIMIT 1;";

        if ($rawData = $connect->query($sqlCheck)) {
            $data = mysqli_fetch_assoc($rawData);
            if ($data['designation_id'] == NULL) {
                echo json_encode('notPresent');
            } else if ($data['designation_id'] == $designation) {
                echo json_encode('present');
            } else {
                echo json_encode('notPresent');
            }
        }
    }
} else {
    echo (json_encode('present'));
}
?>