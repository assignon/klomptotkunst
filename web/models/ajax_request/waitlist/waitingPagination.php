<?php

        require "../pdo_connection.php";

        function waitingPagination()
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


                    $target = htmlspecialchars($_GET['target']);
                    $begin = 1;
                    $end = 9;

                    $begining = (($target-1)*$end)+$begin;
                    $ending = $target*$end;

                    $select = $pdo->query("SELECT*FROM waiting_request ORDER BY wait_add_date DESC LIMIT $begining,$ending");
                    ?>
                 <div class="waitingComContainer">
                   <?php
                    while($display_refused = $select->fetch())
                    {

                        ?>



                             <div class="waitingCom">

                                <p class="waiting_communities_name"><?php echo ucfirst($display_refused['wait_organisation']);?></p>

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

          waitingPagination();



 ?>
