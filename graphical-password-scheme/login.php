<?php

$rows = 4;
$columns = 4;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Matrix Generation</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="auth.css">
    <script src="js/jquery.min.js"></script>
    <style>
        .data-cell, .navigator-row, .navigator-column, .navigator {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            gap: 3px;
            align-content: center;
            justify-content: center;
            padding: 15px;
            border: 1px solid black;
            width: 75px;
            height: 75px;
        }
    </style>
</head>
<body>

    <div class="container">
        

        <div class="card mx-auto" style="width: 50%;">
            <div class="card-body">
                <h5 class="card-title">Random Matrix</h5>

                <form action="authentication.php" method="post" id="authentication-form">

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" placeholder="Enter username">
                        <small id="usernameHelp" class="form-text text-muted">Enter an unique username.</small>
                    </div>
                        
                    <div class="form-group">
                        <label>Get Session Code</label>

                        <div class="grid-wrappers">

                            <div class="matrix-wrapper mx-auto">
                                <?php for ($i=0; $i < $rows; $i++) : ?>
                                    
                                    <div class="flex">
                                        <?php for ($j=0; $j < $columns ; $j++) :?>

                                            <?php $randomValue = rand(0, ($rows-1)); ?>

                                            <?php $randArray[$i][$j] = $randomValue; ?>

                                            <div class="data-cell" data-row="<?= $i ?>" data-column="<?= $j ?>" data-selected="false" data-random="<?= $randomValue ?>">

                                                <?php echo $randomValue;  ?>

                                            </div>

                                        <?php endfor; ?>
                                    </div>

                                <?php endfor; ?>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <input type="hidden" name="rand_json" value="<?php echo json_encode($randArray); ?>">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" id="submit-btn" type="submit">Go to Login page</button>
                    </div>


                </form>

            </div>

            
        </div>
        
        <div class="result" id="result"></div>

    </div>

    <!-- <script src="js/registration.js"></script> -->

</body>
</html>