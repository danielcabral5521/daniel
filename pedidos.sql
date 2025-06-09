pedidos
CREATE TABLE pedidos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  produto_nome VARCHAR(255),
  quantidade INT,
  preco DECIMAL(10, 2),
  status ENUM('pendente', 'pago', 'enviado') DEFAULT 'pendente',
  data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
