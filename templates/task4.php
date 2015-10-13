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
<form action="index.php" method="post">
    <label>email</label>
    <input type="text" name="email" />
    <input type="submit" value="Send" />
    <input type="hidden" name="action" value="save.email" />
</form>

<form method="post" action="index.php?task=4">
    <div>
        <input type="text" name="email_search" value="<?php echo $email_search; ?>" />
        <input type="button" value="Search" />
    </div>
    <table class="table">

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



