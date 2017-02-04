<?php

    require "../web/models/ajax_request/pdo_connection.php";
    $pdo = pdo();
    $select = $pdo->query("SELECT district_name FROM district");

    while($display_locations = $select->fetch())
    {

       ?>

          <li class="locationsList">

            <a href="welcom.php?action=community&congregation=<?php echo $display_locations['district_name'];?>" class="locationsDb">

              <?php echo $display_locations['district_name'];?>

            </a>

          </li>

          <script type="text/javascript">

             window.addEventListener("load", function(){

                var locations = document.getElementById("locations");
                var locationsDb = document.querySelectorAll(".locationsList");

                for (var i = 0; i < locationsDb.length; i++) {

                  locationsDbArr = locationsDb[i];
                  locations.appendChild(locationsDbArr);

                }

             })

          </script>
       <?php

    }


 ?>



  <div id="searchOnSite">

     <form  action="" method="get" id="siteSearch">

        <input type="search" name="search" placeholder="Zoek hier plaatsen, verenigingen etc..." id="searching">
        <span id="closeSearchField" class="icon-cancel-circle">

        </span>

     </form>


  </div>


  <div id="searchDistric_community">

      <div id="searchResultContainer">

          <div id="legend">

            <p>Gemeente:</p><img src="../public/images/menuIcons/gemeenteLegenda.png" alt="" class="legends">
            <p>Verenigingen:</p><img src="../public/images/menuIcons/verenigingLegenda.png" alt="" class="legends">

          </div>

          <div id="searchResult">

          </div>

      </div>

      <div id="searchLegenda">

          <p id="comment">Ik wacht op u zoekopdracht...</p>


      </div>

  </div>


  <div class="parts">

    <a href="welcom.php?action=home" id="logoLink"><h2>Van <strong>klomp</strong> tot <strong>kunst</strong></h2></a>

    <div id="siteMenu">

        <div class="menusContainer">

            <a href="welcom.php?action=home">

              <p class="menuText">Home</p>

            </a>

        </div>

        <div class="menusContainer">

            <div id="location">

                <p class="menuText">LOCATIONS</p>
                <ul id="locations">



                </ul>

            </div>

        </div>

        <div class="menusContainer">

            <a href="#">

              <p class="menuText">Agenda</p>

            </a>

        </div>

        <div class="menusContainer">

            <a href="welcom.php?action=contact">

              <p class="menuText">Contact</p>

            </a>

        </div>

    </div>

      <div class="menusContainer" id="lang">

          <a href="#"><img src="../public/images/menuIcons/engflag.png" alt="" class="languages"></a>
          <a href="#"><img src="../public/images/menuIcons/nlflag.png" alt="" class="languages"></a>
          <a href="#"><img src="../public/images/menuIcons/frflag.png" alt="" class="languages"></a>


      </div>
      <span class="icon-search" id="searchIcon"></span>

  </div>

  <script type="text/javascript">

     window.addEventListener("load", function(){

       var searchDistrit_community = document.getElementById("searchDistric_community");
       var searching = document.getElementById("searching");
       var closeSearchField = document.getElementById("closeSearchField");



           searching.addEventListener("click", function(){


              $(function(){

                 $(searchDistrit_community).animate({

                    bottom: 0,

                 },{

                     duration: 500,
                     easing: "easeInOutBack",

                 })

              })

       })


       closeSearchField.addEventListener("click", function(){
         var searchResult = document.getElementById("searchResult");
         var searchLegenda = document.getElementById("searchLegenda");
         searchResult.innerHTML = "";
         searching.value = "";
         searchLegenda.innerHTML = "";

         $(searchDistrit_community).animate({

            bottom: 150,

         },{

             duration: 500,
             easing: "easeInOutBack",

         })

       })

     })

  </script>
