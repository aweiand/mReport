<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="application-name" content="CEAD" /> 
	<meta name="author" content="Augusto Weiand, guto.weiand@gmail.com" />
	<meta name="keywords" content="Gerador de Relatório para Moodle" />
    
    <title>mReport</title>
    
<?php
require "incs.php";


?>
    
</head>
<body>
<?php
session_start();
?>
    <div id="centralizar">
        <div id="topo">
        </div>
        <div id="menu">
        </div>
            <div id="nav">
                <table width="20%" align="center">
                    <tr>
                        <td align="center">
                            <h3><strong>Bem Vindo!</strong></h3><br />
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <label for="login">Login:</label>
                            <input type="text" name="login" id="login" style="width: 200px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <label for="passwd">Senha:</label>
                            <input type="password" name="passwd" id="passwd" style="width: 200px;" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="hidden" name="fmLogar" value="fmLogar" />
                            <input type="submit" name="Logar" id="Logar" value="Logar" />
                        </td>
                    </tr>
                </table>
            </div>
        </form>   
    </div>
    
    <div id="loading" class="loading">
        <img src="mainframe/plugins/carregando.gif" />
    </div>
</body>
</html>