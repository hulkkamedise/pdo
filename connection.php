<?php 
$dsn="mysql:host=localhost;port=3306;dbname=pdo";
$username = 'root';
$password = '';

try{
	$conn=new PDO($dsn,$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	// #PDO QUERIES
	// $sql="SELECT * FROM students";
	// $stmt = $conn->query($sql);
	// while ($student = $stmt->fetch()) {
	//     echo $student->name. '<br />';
	//     echo $student->regno. '<br />';
	//     echo $student->email. '<br />';
	// }

	//Positional Parametres
 //    $name = 'KOFI OWUSU';
	// $sql = 'SELECT * FROM students WHERE name = ?';
	// $stmt = $conn->prepare($sql);
	// $stmt->execute([$name]);
	// $users = $stmt->fetchAll();

	// var_dump($users);

	// foreach ($users as $user) {
	// 	echo $user->email;
	// }

	//Named Parameters
	// $name = 'KOFI OWUSU';
	// $sql = 'SELECT * FROM students WHERE name = :name';
	// $stmt = $conn->prepare($sql);
	// $stmt->execute(['name' => $name]);
	// $users = $stmt->fetchAll();

	// // var_dump($users);

	// foreach ($users as $user) {
	// 	echo $user->email;
	// }

	//fetching a single post
	// $id = 1;

	// $sql = 'SELECT * FROM students WHERE id = :id';
	// $stmt= $conn->prepare($sql);
	// $stmt->execute(['id' => $id]);
	// $user = $stmt->fetch();

	// echo $user->name. ' '. $user->email;

	// Counting  Rows
	// $name = 'KOFI OWUSU';
	// $stmt = $conn->prepare('SELECT * FROM students WHERE name = ?');
	// $stmt->execute([$name]);
	// $count = $stmt->rowCount();

	// echo $count;

	// INSERTING DATA INTO DATABASE
	// $name = 'Lord Agorvor';
	// $regno = '0116274D';
	// $email = 'osbutey@gmail.com';

	// $sql = 'INSERT INTO students(name, regno, email) VALUES(:name, :regno, :email)';

	// $stmt = $conn->prepare($sql);
	// $stmt->execute(['name' => $name, 'regno'=>$regno, 'email'=>$email]);

	// if ($stmt) {
	// 	echo 'Added Successfully';
	// }
	// updating data
	// $id=1;
	// $name = "Adjaloko Mikado";
	// $sql= 'UPDATE students SET name = :name WHERE id = :id';
	// $stmt= $conn->prepare($sql);
	// $stmt->execute(['name'=>$name, 'id'=>$id]);

	// if ($stmt) {
	// 	echo 'Updated Successfulley';
	// }

// Deleting data
	// $id = 1;
	// $sql = 'DELETE FROM students WHERE id = :id';
	// $stmt = $conn->prepare($sql);
	// $stmt->execute(['id'=>$id]);
	// echo 'Deleted Successfully';

	// Searching 

	// $search = "%l%";

	// $sql = 'SELECT * FROM students WHERE name LIKE ?';
	// $stmt = $conn->prepare($sql);
	// $stmt->execute([$search]);
	// $names = $stmt->fetchAll();

	// foreach ($names as $name) {
	// 	echo $name->name;
	// }

	// if (!$names) {
	// 	echo 'Not Found';
	// }

	// $name = "Salma Ahmed";
	// $regno = "0117776D";
	// $email = "salma@gmail.com";

	// $sql = 'INSERT INTO students(name, regno, email) VALUES(:name, :regno, :email)';
	// $stmt = $conn->prepare($sql);
	// $stmt->bindParam(':name', $name, PDO::PARAM_STR);
	// $stmt->bindParam(':regno', $regno, PDO::PARAM_STR);
	// $stmt->bindParam(':email', $email, PDO::PARAM_STR);

	// if($stmt->execute()){
	// 	echo 'Row Inserted with id :'. $conn->lastInsertId();
	// }

// $name = 'Monose';
// $regno="0267890D";
// $id = 9;
// $sql = 'UPDATE students SET name=:name , regno=:regno WHERE id=:id';
// $stmt=$conn->prepare($sql);
// $stmt->bindParam(':name', $name, PDO::PARAM_STR);
// $stmt->bindParam(':regno', $regno, PDO::PARAM_STR);
// $stmt->bindParam(':id', $id, PDO::PARAM_INT);

// if ($stmt->execute()) {
// 	echo $stmt->rowCount(). ' Where affected ';
// }


	$stmt = $conn->prepare('DELETE FROM students WHERE id = :id');
	$id = 10;
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);

	if ($stmt->execute()) {
		echo $stmt->rowCount().'Delete';
	}
	



}catch(PDOException $e){
	echo 'Unable to connect to the database'.$e->getMessage();
	exit;
}

// if ($conn) {
// 	echo 'Successfuly Connected';
// }

?>