<?php
// Perform database query or any other search logic based on the provided query
$con = mysqli_connect("localhost", "root",  "", "cashback");
if(!$con) {
    die(mysqli_error($con)); 
  
}
if(isset($_POST["query"])) {
    $query = $_POST["query"];

// Perform search query
if(isset($_POST["query"])) {
    $query = $_POST["query"];

    $sql = "SELECT product_keywords FROM products WHERE product_keywords LIKE '%$query%'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>{$row['product_keywords']}</div>";
        }
    } else {
        echo "<div>No results found</div>";
    }
}
}
$con->close();
?>
