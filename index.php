<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1  style="color:red;font-size:60px;font-family:cursive">Hello Everybody !</h1>
    <div id="main-content">
        <pre>
    <?php
    //minh hoa cho chuc nang in thong tin ra man hinh
        echo"<h2>Đây là chương trình PHP đầu tiên !</h2>";
     //minh hoa cach su dung bien trong PHP
        echo "<h2>Cách sử dụng biến trong PHP <h2>";
        $name = "Hoang";
        echo "Hello, " . $name . "! <br>";
      //minh hoa kieu du lieu  
        echo "<h2>Minh hoạ về các kiểu dữ liệu </h2>";
        $x =5;
        var_dump($x);
        var_dump(10);
        var_dump("John");
        var_dump(3.14);
        var_dump(true);
        var_dump([2, 3, 56]);
        var_dump(NULL);
    //minh hoa mang
        echo "<h2>Minh hoạ về mãng phần tử </h2>";
        $fruits = array("Apple", "Banana", "Orange");  
        echo "fruits[0] = ",$fruits[0] . "<br>";
        foreach ($fruits as $fruit) {
            echo $fruit . "<br>"; // Output each fruit in the array, followed by a line break.
        }
    //minh hoa PHP The global Keyword
        echo "<h2>Minh hoạ về PHP The global Keyword</h2>";
        $x = 5;
        $y = 10;
        function myTest() {
        global $x, $y;
        $y = $x + $y;
        }

        myTest();
        echo $y ."<br>"; // outputs 15
        //minh hoa 
        echo __DIR__;
    ?>
        </pre>
    </div>
    <footer>Đây là phần Footer của trang web</footer>
</body>
</html>