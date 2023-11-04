$(function(){
    // 네비게이션
    $(".nav > ul > li").mouseover(function () {
        $(this).find(".submenu").stop().slideDown(200);
    });

    $(".nav > ul > li").mouseout(function () {
        $(this).find(".submenu").stop().slideUp(200);
    });

    // currnentIndex = 0; // 첫번째 이미지 : 0
    // currnentIndex = 1; // 두번째 이미지 : -389
    // currnentIndex = 2; // 세번째 이미지 : -778

    // 이미지 슬라이드(상하)
    // let currnentIndex = 0; // 첫번째 이미지

    // setInterval(function(){
    //     if(currnentIndex < 2) {
    //         currnentIndex++;
    //     } else {
    //         currnentIndex = 0;
    //     }
    //     let slidePosition = currnentIndex * (-389) + "px";
    //     $(".slideList").animate({top: slidePosition}, 400);
    // }, 3000);


    // 이미지 슬라이드(좌우)
    let currnentIndex = 0;

    setInterval(function(){
        if(currnentIndex < 2){
            currnentIndex++;
        } else {
            currnentIndex = 0;
        }

        let slidePosition = currnentIndex * (-1000) + "px";
        $(".slideList").animate({left: slidePosition}, 400);
    }, 3000);

    // 탭 메뉴
    let tabBtn = $(".tab-btn > ul > li");
    let tabCont = $(".tab-cont > div");

    tabCont.hide().eq(0).show();
    tabBtn.click(function(e){
        e.preventDefault();
        let target = $(this);
        let index = target.index();
        tabBtn.removeClass("active");
        target.addClass("active");
        tabCont.css("display", "none");
        tabCont.eq(index).css("display", "block");
    });

    // 레이어 팝업
    $("#content1 .right").click(function(){
        $(".layer").slideDown(300);
        $(".layer_bg").show();
    });
    $(".layer .close").click(function(){
        $(".layer").slideUp(300);
        $(".layer_bg").hide();
    });
})