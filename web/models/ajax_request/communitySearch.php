<?php

//require "../../web/vieuws/public/gemeente/gemeente_home.php";
require "pdo_connection.php";

function search_place()
 {

   $pdo = pdo();

  /*   if(isset($_GET['place']) AND isset($_GET['district']))
     {*/

          $places = $_GET['place'];
          $district = $_GET['district'];

          //$select_community = $pdo->prepare("SELECT*FROM community WHERE district=? AND organisation_name LIKE '$places%'");
          $select_community = $pdo->prepare("SELECT*FROM accepted_request WHERE accept_district=? AND accept_organisation LIKE '$places%'");
          //$community = $selet_community->fetch();
          $select_community->execute(array($district));

          $count_community = $select_community->rowCount();

          if($count_community > 0)
          {



            while($display_community = $select_community->fetch())
           {

               //echo "vereniging".' '.$display_community['organisation_name'].' '."is gevonden";
               ?>

                  <div class="communityFounded">


                     <a href="#"><h2><?php echo $display_community['accept_organisation'];?></h2></a>

                     <div class="communityOptions">

                        <a href="#"><span class="icon-earth"></span></a>
                        <a href="https://www.google.nl/maps/place/<?php echo $display_community['accept_organisation'];?>" target="_blank"><span class="icon-map"></span></a>

                     </div>

                  </div>

                  <style type="text/css">

                     .communityFounded
                     {

                         width: 200px;
                         height: 200px;
                         border: 1px solid #00BFF3;
                         border-radius: 3px;
                         background-color: #00BFF3;
                         background-image: url(../public/images/menuIcons/searchBack.png);
                         background-repeat: no-repeat;
                         background-position: center;
                         display: flex;
                         flex-direction: column;
                         justify-content: center;
                         align-items: center;
                         margin-left: 20px;
                         margin-right: 20px;
                         margin-bottom: 20px;


                     }



                     .communityFounded a
                     {

                        width: auto;
                        height: auto;
                        text-decoration: none;
                        text-align: center;

                     }


                     .communityFounded h2
                     {

                         color: black;
                         text-align: center;

                     }

                     .communityFounded h2:hover
                     {

                        color: #F91535;

                     }


                     .communityOptions
                     {

                       display: flex;
                       flex-direction: row;
                       justify-content: center;
                       align-items: center;
                       width: auto;
                       height: auto;

                     }


                     .communityOptions a
                     {

                         width: auto;
                         height: auto;
                         margin-left: 20px;
                         margin-right: 20px;
                         position: relative;
                         top: 40px;

                     }

                     .communityOptions a:hover
                     {


                     }


                     .communityOptions a img
                     {



                     }

                  </style>

               <?php

           }

          }else{

            echo "Nieks Gevonden";

          }

    /* }*/

 }

 search_place();


 ?>
