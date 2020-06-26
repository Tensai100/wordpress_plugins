<?php



try {
    require_once("connect.php");

    $stmt = $conn->prepare("SELECT * FROM wp_csv");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $data = $stmt->fetchAll();
    // print_r($data);
    foreach ($data as $row) {
        $labels = explode(',', explode(PHP_EOL, $row['csv'])[0]);
        $values = explode(',', explode(PHP_EOL, $row['csv'])[1]);

        echo "<table class='w3-table-all w3-xlarge'>";
        echo "<th>id</th><th>" . $row['id'] . "</th>";

        for ($i = 0; $i < sizeof($labels); $i++) {
            echo "<tr>
                    <td>" . explode('_', $labels[$i])[1] . "</td>
                    <td>" . $values[$i] . "</td>
                </tr>";
        }

        echo "</table>";
        echo "<th>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
