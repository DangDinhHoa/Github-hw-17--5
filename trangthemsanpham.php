<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            padding: 10px;
            background-color: #f0f0f0;
        }
        input {
            margin: 5px;
            padding: 5px;
        }
        button {
            padding: 5px 10px;
            background-color:rgb(47, 47, 47);
            color: white;
            border: none;
        }
        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 5px;
        }
        th {
            background-color:rgb(47, 47, 47);
            color: white;
        }
    </style>
</head>
<body>
    <h2>Thêm Sản Phẩm</h2>
    <div class="form-container">
        <form method="POST">
            <input type="text" name="id" placeholder="ID">
            <input type="text" name="name" placeholder="Tên hàng">
            <input type="text" name="type" placeholder="Loại hàng">
            <input type="number" name="quantity" placeholder="Số lượng">
            <input type="number" name="price" placeholder="Giá">
            <button type="submit">Thêm</button>
        </form>
    </div>
    <?php
    session_start();

    if (!isset($_SESSION['products'])) {
        $_SESSION['products'] = [];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
    
        $_SESSION['products'][] = [
            'id' => $id,
            'name' => $name,
            'type' => $type,
            'quantity' => $quantity,
            'price' => $price
        ];
    }
?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Số lượng</th>
            <th>Price</th>
        </tr>
        <?php
        $count = count($_SESSION['products']);
        for ($i = 0; $i < $count; $i++) {
            echo "<tr>";
            echo "<td>" . $_SESSION['products'][$i]['id'] . "</td>";
            echo "<td>" . $_SESSION['products'][$i]['name'] . "</td>";
            echo "<td>" . $_SESSION['products'][$i]['type'] . "</td>";
            echo "<td>" . $_SESSION['products'][$i]['quantity'] . "</td>";
            echo "<td>" . $_SESSION['products'][$i]['price'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>