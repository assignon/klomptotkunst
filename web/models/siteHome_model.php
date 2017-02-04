<?php

require "../web/core/model.php";

class siteHome_model extends model
{

   public function __construct()
   {

      parent::__construct();

   }

   public function getUser_data($admin_id)
   {

     $select = $this->prepare("SELECT*FROM super_user WHERE id=?",array($admin_id));
     $data_fetch = $select->fetch();
     return $data_fetch;

   }

   public function banner()
   {

      $select = $this->PDO()->query("SELECT*FROM bannerupdate");
      while($banner_display = $select->fetch())
      {

          ?>

            <script type="text/javascript">

              window.addEventListener("load", function(){

                 var title = document.getElementById("titel");
                 var info = document.getElementById("info");
                 var eventButt = document.getElementById("more");
                 var banner = document.getElementById("banner");

                 var bannerData = document.querySelectorAll(".bannerData");
                 var onlineBannerName = document.getElementById("onlineBannerName");
                 onlineBannerName.value = "<?php echo $banner_display['banner_header'];?>";


                 title.innerHTML = "<?php echo $banner_display['banner_header'];?>";
                 info.innerHTML = "<?php echo $banner_display['banner_info'];?>";
                 eventButt.innerHTML = "<?php echo $banner_display['button_text'];?>";

                 banner.style.backgroundImage = "url(<?php echo $banner_display['banner_image'];?> )";
                 banner.style.backgroundPosition = "center";
                 banner.style.backgroundRepeat = "no-repeat";


                   bannerData[1].value = "<?php echo $banner_display['banner_header'];?>";
                   bannerData[2].value = "<?php echo $banner_display['button_text'];?>";
                   bannerData[3].value = "<?php echo $banner_display['banner_info'];?>";



              })

            </script>

          <?php

      }


   }


   public function banner_update($submit)
   {

      if(isset($_POST[$submit]))
      {

        $header = htmlspecialchars($_POST['header']);
        $button = htmlspecialchars($_POST['buttText']);
        $info = htmlspecialchars($_POST['infos']);


          $this->prepare("UPDATE bannerupdate SET banner_header=?, banner_info=?, button_text=? WHERE id=?", array($header, $info, $button,1));
          $this->prepare("UPDATE online_banner SET banner_thema=?, banner_info=?, button_text=? WHERE id=?", array($header, $info, $button,1));


      }else{


           ?>

              <script type="text/javascript">

              /*   var submit = document.getElementById("updateButt");
                 var error = document.getElementById("error");

                 submit.addEventListener("click", function(e){

                    e.preventDefault();
                    error.innerHTML = "Don't exist";

                 })*/

              </script>

           <?php


      }

   }



   public function banner_image($submit, $file_path, $file_size)
   {

    if(isset($_POST[$submit]))
     {

       $file_name = $_FILES['bannerImage']['name'];
       $file_tmp = $_FILES['bannerImage']['tmp_name'];
       $file_size = $_FILES['bannerImage']['size'];
       $path = $file_path.'/'.$file_name;
       $valid_extention = array('.jpg','.jpeg','.png');
       $upload_extention = strrchr($file_name,'.');

     if(in_array($upload_extention, $valid_extention))
     {

       if($file_size <= $file_size)
       {

          if(move_uploaded_file($file_tmp, $path))
          {

              $this->prepare("UPDATE bannerupdate SET banner_image=?", array($path));
              echo 'succes';

          }else{

            ?>

               <script type="text/javascript">

                  var submit = document.getElementById("updateButt");
                  var error = document.getElementById("error");

                  submit.addEventListener("click", function(e){

                     e.preventDefault();
                     error.innerHTML = "Afbeelding is niet geupload";
                     error.style.color = "#EF5D56";

                  })

               </script>

            <?php

          }

       }else{

         ?>

            <script type="text/javascript">

               var submit = document.getElementById("updateButt");
               var error = document.getElementById("error");

               submit.addEventListener("click", function(e){

                  e.preventDefault();
                  error.innerHTML = "Afbeelding te groot (MAX: 100.000ko)";
                  error.style.color = "#EF5D56";

               })

            </script>

         <?php

       }

     }else{

       ?>

          <script type="text/javascript">

             var submit = document.getElementById("updateButt");
             var error = document.getElementById("error");

             submit.addEventListener("click", function(e){

                e.preventDefault();
                error.innerHTML = "Deze extentie is niet toegestaan. Allen (jpg, jpeg en png)";
                error.style.color = "#EF5D56";

             })

          </script>

       <?php

     }

   }

   }


