/* 
 * Este arquivo é usado para funções em javascript
 * 
 */
function mens(act){
    $(function(){
        $("#mens").css("visibility", "visible");

        switch(act){
            case 'erroLogin' :$("#mens").append("Houve algum erro de Login");
                            $("#mens").removeClass();   
                            $("#mens").addClass("mens ui-state-error"); 
                            break;

            case 'sucesso'   :$("#mens").append("Ação Concluída com Sucesso!");
                            $("#mens").removeClass();   
                            $("#mens").addClass("mens ui-state-highlight"); 
                            break;

            default          :$("#mens").html("");
                            break;
        }
        $("#mens").fadeIn(90000, function(){ 
            $("#mens").fadeOut(9000);
        });    
    });
}

/*
 * Função que pinta a linha na entrada do mouse da tabela para melhor localização
 */
function naLinha(idLinha){
    $("#"+idLinha).css("background-color","#a9d4fe");
}

/*
 * Função que pinta a linha na saída do mouse da tabela para melhor localização
 */
function foraLinha(idLinha){
    $("#"+idLinha).css("background-color","white");
}
