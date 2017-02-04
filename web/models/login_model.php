<?php


   require "../web/core/model.php";

   class login_model extends model
   {


     public function insert_img($tablename, $row, $img_path)
     {

       $this->prepare("INSERT INTO $tablename($row) VALUES(?)",array($img_path));

     }





      public function change_image($submit,$tablename, $row, $file_name, $img_path,$img_size)
      {

        if(isset($_POST[$submit]) AND !empty($_FILES[$file_name]))
        {

          $image_name = $_FILES[$file_name]['name'];
          $image_tmp = $_FILES[$file_name]['tmp_name'];
          $image_size = $_FILES[$file_name]['size'];

          $path = $img_path.'/'.$image_name;

          $valide_extention = array('.png','.jpg','.jpeg');
          $upload_extention = strrchr($image_name,'.');

          if(in_array($upload_extention , $valide_extention)){

            if($image_size <= $img_size)
            {

              if(move_uploaded_file($image_tmp, $path))
              {

                 $this->prepare("UPDATE $tablename SET $row=? WHERE id=?",array($path,1));
                 $this->succes($image_name.' '.' is GEUPLOAD');

              }else{



              }

            }else{



            }

          }else{



          }


        }else {



        }

      }


      public function display_img($tablename, $row,$img_id)
      {

            $select =  $this->PDO()->query("SELECT*FROM $tablename");
            while($display = $select->fetch())
            {

              ?>

                 <script type="text/javascript">

                     window.addEventListener("load", function(){

                         var imageId = document.getElementById("<?php echo $img_id;?>");

                         imageId.style.backgroundImage = "url(<?php echo $display[$row];?>)";
                         //imageId.src = "<?php echo $display[$row];?>";


                     })

                 </script>

              <?php

            }

      }


      public function signin()
      {

        if(isset($_POST['logIn']))
        {

          $admin_name = htmlspecialchars($_POST['admin_name']);
          $pass = sha1($_POST['admin_pass']);

          if(!empty($admin_name) AND !empty($pass))
          {

             $select = $this->prepare("SELECT*FROM super_user WHERE admin_name=? AND admin_pass=?", array($admin_name, $pass));
             $adminname_row = $select->rowCount();

             if($adminname_row == 1)
             {

               $data = $select->fetch();

                $_SESSION['id'] = $data['id'];
                $_SESSION['admin_name'] = $data['admin_name'];
                $_SESSION['admin_pass'] = $data['admin_pass'];

                header("Location: welcom.php?action=admin&id=".$_SESSION['id']);

             }else{

                //admin name rowCount

             }

          }else{

             //controler si la valeur des inputs ne st pas vide

          }

        }

      }


   }

 ?>
