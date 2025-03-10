<?php
include "conn.php";

if (isset($_GET["part_no"])) {
    $part_no = $_GET["part_no"];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT PARTNAME FROM PRODUCT_LIST WHERE PARTNUMBER = ?");
    $stmt->execute([$part_no]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        echo json_encode(["success" => true, "PARTNAME" => $row["PARTNAME"]]);
    } else {
        echo json_encode(["success" => false]);
    }
}

$conn = null; // Close the connection
?>


