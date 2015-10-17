<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$filepath = isset($_GET['path']) && file_exists($_GET['path']) ? $_GET['path'] : null;
?>
<?php
if ($filepath) {
    $fileClass = new Files();
    $showText  = $fileClass->checkCookies($filepath);
    ?>
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="img-cont">
                <?php if ($showText) { ?>
                    <div class="text">Hello World</div>
                <?php } ?>
                <img src="<?php echo $filepath; ?>" />
            </div>
        </div>
    </div>
<?php } else { ?>
    <script>
        $(function () {
            $('input[type=file]').bootstrapFileInput();
        });
    </script>

    <div class="row">
        <div class="col-md-12 text-left header">
            Загрузить изображение
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <form class="form-inline" action="index.php" method="post" enctype="multipart/form-data">
                <div class="subform">
                    <div class="row">
                        <input class="form-control input-large" type="text" id="file_text" />
                        <input class="btn" type="file" data-filename-placement="target" data-filename-placement-target="file_text" name="file" title="Выбрать" />
                    </div>
                    <div class="row">
                        <input class="btn btn-danger" type="submit" value="Отмена" />
                        <input class="btn btn-success" type="submit" value="Загрузить" />
                    </div>
                </div>
                <input type="hidden" name="action" value="save.file" />
            </form>
        </div>
        <div class="col-md-4 text-left">
            <div class="warning-text">
                <div class="warning">!</div>Размер файла не должен превышать 2мб.
            </div>
            <div>
                <div class="warning">!</div>Расширение изображений jpg, png, gif.
            </div>
        </div>
    </div>
    <?php
} 
