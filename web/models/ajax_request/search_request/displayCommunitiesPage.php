<?php

      require "../pdo_connection.php";

      function communityPage()
      {

        $pdo = pdo();
        $communityName = htmlspecialchars($_GET['communityName']);

        $select = $pdo->prepare("SELECT*FROM accepted_request WHERE accept_organisation=?");
        $select->execute(array($communityName));

        while($display = $select->fetch())
        {

          ?>



          <?php

        }

      }

 ?>
