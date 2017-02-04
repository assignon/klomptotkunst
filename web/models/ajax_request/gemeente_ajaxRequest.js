window.addEventListener("load", function(){

  var searchPlaceField = document.querySelectorAll(".searchField");
  var districtField = document.querySelectorAll(".districtField");
  var placesSearchResults = document.getElementById("placesSearchResults");
  var placesSearchError = document.getElementById("placesSearchError");
  var xhr;


  function searchProvince()
  {

    if (window.XMLHttpRequest) {
       // code for IE7+, Firefox, Chrome, Opera, Safari
        xhr = new XMLHttpRequest();
      } else {
       // code for IE6, IE5
         xhr = new ActiveXObject("Microsoft.XMLHTTP");
     }

      for (var i = 0; i < searchPlaceField.length; i++) {

        var searchPlacesFieldArr = searchPlaceField[i]


        searchPlacesFieldArr.addEventListener("keyup", function(e){

            var placesInputValues = e.target.value;
            var districtsInputValues = e.target.parentNode.childNodes[1].value;

            xhr.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {

                       placesSearchResults.innerHTML = xhr.responseText;
                       //placesSearchResults.style.zIndex = "2";
                       //var target = e.target.parentNode.parentNode.offsetTop;
                      // alert(target);
                    //  placesSearchResults.style.marginTop = '-126px';

                    }

                  };

                  if(placesInputValues != "")
                  {

                    xhr.open("GET","../web/models/ajax_request/communitySearch.php?place="+placesInputValues+"&district="+districtsInputValues,true);
                    xhr.send();

                  }



        })

        searchPlacesFieldArr.addEventListener("keydown", function(e){

            var placesInputValues = e.target.value;
            var districtsInputValues = e.target.parentNode.childNodes[1].value;

            placesSearchResults.innerHTML = "Ik wacht op uw zoekopdracht in de omgeving van"+' '+districtsInputValues+"..."

         })


      }




  }


  function subscriptionRequest()
  {

       var xhr;
       var requestField = document.querySelectorAll(".requestField");
       var signHead = document.getElementById("signHead");
       var subscription = document.getElementById("subscription");

       if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
           xhr = new XMLHttpRequest();
         } else {
          // code for IE6, IE5
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }

        subscription.addEventListener("click", function(e){

           e.preventDefault();
             signHead.innerHTML = "u aanvraag wordt verstuurd...";
           var requestFieldVal0 = requestField[0].value;
           var requestFieldVal1 = requestField[1].value;
           var requestFieldVal2 = requestField[2].value;
           var requestFieldVal3 = requestField[3].value;
           var requestFieldVal4 = requestField[4].value;
           var requestFieldVal5 = requestField[5].value;
           var requestFieldVal6 = requestField[6].value;
           var requestFieldVal7 = requestField[7].value;

           xhr.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {

                      signHead.innerHTML = xhr.responseText;

                   }

                 };

               if(requestFieldVal0 != "" && requestFieldVal1 != "" && requestFieldVal2 != "" && requestFieldVal3 != "" && requestFieldVal4 != "" && requestFieldVal5 != "" && requestFieldVal6 != "" && requestFieldVal7 != "")
               {

                 xhr.open("GET","../web/models/ajax_request/subscription_request.php?surname="+requestFieldVal0+"&firstname="+requestFieldVal1+"&tel="+requestFieldVal2+"&email="+requestFieldVal3+"&organisation="+requestFieldVal4+"&website="+requestFieldVal5+"&artCultur="+requestFieldVal6+"&province="+requestFieldVal7,true);
                 xhr.send();


               }else{

                 signHead.innerHTML = "Vul Alles In";

               }





        })


  }


  searchProvince();
  subscriptionRequest();




})
