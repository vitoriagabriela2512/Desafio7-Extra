<?php require_once("Restaurante.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pedido Restaurante</title>

    <style>
     /* RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* BODY */
body {
    font-family: 'Segoe UI', Arial, sans-serif;
   background: linear-gradient(to right, #d0e6f8, #f0f8ff);
    color: #222;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

/* CONTAINER */
.container {
    background: #ffffff;
    padding: 35px;
    width: 380px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    text-align: center;
}

/* TÍTULO */
h2 {
    margin-bottom: 15px;
    color: #222;
}

/* INPUTS */
input {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    border-radius: 10px;
    border: 1px solid #ccc;
    outline: none;
    transition: 0.3s;
    font-size: 14px;
}

/* FOCO INPUT */
input:focus {
    border-color: #000000;
    box-shadow: 0 0 8px rgba(212, 175, 55, 0.4);
}

/* BOTÃO */
button {
    width: 100%;
    padding: 12px;
    margin-top: 15px;
    border-radius: 10px;
    border: none;
    background: linear-gradient(135deg, #000000, #000000);
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

/* HOVER BOTÃO */
button:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(212, 175, 55, 0.5);
}

/* RESULTADO */
.resultado {
    margin-top: 25px;
    padding: 15px;
    background: #f9f9f9;
    border-radius: 10px;
    text-align: left;
    box-shadow: inset 0 0 5px rgba(0,0,0,0.05);
}

/* TEXTO RESULTADO */
.resultado p {
    margin: 5px 0;
}

/* DESTAQUE */
.resultado strong {
    color: #b8962e;
}
    </style>
</head>

<body>

<div class="container">
    <h2>Conta do Restaurante</h2>

    <form method="post">
        <input type="number" step="0.1" name="consumo" placeholder="Valor do consumo" required>
        <input type="number" name="pessoas" placeholder="Número de pessoas" required>
        <input type="number" step="0.1" name="couvert" placeholder="Valor do couvert" required>

        <button type="submit">Calcular</button>
    </form>

    <div class="resultado">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $pedido = new Restaurante(
                (float)$_POST['consumo'],
                (int)$_POST['pessoas']
            );

            $pedido->adicionarCouvert((float)$_POST['couvert']);

            $pedido->exibirConta();
        }
        ?>
    </div>
</div>

</body>
</html>