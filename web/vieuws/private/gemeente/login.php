<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
		<meta name="keywords" content=""/>
		<meta name="description" content=""/>
		<meta name="author" content="Yanick 007"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/login.css"/>
    <!--<link rel="stylesheet" href="../../public/css/global_style/footer.css"/>-->
    <!--<link rel="stylesheet" href="../../public/css/global_style/leader_info.css"/>-->
    <script src="../public/javascript/login.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <title>Login</title>
  </head>
    <body id="body">

       <header>

          <div id="admin">

            <p class='error'>Welcom op de login pagina</p>

             <div id="logInfo">


               <div id="avatar">

               </div>
               <form class="" action="" method="post">

                  <input type="text" name="admin_name" placeholder="Administrator Naam" class="logInput">
                  <input type="password" name="admin_pass" placeholder="Administrator Wachtwoord" class="logInput">
                  <input type="submit" name="logIn" value="Loog In">

               </form>

               <div id="parameter">

                  <div class="param">

                     <button class="params"></button>
                     <p>Achter Ground Veranderen</p>

                  </div>

                  <div class="param">

                     <button class="params"></button>
                     <p>Avatar Veranderen</p>

                  </div>

                  <div class="param">

                     <a href=""><button class="params"></button></a>
                     <p>Wachtwoord of Gebruikersnaam Vergeten</p>

                  </div>

               </div>

             </div>

              <div id="paramsForms">

                  <form action="" method="post" enctype="multipart/form-data" id="background">

                      <div class="close">

                      </div>
                      <input type="file" name="background">

                      <input type="submit" name="changeBg" value="Veranderen">

                  </form>

                  <form action="" method="post" enctype="multipart/form-data" id="avatarImg">

                    <div class="close">

                    </div>
                      <input type="file" name="avatar">

                      <input type="submit" name="changeAvatar" value="Veranderen">

                  </form>


              </div>

          </div>

       </header>

       <footer>

       </footer>

   </body>
</html>
