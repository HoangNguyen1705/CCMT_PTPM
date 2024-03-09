<?php
// Lấy danh sách sản phẩm yêu thích từ cookie
if (isset($_COOKIE['favorite_products'])) {
    $favorite_products = json_decode($_COOKIE['favorite_products'], true);
} else {
    $favorite_products = array();
}

// Hàm xóa sản phẩm khỏi danh sách yêu thích
function removeFavorite($productId) {
    global $favorite_products;
    unset($favorite_products[$productId]);
    setcookie('favorite_products', json_encode($favorite_products), time() + (86400 * 30), "/"); // 30 days
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm yêu thích</title>
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
</head>
<body>
    <h1 style="color: #ff99ff;font-family: cursive;text-align: center;">Các sản phẩm đã yêu thích</h1>
    <ul>
        <?php foreach ($favorite_products as $product): ?>
            <div>
            <h2><?php echo $product['name']; ?></h2>
                <p>Giá: <?php echo $product['price']; ?> VNĐ</p>
                <p>Số lượng: <?php echo $product['quantity']; ?> <?php echo $product['unit']; ?></p>
                <p>Miêu tả: <?php echo $product['description']; ?></p>
                <form method="post">
                    <input type="hidden" name="remove_favorite" value="<?php echo $product['id']; ?>">
                    <button type="submit">Xóa khỏi yêu thích</button>
                </form>
            </div>
        <?php endforeach; ?>
    </ul>
    <a href="indexBT3.php"><button class="button"> Quay lại trang chủ</button></a>
</body>
</html>
