<?php
require 'db_connection.php';

// $sql = 'select * from php_contacts_test where id = 2';
// $stmt = $pdo->query($sql);
// $result = $stmt->fetchAll();
// var_dump($result);

$sql = 'select * from php_contacts_test where id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue('id', 2, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll();
var_dump($result);

$pdo->beginTransaction();
// sql処理
$stmt = $pdo->prepare($sql);
$stmt->bindValue('id', 2, PDO::PARAM_INT);
$stmt->execute();

$pdo->commit();
try {
} catch (PDOException $e) {
  $pdo->rollback();
}
