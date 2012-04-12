<?php
include_once "mainframe/plugins/adodb/adodb.inc.php";

foreach (glob("mainframe/classes/*.php") as $filename) {
    include_once $filename;
}

@session_start();

$u   = new User();
?>
<ul class="menu-topo">
    <li class="fonteMenu">
        <a href="index.php">HOME</a>
    </li>
    <?php 
    if ($u->_autentica($_SESSION['iduser'])) {
        $usu = $u->getUser($_SESSION['iduser']);
    ?>
    <li class="fonteMenu">
        Sistema
        <ul>
            <li><a href="usersSist.php">Usuários</a></li>                            
            <li><a href="moodlesSist.php">Moodles</a></li>                            
        </ul>
    </li>    
    <li class="fonteMenu">
        Moodle
        <ul>
            <li><a href="cursoMood">Cursos</a></li>                            
            <li><a href="usersMood">Usuários</a></li>
            <li><a href="filesMood">Arquivos</a></li>
        </ul>
    </li>        
    <li class="fonteMenu">
        <a href="mainframe/actions.php?action=Deslogar&desl=true">Logoff - <?php echo $usu->Fields("name"); ?></a>
    </li>    
    <?php } ?>
</ul>