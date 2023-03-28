<?php   
/*if (isset($_POST['UserName'])){
    echo "O username submetido foi:".$_POST['UserName']. "<br>";
}

if (isset($_POST['PassWord'])){
    echo "O password submetido foi:".$_POST['PassWord']. "<br>";
}
*/
//echo password_hash("Alex", PASSWORD_DEFAULT);   
$username="Tiaguito";
$password_hash='$2y$10$IFq/Z55UlmotTljMGa7zFeOLwWi9tDNjIP7tsf4JS2ma.rcFHIWzy';

    /*if(isset($_POST['username']) != null && isset($_POST['password']) != null ){
    if ($_POST['username'] == $username){
    echo "Belo nome <br>";
    } else{
    echo "Invasor <br>";
    }  

    if (password_verify($_POST['password'], $password_hash)){
    echo "Belo código <br>";
    } else{
    echo "Invasor";
    }
    }
    */
    if(isset($_POST['username']) && isset($_POST['password'])){

        if(password_verify($_POST['password'], $password_hash) && $_POST['username'] === $username){
        session_start();
        $_SESSION['username'] = $_POST['username'];
        header("refresh:0;url=dashboard.php");
        }
        else{
        echo "Erro";
    }
    } 
?>


<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./TIform.css">
  </head>
  <body>
    <?php   
    /*echo '<h1>Olá Mundo</h1>';   
    $dia = 16;
    $mes = 03;
    $ano = 2023;
    echo "Data de hoje = $dia/$mes/$ano"
    */
    ?>
    <div class="container">

        <div class="row justify-content-center">
            <form class="form" method = "post">
                <a href="https://www.ipleiria.pt/estg/"><img src="./estg_h.png" alt="estg"></a>
                <div>
                <label for="UserNameInput" class="form-label">UserName:</label>
                <br>
                <input name="username"  type="text" class="form-control"  maLength="30" id="UserNameInput" placeholder="Insere o nome" required>
                </div>
                <div>
                <label for="PassWordInput" class="form-label">Password:</label>
                <br>
                <input name="password"  type="password" class="form-control" maLength="30" id="PassWordInput" placeholder="insere a password" required>
                </div>
                <div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submeter</button>
                </div>
            </form>
        </div>

   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>