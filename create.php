<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($_SERVER['REQUEST_METHOD']==='POST'){
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$date = date('Y-m-d H-i-s');

$statement = $pdo->prepare("INSERT INTO products (title,image,description,price,create_date)
VALUES (:title,:image,:description,:price,:date)");
$statement->bindValue(':title', $title);
$statement->bindValue(':image', '');
$statement->bindValue(':description', $description);
$statement->bindValue(':price', $price);
$statement->bindValue(':create_date', $date);
$statement->execute();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="app.css">
    <title>products CRUD</title>
</head>

<body>
    <h1 class="">Create new Product</h1>
    <form action="create.php" method="post">
        <div class="form-group">
            <label>Product Image</label><br>
            <input type="file" name="image">
        </div>
        <div class="form-group">
            <label>Product Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="number" step="0.1" class="form-control" name="price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>