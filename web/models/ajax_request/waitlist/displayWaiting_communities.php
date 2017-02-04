<?php

require "../pdo_connection.php";

function total_waiting_communities()
{

  $pdo = pdo();


  $communities = $pdo->query("SELECT count(id) as community FROM waiting_request");

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

   $select = $pdo->query("SELECT*FROM waiting_request ORDER BY wait_add_date DESC LIMIT $limit".",$by_page");
   ?>
<div class="waitingComContainer">
  <?php
   while($display_waiting = $select->fetch())
   {

       ?>



            <div class="waitingCom">

               <p class="waiting_communities_name"><?php echo ucfirst($display_waiting['wait_organisation']);?></p>

            </div>


       <?php

   }

   ?>
</div>

<div class="waitingPagination">

  <?php

       for ($i=1; $i <= $page_number; $i++) {
         $pages = $i;
         ?>

             <button class="waitingPaginationButton"><?php echo $i;?></button>

         <?php

       }

   ?>

</div>

<?php

 }

   total_waiting_communities();

 ?>
