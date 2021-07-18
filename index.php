<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

//echo '<pre>';
//var_dump($products);
//echo '</pre>';
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
    <h1 class="">products CRUD</h1>
    <p>
        <a href="create.php" class="btn btn-success">Create Product</a>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Create Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $i => $product):?>
            <tr>
                <th scope="row"><?php $i + 1 ?></th>
                <td></td>
                <td><?php echo $product['title']?></td>
                <td><?php echo $product['price']?></td>
                <td><?php echo $product['create_date']?></td>
                <td>
                   <button type="button" class="btn btn-sm btn-outline-primary">edit</button>
                    <button type="button" class="btn btn-sm btn-outline-danger">delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>