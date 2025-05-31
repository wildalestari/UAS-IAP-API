<?php
header("Content-Type: application/json");

// $mahasiswa = [
//     [
//          "nama" => "Sandhika Galih",
//          "nrp" => "043040023",
//          "email" => "sandhikagalih@unpas.ac.id"
//     ],
//     [
//         "nama" => "Erik Doank",
//         "nrp" => "023040001",
//         "email" => "erik@gmail.com"
//     ]
// ];

try {

    $dbh = new PDO('mysql:host=localhost;dbname=studi', 'root', '');
    $db = $dbh->prepare('SELECT * FROM mahasiswa');
    $db->execute();
    $mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($mahasiswa, JSON_PRETTY_PRINT);
} catch (PDOException $e) {
    echo json_encode([
        "error" => $e->getMessage()
    ]);
}
?>