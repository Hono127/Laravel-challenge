<?php
// const DB_HOST = 'mysql:dbname=php_contact;host=127.0.0.1;charset=utf8';
// 上記の通り従来のhost=127.0.0.1を記述しなくてもよくなった。ので下記が正しい
const DB_HOST = 'mysql:dbname=php_contact;charset=utf8';
const DB_USER = 'php_user';
const DB_PASSWORD = 'Hiroki0909';

// 例外処理
try {
  $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false, //SQLインジェクション対策
  ]);
  echo "接続成功";
} catch (PDOException $e) {
  echo "接続失敗しました" . $e->getMessage() . "\n";
  exit();
}
