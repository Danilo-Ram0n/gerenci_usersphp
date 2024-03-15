<?php
global $conn;
include_once "navbar.php";
include_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Preparar e executar a inserção no banco de dados
    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Define a mensagem de sucesso
    $_SESSION['success_message'] = 'Usuário cadastrado com sucesso!';

    // Redirecionar para a página de listagem
    header("Location: list.php");
    exit();
}
?>

