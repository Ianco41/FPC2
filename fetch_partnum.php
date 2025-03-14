<?php
include 'conn.php'; // Include your connection script

header('Content-Type: application/json');

$suggestions = [];

if ($db_type == "access") {
    $query = "SELECT DISTINCT PARTNUMBER FROM PRODUCT_LIST";
    $result = odbc_exec($conn, $query);
    if ($result) {
        while ($row = odbc_fetch_array($result)) {
            $suggestions[] = $row['PARTNUMBER'];
        }
    }
} else {
    $query = "SELECT suggestion_column FROM SuggestionsTable";
    $result = mysqli_query($conn, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $suggestions[] = $row['suggestion_column'];
        }
    }
}

echo json_encode($suggestions);
?>
