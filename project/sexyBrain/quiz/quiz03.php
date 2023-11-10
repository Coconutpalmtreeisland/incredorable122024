<?php 
  include "../connect/connect.php";
  include "../connect/session.php";
?>


<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문제 03</title>
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
                                <p>다음 식에 하나의 선을 그어 참이 되도록 만들어라.
                                    (단, 등호는 바꿀 수 없다)</p>
                            </div>
                            <div class="quiz_url">19 - 18 = 18</div>
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

        <?php include "../include/footer.php"?>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        function loadContent(category, event) {
            event.preventDefault(); // 기본 이벤트 중지

            $.ajax({
                url: 'getContents.php',
                type: 'GET',
                data: { category: category },
                success: function(data) {
                    $('#dynamicContent').html(data); // 서버에서 반환된 내용으로 div 업데이트
                    console.log(data); // success 콜백 함수 내에서 data 사용
                },
                error: function(xhr, status, error) {
                    console.error(error); // 에러 처리
                }
            });
        }
    </script>
</body>

</html>