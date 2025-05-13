<?php
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];

$db = new SQLite3('database.sqlite');

if ($nome == 'admin' && $cpf == '123') {
  header('Location: admin.php');
  exit();
}

$stmt = $db->prepare("SELECT * FROM users WHERE nome = :nome AND cpf = :cpf");
$stmt->bindValue(':nome', $nome);
$stmt->bindValue(':cpf', $cpf);
$result = $stmt->execute()->fetchArray();

if ($result) {
  $arquivo = $result['arquivo'];
  echo "<h2>Bem-vindo, $nome</h2>";
  if ($arquivo) {
    echo "<p><a href='$arquivo' target='_blank'>Ver holerite</a></p>";
  } else {
    echo "<p>Holerite ainda não enviado.</p>";
  }
} else {
  echo "Funcionário não encontrado.";
}
?>
