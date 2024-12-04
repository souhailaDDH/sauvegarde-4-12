<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "Form.php";
$form = new Form(array("username"=>"Lorick"));

var_dump($form);
?>
<form action="" methode="post"> 
<?php
echo $form->input('username', 'text');
echo $form->input('password', 'password');
echo $form->submit("send");
?>
</form>