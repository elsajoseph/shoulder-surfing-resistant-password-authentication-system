<?php

include "notorm-master/NotORM.php";

$dsn = "mysql:dbname=graphical-password-scheme;host=127.0.0.1";
$pdo = new PDO($dsn, "root", "root");
$db = new NotORM($pdo);

// echo "<pre>"; print_r($_POST); exit;

// Insert into database.
$users = $db->user();
$data = array(
    'username' => $_POST['username'],
    'pass_alpha1' => $_POST['passcode_alpha1'],
    'pass_num1' => $_POST['passcode_num1'],
    'pass_alpha2' => $_POST['passcode_alpha2'],
    'pass_num2' => $_POST['passcode_num2'],
    'pass_square_row' => $_POST['selected_row'],
    'pass_square_column' => $_POST['selected_column']
);
$result = $users->insert($data);


if ( $result === false) {
    echo "Something Went Wrong. Please try again!";
}
else {
    echo "Registration Successful!";
}


// foreach ($users as $user) {
//     echo $user['username']; echo "<br>";
//     echo $user['user_id'];
// }