<?php

        require "../pdo_connection.php";

        function waitingPagination()
        {

                    $pdo = pdo();


                    $communities = $pdo->query("SELECT count(id) as community FROM subscription_request");

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

                    $select = $pdo->query("SELECT*FROM subscription_request ORDER BY subscription_time DESC LIMIT $begining,$ending");
                    ?>
                 <div class="newComContainer">
                   <?php
                    while($display_refused = $select->fetch())
                    {

                        ?>



                             <div class="newCom">

                                <p class="new_communities_name"><?php echo ucfirst($display_refused['request_community']);?></p>

                             </div>


                        <?php

                    }


                    ?>

                 </div>

                 <div class="newPagination">

                   <?php

                        for ($i=1; $i <= $page_number; $i++) {
                          $pages = $i;
                          ?>

                              <button class="newPaginationButton"><?php echo $i;?></button>

                          <?php

                        }

                    ?>

                 </div>

                 <?php

         }

          waitingPagination();



 ?>
