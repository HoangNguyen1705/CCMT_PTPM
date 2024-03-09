<?php
// Khởi tạo cookie nếu chưa tồn tại
if (!isset($_COOKIE['favorite_products'])) {
    $favorite_products = array();
} else {
    $favorite_products = json_decode($_COOKIE['favorite_products'], true);
}

// Hàm thêm sản phẩm vào danh sách yêu thích
function addFavorite($product) {
    global $favorite_products;
    $favorite_products[$product['id']] = $product;
    setcookie('favorite_products', json_encode($favorite_products), time() + (86400 * 30), "/"); // 30 days
}

// Danh sách sản phẩm
$products = array(
    array('id' => 'A', 'name' => 'Sản phẩm A', 'price' => 100, 'quantity' => 10, 'unit' => 'Cái', 'description' => 'Mô tả sản phẩm A'),
    array('id' => 'B', 'name' => 'Sản phẩm B', 'price' => 200, 'quantity' => 15, 'unit' => 'Cái', 'description' => 'Mô tả sản phẩm B'),
    array('id' => 'C', 'name' => 'Sản phẩm C', 'price' => 150, 'quantity' => 20, 'unit' => 'Cái', 'description' => 'Mô tả sản phẩm C')
);

// Xử lý khi click nút yêu thích
if (isset($_POST['favorite'])) {
    $productId = $_POST['favorite'];
    $product = array_filter($products, function($p) use ($productId) {
        return $p['id'] == $productId;
    });
    addFavorite(array_values($product)[0]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</style>
    <title>Trang chủ</title>
</head>
<body>
    <h1 style="color: #ff99ff;font-family: cursive;text-align: center;">Danh sách sản phẩm</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <div>
                <h2><?php echo $product['name']; ?></h2>
                <p>Giá: <?php echo $product['price']; ?> VNĐ</p>
                <p>Số lượng: <?php echo $product['quantity']; ?> <?php echo $product['unit']; ?></p>
                <p>Miêu tả: <?php echo $product['description']; ?></p>
                <form method="post">
                    <input type="hidden" name="favorite" value="<?php echo $product['id']; ?>">
                    <button type="submit">Yêu thích</button>
                </form>
        </div>
        <?php endforeach; ?>
    </ul>
    <a href="yeuthich.php"><button class="button"> Xem sản phẩm yêu thích</button></a>
</body>
</html>
