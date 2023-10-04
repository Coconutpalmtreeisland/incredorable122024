<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <?php include "../include/head.php" ?>
</head>
<body class="gray"> 
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" role="main">
        <div class="intro__inner bmStyle container">
            <div class="intro__img">
                <img srcset="../assets/img/intro02-min.jpg, ../assets/img/intro02@2x-min.jpg, ../assets/img/intro02@3x-min.jpg"  alt="소개 이미지">
            </div>
            <div class="intro__text">
                로그인을 하시면 게시글 및 댓글 작성이 가능합니다.
            </div>
        </div>
        <section class="login__inner container">
            <h2>로그인</h2>
            <p>로그인을 하시면 게시글 및 댓글 작성이 가능합니다.</p>
            <div class="join__form">
                <form action="joinSave.php" name="join" method="post">
                    <fieldset>
                        <legend class="blind">회원가입 영역</legend>
                        <div>
                            <label for="youEmail" class="required">이메일</label>
                            <input type="email" id="youEmail" name="youEmail" placeholder="이메일을 적어주세요!" class="input__style" required>
                        </div>
                            <label for="youPass" class="required">비밀번호</label>
                            <input type="password" id="youPass" name="youPass" placeholder="비밀번호를 적어주세요!" class="input__style" required>
                        </div>
                        <button type="submit" class="btn__style mt100">회원가입 완료</button>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
    <!-- //main -->
    
    <?php include "../include/footer.php" ?>
    <!-- //foter -->
</body>
</html>