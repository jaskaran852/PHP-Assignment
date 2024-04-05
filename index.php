<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
</head>
<body>
    <h1>Simple Blog</h1>

    <?php
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "blogdb"; 

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT posts.*, users.username
            FROM posts
            JOIN users ON posts.user_id = users.user_id";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>Author: " . $row["username"] . "</p>";
            echo "<p>" . $row["content"] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>
