window.addEventListener("load", function(){

    var bannerUpdate = document.getElementById("bannerUpdate");

    var banner = document.getElementById("banner");

    var bewerken = document.querySelector(".bewerken");

    var vieuws = document.querySelector(".vieuw");

    bewerken.addEventListener("click", function(){

        $(function(){

            $(banner).animate({

                right: 1000,

            },{

                duration: 1000,
                easing: "easeInOutElastic",

            })

        })

    })


    vieuws.addEventListener("click", function(){

        $(function(){

            $(banner).animate({

                right: 0,

            },{

                duration: 1000,
                easing: "easeInOutElastic",

            })

        })

    })



    var newPlaceImg = document.getElementById("placeImg");
    var newPlace = document.getElementById("newPlace");
    var placeUpdate = document.getElementById("placeUpdate");
    var terug = document.getElementById("terug");


    newPlaceImg.addEventListener("click", function(){

        placeUpdate.backfaceVisibility = "hiden";
        placeUpdate.style.transform = "perspective(600px) rotateY(0deg)";
        placeUpdate.style.transition = "transform 1.0s linear 0s";

        newPlace.backfaceVisibility = "hiden";
        newPlace.style.transform = "perspective(600px) rotateY(-180deg)";
        newPlace.style.transition = "transform 1.0s linear 0s";

    })


     terug.addEventListener("click", function(){

        placeUpdate.style.backfaceVisibility = "hiden";
        placeUpdate.style.transform = "perspective(600px) rotateY(180deg)";
        placeUpdate.style.transition = "transform 1.0s linear 0s";

        newPlace.style.backfaceVisibility = "hiden";
        newPlace.style.transform = "perspective(600px) rotateY(0deg)";
        newPlace.style.transition = "transform 1.0s linear 0s";

    })

    var delet = document.querySelectorAll(".deletePlace");
    var deleteVieuw = document.querySelectorAll(".deleteVieuw");
    var deleteBack = document.querySelectorAll(".deleteBack");

    for (var i = 0; i < delet.length; i++) {
      var deleteArr = delet[i];

      deleteArr.addEventListener("click", function(e){


           e.target.parentNode.parentNode.parentNode.childNodes[5].style.display = "flex";

      })

    }


    for (var i = 0; i < deleteBack.length; i++) {
      var deleteBackArr = deleteBack[i];

      deleteBackArr.addEventListener("click", function(e){


           e.target.parentNode.style.display = "none";

      })

    }


    var update = document.getElementById("cultArtUpdate");
    var updateBack = document.getElementById("cultArtBack");
    var backface = document.querySelector(".backCultArt");
    var frontFace = document.querySelector(".frontCultArt");

    $(function(){

       $(update).click(function(){

          $(frontFace).animate({

             right: 1400,

          },{

            easing: "linear",
            duration: 1000,

          })


          $(update).animate({

             right: 1400,

          },{

            easing: "linear",
            duration: 1000,

          })

       })


       $(updateBack).click(function(){

          $(frontFace).animate({

             right: 0,

          },{

            easing: "easeInOutBack",
            duration: 1000,

          })


          $(update).animate({

             right: 0,

          },{

            easing: "easeInOutBack",
            duration: 1000,

          })

       })

    })

    var terug = document.querySelector(".return");
    var organisation_update = document.querySelector(".update_organisation");
    var backfaceSign = document.getElementById("backfaceSign");
    var frontfaceSign = document.getElementById("frontfaceSign");

    $(function(){

      $(organisation_update).click(function(){

         $(frontfaceSign).animate({

            right: 1400,

         },{

           easing: "easeInOutBack",
           duration: 1000,

         })


      })


      $(terug).click(function(){

         $(frontfaceSign).animate({

            right: 0,

         },{

           easing: "easeInOutBack",
           duration: 1000,

         })


      })


      $("#uploadOnlineButt").click(function(){

          $("#onlineUploadBanner").animate({

              right: 0,

          },{

            duration: 500,
            easing: "easeInOutBack",

          })

      })


      $("#onlineTerug").click(function(){

          $("#onlineUploadBanner").animate({

              right: 1005,

          },{

            duration: 500,
            easing: "easeInOutBack",

          })

      })

    })

   




  //   var aadPlace = document.getElementById("addPlace");


  /*  addPlace.addEventListener("click", function(){

      $(function(){

        var newPlaceName = $("#newPlaceName").val();

          $.ajax({

            url: "../web/models/siteHome_model.php",
            type: "post",
            async: false,
            data:
            {

              "done": 1,
              "place_name" : newPlaceName

            },

            success: function(data){



            }

          })

      })

    })*/


})
