<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    echo "<pre>";
    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 블로그 만들기</title>

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="gray"> 
    <div id="skip">
    <a href="#header">헤더 영역 바로가기</a>
    <a href="#main">콘텐츠 영역 바로가기</a>
    <a href="#footer">푸터 영역 바로가기</a>
</div>
<!-- //skip -->

    <header id="header" role="banner">
    <div class="header__inner container">
        <div class="left">
            <a href="../index.html">
                <span class="blind">메인으로</span>
            </a>
        </div>
        <div class="logo">
            <a href="../main/main.php">Developer Blog</a>
        </div>
        <div class="right">
                <ul>
                    <li><a href="../join/join.php">회원가입</a></li>
                </ul>
                    </div>
    </div>
    <nav class="nav__inner">
        <ul>
            <li><a href="../join/join.php">회원가입</a></li>
            <li><a href="../login/login.php">로그인</a></li>
            <li><a href="../board/borar.php">게시판</a></li>
            <li><a href="../blog/blog.php">블로그</a></li>
        </ul>
    </nav>
</header>
<!-- //header -->

    <main id="main" role="main">
        <div class="intro__inner bmStyle container">
        <div class="intro__img small">
            <img srcset="../assets/img/intro03-min.jpg, ../assets/img/intro03@2x-min.jpg, ../assets/img/intro03@3x-min.jpg"  alt="소개 이미지">
            </div>
            <div class="intro__text">
                <h2>게시판</h2>
                <p>
                    웹디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.<br>
                    관련된 문의사항은 여기서 확인하세요!
                </p>
            </div>
        </div>
        <section class="board__inner container">
            <div class="board__table">
                <table>
                    <colgroup>
                        <col style="width: 5%;">
                        <col style="width: 63%;">
                        <col style="width: 10%;">
                        <col style="width: 15%;">
                        <col style="width: 7%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>등록자</th>
                            <th>등록일</th>
                            <th>조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="boardView.html">게시판 제목</a></td>
                            <td>웹쓰</td>
                            <td>2023-04-04</td>
                            <td>100</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <!-- //main -->

    <footer id="footer" role="contentinfo">
    <div class="footer__inner container btStyle">
        <div>Copyright 2023 incredroable</div>
        <div>blog by coconutpalmtreeisland</div>
    </div>
</footer>
<!-- //foter -->

</body>
</html>