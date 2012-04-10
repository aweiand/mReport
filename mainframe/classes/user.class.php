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
       if ($codusuario == '')
           $sql = "SELECT * FROM user";
       else
           $sql = "SELECT * FROM user WHERE idusers=".$iduser;
       $ret = $db->command($sql);
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
    
    
}
?>
