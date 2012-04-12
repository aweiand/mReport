<?php
/*
 * Funções gerais para uso no sistema
 * 
 */
class User {    
    
    /*
     * Função construtora da classe
     * 
     */
    function User(){
        
    }
    
    /*
     * Função que retorna retorna os dados do usuário informado ou um recordset
     *  com todos os usuarios do sistema
     * 
     *  @iduser integer - código do usuário
     * 
     */
    function getUser($iduser = ''){
       $db = new data();
       if ($iduser == '')
           $sql = "SELECT * FROM users";
       else
           $sql = "SELECT * FROM users WHERE idusers=".$iduser;
       $ret = $db->query($sql);
       return $ret;
    }
    
    /*
     * Função que retorna as permissões do usuario passado no parâmetro
     * 
     *  @iduser integer - código do usuário
     */
    function getPermissoes(){

    }
    
    /*
     * Função para logar no sistema, confere se há alguma forma de
     *  SQL inject se houver já para caso contrário continua...
     * 
     *  @dados array - array com os dados do usuario, exemplo
     *                 dados['user']   = 'teste';
     *                 dados['passwd'] = '123';
     */
    function _logar($dados){
        $db = new data();
        $ut = new Utils();
        
        if (!$ut->badWords($dados)){
            unset($_SESSION['iduser']);
            unset($_SESSION['logado']);
            return false;
            break;
        }
        else {
            $sql = "SELECT * FROM users WHERE login='".$dados['login']."'
                                        AND password='".$dados['passwd']."'";
            $result = $db->query($sql);
            if ($result->RecordCount()==0) {
                unset($_SESSION['iduser']);
                unset($_SESSION['logado']);
                return false;
            }
            else {
                unset($_SESSION['iduser']);
                unset($_SESSION['logado']);
                $_SESSION['iduser'] = $result->Fields("idusers");
                $_SESSION['logado'] = true;
                return true;
            }
        }
    }
    
    /*
     * Função para verificar se o usuário é verdadeiro de acordo om a sessão
     */
    function _autentica($codusuario){
        $db = new data();
        $ut = new Utils();
        
        if ($codusuario!=''){
            $dado['codusuarrio'] = $codusuario;

            if (!$ut->badWords($dado)){
                unset($_SESSION['iduser']);
                unset($_SESSION['logado']);
                return false;
                break;
            }
            else {
                $sql = "SELECT * FROM users WHERE idusers=".$codusuario;
                $result = $db->query($sql);
                if ($result->RecordCount()==0) {
                    unset($_SESSION['iduser']);
                    unset($_SESSION['logado']);
                    return false;
                }
                else {
                    return true;
                }
            }
        } else
            return false;
    }
    
    /*
     * Função para inserir usuários no banco automaticamente
     *  só necessita de um array com os dados, porém os campos
     *  do array devem coincidir com os da tabela.
     * 
     *  reuqer
     *   @dados array - Array com os dados do usuário:
     *                  $dados['name'] = 'teste'
     *                  $dados['senha'] = 'teste'
     *                  $dados['login'] = 'teste'
     * 
     */
    function setUser($dados){
        $db = new data();
        
        if ($db->_insrt("users", $dados))
            return true;
        else
            return false;
    }

    /*
     * Função para atualizar dados do usuário no banco automaticamente
     *  só necessita de um array com os dados, porém os campos
     *  do array devem coincidir com os da tabela.
     * 
     *  reuqer
     *   @dados array - Array com os dados a serem atualizados, sem o iduser:
     *                  $dados['name'] = 'teste'
     *                  $dados['senha'] = 'teste'
     *                  $dados['login'] = 'teste'
     *  @cod integer  - id do usuário
     * 
     */
    function updtUser($dados, $cod){
        $db  = new data();
        $cod = "idusers=".$cod;
        
        if ($db->_updt("users", $dados,$cod))
            return true;
        else
            return false;
    }   
    
    /*
     * Função para deletar usuário do banco
     * 
     *  requer
     *   @cod integer  - id do usuário
     * 
     */
    function delUser($cod){
        $db  = new data();
        $cmdSQL = "DELETE FROM users WHERE idusers=".$cod;
        
        if ($db->command($cmdSQL))
            return true;
        else
            return false;
    }   
    
}
?>
