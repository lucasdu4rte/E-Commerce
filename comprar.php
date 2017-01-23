  <?php
  session_start();
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"]))
  {
    session_destroy();
    header("Location: login.php");
    exit;
  }

  include 'banco.php';
?>

  <?php if (isset($_GET['id'])) 
    {
    $id = $_GET['id'];
    $email = $_SESSION['email'];

    $sql = "SELECT * FROM produtos where id = '$id'";

    $resultado = mysql_query($sql);

    $row = mysql_fetch_array($resultado);

    $categoria = $row['categoria'];
    $produto = $row['produto'];
    $marca = $row['marca'];
    $quantidade = 1;
    $preco = $row['preco'];
    $descricao = $row['descricao'];

    // Registrando data
    date_default_timezone_set('America/Sao_Paulo');
    $data = date("Y-m-d H:i:s");

    $sql = mysql_query("INSERT INTO pedidos(email_cliente, ped_data, ped_valor, ped_qtdade) VALUES ('$email', '$data', '$preco', '$quantidade')") or die(mysql_error());

    $valortotal = ($preco * $quantidade);

    $num_pedido = mysql_insert_id();

    $sql = mysql_query("INSERT INTO itens_pedido(ped_id, pro_id, itensped_vlrunit, itensped_qtde, itensped_vlrtotal) VALUES('$num_pedido', '$id', '$preco', '$quantidade', '$valortotal')") or die(mysql_error());

    mysql_close($conexao);

    echo "<script>alert('Sua compra foi concluída com Sucesso!');</script>";

    header("Location: pedidos.php");
    }
    ?>