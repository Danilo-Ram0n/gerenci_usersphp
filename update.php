<?php
global $conn;
include_once "navbar.php";
include "conn.php";

$id = "";
$name = "";
$email = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $option = $_POST['option'];

    if (!empty($id) && !empty($option)) {
        // Preparar
        if ($option == "name") {
            $stmt = $conn->prepare("UPDATE users SET name = :name WHERE id = :id");
            $stmt->bindParam(':name', $name);
        } elseif ($option == "email") {
            $stmt = $conn->prepare("UPDATE users SET email = :email WHERE id = :id");
            $stmt->bindParam(':email', $email);
        }

        // Trocar
        $stmt->bindParam(':id', $id);

        // Executar
        $stmt->execute();
        $message = "Usuário atualizado com sucesso";
    } else {
        $message = "Por favor, preencha todos os campos";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        select,
        input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container">
        <form action="" method="post">
            <div class="form-group">
                <label for="id">ID do usuário:</label>
                <input type="text" class="form-control" name="id" id="id" value="<?php echo $id; ?>" required>
            </div>
            <div class="form-group">
                <label for="option">Trocar:</label>
                <select class="form-control" name="option" id="option" required>
                    <option value="name">Nome</option>
                    <option value="email">Email</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Novo nome:</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label for="email">Novo email:</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Atualizar">
            </div>
            <?php if (!empty($message)): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>
</body>
</html>
