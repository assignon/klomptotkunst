<?php

    require "pdo_connection.php";

    function updateUserData()
    {

        $pdo = pdo();

        $username = htmlspecialchars($_GET['username']);
        $email = htmlspecialchars($_GET['email']);
        $newPass = htmlspecialchars($_GET['newPass']);
        $pass = sha1(htmlspecialchars($_GET['pass']));

        $select_superUser = $pdo->prepare("SELECT*FROM super_user WHERE admin_pass=?");
        $select_superUser->execute(array($pass));
        $select_superUser_row = $select_superUser->rowCount();
        $select_superUser_fetch = $select_superUser->fetch();


        if(!empty($username) AND !empty($pass))
        {

            if($select_superUser_row > 0 AND $pass == $select_superUser_fetch['admin_pass'])
            {

               $select_superUser_update = $pdo->prepare("UPDATE super_user SET admin_name=?");
               $select_superUser_update->execute(array($username));
               echo "Geupdat";

            }else{

                echo "Wachtwoord onjuist";

            }


        }else if(!empty($email) AND !empty($pass))
        {

            if($select_superUser_row > 0 AND $pass == $select_superUser_fetch['admin_pass'])
            {

                 $select_superUser_update = $pdo->prepare("UPDATE super_user SET gemeente_email=?");
                 $select_superUser_update->execute(array($email));
                 echo "Geupdat";

            }else{

                echo "Wachtwoord onjuist";

            }


        }else if(!empty($newPass) AND !empty($pass))
        {

            if($select_superUser_row > 0 AND $pass == $select_superUser_fetch['admin_pass'])
            {

                $select_superUser_update = $pdo->prepare("UPDATE super_user SET admin_pass=?");
                $select_superUser_update->execute(array($newPass));
                echo "Geupdat";

            }else{

                echo "Wachtwoord onjuist";

            }


        }else{

            echo "Voer een Nieuw gebruikersnaam of een Nieuw email of een Nieuw wachtwoord of alle drie in";

        }

    }

    updateUserData();

 ?>
