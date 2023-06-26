<?php
    include_once 'db.php';

    $sql = "DROP TABLE IF EXISTS nusantara";
    $connection->exec($sql);

    $create_sql = "CREATE TABLE `webtechw10`.`nusantara` (
        `id` INT NOT NULL AUTO_INCREMENT, 
        `kategori` VARCHAR(100) NOT NULL , 
        `nama` VARCHAR(255) NOT NULL , 
        `description` VARCHAR(500) NOT NULL , 
        `date` VARCHAR(50) NOT NULL , 
        `gambar` VARCHAR(255) NOT NULL , 
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;";
    $connection->exec($create_sql);
    
    $collections = json_decode(file_get_contents('entity/collections.json'), true);
    
    foreach ($collections['semuaCollection'] as $collection) {
        $insert_sql = "INSERT INTO nusantara (kategori, nama, description, date, gambar) VALUES (?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($insert_sql);
        $stmt->execute([$collection['kategori'], $collection['nama'], $collection['desc'], $collection['date'], $collection['gambar']]);
    }
?>
