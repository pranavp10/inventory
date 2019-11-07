<?
session_start();
require '../../../connect.php';

if ($_POST['dateSend'] != NULL) {
    if($_POST['dateSend'] != 'all' ){
    $getDate =  $_POST['dateSend'];
    $sqlDisplayParameters = "SELECT designation.description, parameters.* FROM parameters INNER JOIN designation ON designation.designation_id = parameters.designation_id WHERE `parameter_date`='$getDate';";

    if ($rawDate = $connect->query($sqlDisplayParameters)) {
        while ($displayParameter = $rawDate->fetch_assoc()) {

            $parametersJSON[] = array(
                "parameterId" => $displayParameter['parameter_id'],
                "parameterId" => $displayParameter['parameter_id'],
                "parameterDesignation" => $displayParameter['description'],
                "parameterDate" => $displayParameter['parameter_date'],
                "parameterName" => $displayParameter['parameter_name'],
                "parameterType" => $displayParameter['parameters_type'],
                "parameterValueType" => $displayParameter['parameter_value_type'],
                "parameterValue" => $displayParameter['parameter_value']
            );
        }
        if (isset($parametersJSON)) {
            echo (json_encode($parametersJSON));
        } else {
            echo (json_encode("nothing"));
        }
    }
} else {
    $sqlDisplayParameters = "SELECT designation.description, parameters.* FROM parameters INNER JOIN designation ON designation.designation_id = parameters.designation_id";

    if ($rawDate = $connect->query($sqlDisplayParameters)) {
        while ($displayParameter = $rawDate->fetch_assoc()) {

            $parametersJSON[] = array(
                "parameterId" => $displayParameter['parameter_id'],
                "parameterId" => $displayParameter['parameter_id'],
                "parameterDesignation" => $displayParameter['description'],
                "parameterDate" =>  date('d-m-Y', strtotime($displayParameter['parameter_date'])),
                "parameterName" => $displayParameter['parameter_name'],
                "parameterType" => $displayParameter['parameters_type'],
                "parameterValueType" => $displayParameter['parameter_value_type'],
                "parameterValue" => $displayParameter['parameter_value']
            );
        }
        if (isset($parametersJSON)) {
            echo (json_encode($parametersJSON));
        } else {
            echo (json_encode("nothing"));
        }
    }
}
}

?>