   private function status($part)
   {

     $select = $this->prepare("SELECT*FROM upload_status WHERE parts=?", array($part));
     $status = $select->fetch();
     return $status;

   }


   public function display_status($parts, $parts_id)
   {

          $banner_status = $this->status($parts);


           ?>

               <script type="text/javascript">

                  window.addEventListener("load", function(){

                    var parts = document.querySelectorAll(".<?php echo $parts_id;?>");

                    var uploadConfirm = document.createElement("h3");
                    uploadConfirm.className = 'uploadConfirm';
                    uploadConfirm.style.backgroundColor = "<?php echo $banner_status['background_color'];?>";
                  //  uploadConfirm.style.border = "1px solid #2ecc71";
                    uploadConfirm.innerHTML = "<?php echo $banner_status['status'];?>";

                    parts[1].appendChild(uploadConfirm);

                  })

               </script>

           <?php

   }



   public function display_places_status($parts)
   {

          $places_status = $this->status($parts);

               ?>

                   <script type="text/javascript">

                      window.addEventListener("load", function(){

                        var parts = document.querySelectorAll(".places");


                              var uploadConfirm = document.createElement("h3");
                              uploadConfirm.className = 'uploadConfirm';
                              uploadConfirm.style.backgroundColor = "<?php echo $places_status['background_color'];?>";
                            //  uploadConfirm.style.border = "1px solid #2ecc71";
                              uploadConfirm.innerHTML = "<?php echo $places_status['status'];?>";


                              parts["<?php echo $places_status['object_id']-1;?>"].appendChild(uploadConfirm);

                      })

                   </script>

               <?php


   }

   public function banner_upload($submit)
   {

      if(isset($_POST[$submit]))
      {

        $banner_header = htmlspecialchars($_POST['bannerHeader']);

        $select = $this->PDO()->query("SELECT*FROM bannerupdate");

        $bannerFetch = $select->fetch();

        $online_select = $this->PDO()->query("SELECT*FROM online_banner");
        $online_selectCount = $online_select->rowCount();

        if($online_selectCount == 0)
        {

           $insert = $this->prepare("INSERT INTO online_banner(banner_image, banner_thema, banner_info, button_text) VALUES(?,?,?,?)", array($bannerFetch['banner_image'], $bannerFetch['banner_header'], $bannerFetch['banner_info'], $bannerFetch['button_text']));

           $insert = $this->prepare("INSERT INTO upload_status(status, parts, background_color) VALUES(?,?,?)", array('GEUPLOAD','banner','#2ecc71'));


      }else{

          //il deja ete uploader

       }

      }

   }


   public function new_place($submit)
   {

      if(isset($_POST[$submit]))
      {

         $place_name = htmlspecialchars($_POST['placeName']);
         if(!empty($place_name))
         {

            $select = $this->prepare("SELECT*FROM district WHERE district_name=?", array($place_name));
            $district_count = $select->rowCount();

            if($district_count == 0)
            {

                $this->prepare("INSERT INTO district(district_name, district_background, district_info, date_created) VALUES(?,?,?,NOW())", array($place_name, '../public/images/uploaded_image/place_background/defaultImage.png', 'U kunt de informaties, achterground en meer van de toegevoegde plek aanpassen.'));


            }else{
              echo "Deze Naam Bestaat Al";

              ?>

                 <script type="text/javascript">

                 window.addEventListener("load", function(){

                    var submit = document.getElementById("addPlace");
                    var error = document.getElementById("errorNewPlace");

                    submit.addEventListener("submit", function(e){

                         e.preventDefault();

                         error.innerHTML = "Deze Naam Bestaat Al";
                         error.style.color = "#EF5D56";

                      })



                  })

                 </script>

              <?php

            }

         }else{

           echo "vul een naam in";

           ?>

              <script type="text/javascript">


                   window.addEventListener("load", function(){

                      var submit = document.getElementById("addPlace");
                      var error = document.getElementById("errorNewPlace");

                      submit.addEventListener("submit", function(e){

                           e.preventDefault();

                           error.innerHTML = "Vul Een Naam In";
                           error.style.color = "#EF5D56";

                        })



                    })


              </script>

           <?php

         }

      }

    }





