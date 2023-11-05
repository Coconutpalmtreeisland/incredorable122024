$(function(){
    // 세로 메뉴
    $(".nav > ul > li").hover(
        function(){
            $(this).find(".submenu").stop().slideDown();
    }, function(){
        $(this).find(".submenu").stop().slideUp();
    });

    // slideList > slideImg (1) eq(0)
    // slideList > slideImg (2) eq(1)
    // slideList > slideImg (3) eq(2)

    // 이미지 슬라이드
    $(".slideList").children("div:gt(0)").hide();

    let currentIndex = 0;

    setInterval(function(){
        let next = (currentIndex + 1) % 3
        
        $(".slideList").find("div").eq(currentIndex).fadeOut();
        $(".slideList").find("div").eq(next).fadeIn();

        currentIndex = next;
    }, 3000);
});