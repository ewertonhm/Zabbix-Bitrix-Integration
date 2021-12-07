<?php
// inicia a sessão e verifica se está logado, se não estiver redireciona para login
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}

require_once "config.php";

putenv("PGPASSWORD=sngesp.,");
$dumpcmd = array("pg_dump", "-h", escapeshellarg("localhost"), "-U", escapeshellarg("postgres"), "-F", "c", "-b", "-v", "-f", escapeshellarg("backup.sql"), escapeshellarg("taskcontroller"));
exec( join(' ', $dumpcmd), $cmdout, $cmdresult );
putenv("PGPASSWORD");
if ($cmdresult != 0)
{
    # Handle error here...
    echo "error";
} else {
    echo "backup in progress... ";
    echo "<a href='backup.sql'>Download it here</a>";
}