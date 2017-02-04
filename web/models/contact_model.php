<?php

      require "../web/core/model.php";
      class contact extends model
      {

        public function __construct()
        {

           parent::__construct();

        }

        public function questions()
        {

           ?>

             <script type="text/javascript">

                window.addEventListener("load", function(){

                   var head = document.getElementById("head");
                   var questionInputVal = document.querySelectorAll(".questionInputVal");
                   var xhr;


                   if (window.XMLHttpRequest) {
                      // code for IE7+, Firefox, Chrome, Opera, Safari
                       xhr = new XMLHttpRequest();
                     } else {
                      // code for IE6, IE5
                        xhr = new ActiveXObject("Microsoft.XMLHTTP");
                    }


                       questionInputVal[5].addEventListener("click", function(e){

                           e.preventDefault();

                           xhr.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {

                                      head.innerHTML = xhr.responseText;


                                   }

                                 };


                                   xhr.open("GET","../web/models/ajax_request/messages_request/usersQuestions.php?surname="+questionInputVal[0].value+"&name="+questionInputVal[1].value+"&telnr="+questionInputVal[2].value+"&email="+questionInputVal[3].value+"&question="+questionInputVal[4].value,true);
                                   xhr.send();


                       })


                })

             </script>

           <?php

        }

      }

 ?>
