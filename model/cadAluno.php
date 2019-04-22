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
    $dataCad = date('Y-m-d');   

    $str = explode("/",$dataNasc);
    $dataNasc = $str[2]."-".$str[1]."-".$str[0];

    //pegar o cod do curso através do nome do curso passado
    $query = "INSERT INTO aluno (nome, DN, telefone, data_cadastro, cod_curso) VALUES ('$nome', '$dataNasc', '$telefone', '$dataCad', '$curso')";
    $insert = mysqli_query($link,$query);

    if($insert){
        echo "<script language='javascript' type='text/javascript'>alert('Aluno cadastrado com sucesso!');</script>";
        header("Location:../view/index.php");
    } else{
        // echo $insert;
        // echo $nome." \ ".$dataNasc." \ ".$dataCad." \ ".$telefone." \ ".$curso;
        echo "<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');</script>";
        header("Location:../view/cadastrarAluno.php");
    }

?>