<?php
$db = new SQLite3('database.sqlite');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $arquivo = $_FILES['arquivo']['name'];
  move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivo);

  $stmt = $db->prepare("INSERT OR REPLACE INTO users (nome, cpf, arquivo) VALUES (:nome, :cpf, :arquivo)");
  $stmt->bindValue(':nome', $nome);
  $stmt->bindValue(':cpf', $cpf);
  $stmt->bindValue(':arquivo', $arquivo);
  $stmt->execute();
  echo "Holerite enviado com sucesso!";
}
?>

<h2>Painel do Administrador</h2>
<form method="POST" enctype="multipart/form-data">
  Nome: <input type="text" name="nome"><br>
  CPF: <input type="text" name="cpf"><br>
  Holerite (PDF): <input type="file" name="arquivo"><br>
  <button type="submit">Enviar</button>
</form>
