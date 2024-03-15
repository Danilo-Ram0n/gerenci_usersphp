<?php
include_once "navbar.php";

if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
    // Limpa a variável de sessão após exibir a mensagem
    unset($_SESSION['success_message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .form-content {
            width: 300px;
            padding: 20px;
            background-color: cadetblue;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-content div {
            margin-bottom: 15px;
        }

        .form-content label {
            display: block;
            margin-bottom: 5px;
        }

        .form-content input[type="text"],
        .form-content input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-content input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-content input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="form-container">
    <div class="form-content">
        <form action="insert.php" method="post">
            <div>
                <label for="">Digite um nome:</label>
                <input type="text" name="name">
            </div>
            <div>
                <label for="">Digite um e-mail:</label>
                <input type="email" name="email">
            </div>
            <div>
                <input type="submit" value="Cadastrar">
            </div>
        </form>
    </div>
</div>
</body>
</html>
