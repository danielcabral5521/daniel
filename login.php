login.php
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  // Conexão com o banco de dados
  $conn = new mysqli('localhost', 'root', '', 'loja');
  if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM usuarios WHERE email = '$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    if (password_verify($senha, $usuario['senha'])) {
      $_SESSION['usuario_id'] = $usuario['id'];
      header('Location: index.php');
    } else {
      echo "Senha incorreta!";
    }
  } else {
    echo "Usuário não encontrado!";
  }
  $conn->close();
}
?>

<form method="POST">
  E-mail: <input type="email" name="email" required><br>
  Senha: <input type="password" name="senha" required><br>
  <button type="submit">Entrar</button>
</form>
