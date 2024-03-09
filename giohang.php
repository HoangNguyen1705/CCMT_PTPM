<?php
session_start();

// Xử lý xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['remove']) && isset($_SESSION['cart'][$_GET['remove']])) {
    unset($_SESSION['cart'][$_GET['remove']]);
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
  background-color: #FF55FF;
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
</style>
</head>
<body>
    <h1 style="color: #ff99ff;font-family: cursive;text-align: center;">Giỏ hàng</h1>
    <ul>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $key => $product): ?>
                <li>
                    <h2><?php echo $product['name']; ?></h2>
                    <p>Giá: <?php echo $product['price']; ?> đ</p>
                    <p>Số lượng: <?php echo $product['quantity']; ?></p>
                    <a href="giohang.php?remove=<?php echo $key; ?>"><button class="button1">Xoá khỏi giỏ hàng</button></a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li style="color: #ff99ff;font-family: cursive;font-size: 25px;">Giỏ hàng trống</li>
        <?php endif; ?>
    </ul>
    <a href="indexBT4.php"><button class="button"> Back</button></a>
</body>
</html>
