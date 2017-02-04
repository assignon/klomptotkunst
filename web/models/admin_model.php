<?php

      require "../web/core/model.php";

      class admin_model extends model
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


         public function subscriptions()
         {

            $select = $this->PDO()->query("SELECT*FROM subscription_request");
            $subscriptionCount = $select->rowCount();
            while($display = $select->fetch())
            {

               ?>

                     <script type="text/javascript">

                        window.addEventListener("load", function(){

                          var totalSubscription = document.getElementById("total");
                          totalSubscription.innerHTML = "<?php echo $subscriptionCount;?>";

                           var subscriptionDisplay = document.getElementById("subscriptionDisplay");

                          /* var subscriptionCont = document.createElement("div");
                           subscriptionCont.className = "subscriptionCont";*/

                           var subscription = document.createElement("div");
                           subscription.className = "subscription";


                           var subscriptionName = document.createElement("h3");
                           subscriptionName.className = "subscriptionName";
                           subscriptionName.innerHTML = "<?php echo ucfirst($display['request_community']);?>";

                           /*var subscriptionEmail = document.createElement("h4");
                           subscriptionEmail.className = "subscriptionEmail";
                           subscriptionEmail.innerHTML = "<?php //echo $display['request_email'];?>";*/

                          /* var subscriptionData = document.createElement("form");
                           subscriptionData.method = "get";
                           subscriptionData.action = "";
                           subscriptionData.className = "subscriptionDataForm";

                           var subscriptionDataInput = document.createElement("input");
                           subscriptionDataInput.type = "submit";
                           subscriptionDataInput.name = "getData";
                           subscriptionDataInput.value = "All Data Tonen";
                           subscriptionDataInput.className = "subscriptionDataInput";*/



                             //subscriptionData.appendChild(subscriptionDataInput);

                             subscription.appendChild(subscriptionName);
                             //subscription.appendChild(subscriptionEmail);
                            // subscription.appendChild(subscriptionData);

                             //subscriptionCont.appendChild(subscription);

                             subscriptionDisplay.appendChild(subscription);


                           var notificationIcons = document.querySelector(".notificationIcons");
                           var total = document.getElementById("total");
                           var acceptedTotal = document.getElementById("acceptedTotal");
                           var refusedTotal = document.getElementById("refusedTotal");
                           var waitingTotal = document.getElementById("waitingTotal");




                           function communityData()
                            {

                              //var subscriptionDataInput = document.querySelectorAll(".subscriptionDataInput");
                              var partsData = document.querySelector(".partsData");

                              if (window.XMLHttpRequest) {
                                 // code for IE7+, Firefox, Chrome, Opera, Safari
                                  xhr = new XMLHttpRequest();
                                } else {
                                 // code for IE6, IE5
                                   xhr = new ActiveXObject("Microsoft.XMLHTTP");
                               }



                                subscription.addEventListener("click", function(e)
                                    {

                                           var subscriptionDataTarget = e.target.childNodes[0].textContent;
                                           var subscriptedCommunity = e.target;
                                          // alert(subscriptionDataTarget);
                                           //var datas = document.getElementById("datas");

                                           //datas.style.display = "flex";


                                           notificationIcons.style.display= "none";

                                           //alert(subscriptedCommunity);
                                                //alert(subscriptionDataTarget);
                                           xhr.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {

                                                partsData.innerHTML = xhr.responseText;
                                                subscriptCommunitiesTraitment(subscriptedCommunity);

                                             }

                                           };

                                           xhr.open("GET","../web/models/ajax_request/subscriptionData.php?data="+subscriptionDataTarget,true);
                                           xhr.send();

                                      })

                              }



                              function subscriptCommunitiesTraitment(currentCommunity)
                              {

                                      var communityTraitment = document.querySelectorAll(".communityTraitment");

                                      var partsData = document.querySelector(".partsData");



                                      if (window.XMLHttpRequest) {
                                         // code for IE7+, Firefox, Chrome, Opera, Safari
                                          xhr = new XMLHttpRequest();
                                        } else {
                                         // code for IE6, IE5
                                           xhr = new ActiveXObject("Microsoft.XMLHTTP");
                                       }




                                            communityTraitment[0].addEventListener("click", function(e){

                                              e.preventDefault();
                                              var target = e.target.parentNode.parentNode.childNodes[1].childNodes[9].childNodes[2].textContent;
                                              var email = e.target.parentNode.parentNode.childNodes[1].childNodes[5].childNodes[2].textContent;
                                              var name = e.target.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[2].textContent;

                                               var acceptedTotal = document.getElementById("acceptedTotal");

                                              notificationIcons.style.display= "flex";

                                              xhr.onreadystatechange = function() {
                                               if (this.readyState == 4 && this.status == 200) {

                                                   partsData.innerHTML = xhr.responseText;

                                                  $(function(){

                                                      $(currentCommunity).toggle("explode");

                                                   })

                                                   total.innerHTML -= 1;
                                                   acceptedTotal.innerHTML += 1;

                                                }

                                              };

                                              xhr.open("GET","../web/models/ajax_request/accepted/accepted_communities.php?traitment="+target+"&email="+email+"&name="+name,true);
                                              xhr.send();

                                        })



                                        communityTraitment[1].addEventListener("click", function(e){

                                          e.preventDefault();
                                          var target = e.target.parentNode.parentNode.childNodes[1].childNodes[9].childNodes[2].textContent;
                                          var email = e.target.parentNode.parentNode.childNodes[1].childNodes[5].childNodes[2].textContent;
                                          var name = e.target.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[2].textContent;

                                          xhr.onreadystatechange = function() {
                                           if (this.readyState == 4 && this.status == 200) {

                                               partsData.innerHTML = xhr.responseText;

                                               $(function(){

                                                   $(currentCommunity).toggle("explode");

                                                })

                                                total.innerHTML -= 1;
                                                refusedTotal.innerHTML += 1;

                                            }

                                          };

                                          xhr.open("GET","../web/models/ajax_request/refused/refused_communities.php?traitment="+target+"&email="+email+"&name="+name,true);
                                          xhr.send();

                                    })



                                  /*  communityTraitment[2].addEventListener("click", function(e){

                                      e.preventDefault();
                                      var target = e.target.parentNode.parentNode.childNodes[1].childNodes[9].childNodes[2].textContent;

                                      //alert(target);

                                      xhr.onreadystatechange = function() {
                                       if (this.readyState == 4 && this.status == 200) {

                                           partsData.innerHTML = xhr.responseText;

                                           $(function(){

                                               $(currentCommunity).toggle("explode");

                                            })

                                            total.innerHTML -= 1;
                                            waitingTotal.innerHTML += 1;


                                        }

                                      };

                                      xhr.open("GET","../web/models/ajax_request/waitlist/waitlist_communities.php?traitment="+target,true);
                                      xhr.send();

                                })*/


                              }

                            communityData();


                        })

                     </script>

               <?php

            }

         }

         //wart => waitlist accepted refused and total communities.


        public function wart()
        {

             $select_accepted = $this->PDO()->query("SELECT*FROM accepted_request");
             $select_refused = $this->PDO()->query("SELECT*FROM refused_request");
             $select_waiting = $this->PDO()->query("SELECT*FROM waiting_request");

             $acceptedCount = $select_accepted->rowCount();
             $refusedCount = $select_refused->rowCount();
             $waitingCount = $select_waiting->rowCount();

             ?>

                <script type="text/javascript">

                   window.addEventListener("load", function(){

                     var acceptedTotal = document.getElementById("acceptedTotal");
                     var refusedTotal = document.getElementById("refusedTotal");
                     var waitingTotal = document.getElementById("waitingListTotal");

                     var subscriptionCont = document.querySelector(".subscriptionCont");


                     acceptedTotal.innerHTML = "<?php echo $acceptedCount;?>";
                     refusedTotal.innerHTML = "<?php echo $refusedCount;?>";
                     waitingTotal.innerHTML = "<?php echo $waitingCount;?>";

                     var wartForm = document.querySelectorAll(".wartForm");
                     var subscriptionDisplay = document.getElementById("subscriptionDisplay");
                     var notificationIcons = document.querySelector(".notificationIcons");
                     var partsData = document.querySelector(".partsData");
                     //var datas = document.getElementById("datas");
                     var xhr;

                     if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                         xhr = new XMLHttpRequest();
                       } else {
                        // code for IE6, IE5
                          xhr = new ActiveXObject("Microsoft.XMLHTTP");
                      }




                           wartForm[0].addEventListener("click", function(e){

                             e.preventDefault();

                              //subscriptionCont.style.display = "none";
                              partsData.innerHTML = "<h3 class='wartNotification'>Klick op een van de vereniging om zijn informaties te tonen.</h3>";
                              //datas.style.display= "none";


                             xhr.onreadystatechange = function() {
                              if (this.readyState == 4 && this.status == 200) {

                                  subscriptionDisplay.innerHTML = xhr.responseText;

                                  acceptedData();
                                  acceptedCommunity_pagination();

                                 $(function(){



                                  })



                               }

                             };

                             xhr.open("GET","../web/models/ajax_request/accepted/displayAccepted_communities.php",true);
                             xhr.send();

                       })


                       wartForm[1].addEventListener("click", function(e){

                         e.preventDefault();

                          //subscriptionCont.style.display = "none";
                            partsData.innerHTML = "<h3 class='wartNotification'>Klick op een van de vereniging om zijn informaties te tonen.</h3>";
                          //datas.style.display= "none";


                         xhr.onreadystatechange = function() {
                          if (this.readyState == 4 && this.status == 200) {

                              subscriptionDisplay.innerHTML = xhr.responseText;

                              refusedData();
                              refusedCommunity_pagination();

                             $(function(){



                              })



                           }

                         };

                         xhr.open("GET","../web/models/ajax_request/refused/displayRefused_communities.php",true);
                         xhr.send();

                   })


                   wartForm[2].addEventListener("click", function(e){

                     e.preventDefault();

                      //subscriptionCont.style.display = "none";
                        partsData.innerHTML = "<h3 class='wartNotification'>Klick op een van de vereniging om zijn informaties te tonen.</h3>";

                     xhr.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {

                          subscriptionDisplay.innerHTML = xhr.responseText;

                          waitingData();
                          waitingCommunity_pagination();

                       }

                     };

                     xhr.open("GET","../web/models/ajax_request/waitlist/displayWaiting_communities.php",true);
                     xhr.send();

               })


               wartForm[3].addEventListener("click", function(e){

                 e.preventDefault();
                 //subscriptionCont.style.display = "none";
                   partsData.innerHTML = "<h3 class='wartNotification'>Klick op een van de vereniging om zijn informaties te tonen.</h3>";

                xhr.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {

                     subscriptionDisplay.innerHTML = xhr.responseText;

                     TotalNewRequestData();
                     newCommunity_pagination();

                  }

                };

                xhr.open("GET","../web/models/ajax_request/totalNewRequest/displayNew_communities.php",true);
                xhr.send();

               })




                       function acceptedData()
                       {


                                  var acceptedCom = document.querySelectorAll(".acceptedCom");
                                  var partsData = document.querySelector(".partsData");
                                  var xhr;


                                  if (window.XMLHttpRequest) {
                                     // code for IE7+, Firefox, Chrome, Opera, Safari
                                      xhr = new XMLHttpRequest();
                                    } else {
                                     // code for IE6, IE5
                                       xhr = new ActiveXObject("Microsoft.XMLHTTP");
                                   }

                                  for (var i = 0; i < acceptedCom.length; i++) {

                                    var acceptedComArr = acceptedCom[i];
                                    acceptedComArr.addEventListener("click", function(e){

                                        var targetData = e.target.childNodes[1].textContent;
                                        var currentAcceptCommunity = e.target;
                                        //alert(targetData);

                                        xhr.onreadystatechange = function() {
                                         if (this.readyState == 4 && this.status == 200) {

                                             partsData.innerHTML = xhr.responseText;
                                            // partsData.innerHTML = "J ai rien recu";

                                               wartTraitment(0,refusedTotal,acceptedTotal,"accepted/accepted_communitiesRefused",currentAcceptCommunity,"accepted_communityTraitment");
                                               wartTraitment(1,waitingTotal,acceptedTotal,"accepted/accepted_communitiesWaiting",currentAcceptCommunity,"accepted_communityTraitment");


                                          }

                                        };

                                        xhr.open("GET","../web/models/ajax_request/accepted/displayAccepted_communitiesData.php?data="+targetData,true);
                                        xhr.send();

                                    })
                                  }

                       }


                       function refusedData()
                       {

                         var refusedCom = document.querySelectorAll(".refusedCom");
                         var partsData = document.querySelector(".partsData");
                         var xhr;


                         if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                             xhr = new XMLHttpRequest();
                           } else {
                            // code for IE6, IE5
                              xhr = new ActiveXObject("Microsoft.XMLHTTP");
                          }

                         for (var i = 0; i < refusedCom.length; i++) {

                           var refusedComArr = refusedCom[i];
                           refusedComArr.addEventListener("click", function(e){

                               var targetData = e.target.childNodes[1].textContent;
                               var currentRefuseCommunity = e.target;
                              // alert(targetData);

                               xhr.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {

                                    partsData.innerHTML = xhr.responseText;

                                    wartTraitment(0,acceptedTotal,refusedTotal,"refused/refused_communitiesAccepted",currentRefuseCommunity,"refused_communityTraitment");
                                    //wartTraitment(1,waitingTotal,refusedTotal,"refused_communitiesWaiting",currentAcceptCommunity);


                                 }

                               };

                               xhr.open("GET","../web/models/ajax_request/refused/displayRefused_communitiesData.php?refuseData="+targetData,true);
                               xhr.send();

                           })
                         }

                       }


                       function waitingData()
                       {

                         var waitingCom = document.querySelectorAll(".waitingCom");
                         var partsData = document.querySelector(".partsData");
                         var xhr;


                         if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                             xhr = new XMLHttpRequest();
                           } else {
                            // code for IE6, IE5
                              xhr = new ActiveXObject("Microsoft.XMLHTTP");
                          }

                         for (var i = 0; i < waitingCom.length; i++) {

                           var waitingComArr = waitingCom[i];
                           waitingComArr.addEventListener("click", function(e){

                               var targetData = e.target.childNodes[1].textContent;
                               var currentWaitCommunity = e.target;
                              // alert(targetData);

                               xhr.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {

                                    partsData.innerHTML = xhr.responseText;

                                    wartTraitment(0,acceptedTotal,waitingTotal,"waitlist/waiting_communitiesAccepted",currentWaitCommunity,"waiting_communityTraitment");
                                    wartTraitment(1,waitingTotal,waitingTotal,"waitlist/waiting_communitiesRefused",currentWaitCommunity,"waiting_communityTraitment");
                                }

                            };

                               xhr.open("GET","../web/models/ajax_request/waitlist/displayWaiting_communitiesData.php?waitingData="+targetData,true);
                               xhr.send();

                           })
                         }

                       }



                       function  TotalNewRequestData()
                       {

                         var newCom = document.querySelectorAll(".newCom");
                         var partsData = document.querySelector(".partsData");
                         var xhr;


                         if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                             xhr = new XMLHttpRequest();
                           } else {
                            // code for IE6, IE5
                              xhr = new ActiveXObject("Microsoft.XMLHTTP");
                          }

                         for (var i = 0; i < newCom.length; i++) {

                           var newComArr = newCom[i];
                           newComArr.addEventListener("click", function(e){

                               var targetData = e.target.childNodes[1].textContent;
                               var currentNewCommunity = e.target;
                              // alert(targetData);

                               xhr.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200)
                                 {

                                    partsData.innerHTML = xhr.responseText;
                                    wartTraitment(0,acceptedTotal,total,"totalNewRequest/new_communitiesAccepted",currentNewCommunity,"new_communityTraitment");
                                    wartTraitment(1,refusedTotal,total,"totalNewRequest/new_communitiesRefused",currentNewCommunity,"new_communityTraitment");
                                    //wartTraitment(2,waitingTotal,total,"new_communitiesWaiting",currentAcceptCommunity);


                                 }

                               };

                               xhr.open("GET","../web/models/ajax_request/totalNewRequest/displayNew_communitiesData.php?newCommunitiesData="+targetData,true);
                               xhr.send();

                           })
                         }

                       }


                       function wartTraitment(wartCommunityIndex,increase,decrease,wart_communitiesFile,currentAcceptCommunity,selector)
                       {

                           var wartCommunity = document.querySelectorAll("."+selector);


                         wartCommunity[wartCommunityIndex].addEventListener("click", function(e){

                           e.preventDefault();
                           var target = e.target.parentNode.parentNode.childNodes[1].childNodes[9].childNodes[2].textContent;
                           var email = e.target.parentNode.parentNode.childNodes[1].childNodes[5].childNodes[2].textContent;
                           var name = e.target.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[2].textContent;
                           //alert(name);

                         xhr.onreadystatechange = function() {
                          if (this.readyState == 4 && this.status == 200) {

                              partsData.innerHTML = xhr.responseText;

                             $(function(){

                                 $(currentAcceptCommunity).toggle("explode");

                              })

                                increase++;
                                decrease.innerHTML -= 1;

                           }

                         };

                         xhr.open("GET","../web/models/ajax_request/"+wart_communitiesFile+".php?wartTraitment="+target+"&email="+email+"&name="+name,true);
                         xhr.send();


                     })

                   }


                   function searchCommunity()
                   {

                      var searchZone = document.getElementById("CommunitysearchZone");
                      var communitySearchParts = document.querySelectorAll(".communitySearchParts");
                      var subscriptionDisplay = document.getElementById("subscriptionDisplay");
                      var partsData = document.querySelector(".partsData");
                      var xhr;


                      if (window.XMLHttpRequest) {
                         // code for IE7+, Firefox, Chrome, Opera, Safari
                          xhr = new XMLHttpRequest();
                        } else {
                         // code for IE6, IE5
                           xhr = new ActiveXObject("Microsoft.XMLHTTP");
                       }


                      searchZone.addEventListener("keyup", function(){

                          var searchZoneVal = searchZone.value;
                          //alert(searchZoneVal);
                          subscriptionDisplay.innerHTML = "Searching...";
                          partsData.innerHTML = "data weergeven";

                          xhr.onreadystatechange = function() {
                           if (this.readyState == 4 && this.status == 200) {

                               subscriptionDisplay.innerHTML = xhr.responseText;
                               TotalNewRequestData();

                            }

                          };


                         for (var i = 0; i < communitySearchParts.length; i++)
                           {

                               var communitySearchPartsArr = communitySearchParts[i];

                               communitySearchPartsArr.addEventListener("focus", function(e){
                                    //alert(e.target.value);
                                    var targetVal = e.target.value;
                                    var communitySearchPartsVal = communitySearchParts.value;



                                 if(targetVal == "new")
                                 {

                                   xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {

                                        subscriptionDisplay.innerHTML = xhr.responseText;
                                        TotalNewRequestData();

                                     }

                                   };

                                   xhr.open("GET","../web/models/ajax_request/search_request/allCommunitySearch.php?data="+searchZoneVal,true);
                                   xhr.send();



                                 }else if(targetVal == "accepted")

                                 {

                                   xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {

                                        subscriptionDisplay.innerHTML = xhr.responseText;
                                        acceptedData();

                                     }

                                   };

                                   xhr.open("GET","../web/models/ajax_request/search_request/searchCommunityByType.php?targetVal=accepted_request&searchingWord="+searchZoneVal+"&divClass=accepted&requestIndex=accept_organisation",true);
                                   xhr.send();



                                 }else if(targetVal == "refused")

                                 {

                                   xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {

                                        subscriptionDisplay.innerHTML = xhr.responseText;
                                        refusedData();

                                     }

                                   };

                                   xhr.open("GET","../web/models/ajax_request/search_request/searchCommunityByType.php?targetVal=refused_request&searchingWord="+searchZoneVal+"&divClass=refused&requestIndex=refuse_organisation",true);
                                   xhr.send();



                                 }else if(targetVal == "temporary")

                                 {

                                   xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {

                                        subscriptionDisplay.innerHTML = xhr.responseText;
                                        waitingData();

                                     }

                                   };

                                   xhr.open("GET","../web/models/ajax_request/search_request/searchCommunityByType.php?targetVal=waiting_request&searchingWord="+searchZoneVal+"&divClass=waiting&requestIndex=wait_organisation",true);
                                   xhr.send();



                                 }

                               })

                           }

                           if(searchZoneVal != "")
                           {

                             xhr.open("GET","../web/models/ajax_request/search_request/allCommunitySearch.php?data="+searchZoneVal,true);
                             xhr.send();

                           }



                      })


                   }

                   searchCommunity();


                   function acceptedCommunity_pagination()
                   {

                      var subscriptionDisplay = document.getElementById("subscriptionDisplay");
                      var  paginationButton = document.querySelectorAll(".acceptedPaginationButton");
                      var xhr;

                      if (window.XMLHttpRequest) {
                         // code for IE7+, Firefox, Chrome, Opera, Safari
                          xhr = new XMLHttpRequest();
                        } else {
                         // code for IE6, IE5
                           xhr = new ActiveXObject("Microsoft.XMLHTTP");
                       }

                       for (var i = 0; i < paginationButton.length; i++) {

                         var paginationButtonArr = paginationButton[i];

                         paginationButtonArr.addEventListener("click", function(e){

                           var target = e.target.textContent;
                            //alert(target);

                           xhr.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {

                                subscriptionDisplay.innerHTML = xhr.responseText;
                                acceptedData();
                                acceptedCommunity_pagination();


                             }

                           };

                           xhr.open("GET","../web/models/ajax_request/accepted/acceptedPagination.php?target="+target,true);
                           xhr.send();

                         })

                       }

                   }


                   function refusedCommunity_pagination()
                   {

                      var subscriptionDisplay = document.getElementById("subscriptionDisplay");
                      var  paginationButton = document.querySelectorAll(".refusedPaginationButton");
                      var xhr;

                      if (window.XMLHttpRequest) {
                         // code for IE7+, Firefox, Chrome, Opera, Safari
                          xhr = new XMLHttpRequest();
                        } else {
                         // code for IE6, IE5
                           xhr = new ActiveXObject("Microsoft.XMLHTTP");
                       }

                       for (var i = 0; i < paginationButton.length; i++) {

                         var paginationButtonArr = paginationButton[i];

                         paginationButtonArr.addEventListener("click", function(e){

                           var target = e.target.textContent;
                            //alert(target);

                           xhr.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {

                                subscriptionDisplay.innerHTML = xhr.responseText;
                                refusedData();
                                refusedCommunity_pagination();


                             }

                           };

                           xhr.open("GET","../web/models/ajax_request/refused/refusedPagination.php?target="+target,true);
                           xhr.send();

                         })

                       }

                   }


                   function waitingCommunity_pagination()
                   {

                     var subscriptionDisplay = document.getElementById("subscriptionDisplay");
                     var  paginationButton = document.querySelectorAll(".waitingPaginationButton");
                     var xhr;

                     if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                         xhr = new XMLHttpRequest();
                       } else {
                        // code for IE6, IE5
                          xhr = new ActiveXObject("Microsoft.XMLHTTP");
                      }

                      for (var i = 0; i < paginationButton.length; i++) {

                        var paginationButtonArr = paginationButton[i];

                        paginationButtonArr.addEventListener("click", function(e){

                          var target = e.target.textContent;
                           //alert(target);

                          xhr.onreadystatechange = function() {
                           if (this.readyState == 4 && this.status == 200) {

                               subscriptionDisplay.innerHTML = xhr.responseText;
                               waitingData();
                               waitingCommunity_pagination();


                            }

                          };

                          xhr.open("GET","../web/models/ajax_request/waitlist/waitingPagination.php?target="+target,true);
                          xhr.send();

                        })

                      }

                   }



                   function newCommunity_pagination()
                   {

                     var subscriptionDisplay = document.getElementById("subscriptionDisplay");
                     var  paginationButton = document.querySelectorAll(".newPaginationButton");
                     var xhr;

                     if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                         xhr = new XMLHttpRequest();
                       } else {
                        // code for IE6, IE5
                          xhr = new ActiveXObject("Microsoft.XMLHTTP");
                      }

                      for (var i = 0; i < paginationButton.length; i++) {

                        var paginationButtonArr = paginationButton[i];

                        paginationButtonArr.addEventListener("click", function(e){

                          var target = e.target.textContent;
                           //alert(target);

                          xhr.onreadystatechange = function() {
                           if (this.readyState == 4 && this.status == 200) {

                               subscriptionDisplay.innerHTML = xhr.responseText;
                               TotalNewRequestData();
                               newCommunity_pagination();


                            }

                          };

                          xhr.open("GET","../web/models/ajax_request/totalNewRequest/newPagination.php?target="+target,true);
                          xhr.send();

                        })

                      }

                   }



                 })

                </script>

             <?php

        }



        public function allCommunity()
        {

            $accept = $this->PDO()->query("SELECT*FROM accepted_request");
            $refuse = $this->PDO()->query("SELECT*FROM refused_request");
            $temporary = $this->PDO()->query("SELECT*FROM waiting_request");
            $new = $this->PDO()->query("SELECT*FROM subscription_request");

          /*  $accepted = $accept->fetch();


              $all_accepted = $this->prepare("INSERT INTO all_community(name, surname, email, website, telnr, organisation_name, district, cultur_art, status, date_time) VALUES(?,?,?,?,?,?,?,?,?,?)",
              array($accepted['accept_firstname'], $accepted['accept_surname'], $accepted['accept_email'], $accepted['accept_website'],$accepted['accept_telnr'], $accepted['accept_organisation'],$accepted['accept_district'], $accepted['accept_culturart'], "Goedgekeurd", $accepted['accept_add_date']));


            $refused = $refuse->fetch();


              $all_refused = $this->prepare("INSERT INTO all_community(name, surname, email, website, telnr, organisation_name, district, cultur_art, status, date_time) VALUES(?,?,?,?,?,?,?,?,?,?)",
              array($refused['refuse_firstname'], $refused['refuse_surname'], $refused['refuse_email'], $refused['refuse_website'],$refused['refuse_telnr'], $refused['refuse_organisation'],$refused['refuse_district'], $refused['refuse_culturart'], "Geweigerd", $refused['refuse_add_date']));

*/

            $temporarie = $temporary->fetch();


              $all_temporary = $this->prepare("INSERT INTO all_community(name, surname, email, website, telnr, organisation_name, district, cultur_art, status, date_time) VALUES(?,?,?,?,?,?,?,?,?,?)",
              array($temporarie['wait_firstname'], $temporarie['wait_surname'], $temporarie['wait_email'], $temporarie['wait_website'],$temporarie['wait_telnr'], $temporarie['wait_organisation'],$temporarie['wait_district'], $temporarie['wait_culturart'], "Tijdelijk Inactief Gezet", $temporarie['wait_add_date']));



          /*  $newSub = $new->fetch();


              $all_new = $this->prepare("INSERT INTO all_community(name, surname, email, website, telnr, organisation_name, district, cultur_art, status, date_time) VALUES(?,?,?,?,?,?,?,?,?,?)",
              array($newSub['request_firstname'], $newSub['request_surname'], $newSub['request_email'], $newSub['request_website'],$newSub['request_telnr'], $newSub['request_community'],$newSub['request_district'], $newSub['request_artCultur'], "New vereniging", $newSub['subscription_time']));

*/
        }


  }
