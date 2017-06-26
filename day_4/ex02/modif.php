<?php
$login = $_POST['login'];
$oldpw = $_POST['oldpw'];
$newpw = $_POST['newpw'];
if ($login != "" && $oldpw != "" && $newpw != "" && $oldpw != $newpw && $_POST['submit'] == "OK"){
    $file = unserialize( file_get_contents('private/passwd'));
    $oldpw = hash('sha512', $oldpw);
    foreach ($file as $kay => $value){
        if ($kay == $login && $value == $oldpw){
            $file[$kay] = hash('sha512', $newpw);
            if (file_put_contents('private/passwd', serialize($file)))
                exit("OK\n");
            else
                exit("ERROR\n");
        }
    }
    exit("ERROR\n");
}
else
    exit("ERROR\n");
?>