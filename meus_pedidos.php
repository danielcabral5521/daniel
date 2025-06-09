meus_pedidos.php
<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
  header('Location: login.php');
  exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '', 'loja');
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT * FROM pedidos WHERE usuario_id = '$usuario_id'";
$result = $conn->query($sql);
while ($pedido = $result->fetch_assoc()) {
  echo "Produto: " . $pedido['produto_nome'] . "<br>";
  echo "Quantidade: " . $pedido['quantidade'] . "<br>";
  echo "Preço: R$ " . number_format($pedido['preco'], 2, ',', '.') . "<br>";
  echo "Status: " . ucfirst($pedido['status']) . "<br><br>";
}
$conn->close();
?>
