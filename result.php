<?php
session_start();

function redirectWithError($errorMessages) {
    $_SESSION['errors'] = $errorMessages;
    header("Location: indexBT1.php");
    exit();
}

$name = $_POST['name'];
$dob = $_POST['dob'];
$height = $_POST['height'];
$weight = $_POST['weight'];

$errorMessages = [];

if (empty($name)) {
    $errorMessages[] = "Vui lòng nhập họ và tên.";
}

if (!is_numeric($dob) || $dob < 16) {
    $errorMessages[] = "Tuổi phải là một số và lớn hơn hoặc bằng 16.";
}

if (!is_numeric($height) || $height <= 0) {
    $errorMessages[] = "Chiều cao phải là một số dương.";
}

if (!is_numeric($weight) || $weight <= 0) {
    $errorMessages[] = "Cân nặng phải là một số dương.";
}

if (!empty($errorMessages)) {
    $_SESSION['name'] = $name;
    $_SESSION['dob'] = $dob;
    $_SESSION['height'] = $height;
    $_SESSION['weight'] = $weight;
    redirectWithError($errorMessages);
}

// Xóa các thông báo lỗi nếu không có lỗi
unset($_SESSION['errors']);

// Tính chỉ số BMI
$height /= 100; // Đổi từ cm thành m
$bmi = $weight / ($height * $height);

// Hiển thị kết quả
echo "<h2>Kết quả chỉ số BMI</h2>";
echo "<p><strong>Họ và tên:</strong> $name</p>";
echo "<p><strong>Tuổi:</strong> $dob</p>";
echo "<p><strong>Chiều cao:</strong> $height m</p>";
echo "<p><strong>Cân nặng:</strong> $weight kg</p>";
echo "<p><strong>Chỉ số BMI:</strong> $bmi</p>";

// Đưa ra đánh giá về chỉ số BMI
if ($bmi < 18.5) {
    echo "<p>Bạn đang gầy, cần tăng cân!</p>";
} elseif ($bmi >= 18.5 && $bmi < 24.9) {
    echo "<p>Bạn có cân nặng bình thường.</p>";
} elseif ($bmi >= 24.9 && $bmi < 29.9) {
    echo "<p>Bạn đang thừa cân.</p>";
} else {
    echo "<p>Bạn đang bị béo phì, cần giảm cân!</p>";
}
?>
<br>
<button onclick="window.location.href='indexBT1.php'">Quay lại</button>
