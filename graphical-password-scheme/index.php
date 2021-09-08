<?php

$rows = 4;
$columns = 4;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphical Password Scheme</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="auth.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery.min.js"></script>
		
</head>
<body>

    <h1 class="text-center">Graphical Password Scheme: Authentication Phase</h1>

    <div class="container">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" placeholder="Enter username">
            <small id="usernameHelp" class="form-text text-muted">Enter an unique username.</small>
        </div>
    </div>

    <div class="container">

    
        <div class="grid-wrapper">
        
            
            <div class="flex">
                <div class="navigator">
                    <button class="btn btn-sm btn-danger" id="btn-row-increment"> ^ </button>
                    <button class="btn btn-sm btn-danger" id="btn-column-increment"> < </button>
                </div>
                <?php for ($i=0; $i < $rows; $i++) : ?>
                    <div class="navigator-column" data-index="<?= $i ?>" data-code="<?= $i ?>"><?= $i ?></div>
                <?php endfor; ?>
            </div>

            <div class="flex flex-direction-column">
                <?php for ($j=0; $j < $columns ; $j++) :?>
                    <div class="navigator-row" data-index="<?= $j ?>" data-code="<?= $j ?>"><?= $j ?></div>
                <?php endfor; ?>
            </div>
            
            <div class="image-wrapper" id="table-wrapper">
                <?php for ($i=0; $i < $rows; $i++) : ?>
                    
                    <div class="flex table-row">
                        <?php for ($j=0; $j < $columns ; $j++) :?>

                            <?php $dataArray[$i][$j] = [
                                'row' => $i,
                                'column' => $j
                            ]; ?>
                            <div class="data-cell" data-row="<?= $i ?>" data-column="<?= $j ?>" data-default-row="<?= $i ?>" data-default-column="<?= $j ?>">
                                <?php //echo 'R: ' .$i . ' C: ' . $j;  ?>
                            </div>
                        <?php endfor; ?>
                    </div>

                <?php endfor; ?>
            </div>

            <!-- <input type="hidden" value="<?php echo htmlentities(json_encode($dataArray), ENT_QUOTES, 'UTF-8'); ?>" id="data-json"> -->

            <button class="btn btn-primary" id="login-submit" type="submit">Login</button>


        </div>
    
    </div>

    <div class="container">
        <div class="result" id="result"></div>
    </div>
    
    

    <script src="js/auth.js"></script>
    <?php // echo "<pre>"; print_r($dataArray); exit; ?>

</body>
</html>