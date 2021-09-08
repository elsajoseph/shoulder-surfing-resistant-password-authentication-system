<?php

$rows = 4;
$columns = 4;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Phase</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="registration.css">
    <script src="js/jquery.min.js"></script>
</head>
<body>

    <div class="container">

        <div class="card mx-auto" style="width: 50%;">
            <div class="card-body">
                <h5 class="card-title">Registration</h5>

                <form action="process_form.php" method="post" id="registration-form">


                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" placeholder="Enter username">
                        <small id="usernameHelp" class="form-text text-muted">Enter an unique username.</small>
                    </div>

                    <div class="form-group">
                        <label>Passcode 1</label>
                        <select name="passcode_alpha1" id="passcode_alpha1">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        <select name="passcode_num1" id="passcode_num1">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Passcode 2</label>
                        <select name="passcode_alpha2" id="passcode_alpha2">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        <select name="passcode_num2" id="passcode_num2">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                
                    <div class="form-group">

                        <label>Choose Pass Square</label>

                        <div class="grid-wrappers">

                            <div class="image-wrapper mx-auto">
                                <?php for ($i=0; $i < $rows; $i++) : ?>
                                    
                                    <div class="flex">
                                        <?php for ($j=0; $j < $columns ; $j++) :?>

                                            <?php // $dataCell = ($i * 10) + $j; ?>
                                            <div class="data-cell" data-row="<?= $i ?>" data-column="<?= $j ?>" data-selected="false">
                                                <?php //echo 'R: ' .$i . ' C: ' . $j;  ?>
                                            </div>
                                        <?php endfor; ?>
                                    </div>

                                <?php endfor; ?>
                            </div>

                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                
                </form>

            </div>
        </div>


        <div class="result text-danger text-center" id="result">

        </div>

    </div>

    <script src="js/registration.js"></script>
    
</body>
</html>