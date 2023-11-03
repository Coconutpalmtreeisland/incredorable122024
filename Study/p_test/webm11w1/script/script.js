$(function () {
    // 네비게이션 메뉴
    $(".nav > ul > li").mouseover(function () {
        $(this).find(".submenu").stop().slideDown(200);
    });

    $(".nav > ul > li").mouseout(function () {
        $(this).find(".submenu").stop().slideUp(200);
    });

    // 이미지 슬라이드
    let currentIndex = 0;
    setInterval(function () {
        if (currentIndex < 2) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        let sliderPosition = currentIndex * (-378) + "px";

        $(".slideList").animate({ top: sliderPosition }, 400);
    }, 3000);

    // 탭 메뉴
    let tabMenu = $(".notice");
    tabMenu.find("ul >li > ul").hide();
    tabMenu.find("ul > li.active > ul").show();

    function tabList(e) {
        e.preventDefault();
        let target = $(this);
    };

    tabMenu.find("ul > li > a").click(tabList);
});