<?php

  
  include_once("conn.php");

  $method = $_SERVER['REQUEST_METHOD'];

  if($method === "GET") {
    $pedidosQuery = $conn->query("SELECT * FROM pedidos");

    $pedidos = $pedidosQuery->fetchAll();
    $pizzas = [];

    foreach($pedidos as $pedido) {
      $pizza = [];

      // definir array pizza
      $pizza['id'] = $pedido['pizza_id'];

      // resgatando pizza

      $pizzaQuery = $conn->prepare("SELECT * FROM pizzas WHERE id = :pizza_id");

      $pizzaQuery->bindParam(':pizza_id', $pizza['id']);

      $pizzaQuery->execute();

      $pizzaData = $pizzaQuery->fetch(PDO::FETCH_ASSOC);

      // resgatando a borda da pizza
      $bordaQuery = $conn->prepare("SELECT * FROM bordas WHERE id = :borda_id");

      $bordaQuery->bindParam(':borda_id', $pizzaData["borda_id"]);

      $bordaQuery->execute();

      $borda = $bordaQuery->fetch(PDO::FETCH_ASSOC);
      $pizza["borda"] = $borda['tipo'];

      // resgatando a massa da pizza
      $massaQuery = $conn->prepare("SELECT * FROM massas WHERE id = :massa_id");

      $massaQuery->bindParam(':massa_id', $pizzaData["massa_id"]);

      $massaQuery->execute();

      $massa = $massaQuery->fetch(PDO::FETCH_ASSOC);
      $pizza["massa"] = $massa['tipo'];

      // resgantando sabores pizza

      $saboresQuery = $conn->prepare("SELECT * FROM pizza_sabor WHERE pizza_id = :pizza_id");

      $saboresQuery->bindParam(':pizza_id', $pizza['id']);

      $saboresQuery->execute();

      $sabores = $saboresQuery->fetchAll(PDO::FETCH_ASSOC);

      // resgatando nome dos sabors
      $saboresDaPizza = [];

      foreach($sabores as $sabor) {
        $saboresQuery = $conn->prepare("SELECT * FROM sabores WHERE id = :sabor_id");
        $saboresQuery->bindParam(':sabor_id', $sabor['sabor_id']);
        $saboresQuery->execute();

        $saborData = $saboresQuery->fetch(PDO::FETCH_ASSOC);
        array_push($saboresDaPizza, $saborData['nome']);
      }

      $pizza["sabores"] = $saboresDaPizza;

      // adicionando status do pedido
      $pizza["status"] = $pedido['status_id'];

      // adiciona array pizza ao array de pizzas

      array_push($pizzas, $pizza);
    }

    $statusQuery = $conn->query("SELECT * FROM status");

    $status = $statusQuery->fetchAll();

  } else if ($method === "POST") {
    // verificando tipo de POST
    $type = $_POST["type"];


    if ($type === "delete") {

    $pizzaId = $_POST["id"]; 

    $deleteQuery = $conn->prepare("DELETE FROM pedidos WHERE pizza_id = :pizza_id");
    $deleteQuery->bindParam(':pizza_id', $pizzaId, PDO::PARAM_INT);
    $deleteQuery->execute();

    $_SESSION['msg'] = "Pedido cancelado com sucesso!";
    $_SESSION['status'] = "success";

  } else if ($type === "update") {

    $pizzaId = $_POST["id"];
    $statusId = $_POST["status"];

    $updateQuery = $conn->prepare("UPDATE pedidos SET status_id = :status_id WHERE pizza_id = :pizza_id");
    $updateQuery->bindParam(':status_id', $statusId, PDO::PARAM_INT);
    $updateQuery->bindParam(':pizza_id', $pizzaId, PDO::PARAM_INT);
    $updateQuery->execute();

    $_SESSION['msg'] = "Status do pedido atualizado com sucesso!";
    $_SESSION['status'] = "success";

  }
  // retorna usuário para dashboard
  header("Location: ../dashboard.php");
  
}

?>