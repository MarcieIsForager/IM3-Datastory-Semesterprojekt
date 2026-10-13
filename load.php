<?php

header('Content-Type: text/plain; charset=utf-8');
require __DIR__ . '/config.php';
$result = include 'transform.php';

print_r($result);

try {
    $pdo = new PDO($dsn, $dbuser, $password, $options);
    echo "Verbindung steht. \n\n";
} catch (PDOException $e) {
    exit("Verbindung fehlgeschlagen: " . $e->getMessage() . "\n\n");
}

//$delete_preexisting_data = $pdo->prepare(
//    'DELETE FROM death_cause'
//);

//$delete_preexisting_data->execute();

$insert_death_data = $pdo->prepare(
    'INSERT INTO death_cause (death_cause, total_death_toll, percentage_of_death_toll, canton_id, is_caused_by_stress)
     VALUES (:death_cause, :totat_death_toll, :percentage_of_death_toll, :canton_id, :is_caused_by_stress)'
);

//$insert_death_data->execute([
//    'death_cause'=>'Died of death',
//    'total_death_toll'=>12,
//    'percentage_of_death_toll'=>3.2,
//    'canton_id'=>3,
//    'is_caused_by_stress'=>1
//]);

foreach ($result as $cantonKey => $rows) {
    echo "Lade Kanton-Gruppe: $cantonKey \n";
    
    foreach ($rows as $row) {
        // Prozent-Wert bereinigen (z.B. "3,7%" oder "1%" zu float konvertieren, falls nötig)
        $prozentStr = str_replace(['%', ','], ['', '.'], $row['Total Prozent']);

        $insert_death_data->execute([
            'death_cause'              => $row['Todesursache'],
            'total_death_toll'         => $row['Total Tode'],
            'percentage_of_death_toll' => (float)$prozentStr,
            'canton_id'                => $row['canton_id'],
            'is_caused_by_stress'      => $row['is_caused_by_stress']
        ]);
    }
}




    

return 'success'; 