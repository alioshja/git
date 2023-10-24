<?php
//cette partie est celle qui vas prendre la bdd de confirmation et lafficher dans la page html pour validation et définition du rôle.

try {
    $pdo = new PDO('mysql:host=localhost;dbname=trtconseil', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = 'SELECT * FROM Usersenattente';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($result);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Une erreur est survenue. Impossible d\'accéder à la base de données.']);
}
?>