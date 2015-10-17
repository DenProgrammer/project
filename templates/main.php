<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <?php if ($task == 3) { ?>
            <link rel="stylesheet" href="css/task3.css" />
        <?php } else { ?>
            <link rel="stylesheet" href="css/style.css" />
            <script type="text/javascript" src="js/jquery.js" ></script>
            <script type="text/javascript" src="js/bootstrap.js" ></script>
            <script type="text/javascript" src="js/fileInput.js" ></script>
        <?php } ?>
    </head>
    <body>
        <div class="container">
            <div class="menu">
                <?php
                include 'menu.php';
                ?>
            </div>
            <div class="content">
                <?php
                include 'task' . $task . '.php';
                ?>
            </div>

        </div>

    </body>
</html>