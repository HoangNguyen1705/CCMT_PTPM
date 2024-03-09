<?php
session_start();

// Xử lý xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['remove']) && isset($_SESSION['cart'][$_GET['remove']])) {
    unset($_SESSION['cart'][$_GET['remove']]);
}

// Xử lý thay đổi số lượng sản phẩm
if (isset($_POST['change_quantity'])) {
    $product_id = $_POST['product_id'];
    $new_quantity = $_POST['new_quantity'];
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] = $new_quantity;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
        
        .button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button1 {
  background-color: #ff55ff;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;  
}
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        h1 {
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .product-info {
            display: flex;
            justify-content: space-between;
        }
        .product-info p {
            margin: 5px 0;
        }
        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="color: #ff99ff;font-family: cursive;text-align: center;font-size: 30px;">Giỏ hàng</h1>
        <ul>
            <?php if (!empty($_SESSION['cart'])): ?>
                <?php foreach ($_SESSION['cart'] as $key => $product): ?>
                    <li>
                        <div class="product-info">
                            <div>
                                <h2><?php echo $product['name']; ?></h2>
                                <p>Giá: <?php echo $product['price']; ?> đ</p>
                                <p>Số lượng: <?php echo $product['quantity']; ?></p>
                            </div>
                            <div class="actions">
                                <form method="post" action="">
                                    <input type="hidden" name="product_id" value="<?php echo $key; ?>">
                                    <input type="number" name="new_quantity" value="<?php echo $product['quantity']; ?>" min="1">
                                    <button type="submit" name="change_quantity" class="button1">Cập nhật</button>
                                </form>
                                <a href="giohang.php?remove=<?php echo $key; ?>"><button class="button1">Xoá khỏi giỏ hàng</button></a>
                            </div>
                        </div>
                        <p style="color: #ff55ff;font-family: cursive;font-size: 20px;">Tổng tiền: <?php echo $product['quantity'] * $product['price']; ?> đ</p>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Giỏ hàng trống</li>
            <?php endif; ?>
        </ul>
        <a href="indexBT4.php"><button class="button">Back</button></a>
    </div>
</body>
</html>