   public function display_private_place()
   {

      $select = $this->PDO()->query("SELECT*FROM district");
      while($display = $select->fetch())
      {

         ?>

            <div class="places">

               <div class="placesContainer">


                 <div class="place_back">

                    <p class="errorPlace">Welkom</p>

                     <form  action="" method="post" enctype="multipart/form-data">

                        <input type="file" name="place_image">
                        <input type="number" name="district_id" value="<?php echo $display['id'];?>" id="place-id">
                          <input type="text" name="place_name" placeholder="Nieuw PLaats Naam" class="name" value="<?php echo $display['district_name'];?>">

                        <textarea name="place_info" rows="8" cols="80" placeholder="Nieuw Informaties"><?php echo $display['district_info'];?></textarea>
                        <input type="submit" name="place_update" value="Aanpassen">

                     </form>

                     <div class="styles">

                        <button class="back">Terug</button>
                        <!--<a href="#"><button class="style"></button></a>-->

                     </div>

                 </div>

                 <div class="place_front">

                     <img src="<?php echo $display['district_background'];?>" alt="" class="defaultBackground">
                     <div class="text">

                        <div class="backgroundColor">

                        </div>

                        <h1 class="placeName"><?php echo $display['district_name'];?></h1 class="placeNmae">

                        <p><?php echo $display['district_info'];?><p>

                     </div>

                     <div class="actions">

                        <img src="../public/images/uploaded_image/place_background/edit.png" alt="" class="editPlace">
                        <img src="../public/images/uploaded_image/place_background/delete.png" alt="" class="deletePlace">
                        <img src="../public/images/uploaded_image/place_background/onlineIcone.png" alt="" class="uploadPlace">

                     </div>

                 </div>

                 <div class="deleteVieuw">

                     <p class="errorPlace">Verwijderen Sherm...</p>

                     <form  action="" method="post">

                         <input type="number" name="delete_id" value="<?php echo $display['id'];?>">
                         <input type="password" name="admin_pass" placeholder="Wachtwoord">
                         <input type="submit" name="delete" value="Verwijderen">

                     </form>

                     <button class="deleteBack">Terug</button>

                 </div>

                 <div class="placeUploadVieuw">

                     <form  action="" method="post">

                        <input type="text" name="UploadPlaceName" value="<?php echo $display['district_name']; ?>" hidden="hidden">
                        <input type="number" name="UploadPlaceId" value="<?php echo $display['id']; ?>" hidden="hidden">
                        <p>Zet de plaatsen online door de upload knoop onderaan te kliken.</p>
                        <input type="submit" name="placeUploaded" value="Upload" class="placesUpload">
                        <div class="placeTerug">

                        </div>

                     </form>

                 </div>

              </div>

            </div>

            <script type="text/javascript">

               window.addEventListener("load", function()
             {


                    var editPlace = document.querySelectorAll(".editPlace");
                    var deletePlace = document.querySelectorAll(".deletePlace");
                    var uploadPlace = document.querySelectorAll(".uploadPlace");
                    var placeFront = document.querySelectorAll(".place_front");
                    var placeBack = document.querySelectorAll(".place_back");

                    for(var i = 0; i < editPlace.length; i++)
                    {

                       var editPlaceArr = editPlace[i];

                       editPlaceArr.addEventListener("click", function(e){


                            //alert(e.target.parentNode.parentNode.parentNode.childNodes[1].className);
                            e.target.parentNode.parentNode.parentNode.childNodes[1].backfaceVisibility = "hiden";
                            e.target.parentNode.parentNode.parentNode.childNodes[1].style.transform = "perspective(600px) rotateY(0deg)";
                            e.target.parentNode.parentNode.parentNode.childNodes[1].style.transition = "transform 1.0s linear 0s";

                            e.target.parentNode.parentNode.backfaceVisibility = "hiden";
                            e.target.parentNode.parentNode.style.transform = "perspective(600px) rotateY(-180deg)";
                            e.target.parentNode.parentNode.style.transition = "transform 1.0s linear 0s";


                       })

                    }

                    var back = document.querySelectorAll(".back");

                    for(var i = 0; i < back.length; i++)
                    {

                       var backArr =back[i];

                       backArr.addEventListener("click", function(e){

                         e.target.parentNode.parentNode.backfaceVisibility = "hiden";
                         e.target.parentNode.parentNode.style.transform = "perspective(600px) rotateY(180deg)";
                         e.target.parentNode.parentNode.style.transition = "transform 1.0s linear 0s";

                         e.target.parentNode.parentNode.parentNode.childNodes[3].backfaceVisibility = "hiden";
                         e.target.parentNode.parentNode.parentNode.childNodes[3].style.transform = "perspective(600px) rotateY(0deg)";
                         e.target.parentNode.parentNode.parentNode.childNodes[3].style.transition = "transform 1.0s linear 0s";


                       })

                    }


                    var uploadPlaceIcon = document.querySelectorAll(".uploadPlace");


                    for (var i = 0; i < uploadPlaceIcon.length; i++) {

                      var uploadPlaceIconArr = uploadPlaceIcon[i];

                       uploadPlaceIconArr.addEventListener("click", function(e){

                           e.target.parentNode.parentNode.parentNode.childNodes[7].style.display = "flex";

                       })

                    }


                    var placeTerug = document.querySelectorAll(".placeTerug");


                    for (var i = 0; i < placeTerug.length; i++) {

                      var placeTerugArr = placeTerug[i];

                       placeTerugArr.addEventListener("click", function(e){

                           e.target.parentNode.parentNode.style.display = "none";

                       })

                    }

             })

            </script>

         <?php

      }

   }


