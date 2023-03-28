<?php
/* Se O userName da sessão não for o certo a paági ira voltar para
    o index(url) em 5 segundos(refresh:5) e apresentara a mensagem
    "Acesso restrito."
    die- Equivale a sair.
    $_Session é uma variavel global sendo que o $_SESSION['username'] foi 
    dado no ficheiro index.php.
    session_start() é necessário para podermos acessar a variavel  $_SESSION['username'].
*/
    session_start();
    if(!isset($_SESSION['username'])){  
        header("refresh:5;url=index.php"); 
        die("Acesso restrito.");
    }

    $valor_temperatura = file_get_contents("api/files/temperatura/valor.txt");
    $hora_temperatura =  file_get_contents("api/files/temperatura/hora.txt");
    $nome_temperatura =  file_get_contents("api/files/temperatura/nome.txt");
    //echo  $nome_temperatura. ": " .$valor_temperatura."ºC em ".$hora_temperatura;
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" http-equiv="refresh" content="5">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plataforma Iot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./TIform.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b>Dashboard EI-TI</b></a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: black;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Histórico</a>
                        </li>
                    </ul>
                </div>
            <form class="d-flex">
                <a href="index.php"><button class="btn btn-sm btn-outline-secondary" type="button">Logout</button></a>
            </form>
        </div>
    </nav>


    <div class="container" style="padding-top:3% ;">
        <div class="card">
            <div class="card-body">
                <img class="float-end" 
                src="./imagens/estg.png" 
                alt="estg" 
                width="300">
                <h1>Servidor IoT</h1>
                 <p>Bem vindo <b style="text-transform: uppercase;"> UTILIZADOR XPTO</b></p>
                <p>Tecnologias de Internet - Engenharia Informática</p>
            </div>
      </div>
    </div>

    <div class="container" style="padding-top: 20px;">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header sensor" style="text-align:center;"> Temperatura: <?php echo $valor_temperatura;?>º</div>
                    <div class="card-body" style="text-align:center;"> <img src="./imagens/temperature-high.png" alt="temp"></div>
                    <div class="card-footer" style="text-align:center;"><p><b>Atualização: </b> <?php echo $hora_temperatura; ?> - <a href="#">Histórico</a></p></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header sensor" style="text-align:center;"> Humidade: 70º</div>
                    <div class="card-body" style="text-align:center;"> <img src="./imagens/humidity-high.png" alt="hum"></div>
                    <div class="card-footer" style="text-align:center;"><p><b>Atualização: </b> 2023/03/10 14:31 - <a href="#">Histórico</a></p></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header atuador" style="text-align:center;"> Led Arduíno: Ligado</div>
                    <div class="card-body" style="text-align:center;"> <img src="./imagens/light-on.png" alt="light"></div>
                    <div class="card-footer" style="text-align:center;"><p><b>Atualização: </b> 2023/03/10 14:31 - <a href="#">Histórico</a></p></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 20px;">
        <div class="card">
            <div class="card-header"><b>Tabela de Sensores</b></div>
            <div class="card-body">
                <table class="table">
                    <tr >
                        <th scope="col"><b>Tipo de Dispositivos IoT</b></th>
                        <th scope="col"><b>Valor</b></th>
                        <th scope="col"><b>Data de Atualização</b></th>
                        <th scope="col"><b>Estado Alertas</b></th>
                    </tr>
                    <tr>
                        <td scope="row"><?php echo $nome_temperatura;?></td>
                        <td><?php echo $valor_temperatura;?>º</td>
                        <td><?php echo $hora_temperatura;?></td>
                        <td><span class="badge text-bg-danger">Elevada</span></td>
                    </tr>
                    <tr>
                        <td scope="row">Humidade</td>
                        <td>70º</td>
                        <td>2023/03/10 14:31</td>
                        <td><span class="badge rounded-pill text-bg-primary">Normal</span></td>
                    </tr>
                    <tr>
                        <td scope="row">Led Arduino</td>
                        <td>Ligado</td>
                        <td>2023/03/10 14:31</td>
                        <td><span class="badge rounded-pill text-bg-success">Ativo</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>