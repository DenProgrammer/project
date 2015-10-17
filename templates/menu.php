<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$items = array(
    1 => 'Картинки',
    2 => 'Проценты',
    3 => 'Верстка',
    4 => 'Емайлы',
);
?>
<div class="btn-toolbar">
    <div class="btn-group">
        <?php
        foreach ($items as $key => $val) {
            $class = $key == $task ? 'btn btn-info active' : 'btn btn-info';
            ?>
            <a class="<?php echo $class; ?>" href="index.php?task=<?php echo $key; ?>">
                <?php echo $val; ?>
            </a>
        <?php } ?>
    </div>
</div>

