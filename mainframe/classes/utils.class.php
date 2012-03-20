<?php
/*
 * Funções gerais para uso no sistema
 * 
 */
class Utils {
    var $db;
    
    function Base(){
        global $CONN;
        $this->db = $CONN;
    }
    
    /*
     * Função para verificar se existem letras não permitidas na sintaxe enviada
     * 
     * requer
     *  @variavel - string
     * 
     */
    function badWords($post){
        $badwords = array("#", "'", "*","="," union "," insert "," update "," drop "," select ");
        foreach($post as $value)
        foreach($badwords as $word)
        if(substr_count($value, $word) > 0) 
            return false;
        else
            return true;
    }
    
    /*
     * Função para testar se a pessoa está logada no sistema
     * 
     * requer
     *  @
     * 
     * verifica
     *  @
     * 
     */
    function _logado(){
    }
    
    /*
     * Função para verificar se o usuário tem permissões
     * 
     * requer
     *  @
     * 
     * verifica
     *  @
     * 
     */
    function getPermissoes(){

    }
    
    /*
     * Função genérica para o envio do email para qualquer fim
     * 
     * requer
     *  @assunto - String
     *  @arquivo - Link para o arquivo com o modelo de relatorio
     *  @dados   - Array com os dados necessários para o email
     * 
     * verifica
     *  @
     * 
     */
    function enviaEmail($assunto, $arquivo, $dados){
        include 'mail.class.php';
        $from = "mReportl<mreport@mreport.br>";
        $to = $dados['nome']."<".$dados['email'].">";

        $mt = new MailTemplate($arquivo);

        $mt->setConfig("smtp.mreport.br", "mreport@mreport.br", "mreport123", "587");

        if ($dados!=''){
            foreach($dados as $pos => $valor)
                $mt->campos[$pos] = $valor;
        }

        $mt->assunto            = $assunto;
        $mt->cabecalhos["From"] = $from;
        $mt->cabecalhos["To"]   = $to;
        $mt->campos["momento_envio"] = date("d-m-Y");

        $mt->parse();
        if ($mt->send("phpmailer"))
            return true;
        else
            return false;  ////use "view" to debug ou "phpmailer" para envio
    }
    
}
?>
