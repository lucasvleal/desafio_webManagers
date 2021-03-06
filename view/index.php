<?php
    require("../model/connect.php");

    $query = "SELECT cod_curso, nome FROM curso";
    $select = mysqli_query($link,$query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" >
    <title>Painel WM10</title>

    <!--CSS-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/myStyle.css" />

    <!--JS-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/jquery.mask.js"></script>
    <script src="../assets/js/myJS.js"></script>

</head>
<body>
    <!--nav bar com logo-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">
            <img src="../assets/img/logo_dark.png" alt="logo-wm">
        </a>

        <!--btn mobile-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!--itens menu-->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item itemNav nav-link active" href="index.php">Listar <span class="sr-only">(current)</span></a>
                <a class="nav-item itemNav nav-link" href="cadastrarCurso.html">Cadastrar Curso</a>
                <a class="nav-item itemNav nav-link" href="cadastrarAluno.php">Cadastrar Aluno</a>   
            </div>
        </div>
		</nav>
		
    <div class="container myContainer">
    	<!--row de busca-->
    	<div class="row">
    		<div class="divForm col-md-12">
    			<form>
            <div class="form-row">
              <div class="col-md-6 col-sm-12">
                <label class="myLabel" for="nomeAluno">Nome</label>
                <input type="text" class="form-control" id="nomeAluno" aria-describedby="emailHelp" placeholder="Insira o nome completo do aluno">
              </div>


              <div class="col-md-4 col-sm-12">
                <label id="cursos" for="cursoSelect" class="myLabel">Curso</label>
                <select class="form-control" id="cursoSelect">
                  <option disabled>Escolha o Curso</option>
                  <?php while($curso = mysqli_fetch_array($select)){ ?>
                    <option value="<?php echo $curso['cod_curso']?>"><?php echo $curso['nome'] ?></option>
                  <?php } ?>
                </select>
              </div>                        

              <div class="col-md-2 d-flex align-items-end">
                <button id="btnBuscarAluno" type="button" class="btn myBtn">B U S C A R</button>
              </div>
            </div>
          </form>
    		</div>
    	</div>

			<!--table com as listagens-->
    	<div class="row">    		
    		<div class="col-md-12 col-sm-12 divTable" style="margin-top: 20px;">
          <form method="POST" action="atualizarAluno.php">
            <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Aluno</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Curso</th>
                  <th scope="col">Ação</th>
                </tr>
              </thead>

              <tbody id="tabelaResult">				    
                <!-- preenchido dinamicamente -->
              </tbody>
            </table>
          </form>
				</div>
      </div>

    </div>
    <!--container-->

	<!-- footer -->
	<footer class="page-footer font-small special-color-dark pt-4 footer">        
      <div class="container">    
        <!-- btn Rede Social -->
        <ul class="list-unstyled list-inline text-center">            
            <!--face-->
            <li class="list-inline-item">
                <a href="https://www.facebook.com/lucas.vianileal" target="_blank">
                    <i class="iconFooter fab fa-facebook fa-lg fa-2x"> </i>
                </a>
            </li>
                    
            <!--twitter-->
            <li class="list-inline-item">
                <a href="https://twitter.com/luquinha_txt" target="_blank">
                    <i class="iconFooter fab fa-twitter fa-lg fa-2x"></i>
                </a>
            </li>
                    
            <!--insta-->
            <li class="list-inline-item">
                <a href="https://www.instagram.com/luquinha.png/" target="_blank">
                    <i class="iconFooter fab fa-instagram fa-lg fa-2x"> </i>
                </a>
            </li>
                    
            <!--github-->
            <li class="list-inline-item">
                <a href="https://github.com/lucasvleal" target="_blank">
                    <i class="iconFooter fab fa-github fa-lg fa-2x"></i>
                </a>
            </li>            
        </ul>
      </div>        
        
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3 footerBaixo">
        <span class="nomeFooter">Lucas Leal©</span>
      </div> 
  </footer>
    
</body>


</html>

    