<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$filepath = isset($_GET['path']) && file_exists($_GET['path']) ? $_GET['path'] : null;
?>
<?php if ($filepath) { ?>
    <div class="img-cont">
        <div class="text">Hello World</div>
        <img src="<?php echo $filepath; ?>" />
    </div>
<?php } else { ?>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label>file</label>
        <input type="file" name="file" />
        <input type="submit" value="Send" />
        <input type="hidden" name="action" value="save.file" />
    </form>
    <?php
} 
