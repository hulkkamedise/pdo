<?php 
  require_once 'db.php';

  $id = $_GET['id'];
  $sql = 'DELETE FROM users WHERE id = :id';
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
if ($stmt) {
	header("location: index.php");
}