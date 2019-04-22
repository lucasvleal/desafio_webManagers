<?php
    require("connect.php");

    // $nome = $_POST['nome'];
    // $dataNasc = $_POST['dataNasc'];
    // $telefone = $_POST['telefone'];    
    // $curso = $_POST['curso'];    

    $nome = preg_replace('/[^[:alnum:]_ ,.,ã,á,à,â,ê,í,ú,õ,ç,é,ü,-]/', ' ', $_POST['nome']);
    $dataNasc = $_POST['dataNasc'];
    $telefone = preg_replace('/[^[:alnum:]_ ,.,(,),-]/', ' ', $_POST['telefone']);
    $curso = preg_replace('/[^[:alnum:]_ ,.,ã,á,à,ç,â,ê,í,ú,õ,é,ü,-]/', ' ', $_POST['curso']);      

    $str = explode("/",$dataNasc);
    $dataNasc = $str[2]."-".$str[1]."-".$str[0];

    // usar session pra armazenar os valores ? 

    $query = "UPDATE aluno SET nome = '$nome', DN = '$dataNasc', telefone = '$telefone', cod_curso = '$curso' WHERE nome = '$nome'";
    $insert = mysqli_query($link,$query);

    if($insert){
        echo "<script language='javascript' type='text/javascript'>alert('Aluno alterado com sucesso!');</script>";
        header("Location:../view/index.php");
    } else{        
        echo "<script language='javascript' type='text/javascript'>alert('Não foi possível atualizar esse aluno');</script>";
        header("Location:../view/atualizarAluno.php");
    }

?>