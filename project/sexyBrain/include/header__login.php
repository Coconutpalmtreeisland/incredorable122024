<header id="header">
    <nav class="header__nav1">
        <ul>
            <li><a href="../quiz/quizHome.php" class="a_mobile">문제</a></li>
            <li><a href="../board/board.php" class="a_mobile">커뮤니티</a></li>
            <li><a href="#" class="a_mobile">마이페이지</a></li>
        </ul>
    </nav>
    <div class="header__logo1">
        <a href="../main/main.php"><img src="../assets/img/logo.png" alt="뇌섹남녀" href></a>
    </div>
    <div class="header__right">
        <?php if (isset($_SESSION['memberId'])) { ?>
            <!-- <input type="search" class="search" name="allSearchValue" autocomplete="off" role="combobox" placeholder="검색"
                aria-live="polite"> -->
            <!-- <ul> -->
                <div>
                    <a href="#" class="youname">
                        <?= $_SESSION['youName'] ?>님 환영합니다.
                    </a>
                </div>
                <div class="logout"><a href="../login/logout.php">로그아웃</a></div>
                <!-- <li><a href="#"><a class="propile" href="#">뇌섹</a></a></li> -->
            <!-- </ul> -->
        <?php } else { ?>
            <ul class="header__loginNav">
                <li class="header__login mobile"><a href="../login/login.php">로그인</a></li>
                <li class="header__join"><a href="../join/joinInsert.php">회원가입</a></li>
            </ul>
        <?php } ?>
    </div>
</header>