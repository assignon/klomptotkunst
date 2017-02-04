window.addEventListener("load", function(){


    var parameters = document.querySelectorAll(".params");
    var background = document.getElementById("background");
    var avatar = document.getElementById("avatarImg");
    var close = document.querySelectorAll(".close");
    var inputs = document.querySelectorAll(".logInput");


    parameters[0].addEventListener("click", function(e){

        var target = e.target.offsetTop;

        $(function(){


            $(background).animate({

                bottom: target-100,
                right: 150,

            },{

                duration: 1000,
                easing: "easeOutElastic",

            })


        })

    })

    close[1].addEventListener("click", function(){


        $(function(){


            $(avatar).animate({

                bottom: 0,
                right: 0,

            },{

                duration: 700,
                easing: "easeOutElastic",

            })


        })

    })


    parameters[1].addEventListener("click", function(e){

        var target = e.target.offsetTop;

        $(function(){


            $(avatar).animate({

                bottom: target-100,
                right: 200,

            },{

                duration: 1000,
                easing: "easeOutElastic",

            })


        })

    })

    close[0].addEventListener("click", function(){


        $(function(){


            $(background).animate({

                bottom: 0,
                right: 0,

            },{

                duration: 700,
                easing: "easeOutElastic",

            })


        })

    })



    inputs[0].addEventListener("focus", function(){
        inputs[0].style.borderBottom = "3px solid #FFCE00";
    })

    inputs[0].addEventListener("blur", function(){

       inputs[0].style.borderBottom = "3px solid #00A0E2";

    })


})
