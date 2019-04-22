$(document).ready(function(){

    // Datepicker do cadastro de aluno
    $( function() {
        $( "#datepicker" ).datepicker({
            dateFormat: 'dd/mm/yy',
            monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ]
        }); 
        // PRA RECUPEAR var currentDate = $( ".selector" ).datepicker( "getDate" );
    } );   
      
    // mascara de telefone
    $('.telefone').mask('(00) 0000-0000');

    //envia via ajax para o busca.php, recebe os dados e joga na tabela
    $('#btnBuscarAluno').on("click",function(){
        console.log("Recuperando dados...");
        $('.rowErro').hide();
        var nomeAluno = $('#nomeAluno').val();
        var cursoAluno = $('#cursoSelect').val();
                
        //ajax de busca para listagem
        $.post("http://localhost/wm10/model/busca.php",{
            nomeAluno, cursoAluno
        },function(e){
            $("#tabelaResult").append(e);
            console.log("Recuperado!");
            console.log(e);
        });      
    });

    var nomeCurso = $('#nomeCurso').val();
    if(nomeCurso.length < 4)
});