   public function update_private_place($submit,$file_path,$file_size)
   {

     if(isset($_POST[$submit]))
     {

        $place_name = htmlspecialchars($_POST['place_name']);
        $district_id = htmlspecialchars($_POST['district_id']);
        $place_image = $_FILES['place_image'];
        $place_info = htmlspecialchars($_POST['place_info']);

        if(!empty($place_name) OR !empty($place_info) OR !empty($place_image))
        {

          $select = $this->prepare("SELECT*FROM district WHERE id=?", array($district_id));
          $id_check = $select->fetch();

          if($id_check['id'] == $district_id)
          {

           $this->prepare("UPDATE district SET district_name=? , district_info=? WHERE id=?", array($place_name, $place_info, $district_id));
           $this->prepare("UPDATE online_district SET district_name=? , district_info=? WHERE district_name=?", array($place_name, $place_info, $place_name));

           $file_name = $_FILES['place_image']['name'];
           $file_tmp = $_FILES['place_image']['tmp_name'];
           $file_size = $_FILES['place_image']['size'];
           $path = $file_path.'/'.$file_name;
           $valid_extention = array('.jpg','.jpeg','.png');
           $upload_extention = strrchr($file_name,'.');

         if(in_array($upload_extention, $valid_extention))
         {

           if($file_size <= $file_size)
           {

              if(move_uploaded_file($file_tmp, $path))
              {

                  $this->prepare("UPDATE district SET district_background=? WHERE id=?", array($path, $district_id));
                  $this->prepare("UPDATE district SET district_background=? WHERE district_name=?", array($path, $place_name));
                //  $this->prepare("UPDATE district SET district_name=? ,district_background=?, district_info=? WHERE district_name=?", array($place_name, $path, $place_info, $place_name));
                  echo 'succes';

                }else{

                  // l image n a pas pu etre upluoader.

                }

              }else{

                // image trop grande.

              }

            }else{

              //l extention n est pas valide

            }


          }else{

            echo "ne changer pas l id";

            //l id ne doit pas etre change

          }


        }else{

          // les inputs ne doivent pas etres vide

        }

     }

   }


