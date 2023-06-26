<?php
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        return;
    }
    
    include_once 'php/import.php';

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    try {
        $sql = "SELECT * FROM nusantara";
        $stmt = $connection->query($sql);
        $collections = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($collections);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to retrieve collections']);
    }
?>
