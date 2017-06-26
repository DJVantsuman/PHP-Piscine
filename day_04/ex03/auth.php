<?php
function auth($login, $passwd){
    $file = unserialize( file_get_contents('private/passwd'));
    $passwd = hash('sha512', $passwd);
    foreach ($file as $kay => $value){
        if ($kay == $login && $value == $passwd){
            return (TRUE);
        }
    }
    return (FALSE);
}
?>