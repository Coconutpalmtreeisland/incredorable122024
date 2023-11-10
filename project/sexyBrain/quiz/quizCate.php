<?php

include "../connect/connect.php";
include "../connect/session.php";

$quizSql = "SELECT * FROM quiz ORDER BY quizId DESC";
$quizResult = $connect->query($quizSql);

?>

<!DOCTYPE html>
<html lang="KO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>퀴즈 카테고리</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div id="quizHomeWrap">
        <?php include "../include/header__login.php"?>
        <!-- //header -->

        <div id="quizHomeMain">
            <div id="quizHomeAside">
                <?php include "quizCategory.php" ?>
            </div>

            <div id="quizHome__container">
                <div class="container-nav">
                    <h3>뇌섹 남녀</h3>
                    <div class="list">
                        <h3>풀고 싶은 문제만 모아서 보고싶다면 각 문제에 좋아요 표시를 하세요! 찜 목록에서 확인할 수 있습니다.</h3>
                        <button class="like_btn">찜 목록</button>
                    </div>
                </div>

                <div class="quizHome__contents">
                    <section>
                        <?php foreach ($quizResult as $quiz) { ?>
                            <div class="c01">
                                <div class="heart">
                                    <a href="#"></i></a>
                                </div>
                                <a href="quiz.php?quizId=<?= $quiz['quizId'] ?>" class="go" title="콘텐츠 바로가기">문제<?= $quiz['quizId'] ?></a>
                                <img src="../portfolio/img/quiz01.jpg" alt="퀴즈 01">
                            </div>
                        <?php } ?>
                    </section>
                </div>
            </div>
        </div>

        <?php include "../include/footer.php" ?>
        <!-- //footer -->
    </div>
    <!-- //quizHomeWrap -->
</body>

</html>