<?
session_start();
require '../../../connect.php';

if (isset($_POST['addDesignationButton'])) {

    if ($_POST['designationId'] != NULL) {
        $designation_id = $_POST['designationId'];
    } else {
        echo "Designation ID Not Entered";
        exit;
    }

    if ($_POST['designationName'] != NULL) {
        $designation = ucfirst(strtolower($_POST['designationName']));
    }
    else
    {
        echo "Designation Name Not Entered";
        exit;
    }

    $sqlInsertDesignation = "INSERT INTO `designation`(`designation_id`, `description`) VALUES ('$designation_id','$designation');";
    echo ($sqlInsertDesignation);

    if ($connect->query($sqlInsertDesignation)) {
        $_SESSION['addDesignation'] = 'yes';
        header("Location: ../../../pages/hr/master/hr_master_designation.php");
    }else {
        $_SESSION['addDesignation'] = 'no';

    }
}
?>
