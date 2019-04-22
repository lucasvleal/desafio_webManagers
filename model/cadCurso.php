<?php
    require("connect.php");

    // $nome = $_POST['nome']; 
    $nome = preg_replace('/[^[:alnum:]_ ,.,ã,á,à,â,ê,í,ú,õ,é,ü,-]/', '', $_POST['nome']); 
    
    $query = "INSERT INTO curso (nome) VALUES ('$nome')";
    $insert = mysqli_query($link,$query);

    if(strlen($nome) < 5 ){
        echo '<div class="alert alert-danger alert-dismissible fade show col-md-12 text-center" role="alert"><strong>Erro ao inserir! Nome muito curto!<strong> <a href="../view/cadastrarCurso.html">Voltar</a></div>';
        exit();
    }

    if($nome == "" || $nome == null){
        echo "<script language='javascript' type='text/javascript'>alert('O campo email deve ser preenchido');</script>";
        header("Location:../view/adminCadastro.html");
    }

    if($insert != false || $insert != null){
        header("Location:../view/index.php");
        echo "<script language='javascript' type='text/javascript'>alert('Aluno cadastrado com sucesso!');</script>";
    }else{
        header("Location:../view/cadastrarAluno.php");
        echo "<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');</script>";
    }

?>