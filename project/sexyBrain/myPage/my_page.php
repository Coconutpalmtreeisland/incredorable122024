<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div id="myWrap">
    <?php include "../include/header__login.php"?>
        <!-- //#header -->

        <main id="myMain">
            <article class="profil">
                <div class="photo"></div>
                <div>
                    <div class="pofil__name">user name</div>
                    <div class="pofil__locate">안산</div>
                    <button class="btn__style4">프로필 수정</button>
                </div>
            </article>
            <nav class="profil__nav">
                <ul>
                    <li><a href="my_page.php">찜 목록</a></li>
                    <li><a href="#">목록1</a></li>
                    <li><a href="#">목록2</a></li>
                </ul>
            </nav>
            <div class="like__list__wrap">
                <div class="like__list">
                    <div class="like__first">
                        <div class="svg"></div>
                        <button class="btn__style4">문제 찜 하러 가기</button>
                    </div>
                    <div class="like"></div>
                    <div class="like"></div>
                    <div class="like"></div>
                    <div class="like"></div>
                    <div class="like"></div>
                </div>
            </div>
        </main>
        <!-- main -->

        <?php include "../include/footer.php"?>
        <!-- //footer -->
    </div>
</body>

</html>