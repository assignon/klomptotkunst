<?php

require "../pdo_connection.php";


function total_refused_communities()
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


   $select = $pdo->query("SELECT*FROM refused_request ORDER BY refuse_add_date DESC LIMIT $limit".",$by_page");
   ?>
<div class="refusedComContainer">
  <?php
   while($display_refused = $select->fetch())
   {

       ?>



            <div class="refusedCom">

               <p class="refused_communities_name"><?php echo ucfirst($display_refused['refuse_organisation']);?></p>

            </div>


       <?php

   }

   ?>
</div>

</div>

<div class="refusedPagination">

  <?php

       for ($i=1; $i <= $page_number; $i++) {
         $pages = $i;
         ?>

             <button class="refusedPaginationButton"><?php echo $i;?></button>

         <?php

       }

   ?>

</div>

<?php

 }

   total_refused_communities();

 ?>
