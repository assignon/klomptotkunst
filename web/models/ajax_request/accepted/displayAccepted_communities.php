<?php
session_start();

require "../pdo_connection.php";

function total_accepted_communities()
{

  $pdo = pdo();

  $communities = $pdo->query("SELECT count(id) as community FROM accepted_request");

  $communities_fetch = $communities->fetch();

  $community_number = $communities_fetch['community'];

  $by_page = 9;
  $pages = 1;

  $page_number = ceil($community_number/$by_page);

  if($pages > 0 AND $pages <= $page_number){

        $this_page = $pages;

      }else{

         $this_page = 1;

      }

      $limit = (($this_page-1)*$by_page);

   $select = $pdo->query("SELECT*FROM accepted_request ORDER BY accept_add_date DESC LIMIT $limit".",$by_page");
   ?>
<div class="acceptedComContainer">
  <?php
   while($display_accepted = $select->fetch())
   {

       ?>

            <div class="acceptedCom">

               <p class="accepted_communities_name"><?php echo ucfirst($display_accepted['accept_organisation']);?></p>

            </div>


       <?php

   }

   ?>

</div>

<div class="acceptedPagination">

  <?php

       for ($i=1; $i <= $page_number; $i++) {
         $pages = $i;
         ?>

             <button class="acceptedPaginationButton"><?php echo $i;?></button>

         <?php

       }

   ?>

</div>


<?php

 }

   total_accepted_communities();

 ?>