   public function upload_place($submit)
   {

      if(isset($_POST[$submit]))
      {

        $place_name = htmlspecialchars($_POST['UploadPlaceName']);

        $select_private_district = $this->prepare("SELECT*FROM district WHERE district_name=?", array($place_name));
        $display_private_district = $select_private_district->fetch();

        $select_online_district = $this->prepare("SELECT*FROM online_district WHERE district_name=?", array($place_name));
        $count_onlineDistrict = $select_online_district->rowCount();

        if($count_onlineDistrict == 0){

          $insert_district = $this->prepare("INSERT INTO online_district(district_name, district_background, district_info, date_uploaded) VALUES(?,?,?,NOW())",array($display_private_district['district_name'], $display_private_district['district_background'], $display_private_district['district_info']));
          $insert = $this->prepare("INSERT INTO upload_status(status, parts, background_color, object_id) VALUES(?,?,?,?)", array('GEUPLOAD','places','#2ecc71',$display_private_district['id']));


        }else{

          //ce lieu est deja uploader

        }


      }

   }


   public function delete_place($submit)
   {

     if(isset($_POST[$submit]))
     {

       $delete_id = htmlspecialchars($_POST['delete_id']);
       $delete_name = htmlspecialchars($_POST['place_name']);
       $password = sha1(htmlspecialchars($_POST['admin_pass']));

       if(!empty($password))
       {

         $select = $this->prepare("SELECT*FROM super_user WHERE id=?", array($_SESSION['id']));
         $pass_fetch = $select->fetch();

         if($password == $pass_fetch['admin_pass'])
         {

           $this->prepare("DELETE FROM district WHERE id=?", array($delete_id));
           $this->prepare("DELETE FROM online_district WHERE district_name=?", array($delete_name));

         }else{

           echo 'Wachtwoord onjuist';

         }

       }else{

         echo 'Voer u wachtwoord in';
         //echo $_SESSION['id'];

       }

     }

   }

