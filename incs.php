<?php
    ini_set("display_errors", 1);  
    error_reporting(E_ALL);

/*
 * Arquivo que trata das inclusões de código no sistema
 * 
 */
?>

<!-- CSS -->
    <link rel="stylesheet" type="text/css" href="mainframe/plugins/bootstrap/css/bootstrap.css" /> 
    <link rel="stylesheet" type="text/css" href="mainframe/plugins/jquery/css/custom-theme/jquery-ui-1.8.18.custom.css" />
	<link rel="stylesheet" type="text/css" href="css/core.css" />
    <link rel="stylesheet" type="text/css" href="css/menu.css" />        
    <link rel="stylesheet" type="text/css" href="css/pags.css" />
    
<!-- JS -->
    <script type="text/javascript" src="mainframe/plugins/jquery/js/jquery-1.5.js"></script>
    <script type="text/javascript" src="mainframe/plugins/jquery/js/jquery-ui-1.8.18.custom.min.js"></script>
    <script type="text/javascript" src="mainframe/plugins/jquery/jquery.form.js"></script>
    <script type="text/javascript" src="mainframe/plugins/jquery/jquery.maskedinput-1.3.js"></script>
    <script type="text/javascript" src="mainframe/js/funcs.js"></script>
    
<!-- PHP -->    
<?php

include_once "mainframe/plugins/adodb/adodb.inc.php";

foreach (glob("mainframe/classes/*.php") as $filename) {
    include_once $filename;
}

?>