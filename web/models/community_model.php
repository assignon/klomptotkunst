<?php

  require "../web/core/model.php";
  class community extends model
  {

        public function __construct()
        {

           parent::__construct();

        }


        public function displayCommunities()
        {

          if(isset($_GET['congregation']))
          {

              $congregation = htmlspecialchars($_GET['congregation']);

          }

            $select = $this->prepare("SELECT*FROM accepted_request WHERE accept_district=?", array($congregation));

            while($display = $select->fetch())
            {
              ?>

              <div class="communitiesPlaces">

                  <img src="" alt="" class="defaultBackground">
                  <div class="text">

                     <div class="backgroundColor">

                     </div>

                     <h1 class="placeName"><?php echo $display['accept_organisation'];?></h1>

                     <p>Op aanpassen te klikken, kunt u de text , de titel en de achterground veranderen en nog meer<p>

                  </div>

                  <div class="actions">

                     <a href=" https://www.google.nl/maps/place/" target="_blank"><img src="../public/images/uploaded_image/place_background/mapIcone.png" alt="" class="placesOnMap"></a>
                     <a href="welcom.php?action=communityPage&name=<?php echo $display['accept_organisation']; ?>"><img src="../public/images/uploaded_image/place_background/visitIcon.png" alt="" class="visitPlace"></a>


                  </div>

              </div>



                   <script type="text/javascript">

                      window.addEventListener("load", function(){

                          var communities = document.getElementById("communities");
                          var communitiesPlaces = document.querySelectorAll(".communitiesPlaces");

                          for (var i = 0; i < communitiesPlaces.length; i++)
                           {

                              var communitiesPlacesArr = communitiesPlaces[i];

                              communities.appendChild(communitiesPlacesArr);

                          }


                          var filterButton = document.querySelectorAll(".filterButton");
                          var xhr;


                          function all(objectIndex,index2, index3, filename)
                          {

                               if (window.XMLHttpRequest) {
                                  // code for IE7+, Firefox, Chrome, Opera, Safari
                                   xhr = new XMLHttpRequest();
                                 } else {
                                  // code for IE6, IE5
                                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                                }

                                filterButton[objectIndex].addEventListener("click", function(){

                                 filterButton[objectIndex].style.backgroundColor = "#00BFF3";
                                 filterButton[index2].style.backgroundColor = "white";
                                 filterButton[index3].style.backgroundColor = "white";

                                  xhr.onreadystatechange = function() {
                                   if (this.readyState == 4 && this.status == 200) {

                                       communities.innerHTML = xhr.responseText;

                                    }

                                  };

                                  xhr.open("GET","../web/models/ajax_request/communityRequest/"+filename+".php?congregation="+"<?php echo $congregation;?>",true);
                                  xhr.send();

                                })


                          }

                          all(0,1,2,"allCommunity");
                          all(1,0,2,"culturCommunity");
                          all(2,0,1,"artCommunity");

                      })

                   </script>

               <?php

            }

        }

    }


 ?>
