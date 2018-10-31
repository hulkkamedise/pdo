<?php
   $dsn = 'mysql:host=localhost;port=3306;dbname=company';
   $username='root';
   $password ='';
   $options=[];

   try {
   	$conn= new PDO($dsn,$username,$password, $options);
   	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
   	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
   } catch (PDOException $e) {
   echo 'Unable to connect to database '.$e->getMessage();
   	exit;
   }
?>