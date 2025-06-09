usuarios
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

  // Conexão com o banco de dados
  $conn = new mysqli('localhost', 'root', '', 'loja');
  if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
  }

  $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
  if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
  } else {
    echo "Erro: " . $conn->error;
  }
  $conn->close();
}
?>

<form method="POST">
  Nome: <input type="text" name="nome" required><br>
  E-mail: <input type="email" name="email" required><br>
  Senha: <input type="password" name="senha" required><br>
  <button type="submit">Cadastrar</button>
</form>
