<?php

$csv_colName = '';
$csv_values = '';
foreach ($_POST as $key => $value) {
    $csv_colName .=  $key . ",";
    $csv_values .= $value . ",";
}
$csv = $csv_colName . PHP_EOL . $csv_values . PHP_EOL;


try {

    require_once("connect.php");

    $sql = "INSERT INTO wp_csv (csv) VALUES ('$csv')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

header("Location: ../../../");
