<?
session_start();
require '../../../connect.php';

if (isset($_POST['addParametersButton'])) {
    if ($_POST['parametersId'] != NULL) {
        $parametersId = $_POST['parametersId'];
    } else {
        echo "Parameters Id Not entered";
    }

    if ($_POST['date'] != NULL) {

        $rawDate = $_POST['date'];
        $addDay = "01-" . $rawDate;
        $date = date('Y-m-d', strtotime($addDay));
    } else {
        echo "Date Not entered";
    }

    if ($_POST['hraValue'] != NULL) {
        $hraValue = $_POST['hraValue'];
    } else {
        echo " HRA value is not entered";
    }

    if ($_POST['medicalValue'] != NULL) {
        $medicalValue = $_POST['medicalValue'];
    } else {
        echo "medicalValue value is not entered";
    }

    if ($_POST['transportationValue'] != NULL) {
        $transportationValue = $_POST['transportationValue'];
    } else {
        echo "transportation value is not entered";
    }

    if ($_POST['pfValue'] != NULL) {
        $pfValue = $_POST['pfValue'];
    } else {
        echo "pfValue value is not entered";
    }

    if ($_POST['professionalTaxValue'] != NULL) {
        $professionalTaxValue = $_POST['professionalTaxValue'];
    } else {
        echo "professionalTaxValue value is not entered";
    }

    $designation_id = $_POST['designationId'];

    $parameter_hra = $_POST['parameters'][0];
    $parameter_type_hra = $_POST['type'][0];
    $parameter_value_type_hra = $_POST['hra'];

    $parameter_medical = $_POST['parameters'][1];
    $parameter_type_medical = $_POST['type'][1];
    $parameter_value_type_medical = $_POST['medical'];

    $parameter_transportation = $_POST['parameters'][2];
    $parameter_type_transportation = $_POST['type'][2];
    $parameter_value_type_transportation = $_POST['transportation'];

    $parameter_pf = $_POST['parameters'][3];
    $parameter_type_pf = $_POST['type'][3];
    $parameter_value_type_pf = $_POST['pf'];

    $parameter_professionalTax = $_POST['parameters'][4];
    $parameter_type_professionalTax = $_POST['type'][4];
    $parameter_value_type_professionalTax = $_POST['professionalTax'];

    $sqlInsertParameter = "INSERT INTO `parameters`(`parameter_id`, `parameter_date`, `designation_id`, `parameter_name`, `parameters_type`, `parameter_value_type`, `parameter_value`) VALUES 
    ('$parametersId','$date','$designation_id','$parameter_hra','$parameter_type_hra','$parameter_value_type_hra','$hraValue'),
    ('$parametersId','$date','$designation_id','$parameter_medical','$parameter_type_medical','$parameter_value_type_medical','$medicalValue'),
    ('$parametersId','$date','$designation_id','$parameter_transportation','$parameter_type_transportation','$parameter_value_type_transportation','$transportationValue'),
    ('$parametersId','$date','$designation_id','$parameter_pf','$parameter_type_pf','$parameter_value_type_pf','$pfValue'),
    ('$parametersId','$date','$designation_id','$parameter_professionalTax','$parameter_type_professionalTax','$parameter_value_type_professionalTax','$professionalTaxValue')";

    if ($connect->query($sqlInsertParameter)) {
        $_SESSION["addParameters"] = 'yes';
        header("Location: ../../../pages/hr/master/hr_master_parameters.php");
    } else {
        $_SESSION["addParameters"] = 'no';
        header("Location: ../../../pages/hr/master/hr_master_parameters.php");
    }
} else {
    echo 'You did not click the button';
}
?>
