<?php
session_start();

// Danh sách sản phẩm
$products = array(
    array("id" => "A", "name" => "Sản phẩm A", "price" => 10, "quantity" => 100, "unit" => "Cái", "description" => "Mô tả sản phẩm A"),
    array("id" => "B", "name" => "Sản phẩm B", "price" => 20, "quantity" => 50, "unit" => "Cái", "description" => "Mô tả sản phẩm B"),
    array("id" => "C", "name" => "Sản phẩm C", "price" => 30, "quantity" => 30, "unit" => "Cái", "description" => "Mô tả sản phẩm C")
);

// Xử lý thêm sản phẩm vào giỏ hàng
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        $_SESSION['cart'][$product_id] = array(
            'name' => $products[$product_id]['name'],
            'price' => $products[$product_id]['price'],
            'quantity' => 1
        );
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
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
</style>
</head>
<body>
    <h1 style="color: #ff99ff;font-family: cursive;text-align: center;">Trang chủ</h1>
    <ul>
        <?php foreach ($products as $key => $product): ?>
            <li>
                <h2 style="color: #ff00ff;font-family: cursive;"><?php echo $product['name']; ?></h2>
                <p>Giá: <?php echo $product['price']; ?> đ</p>
                <p>Số lượng: <?php echo $product['quantity']; ?> <?php echo $product['unit']; ?></p>
                <p><?php echo $product['description']; ?></p>
                <form method="post" action="">
                    <input type="hidden" name="product_id" value="<?php echo $key; ?>">
                    <button class="button1" type="submit" name="add_to_cart" >Thêm vào giỏ hàng</button>
                    
                    
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="giohang1.php"><button class="button">Cart</button></a>
</body>
</html>
