<?php
    // include("config.php");
    // $uname = $_POST['username'];
    // $pwd = $_POST['password'];
    // define('DB_SERVER', 'localhost');
    // define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', '');
    // define('DB_DATABASE', 'credentials');
    // $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "credentials";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $uname = $_POST['username'];
    $pwd = md5($_POST['pwd']);
    $rank = $_POST['rank'];
    $sql = "INSERT INTO users (username,pwd,ranking) VALUES (?, ?, ?)";
    if($stmt=$conn->prepare($sql)){
        $stmt->bind_param("sss",$uname,$pwd,$rank);
        $stmt->execute();
    }
    //$conn->query($sql);
    echo "<script>alert('Account Created. Please Login!!')
    window.location.href = 'index.html'
    </script>";
    $conn->close();
    
?>