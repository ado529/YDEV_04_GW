<?php
include('functions.php');

var_dump($_POST);
exit();

$message = $_POST['message'];


$pdo = connect_to_db();

$sql = 'INSERT INTO chattalk(id, message, created_at) VALUES(NULL, :message, now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':message', $message, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

//header("Location:1april_input.php");
//exit();
