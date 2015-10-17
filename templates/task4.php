<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$emailClass = new Email();
$emails = $emailClass->getEmails();

$email_search = isset($_POST['email_search']) ? $_POST['email_search'] : null;
?>
<div class="row">
    <div class="col-md-12 text-left header">
        Введите email пользователя
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="subform">
            <form class="form-inline" action="index.php" method="post">
                <input class="form-control" type="email" name="email" placeholder="Электронный адрес" />
                <input class="btn btn-primary" type="submit" value="Добавить" />
                <input type="hidden" name="action" value="save.email" />
            </form>
        </div>
    </div>
    <div class="col-md-6 text-left">
        <div class="warning-text">
            <div class="warning">!</div>Только латинские буквы без пробелов и спец. символов.
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-left header">
        Решение данной задачи
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="subform">
            <form class="form-inline" method="post" action="index.php?task=4">
                <div style="text-align: left;">
                    <input type="text" 
                           class="form-control input-large" 
                           name="email_search" 
                           placeholder="Ключевое слово..."
                           value="<?php echo $email_search; ?>" />
                    <input type="submit" class="btn btn-success" value="Найти" />
                </div>
                <hr />
                <div class="text-left header">Найденые результаты</div>
                <table class="table table-striped">
                    <?php
                    $i = 1;
                    for ($i = 0; $i < count($emails); $i++) {
                        ?>
                        <tr>
                            <td><?php echo $i + 1; ?></td>
                            <td><?php echo $emails[$i]; ?></td>
                        </tr>
                    <?php }
                    ?>
                </table>  
            </form>
        </div>
    </div>
</div>




