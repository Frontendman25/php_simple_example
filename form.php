<?php
$show_form = true;

if(count($_POST) > 0){
    $name = strip_tags(trim($_POST['name']));
    $phone = strip_tags(trim($_POST['phone']));
    $email = strip_tags(trim($_POST['email']));
    $dt = date('Y-m-d H:i:s');
    
    if(strlen($name) < 2){
        $msg = 'The name must be bigger';
    }
    elseif(strlen($phone) < 7){
        $msg = 'We can not call less 7';
    }
    elseif(!is_numeric($phone)){
        $msg = 'Must be only numbers';
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $msg = 'Некорректный E-mail';
    }
    else{
        file_put_contents('apps.txt', "$dt-|-$name-|-$phone-|-$email\n", FILE_APPEND);
        $msg = 'Your request has been sent';
        $show_form = false;
    }
}
else{
    $name = '';
    $phone = '';
    $msg = 'Hello! Fill in the fields!';
}
?>
<?php if($show_form): ?>
<form method="post">
    Name<br>
    <input type="text" name="name" value="<?= $name?>" required><br>
    Phone<br>
    <input type="tel" name="phone" value="<?= $phone?>" required><br>
    E-mail<br>
    <input type="email" name="email" required>
    <input type="submit" value="Send" required>
</form>
<?php endif ?>
<?php echo $msg; ?>