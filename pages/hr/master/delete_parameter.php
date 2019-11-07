<?
session_start();
require '../../../connect.php';

if (isset($_POST['deleteParameterButton'])) {

    if ($_POST['deleteParameterId'] != NULL) {
        $delete_parameter_id = $_POST['deleteParameterId'];
    } else {
        echo "ID Not selected";
        exit;
    }
    $sqlDeleteParameter = "DELETE FROM `parameters` WHERE `parameters`.`parameter_id` = '$delete_parameter_id';";
    if ($connect->query($sqlDeleteParameter)) {
        $_SESSION['deleteParameter'] = 'yes';
        header("Location: ../../../pages/hr/master/hr_master_parameters.php");
    }else {
        $_SESSION['deleteParameter'] = 'no';
        header("Location: ../../../pages/hr/master/hr_master_parameters.php");
    }

}
?>
