<?
/*
  - Classes para acesso a bancos de dados
  - Augsuto Weiand
  - guto.weiand@gmail.com
  - Criação - 19/03/2012
 */
include "../mainframe/plugins/adodb/adodb.inc.php";

class data{
    var $db;
    
//Construtor da classe e inicializador do BD    
    function data(){
        $this->db = $this->startDB();
    }

//Função que define e prepara a conexão com o BD    
    function startDB(){
            if ($_SERVER['SERVER_NAME'] == "localhost") {
                $server   = "localhost";
                $database = "mReport";
                $user     = "root";
                $password = "root";
            }
            else
            {
                $server   = "localhost";
                $database = "mReport";
                $user     = "root";
                $password = "root";
            }
            $CONN = ADONewConnection('mysql');
            @$CONN->Connect($server, $user, $password, $database);
            $CONN->Execute("SET NAMES utf-8;");
            //$CONN->debug=true;
            return $CONN;
    }
    
//Função para execução de consultas    
    function query($cmdSQL) {
		$rsQ = $this->db->Execute($cmdSQL) or $this->showErro($this->db->ErrorMsg(), $cmdSQL);
		return $rsQ;
	}

//Função para comandos, tipo Drop, Delete, Update   
	function command($cmdSQL) {
		if ($this->query($cmdSQL))
            return true;
        else
            return false;
	}
    
//Função para mostrar erros    
    function showErro($msg, $cmdSQL = "") {
		if ($cmdSQL != "")
			trigger_error($msg." comando SQL: <strong><pre>".$cmdSQL."</pre></strong>");
	}
    
//Função que retorna uma SQL de inserção    
    function getInsertSQL($rs, $data) {
        $a = $this->db->GetInsertSQL($rs, $data);
        return $a;
    }

//Função para Inserir Registros Automaticamente    
    function _insrt($rs, $record){ 
        //$this->db->debug=true;
        if ($this->db->AutoExecute($rs, $record, "INSERT"))
            return true;
        else
            return false;
    }
    
//Função para Atualizar registro Automaticamente    
    function _updt($rs, $record, $cod) { 
        $this->db->debug=true;
        if ($this->db->AutoExecute($rs, $record, 'UPDATE', $cod)) 
            return true;
        else
            return false;
    }    
    
}


?>