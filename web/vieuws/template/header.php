
<div id="userParameter">

          <form  action="" method="get" id="userDataForm">

            <span class="icon-cancel-circle" id="close"></span>
            <div id="imgFile">

                <div id="avatarImgData">

                  <img src="" alt="" id="useravatar">

                </div>

                <div id="avatarTextData">

                  <p class="datas">Gebruikersnaam: </p>
                  <p class="datas">Email: </p>

                </div>

            </div>

            <div id="userInputs">

                <p id="errorNotification">Hier kun u u gebruikersnaam, email en wachtwoord wijzigen.</p>
                <div id="updateInput">

                    <input type="text" name="adminusername" placeholder="Nieuw Gebruikersnaam" class="userDataVal">
                    <input type="email" name="adminemail" placeholder="Nieuw Email" class="userDataVal">
                    <input type="password" name="adminpassword" placeholder="Nieuw Wachtwoord" class="userDataVal">

                </div>
                <input type="password" name="passToUpdate" placeholder="Voer de Wachtwoord in" id="yourpass" class="userDataVal">
                <input type="submit" name="change" value="Wijzigen" id="updateUserData">

            </div>

          </form>


      <div id="parameterIcon">

        <div class="icon_text" id="parameterCaller">

            <span class="icon-cogs"></span>
            <p>Instellingen</p>

        </div>

        <a href="welcom.php?action=logOut" class="icon_text">

          <span class="icon-switch"></span>
          <p>Uitlogen</p>

        </a>

      </div>

</div>

<div id="menu">

   <div id="menus">

        <a href="welcom.php?action=admin&id=<?php echo $_SESSION['id'];?>">

        <img src="../public/images/uploaded_image/menuIcons/dashboardIcon.png" alt="" class="menuIcons">

        <p class="menuName">DashBoard</p>

    </a>

    <a href="welcom.php?action=sitehome&id=<?php echo $_SESSION['id'];?>">

        <img src="../public/images/uploaded_image/menuIcons/webHome.png" alt="" class="menuIcons">

        <p class="menuName">Site Home</p>

    </a>

    <a href="welcom.php?action=agenda&id=<?php echo $_SESSION['id'];?>">

        <img src="../public/images/uploaded_image/menuIcons/event.png" alt="" class="menuIcons" id="agenda">

        <p class="menuName">Agenda</p>

    </a>

    <!--<a href="welcom.php?action=admin_contact&id=<?php //echo $_SESSION['id'];?>">

        <img src="" alt="" class="menuIcons">

        <p class="menuName">Contact</p>

    </a>-->

    <div id="logMail">

       <a href="welcom.php?action=mail&id=<?php echo $_SESSION['id'];?>" id="mailIcon"><span class="icon-mail4" id="mails"></span></a>

       <span class="icon-user" id="adminAvatar"></span>

   </div>

   </div>

</div>

<script type="text/javascript">

   window.addEventListener("load", function(){

       var userDataForm = document.getElementById("userDataForm");
       var updateUserData = document.getElementById("updateUserData");// submit button
       var parameterIcon = document.getElementById("parameterIcon");
       var parameterCaller = document.getElementById("parameterCaller");// l icon parametre
       var adminAvatar = document.getElementById("adminAvatar");
       var close = document.getElementById("close");

       adminAvatar.addEventListener("click", function(){

           $(function(){

               $(parameterIcon).animate({

                  bottom: -357,

               },{

                   duration: 600,
                   easing: "easeInOutBack",

               })

           })

       })


       parameterCaller.addEventListener("click", function(){

           $(function(){

               $(userDataForm).animate({

                  top: 500,

               },{

                   duration: 600,
                   easing: "easeInOutBack",

               })

           })

       })


       function closeTab()
       {

         close.addEventListener("click", function(){

             $(function(){

                 $(parameterIcon).animate({

                    bottom: 128,

                 },{

                     duration: 600,
                     easing: "easeInOutBack",

                 })


                 $(userDataForm).animate({

                    top: 0,

                 },{

                     duration: 600,
                     easing: "easeInOutBack",

                 })

             })

         })

       }

       closeTab();


       var xhr;
       var errorNotification = document.getElementById("errorNotification");
       var userDataVal = document.querySelectorAll(".userDataVal");


         if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
             xhr = new XMLHttpRequest();
           } else {
            // code for IE6, IE5
              xhr = new ActiveXObject("Microsoft.XMLHTTP");
          }

          updateUserData.addEventListener("click", function(e){

               e.preventDefault();

              var newUserName = userDataVal[0].value;
              var newEmail = userDataVal[1].value;
              var newPass = userDataVal[2].value;
              var pass = userDataVal[3].value;

               xhr.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {

                          errorNotification.innerHTML = xhr.responseText;
                          closeTab();

                       }

                     };


                       xhr.open("GET","../web/models/ajax_request/userDataUpdate.php?username="+newUserName+"&email="+newEmail+"&newPass="+newPass+"&pass="+pass,true);
                       xhr.send();


          })


   })

</script>

<!--<div id="parames">

    <div class="options"></div>

    <div class="options"></div>

</div>-->
