<?php

if ( empty($_POST['username']) || empty($_POST['rand_json']) ) {
    echo "Something went wrong! Please reload and try again."; exit;
}

include "notorm-master/NotORM.php";

$dsn = "mysql:dbname=graphical-password-scheme;host=127.0.0.1";
$pdo = new PDO($dsn, "root", "root");
$db = new NotORM($pdo);

// echo "<pre>"; print_r($_POST); exit;

$relation = [
    'A' => 0,
    'B' => 1,
    'C' => 2,
    'D' => 3
];

$username = $_POST['username'];
$randJson = ( empty($_POST['rand_json']) ) ? [] : json_decode($_POST['rand_json']);

if ( empty($randJson) ) {
    echo "Something went wrong! Please reload and try again."; exit;
}

$users = $db->user()->where( 'username = ?', $username );

if ( count($users) == false ) {
    echo "User not found";
}
else {
    
    foreach ($users as $key => $user) {
        $currentUser = $user;
        break;
    }
    $sessionCodeRow = $randJson[$relation[$currentUser['pass_alpha1']]][$currentUser['pass_num1']];
    $sessionCodeColumn = $randJson[$relation[$currentUser['pass_alpha2']]][$currentUser['pass_num2']];

    // Save the session code in DB
    // $user = $db->user();
    $sessionCodeData = array(
        'session_code_row' => $sessionCodeRow,
        'session_code_column' => $sessionCodeColumn
    );
    $result = $users->update($sessionCodeData);
    header('Location: index.php');
    echo "<pre>"; print_r($sessionCodeRow);  echo " : "; print_r($sessionCodeColumn); exit;

}

// echo "<pre>"; print_r($user); exit;

