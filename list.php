<?php
include_once "navbar.php";

global $conn;
include "conn.php";

// Preparar
$stmt = $conn->prepare("SELECT * FROM users ORDER BY id");

// Executar
$stmt->execute();

// Listar
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Usuários</title>
    <style>
        .user-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 10px;
            padding: 10px;
        }

        .user-card {
            flex: 0 0 calc(33.33% - 20px); /* 33.33% de largura, subtraindo 20px para o espaçamento entre as divs */
            max-width: calc(33.33% - 20px); /* Largura máxima para garantir que as divs não estiquem */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .user-card h3 {
            margin-top: 0;
        }

        .user-card p {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<div class="user-container">
    <?php foreach ($results as $row): ?>
        <div class="user-card">
            <h3>ID: <?php echo $row['id']; ?></h3>
            <p>Nome: <?php echo $row['name']; ?></p>
            <p>Email: <?php echo $row['email']; ?></p>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
