<?php 
$conn = new mysqli("localhost", "root", "", "mobile_shop");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = isset($_POST['query']) ? $_POST['query'] : '';

// Truy vấn cơ sở dữ liệu
$sql = "SELECT * FROM product WHERE item_name LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%$query%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
?>

<!-- Form tìm kiếm với phương thức POST -->
<form method="POST" action="">
    <input type="text" name="query" placeholder="Enter product name" value="<?php echo htmlspecialchars($query); ?>">
    <button type="submit">Search</button>
</form>

<?php
// Hiển thị kết quả tìm kiếm
if ($query && $result->num_rows > 0) {
    echo "<h2>Search Results for '$query':</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<h3>" . htmlspecialchars($row['item_name']) . "</h3>";
        echo "<p>Price: " . htmlspecialchars($row['item_price']) . "</p>";
        echo "</div>";
    }
} elseif ($query) {
    echo "<p>No products found.</p>";
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>
