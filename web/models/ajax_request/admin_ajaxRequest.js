window.addEventListener("load", function() {

     var xhr;

    /* function communityData()
     {

       var subscriptionDataInput = document.querySelectorAll(".subscriptionDataInput");
       var partsData = document.querySelector(".partsData");

       if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
           xhr = new XMLHttpRequest();
         } else {
          // code for IE6, IE5
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }


         for (var i = 0; i <subscriptionDataInput.length; i++)
         {

           var subscriptionDataInputArr = subscriptionDataInput[i];
           subscriptionDataInputArr.addEventListener("click", function(e)
             {
alert();
                   e.preventDefault();

                    var subscriptionDataTarget = e.target.parentNode.parentNode.childNodes[2].textContent;

                    xhr.onreadystatechange = function() {
                     if (this.readyState == 4 && this.status == 200) {

                         partsData.innerHTML = xhr.responseText;

                      }

                    };

                    xhr.open("GET","../web/models/ajax_request/subscriptionData.php?data="+subscriptionDataTarget,true);
                    xhr.send();

               })

            }


       }*/

       //communityData();

   })
