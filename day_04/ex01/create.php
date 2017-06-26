<?php
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];
    if ($login != "" && $passwd != "" && $_POST['submit'] == "OK"){
        if (!file_exists('private'))
            mkdir('private');
        if (!file_exists('private/passwd'))
            file_put_contents('private/passwd', 0);
        $file = unserialize( file_get_contents('private/passwd'));
        foreach ($file as $kay => $value){
            if ($kay == $login)
                exit("ERROR\n");
        }
        $file[$login] = hash('sha512', $passwd);
        if (file_put_contents('private/passwd', serialize($file)))
            echo "OK\n";
        else
            echo "ERROR\n";
    }
    else{
        exit("ERROR\n");
    }
?>