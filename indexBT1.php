<?php
session_start();
$name = $_SESSION['name'] ?? '';
$dob = $_SESSION['dob'] ?? '';
$height = $_SESSION['height'] ?? '';
$weight = $_SESSION['weight'] ?? '';
$errors = $_SESSION['errors'] ?? [];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tính chỉ số BMI</title>
</head>
<body>
    <h2 style="color: #ff99ff;font-family:cursive">Nhập thông tin</h2>
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form action="result.php" method="post">
        <label for="name">Họ và tên:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br>
        
        <label for="dob">Tuổi:</label><br>
        <input type="text" id="dob" name="dob" value="<?php echo $dob; ?>" required><br>
        
        <label for="height">Chiều cao (cm):</label><br>
        <input type="text" id="height" name="height" value="<?php echo $height; ?>" required><br>
        
        <label for="weight">Cân nặng (kg):</label><br>
        <input type="text" id="weight" name="weight" value="<?php echo $weight; ?>" required><br><br>
        
        <input type="submit" value="Tính BMI">
    </form>
</body>
</html>
