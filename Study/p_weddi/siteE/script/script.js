$(function(){
    let currentindex = 0;
    $(".sliderWrap").append($(".slider").first().clone(true));

    setInterval(function(){
        currentindex++;
        $(".sliderWrap").animate({marginLeft: currentindex * -100 +"%"},600);

        if(currentindex == 3){
            setTimeout(function(){
                $(".sliderWrap").animate({marginLeft:0},0);
                currentindex = 0;
            }, 600);
        }
    }, 3000)

    $(".nav > ul > li").mouseover(function(){
        $(this).find(".submenu").stop().slideDown(400);
    })
    $(".nav > ul > li").mouseout(function(){
        $(this).find(".submenu").stop().slideUp(100);
    })

    $(".popup-btn").click(function(){
        $(".popup-view").show();
    })
    $(".popup-close").click(function(){
        $(".popup-view").hide();
    })
})