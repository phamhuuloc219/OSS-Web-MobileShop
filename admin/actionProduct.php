<?php
	session_start();
	include 'config.php';
	mysqli_set_charset($conn,'utf8mb4');
	$update=false;
	$id="";
	$brand="";
	$name="";
	$price="";
	$image="";
	$date="";

	// Add new product
	if(isset($_POST['add'])){
		$brand = $_POST['brand'];
		$name = $_POST['name'];
		$price = $_POST['price'];
		$image = $_POST['oldimage'];
		$date = $_POST['date'];

		$query = "INSERT INTO product(item_brand, item_name, item_price, item_image, item_register) VALUES(?,?,?,?,?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("sssss", $brand, $name, $price, $image, $date);
		$stmt->execute();
		// move_uploaded_file($_FILES['image'], $image); // Uncomment if you're handling file uploads
		header('location:product.php');
		$_SESSION['response'] = "Successfully Inserted to the database!";
		$_SESSION['res_type'] = "success";
	}

	// Delete product
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$query = "DELETE FROM product WHERE item_id=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		header('location:product.php');
		$_SESSION['response'] = "Successfully Deleted!";
		$_SESSION['res_type'] = "danger";
	}

	// Edit product
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$query = "SELECT * FROM product WHERE item_id=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$id = $row['item_id'];
		$brand = $row['item_brand'];
		$name = $row['item_name'];
		$price = $row['item_price'];
		$image = $row['item_image'];
		$date = $row['item_register'];
		$update = true;
	}

	// Update product
	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$brand = $_POST['brand'];
		$name = $_POST['name'];
		$price = $_POST['price'];
		$image = $_POST['oldimage'];
		$date = $_POST['date'];

		$query = "UPDATE product SET item_brand=?, item_name=?, item_price=?, item_image=?, item_register=? WHERE item_id=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("sssssi", $brand, $name, $price, $image, $date, $id);
		$stmt->execute();
		$_SESSION['response'] = "Updated Successfully!";
		$_SESSION['res_type'] = "primary";
		header('location:product.php');
	}
	
	
	

	// View product details
	if(isset($_GET['details'])){
		$id = $_GET['details'];
		$query = "SELECT * FROM product WHERE item_id=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$vid = $row['item_id'];
		$vbrand = $row['item_brand'];
		$vname = $row['item_name'];
		$vprice = $row['item_price'];
		$vimage = $row['item_image'];
		$vregister = $row['item_register'];
	}
?>
