cria_pedidos.php
<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
  header('Location: login.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuario_id = $_SESSION['usuario_id'];
  $produto_nome = $_POST['produto_nome'];
  $quantidade = $_POST['quantidade'];
  $preco = $_POST['preco'];

  // Conexão com o banco de dados
  $conn = new mysqli('localhost', 'root', '', 'loja');
  if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
  }

  $sql = "INSERT INTO pedidos (usuario_id, produto_nome, quantidade, preco) VALUES ('$usuario_id', '$produto_nome', '$quantidade', '$preco')";
  if ($conn->query($sql) === TRUE) {
    echo "Pedido realizado com sucesso!";
  } else {
    echo "Erro: " . $conn->error;
  }
  $conn->close();
}
?>

<form method="POST">
  Nome do Produto: <input type="text" name="produto_nome" required><br>
  Quantidade: <input type="number" name="quantidade" required><br>
  Preço: <input type="text" name="preco" required><br>
  <button type="submit">Finalizar Pedido</button>
</form>
