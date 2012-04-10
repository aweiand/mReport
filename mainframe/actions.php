<?
include_once "plugins/adodb/adodb.inc.php";
include_once "classes/database.php";

foreach (glob("classes/*.php") as $filename) {
    include_once $filename;
}
/*
 * Ações para trabalhar com o mReport
 * 
 * 
 * As variáveis vindas por $_GET ou $_POST são guardadas nas 
 * variáveis para não perder dados, e é necessário trata-las 
 * agora como um array php
 */
$post = $_POST;
$get  = $_GET;

session_start();


/* Usado para Debug
 *
echo "<pre>";
print_r($post);
exit();
 * 
*/

/*  Login no Sistema
 *   realiza o login no sistema
 * 
 *  Obs.: Nesta função coloquei uma forma de exemplo de como usar a 
 *        classe de banco de dados, assim como no final deste arquivo
 *        coloco uma explicação de algumas funções e exemplos de aplicaçao
 *        para quem nunca usou conexão SQL com ADODB e com orientação a 
 *        objetos e classes
 * 
 * requer
 *  @login -> string
 *  @senha -> string
 */
if (isset($post["action"])&&($post['action']=='Logar')){
    $u  = new User();
    
    if ($u->_logar($post))
        header("Location: ../index.php");
    else
        header("Location: ../index.php?actionMens=erroLogin");
}


/*
 *  Autenticação
 *   verifica se o usuário está logado, se possuí sessão 
 *   aberta para ele e se pode ver o conteúdo requisitado
 * 
 *  requer
 *   @session['usuid'] -> int
 *   @session['autenticado'] -> string
 */
if (isset($post["action"])&&($post['action']=='autenticacao')){
    
}

/*
 * Exemplo de uso de classes e ADODB
 * 
 * ### agora temos acesso a todas as propriedades da classe ADODB
 *     alguns exemplos são: ###
 * 
 *  query(sql)      ### executa uma sentença SQL, como SELECT
 *  command(sql)    ### executa uma sentença SQL, como DELETE, DROP, ALTER, UPDATE, INSERT
 *  RecordCount()   ### retorna o número de linhas do recordset
 *  MoveNext()      ### utilizada em laços while para miver para a próxima linha do resultado
 *                      CUIDADO! se esse não estiver declarado pode resultar em loop infinito!
 *  debug=true      ### ativa as propriedades de debug do ADODB para um debug mais profundo
 *  EOF             ### final de linha / arquivo (end of file)
 *  Fields('campo') ### especifica o campo desejado do recordset
 * 
 * Exemplos de Uso
 * 
 * ### temos que iniciar a classe antes de começar a usa-la: ###
 * $db     = new data();
 * $db->debug=true;
 * $sql    = "SELECT * FROM usuarios";
 * $result = $db->query($sql);
 * echo "Linhas Afetadas: ".$result->RecordCount();
 * while (!$result->EOF){
 *      echo $result->Fields('nome');
 *      $result->MoveNext();
 * }
 * 
 * 
 */

?>