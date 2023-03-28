<?php

    header('Content-Type: text/html; charset=utf-8');

    //echo $_SERVER['REQUEST_METHOD'];
    //print_r ($_POST);

    $arrayFicheiros = array("temperatura", "humidade", "Led Arduíno");
    $booleanficheiros = false;

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //echo "Recebi um POST";
    
        /*
            O Código abaixo referido verifica que todas a variáveiss recebidas
            venham preenchidas.
            Caso isto seja verdade os ficheiros valor e hora serão trocados 
            pelos valores recebidos, por outro lado caso o acima referido seja mentira
            sera utilizado o var_dump() para realizardebug aos valores que são recebidos 
            pela serviço web.
        */

        if(isset( $_POST['valor']) && isset($_POST['hora']) && isset( $_POST['nome'])){
            file_put_contents("files/".$_POST['nome']."/valor.txt", $_POST['valor']);
            file_put_contents("files/".$_POST['nome']."/hora.txt", $_POST['hora']);

            $append = $_POST['hora'].";".$_POST['valor'];

            file_put_contents("files/".$_POST['nome']."/log.txt", $append.PHP_EOL, FILE_APPEND);
        } else{
            //var_dump(file_get_contents("php://input"));
            http_response_code(400);
        };
    }elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
        //echo "Recebi um GET";
        if(isset($_GET['nome'])){
            for($index=0;$index<sizeof($arrayFicheiros);$index++){
                if($_GET['nome'] == $arrayFicheiros[$index]){
                    $booleanficheiros = true;
                }
            }
            
            if($booleanficheiros == true){
                $nome = "files/".$_GET['nome']."/valor.txt";
                echo file_get_contents($nome)."º"; 
            } else{
                http_response_code(400);
            }
            
        }else{
            //echo "faltam parametros no GET";
            http_response_code(400);
        }
    } else {
        http_response_code(403);
    }


  ?>