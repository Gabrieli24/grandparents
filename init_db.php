<?php
$db = new SQLite3('database.sqlite');
$db->exec("CREATE TABLE IF NOT EXISTS users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  nome TEXT,
  cpf TEXT,
  senha TEXT,
  arquivo TEXT
)");
echo "Banco de dados criado com sucesso!";
?>
