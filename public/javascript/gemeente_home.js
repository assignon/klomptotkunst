window.addEventListener("load", function(){

      var searchPlaceField = document.querySelectorAll(".searchField");
      var districtField = document.querySelectorAll(".districtField");
      var placesSearchResults = document.getElementById("placesSearchResults");
      var placesSearchError = document.getElementById("placesSearchError");
      var xhr;






   for (var i = 0; i < searchPlaceField.length; i++)
   {

       var searchPlaceFieldArr = searchPlaceField[i];


       searchPlaceFieldArr.addEventListener("focus", function(e){

         var placeTraget = e.target.parentNode.parentNode.parentNode.childNodes[5].childNodes[3].textContent;
         //alert(e.target.parentNode.parentNode.parentNode.childNodes[5].childNodes[3].textContent);
         placesSearchError.innerHTML = "Ik wacht op uw zoekopdracht in de omgeving van"+' '+placeTraget+"...";
         //alert(placeTraget);
         var targetTop = e.target.parentNode.parentNode.parentNode.offsetTop/2;
         var targetLeft = e.target.parentNode.parentNode.parentNode.offsetLeft;
         var scrollBar = window.pageYOffset/2;

         placesSearchResults.style.display = "flex";
         placesSearchResults.style.position = "fixed";
          //alert(targetTop);
         $(function(){

            $(placesSearchResults).animate({

              top: targetTop+50,
              left: 100,


            },{

               duration: 500,
               easing: "easeInOutBack",

            })

         })

       })

   }


   var placeOnlineClose = document.querySelectorAll(".placeOnlineClose");

   for (var i = 0; i < placeOnlineClose.length; i++) {

     var placeOnlineCloseArr = placeOnlineClose[i];


     placeOnlineCloseArr.addEventListener("click", function(e){

       var targetValue = e.target.parentNode.childNodes[3];

        placesSearchResults.style.display = "none";
        placesSearchResults.style.position = "relative";

        $(placesSearchResults).animate({

           top: 0,

        },{

           duration: 500,
           easing: 'easeInOutBack',

        })

     })

   }


  


})
