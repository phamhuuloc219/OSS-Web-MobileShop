<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobile_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE id = 6";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $username = $row["username"];
        $email = $row["email"];
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<section id="profile" class="py-3">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card text-center" style="width: 18rem;">
            <img src="./assets/logo.png" class="card-img-top rounded-circle mt-3 mx-auto" alt="User Avatar" style="width: 150px; height: 150px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $username; ?></h5>
                <p class="card-text text-muted"><?php echo $email; ?></p>
                <a href="#" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
</section>