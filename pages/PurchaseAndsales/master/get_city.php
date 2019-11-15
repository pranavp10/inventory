<?
require '../../../connect.php';



if ($_POST['state'] != NULL) {
    $state = $_POST['state'];
    $sqlSelectCity = "SELECT `city_name` FROM `statelist` WHERE `state`='$state'";

    if ($rawData = $connect->query($sqlSelectCity)) {
        while ($data = $rawData->fetch_assoc()) {
            $cityNames[] = array("city"=> $data['city_name']);
        }
        echo json_encode($cityNames);
    }
}

?>
