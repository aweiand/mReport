<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="application-name" content="CEAD" /> 
        <meta name="author" content="Augusto Weiand, guto.weiand@gmail.com" />
        <meta name="keywords" content="Gerador de Relatório para Moodle" />

        <title>mReport | Gerador de Relatórios para Moodle</title>

        <?php
        require "incs.php";
        ?>

    </head>
    <body>
        <?php
        session_start();
        
        $u    = new Utils();
        $usua = new User();

        if (!$u->_logado()){
            header("Location: index.php");
        }


        if (isset($_GET['actionMens'])) {
            $act = $_GET['actionMens'];
            echo "<script>mens('".$act."')</script>";
        }
        ?>
        <div id="mens" class="mens">
        </div>

        <div id="centralizar">
            <div id="topo">
                <?php include_once "pg/topo.php"; ?>
            </div>
            <div id="menu">
                <?php include_once "pg/menu.php"; ?>
            </div>
            <div id="nav">
                <table class="listUsers">
                <?php
                $ret = $usua->getUser();

                while (!$ret->EOF){
                ?>
                    <tr id="<?php echo $ret->Fields('idusers') ?>" onmouseover='naLinha(this.id)' onmouseout='foraLinha(this.id)'>
                        <td>
                            <b>Nome: </b>
                            <input type="text" name="name" id="name" value="<?php echo $ret->Fields('name') ?>" />
                        </td>
                        <td>
                            <b>Login: </b>
                            <input type="text" name="login" id="login" value="<?php echo $ret->Fields('login') ?>" />
                        </td>
                        <td>
                            <b>Senha: </b>
                            <input type="password" name="password" id="password" value="<?php echo $ret->Fields('password') ?>" />
                        </td>       
                        <td>
                            <b>E-mail: </b>
                            <input type="email" name="email" id="email" value="<?php echo $ret->Fields('email') ?>" />
                        </td>                                                
                        <td>
                            <b>Status: </b>
                            <select name="state" id="state">
                                <option value="A" selected='selected'>Ativo</option>
                                <option value="D">Desativado</option>
                            </select>
                        </td>
                        <td>
                            <input type="submit" name="altUserLocal" id="altUserLocal" value="Alterar" />
                        </td>
                    </tr>
                <?php
                    $ret->MoveNext();
                }
                ?>
                </table>
            </div>
        </div>
    </body>
</html>