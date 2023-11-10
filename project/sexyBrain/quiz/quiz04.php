<?php 
  include "../connect/connect.php";
  include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문제 04</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div id="quizWrap">
        <?php include "../include/header__login.php"?>
        <!-- //header -->

        <main id="main">
            <section id="quiz_section">
                <div class="quiz_wrap">
                    <div class="quiz_q_wrap quiz_class">
                        <div class="q_question">
                            <div class="question_wrap">
                                <em>Q<i id="q_em">uiz</i></em>
                                <p>□에 들어갈 숫자는?</p>
                            </div>
                            <div class="quiz_url q_04">
                                <p>N+Q=11</p>
                                <p>H+B=14</p>
                                <p>L+T=□</p>
                            </div>
                        </div>
                    </div>
                    <form action="checkAnswer.php" method="post" class="q_answer">
                        <input type="hidden" id="quizId" name="quizId" value="<?= $quizId ?>">
                        <label for="answer">정답 : </label>
                        <input type="text" id="answer" name="answer" class="quiz__answer">
                        <input type="submit" id="submit" class="quiz__submit" value="제출">
                    </form>
                </div>
            </section>
        </main>
        <!-- //main -->

        <?php include "../include/footer.php" ?>
        <!-- //footer -->
    </div>
    <!-- //quizWrap -->

    <div id="quizModal" class="quizModal">
        <div class="quizModal-content">
            <span class="quizClose">&times;</span>
            <p id="result"></p>
            <button id="showAnswer" class="blind">정답 보기</button>
            <p id="answerText" class="blind"></p>
            <button id="showHint" class="blind">힌트</button>
            <p id="hintText" class="blind"><?= $quizInfo['hint'] ?></p>
            <button id="showRetry" class="blind">다시 풀기</button>
            <a href="quizHome.php">목록으로</a>
        </div>
    </div>
    <!-- //quizModal -->
</body>

</html>