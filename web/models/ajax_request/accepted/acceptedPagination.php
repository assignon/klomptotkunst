<?php

        require "../pdo_connection.php";

        function acceptedPagination()
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


                    $target = htmlspecialchars($_GET['target']);
                    $begin = 1;
                    $end = 9;

                    $begining = (($target-1)*$end)+$begin;
                    $ending = $target*$end;

                    $select = $pdo->query("SELECT*FROM accepted_request ORDER BY accept_add_date DESC LIMIT $begining,$ending");
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

          acceptedPagination();



 ?>
