<?php
include('../common/connection.php');

if ($argc < 2) {
    echo "Uso: php validateActiveSessions.php <horas>\n";
    exit(1);
}

$hours = (int)$argv[1];
$threshold_date = date('Y-m-d H:i:s', strtotime("-$hours hours"));

echo "Buscando usuarios activos con último login anterior a: $threshold_date\n";

$sql = "UPDATE users 
        SET status = 'inactive' 
        WHERE status = 'active' 
        AND last_login_datetime IS NOT NULL 
        AND last_login_datetime < '$threshold_date'";

if (mysqli_query($conn, $sql)) {
    $affected = mysqli_affected_rows($conn);
    echo " Usuarios desactivados: $affected\n";
} else {
    echo " Error: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);
?>