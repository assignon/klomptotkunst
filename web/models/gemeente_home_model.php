<?php

   require "../web/core/model.php";
   class gemeente_home extends model
   {

     public function __construct()
     {

        parent::__construct();

     }


     public function online_banner()
     {

       $select = $this->PDO()->query("SELECT*FROM online_banner");

       while($display_banner_info = $select->fetch())
       {

             ?>

                <script type="text/javascript">

                    window.addEventListener("load", function(){

                        var banner = document.getElementById("banner");
                        var bannerInfo = document.getElementById("info");
                        var titel = document.getElementById("titel");
                        var more = document.getElementById("more");

                        banner.style.backgroundImage = "url(<?php echo $display_banner_info['banner_image'];?>)";
                        bannerInfo.innerHTML = "<?php echo $display_banner_info['banner_info'];?>";
                        titel.innerHTML = "<?php echo $display_banner_info['banner_thema'];?>";
                        more.innerHTML = "<?php echo $display_banner_info['button_text'];?>";

                    })

                </script>

             <?php

       }

     }


     public function online_places()
     {

         $select_place = $this->PDO()->query("SELECT*FROM online_district ORDER BY date_uploaded DESC LIMIT 9");


         while($displayOnline_places = $select_place->fetch())
         {

            ?>

            <div class="onlinePlaces">

                <form class="placeSearchForm" action="" method="get">

                    <img src="../public/images/uploaded_image/place_background/placeSearchCloseIcon.png" alt="" class="placeOnlineClose">

                    <div class="searchInputs">

                      <input type="search" name="seachPlaceName" value="<?php echo $displayOnline_places['district_name'];?>" class="districtField" hidden="hidden">
                      <input type="search" name="vereniging" placeholder="Zoek de bijhorende verenigingen" class="searchField">

                    </div>

                </form>

                <img src="<?php echo $displayOnline_places['district_background'];?>" alt="" class="defaultBackground">
                <div class="text">

                   <div class="backgroundColor">

                   </div>

                   <h1 class="placeName"><?php echo $displayOnline_places['district_name'];?></h1>

                   <p><?php echo $displayOnline_places['district_info'];?><p>

                </div>

                <div class="actions">

                   <img src="../public/images/uploaded_image/place_background/placeSearchIcone.png" alt="" class="searchOnlinePlace">
                   <a href=" https://www.google.nl/maps/place/<?php echo $displayOnline_places['district_name'];?>" target="_blank"><img src="../public/images/uploaded_image/place_background/mapIcone.png" alt="" class="placesOnMap"></a>
                   <a href="welcom.php?action=community&congregation=<?php echo $displayOnline_places['district_name'];?>"><img src="../public/images/uploaded_image/place_background/visitIcon.png" alt="" class="visitPlace"></a>


                </div>

            </div>

                <script type="text/javascript">

                   window.addEventListener("load", function(){

                      var placesContainer = document.getElementById("placeContainer");
                      var onlinePlaces = document.querySelectorAll(".onlinePlaces");

                      for (var i = 0; i < onlinePlaces.length; i++) {

                        var onlinePlacesArr = onlinePlaces[i];

                        placesContainer.appendChild(onlinePlacesArr);

                      }

                   })


                   $(function(){


                      var searchOnlinePlace = document.querySelectorAll(".searchOnlinePlace");

                      for (var i = 0; i < searchOnlinePlace.length; i++) {

                        var searchOnlinePlaceArr = searchOnlinePlace[i];

                        searchOnlinePlaceArr.addEventListener("click", function(e){

                          //var placesSearchError = document.getElementById("placesSearchError");


                          var target = e.target.parentNode.parentNode.childNodes[1];

                          //alert(e.target.parentNode.parentNode.childNodes[1].className);

                           $(target).animate({

                              bottom: -50,

                           },{

                              duration: 500,
                              easing: 'easeInOutBack',

                           })

                        })

                      }



                      var placeOnlineClose = document.querySelectorAll(".placeOnlineClose");

                      for (var i = 0; i < placeOnlineClose.length; i++) {

                        var placeOnlineCloseArr = placeOnlineClose[i];



                        placeOnlineCloseArr.addEventListener("click", function(e){

                          var target = e.target.parentNode;

                          //alert(e.target.parentNode.parentNode.childNodes[1].className);

                           $(target).animate({

                              bottom: 50,

                           },{

                              duration: 500,
                              easing: 'easeInOutBack',

                           })

                        })

                      }


                   })

                </script>

            <?php

         }

     }


    public function online_cultuurArt()
    {

        $select = $this->prepare("SELECT*FROM online_cultuurart WHERE choise=?", array('Cultuur'));

        while($display_cultuur = $select->fetch())
        {

            ?>

                <script type="text/javascript">

                    var frontCultArt = document.querySelector(".frontCultArt").style.backgroundImage = "url(<?php echo $display_cultuur['background_image'];?>)";
                    var cultuurHeader = document.getElementById("cultuurHeader").innerHTML = "<?php echo $display_cultuur['header'];?>";
                    var cultuurText = document.getElementById("cultuurText").innerHTML = "<?php echo $display_cultuur['information'];?>";


                </script>

            <?php

        }


        $art = $this->prepare("SELECT*FROM online_cultuurart WHERE choise=?", array('Kunst'));

        while($display_art = $art->fetch())
        {

            ?>

                <script type="text/javascript">


                    var artHeader = document.getElementById("artHeader").innerHTML = "<?php echo $display_art['header'];?>";
                    var artText = document.getElementById("artText").innerHTML = "<?php echo $display_art['information'];?>";


                </script>

            <?php

        }

    }


    public function display_online_organisation()
    {

       $select = $this->PDO()->query("SELECT*FROM online_organisation");
       $display = $select->fetch();
       return $display;

    }


    public function subscription_request($submit)
    {

        if(isset($_POST[$submit]))
        {



        }

    }


    public function places()
    {


      $select = $this->PDO()->query("SELECT district_name FROM district");

      while($display_locations = $select->fetch())
      {

        ?>
            <script type="text/javascript">

               window.addEventListener("load", function(){

                  //var requestField = document.getElementById("locations");
                  var requestField = document.getElementById("places");

                  var options = document.createElement("option");
                  options.value = "<?php echo $display_locations['district_name'];?>";
                  options.innerHTML = "<?php echo ucfirst($display_locations['district_name']);?>";


                    requestField .appendChild(options);

               })

            </script>

    <?php
    }


   }

 }
