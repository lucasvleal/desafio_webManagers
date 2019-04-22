<?php
    require("connect.php");

    header("content-type: application/json");

    // $nome = $_POST['nomeAluno'];      
    // $curso = $_POST['cursoAluno'];

    $tabela = "";
    $nome = preg_replace('/[^[:alnum:]_ ,.,ã,á,à,â,ê,í,ú,õ,ç,é,ü,-]/', ' ', $_POST['nomeAluno']);
    $curso = preg_replace('/[^[:alnum:]_ ,.,ã,á,à,ç,â,ê,í,ú,õ,é,ü,-]/', ' ', $_POST['cursoAluno']);


    //querys diferentes pra cada tipo de procura: ambas informações, só nome do aluno, e só curso
    $query_ambos = "SELECT cod_aluno, aluno.nome, `telefone`, curso.nome as cursoNome FROM aluno,curso WHERE aluno.nome = '$nome' AND aluno.cod_curso = curso.cod_curso AND curso.cod_curso = '$curso' ";
    $query_aluno = "SELECT cod_aluno, aluno.nome, `telefone`, curso.nome as cursoNome FROM aluno,curso WHERE aluno.nome = '$nome' AND aluno.cod_curso = curso.cod_curso";
    $query_curso = "SELECT cod_aluno, aluno.nome, `telefone`, curso.nome as cursoNome FROM aluno,curso WHERE curso.cod_curso = '$curso' AND aluno.cod_curso = curso.cod_curso";

    if (strlen($nome) == 0) {
        $select = mysqli_query($link,$query_curso);
    } else if (strlen($curso) == 0) {
        $select = mysqli_query($link,$query_aluno);
    } else {
        $select = mysqli_query($link,$query_ambos);
    }

    if ($select){
        if(mysqli_num_rows($select) >= 1){ //caso haja a ocorrencia do aluno no curso
            while($result = mysqli_fetch_array($select,MYSQLI_ASSOC)){
                $cod = utf8_encode($result['cod_aluno']);
                $tabela .= '<tr>';
                $tabela .= "<td id='nome-$cod'>" . utf8_encode($result['nome']) ."</td>";
                $tabela .= "<td id='tel-$cod'>" . utf8_encode($result['telefone']) ."</td>";
                $tabela .= "<td id='curso-$cod'>" . utf8_encode($result['cursoNome']) ."</td>";
                $tabela .= "<td><button class='btn myBtnTabela' type='submit' name='btnAtt' value='$cod' href='#' data-toggle='modal' data-target='#atualizarModal'>Atualizar</button></td>";
                $tabela .= '</tr>';
             
                echo json_encode($tabela);
            }
        } else if(mysqli_num_rows($select) == 0) { //caso não haja a ocorrencia do aluno no curso
            echo json_encode("<tr class='rowErro'><td colspan='4'><span class='semAluno'>Não há ocorrência desse aluno nesse curso!<span></td></tr>");
        }
    } else {  //msg de erro na consulta
        echo json_encode("<tr class='rowErro'><td colspan='4'><span class='erroConsulta'>Erro na consulta :(<span></td></tr>");
    }
?>