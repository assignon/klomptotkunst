window.addEventListener("load", function(){

    function searchOnSite()
    {

      var searchingField = document.getElementById("searching");
      var  searchDistritContainer = document.getElementById("searchDistric_community");
      var searchResult = document.getElementById("searchResult");
      var xhr;
      var comment = document.getElementById("comment");

      if (window.XMLHttpRequest) {
         // code for IE7+, Firefox, Chrome, Opera, Safari
          xhr = new XMLHttpRequest();
        } else {
         // code for IE6, IE5
           xhr = new ActiveXObject("Microsoft.XMLHTTP");
       }


       searchingField.addEventListener("submit", function(e){e.preventDefault();})

      searchingField.addEventListener("keyup", function(e){

         var targetVal = e.target.value;
         var searchLegenda = document.getElementById("searchLegenda");
         searchLegenda.innerHTML = "Ik wacht op u zoekopdracht...";

         xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    searchResult.innerHTML = xhr.responseText;
                    townData();
                    //communityData();

                 }

               };

               if(targetVal != "")
               {

                 xhr.open("GET","../web/models/ajax_request/search_request/siteSearch_response.php?value="+targetVal,true);
                 xhr.send();

               }else {

                  searchResult.innerHTML = "";

               }

      })
    }

    searchOnSite();


    function townData()
    {

        var towns = document.querySelectorAll(".townsImg");
        var searchLegenda = document.getElementById("searchLegenda");
        var xhr;

        if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
            xhr = new XMLHttpRequest();
          } else {
           // code for IE6, IE5
             xhr = new ActiveXObject("Microsoft.XMLHTTP");
         }

        for (var i = 0; i < towns.length; i++) {

            var townsArr = towns[i];

            townsArr.addEventListener("click", function(e){

                 var targetMouseover = e.target.parentNode.childNodes[3].textContent;
                //alert(targetMouseover);

                xhr.onreadystatechange = function() {
                       if (this.readyState == 4 && this.status == 200) {

                           searchLegenda.innerHTML = xhr.responseText;


                        }

                      };

                      xhr.open("GET","../web/models/ajax_request/search_request/numberCommunities.php?townName="+targetMouseover,true);
                      xhr.send();


            })


            townsArr.addEventListener("dblclick", function(e){

              var targetMouseclick = e.target.parentNode.childNodes[3].textContent;
             //alert(target);

             xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        searchLegenda.innerHTML = xhr.responseText;


                     }

                   };

                   xhr.open("GET","../web/models/ajax_request/search_request/displayNumberCommunities.php?townName="+targetMouseclick,true);
                   xhr.send();

            })

        }

    }


    function communityData()
    {

        var communityIng = document.querySelectorAll(".communityIng");
        var searchLegenda = document.getElementById("searchLegenda");
        var xhr;

        if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
            xhr = new XMLHttpRequest();
          } else {
           // code for IE6, IE5
             xhr = new ActiveXObject("Microsoft.XMLHTTP");
         }

         for (var i = 0; i < communityIng.length; i++) {

            var communityImgArr = communityIng[i];

            communityImgArr.addEventListener("mouseover",function(e){

              var targetMouseover = e.target.parentNode.childNodes[3].textContent;
             //alert(target);

             xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        searchLegenda.innerHTML = xhr.responseText;


                     }

                   };

                   xhr.open("GET","../web/models/ajax_request/search_request/displayCommunitiesData.php?communityName="+targetMouseover,true);
                   xhr.send();

            })


          /*  communityImgArr.addEventListener("click",function(e){

              var targetMouseclick = e.target.parentNode.childNodes[3].textContent;
             //alert(target);

             xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        searchLegenda.innerHTML = xhr.responseText;


                     }

                   };

                   xhr.open("GET","../web/models/ajax_request/search_request/displayCommunitiesPage.php?communityName="+targetMouseclick,true);
                   xhr.send();

            })*/

         }



    }

})
