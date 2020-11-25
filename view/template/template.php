<!DOCTYPE html>
<html lang="en">
<head>
    <title>FC</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link href="<?=URLSITE;?>css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <div id="header" class="fundoPrimario">
            <div class="centralizar">
                <?php include("header.php");?>
            </div>
        </div>

        <br clear="all">
        <div id="page-wrapper">
            <div class="centralizar">
                <?php echo $actionReturn; ?>
            </div>
        </div>
    </div>
    
</body>
</html>