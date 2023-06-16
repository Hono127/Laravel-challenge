<?php
// DB接続
require 'db_connection.php';

// 入力欄
$params = [
  'id' => null,
  'your_name' => 'なまえ',
  'email' => 'test@test.com',
  'url' => 'https://test.com',
  'gender' => '1',
  'age' => '26',
  'contact' => 'テストテキスト',
  'created_at' => 'NOW()'
];

$count = 0;
$columns = '';
$values = '';


foreach (array_keys($params) as $key) {
  if ($count++ > 0) {
    $columns .= ',';
    $values .= ',';
  }
  $columns .= $key;
  $values .= ':' . $key;
}
$sql = 'insert into php_contacts_test (' . $columns . ')values(' . $values . ')';
// var_dump($sql);
// exit();


// $sql = 'select * from php_contacts_test where id = :id';
$stmt = $pdo->prepare($sql);
// ↓不要
// $stmt->bindValue('id', 2, PDO::PARAM_INT);
$stmt->execute($params);
