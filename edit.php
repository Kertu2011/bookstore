<?php
require_once('connect.php');

    $id = $_GET['id'];


    if (isset($_POST['submit']) && $_POST['submit'] == 'Salvesta') {
        $stmt = $pdo->prepare('UPDATE books SET title = :title, type = :type WHERE id = :id');
        $stmt->execute(['title' => $_POST ['title'], 'type' => $_POST ['type'], 'id' => $id]);

        header("Location: book.php?id=$id");
    }

    $stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
    $stmt->execute(['id' => $id ]);
    $book = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Muuda</h1>
    <form action="edit.php?id=<?= $id ;?>" method="post">

         
        <label for="title">Pealkiri</label>
        <input id="title" type="text" name="title" value="<?= $book['title'] ;?>">

        <label for="type">tüüp</label>
        <select name="type" id="type">
            <option value="new" <?= $book['type'] == "new" ? "selected" : "" ?>>Uus</option>
            <option value="used" <?= $book['type'] == "used" ? "selected" : "" ?>>Kasutatud</option>
            <option value="ebook" <?= $book['type'] == "ebook" ? "selected" : "" ?>>E-raamat</option>
        </select>

        <input type="submit" name="submit" value="Salvesta">

    </form>

    
</body>
</html> 