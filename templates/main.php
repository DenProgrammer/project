<html>
    <head>
        <title>Test</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <script type="text/javascript" src="js/jquery.js" ></script>
    </head>
    <body>
        <div class="wraper">
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