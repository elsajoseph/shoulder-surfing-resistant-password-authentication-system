<?php
include "notorm-master/NotORM.php";

$dsn = "mysql:dbname=graphical-password-scheme;host=127.0.0.1";
$pdo = new PDO($dsn, "root", "root");
$db = new NotORM($pdo);

$username = $_POST['username'];

$users = $db->user()->where( 'username = ?', $username );

if ( count($users) == false ) {
    echo "User not found";
}
else {
    
    foreach ($users as $key => $user) {
        $currentUser = $user;
        break;
    }

    $passSquareRow = $currentUser['pass_square_row'];
    $passSquareColumn = $currentUser['pass_square_column'];

    $sessionCodeRow = $currentUser['session_code_row'];
    $sessionCodeColumn = $currentUser['session_code_column'];

    $selectedRow = $_POST['value'][$passSquareRow][$passSquareColumn]['row'];
    $selectedColumn = $_POST['value'][$passSquareRow][$passSquareColumn]['column'];

    if ( $selectedRow == $sessionCodeRow && $selectedColumn == $sessionCodeColumn) {
        echo "Authentication successful";
    }
    else {
        echo "Authentication Failure";
    }

}