   public function select_from_cultuurArt()
   {

      $cultuur = $this->prepare("SELECT*FROM cultuurart WHERE choise=?",array('cultuur'));
      //$cultuur_online = $cultuur->fetch();
    //  $this->prepare("INSERT INTO online_cultuurart(header, information, choise,background_image) VALUES(?,?,?,?)", array($cultuur_online['titel'], $cultuur_online['information'], 'cultuur', $cultuur_online['background_image']));


      while($display_cultuur = $cultuur->fetch())
      {

        ?>

            <script type="text/javascript">

               window.addEventListener("load", function(){

                 var cultArtInputTitel = document.getElementById("cultArtInputTitel");
                 var cultArtInputInfo = document.getElementById("cultArtInputInfo");
                 var select = document.getElementById("cultArtInputSelect");
                 var cultuurHeader = document.getElementById("cultuurHeader");
                 var cultuurText = document.getElementById("cultuurText");
                 var background = document.querySelector(".frontCultArt");

                select.addEventListener("change", function(){

                  //  alert(select.options[select.selectedIndex].innerHTML);

                  if(select.options[select.selectedIndex].innerHTML == 'Cultuur')
                  {

                    cultArtInputTitel.value = "<?php echo $display_cultuur['titel'];?>";
                    cultArtInputInfo.value = "<?php echo $display_cultuur['information'];?>";

                  }

                })


                 background.style.backgroundImage = "url(<?php echo $display_cultuur['background_image'];?>)";

                 cultuurHeader.innerHTML = "<?php echo $display_cultuur['titel'];?>";
                 cultuurText.innerHTML = "<?php echo $display_cultuur['information'];?>";

               })

            </script>

        <?php

      }

      $art = $this->prepare("SELECT*FROM cultuurart WHERE choise=?",array('kunst'));

    //  $art_online = $art->fetch();
    //  $this->prepare("INSERT INTO online_cultuurart(header, information, choise,background_image) VALUES(?,?,?,?)", array($art_online['titel'], $art_online['information'], 'art', $art_online['background_image']));


      while($display_art = $art->fetch())
      {

        ?>

            <script type="text/javascript">

               window.addEventListener("load", function(){

                 var cultArtInput = document.querySelector(".cultArtInput");
                 var artHeader = document.getElementById("artHeader");
                 var artText = document.getElementById("artText");

                 var cultArtInputTitel = document.getElementById("cultArtInputTitel");
                 var cultArtInputInfo = document.getElementById("cultArtInputInfo");
                 var select = document.getElementById("cultArtInputSelect");

                 select.addEventListener("change", function(){

                   //  alert(select.options[select.selectedIndex].innerHTML);

                   if(select.options[select.selectedIndex].innerHTML == 'Kunst')
                   {

                     cultArtInputTitel.value = "<?php echo $display_art['titel'];?>";
                     cultArtInputInfo.value = "<?php echo $display_art['information'];?>";

                   }



                 })


                 artHeader.innerHTML = "<?php echo $display_art['titel'];?>";
                 artText.innerHTML = "<?php echo $display_art['information'];?>";


               })
            </script>

        <?php

      }

   }





   public function updateCultuur_art($submit,$file_path,$fileSize)
   {

        if(isset($_POST[$submit]))
        {

          $head = htmlspecialchars($_POST['head']);
          $info = htmlspecialchars($_POST['infos']);
          $choise = htmlspecialchars($_POST['choise']);

          if(!empty($head) OR !empty($info) AND !empty($choise) OR !empty($_FILES['background']))
          {

             $this->prepare("UPDATE cultuurart SET titel=?, information=? WHERE choise=?",array($head,$info,$choise));
             $this->prepare("UPDATE online_cultuurart SET header=?, information=? WHERE choise=?",array($head,$info,$choise));

             $file_name = $_FILES['background']['name'];
             $file_tmp = $_FILES['background']['tmp_name'];
             $file_size = $_FILES['background']['size'];
             $path = $file_path.'/'.$file_name;
             $valid_extention = array('.jpg','.jpeg','.png');
             $upload_extention = strrchr($file_name,'.');

           if(in_array($upload_extention, $valid_extention))
           {

             if($file_size <= $fileSize)
             {

                if(move_uploaded_file($file_tmp, $path))
                {

                  $this->prepare("UPDATE cultuurart SET background_image=?",array($path));
                  $this->prepare("UPDATE online_cultuurart SET background_image=?",array($path));

                }else{


                  //image non uploader

                }


              }else{

                echo 'image trop grande';

              }

            }else{

              //extention non autoriser

            }

          }else{

            echo "vul alles in";

          }

        }

   }


   public function display_organisation_data()
   {

      $select = $this->PDO()->query("SELECT*FROM organisation");
      $display = $select->fetch();
      return $display;

   }


   public function update_organisation($submit)
   {

     if(isset($_POST[$submit]))
     {

       $organisation_head = htmlspecialchars($_POST['infoHeader']);
       $form_head = htmlspecialchars($_POST['formHeader']);
       $info = htmlspecialchars($_POST['signInfo']);

       if(!empty($organisation_head) OR !empty($info) AND !empty($form_head))
       {

          $this->prepare("UPDATE organisation SET info_header=?, form_header=?, information=?",array($organisation_head,$form_head, $info ));
          $this->prepare("UPDATE online_organisation SET organisation_header=?, form_header=?, organisation_info=?",array($organisation_head,$form_head, $info ));

       }else{


          //les champs ne doivent pas etre vide...

       }


     }

   }



}


 ?>
