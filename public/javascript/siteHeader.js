window.addEventListener("load", function(){


   var location = document.getElementById("location");

   location.addEventListener("mouseover", function(){

      location.style.overflow = "visible";

   })


   window.addEventListener("click", function(){

      location.style.overflow = "hidden";

   })


   var searchOnSite = document.getElementById("searchOnSite");
   var searchIcon = document.getElementById("searchIcon");


   searchIcon.addEventListener("click", function(){

      $(function(){

        $(searchOnSite).animate({

            marginBottom: 0,
            bottom: 0,

        },{

           duration: 100,
           easing: "linear",

        })

      })

   })


   closeSearchField.addEventListener("click", function(){

      $(function(){

        $(searchOnSite).animate({

            marginBottom: -65,
            bottom: 70,

        },{

           duration: 100,
           easing: "linear",

        })

      })

   })

})
