<?php
include "../connect/connect.php";
include "../connect/session.php";

$quizId = $_GET['quizId'];
$memberId = $_SESSION['memberId'];

// 퀴즈 정보 가져오기
$quizSql = "SELECT * FROM quiz WHERE quizId = '$quizId'";
$quizResult = $connect->query($quizSql);
$quizInfo = $quizResult->fetch_array(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>퀴즈 페이지</title>
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
                        <div class="quiz_timer">
                            <span id="timer"><span id="timeLeft">0:00</span></span>
                        </div>
                        <div class="q_question">
                            <div class="question_wrap">
                                <em>Q<i id="q_em">uiz</i></em>
                                <p><?= $quizInfo['question1'] ?></p>
                            </div>
                            <div class="img_wrap">
                            <?php
                            // question2가 있을 경우 출력
                            if (!empty($quizInfo['question2'])) {
                                echo '<div class="quiz_url">' . $quizInfo['question2'] . '</div>';
                            }

                            // question3가 있을 경우 이미지 출력
                            if (!empty($quizInfo['question3'])) {
                                echo '<img src="' . $quizInfo['question3'] . '" alt="질문 이미지">';
                            }
                            ?>
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
            <div class="btns">
                <button id="showAnswer" class="blind quiz__btn">정답 보기</button>
                <button id="showHint" class="blind quiz__btn">힌트</button>
                <button id="showRetry" class="blind quiz__btn">다시 풀기</button>
                <button id="go__list" class="quiz__btn">목록으로</button>
            </div>
            <p id="answerText" class="answerImg blind"><img src=<?= $quizInfo['descImg'] ?> alt="질문 이미지"></p>
            <p id="hintText" class="blind"><?= $quizInfo['hint'] ?></p>
            <button id="likeButton" data-quizid="<?= $quizId ?>">좋아요<em>❤</em></button>
        </div>
    </div>
    <!-- //quizModal -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#submit').click(function (e) {
                e.preventDefault();

                let quizId = $('#quizId').val();
                let answer = $('#answer').val();

                $.ajax({
                    url: 'checkAnswer.php',
                    type: 'post',
                    data: {
                        quizId: quizId,
                        answer: answer
                    },
                    success: function (response) {
                        let result = JSON.parse(response);

                        if (result.correct) {
                            $('#result').text("정답입니다!");
                        } else {
                            $('#result').text("틀렸습니다.");
                            $('#showAnswer').removeClass('blind');
                            $('#showHint').removeClass('blind');
                            $('#showRetry').removeClass('blind');
                            $('#answerText').text(result.answer);
                        }

                        $('#quizModal').css('display', 'block');
                    }
                });
            });

            $('#showAnswer').click(function () {
                $('#answerText').removeClass('blind');
                $('#hintText').addClass('blind')
            });

            $('#showHint').click(function () {
                $('#hintText').removeClass('blind');
                $('#answerText').addClass('blind');
            });

            $('#showRetry').click(function () {
                location.reload();
            });

            $('#go__list').click(function () {
                location.href = 'quizHome.php';
            });
            $('.quizClose').click(function () {
                $('#quizModal').css('display', 'none');
            });
            
            // 좋아요 버튼 클릭 이벤트 핸들러
            $(document).ready(function () {
                let likeClickCount = 0; // 초기 클릭 횟수

                $('#likeButton').click(function () {
                    likeClickCount++; // 클릭 횟수 증가

                    // 클릭 횟수가 홀수일 때는 'liked', 짝수일 때는 'cancel_liked'
                    let action = likeClickCount % 2 === 1 ? 'liked' : 'cancel_liked';

                    let quizId = $(this).data("quizid");

                    $.ajax({
                        url: 'likeQuiz.php',
                        type: 'post',
                        data: {
                            quizId: quizId,
                            action: action
                        },
                        success: function (response) {
                            if (action === 'liked') {
                                // 좋아요 버튼 스타일 설정 및 표시
                                $('#likeButton').css({
                                    'border-radius': '10px',
                                    'background-color': 'var(--primary-color)',
                                    'color': 'var(--bgc)'
                                });

                                $('#likeButton em').css({
                                    'display': 'block',
                                    'position': 'relative',
                                    'top': '2px',
                                    'margin-left': '7px'
                                });

                                if (window.innerWidth <= 550) {
                                    $('#likeButton').css({
                                        'padding': '4px 6px',
                                        'font-size': '15px',
                                        'border': '0'
                                    });
                                }
                            } else if (action === 'cancel_liked') {
                                // 취소된 경우 좋아요 버튼 스타일 및 표시 변경
                                $('#likeButton').css({
                                    'padding': '4px 16px',
                                    'border': '1px solid var(--primary-color)',
                                    'border-radius': '10px',
                                    'background': 'none',
                                    'color':' var(--primary-color)',
                                    'margin-top': '5px'
                                });

                                $('#likeButton em').css({
                                    'display': 'none',
                                });

                                if (window.innerWidth <= 550) {
                                    $('#likeButton').css({
                                        'padding': '4px 2px',
                                        'font-size': '15px',
                                        'border': '0'
                                    });
                                }
                            }
                        }
                    });
                });
            });
        
            var timeLimit = <?= $quizInfo['timeLimit'] ?>;

            // 타이머 업데이트 함수
            function updateTimer() {
                var minutes = Math.floor(timeLimit / 60);
                var seconds = timeLimit % 60;

                // 시간을 2자리 숫자로 표시
                var minutesStr = (minutes < 10) ? "0" + minutes : minutes;
                var secondsStr = (seconds < 10) ? "0" + seconds : seconds;

                // 시간 표시 업데이트
                $('#timeLeft').text(minutesStr + ":" + secondsStr);

                // 시간 감소
                timeLimit--;

                // 시간 종료 시 처리
                if (timeLimit < 0) {
                    clearInterval(timerInterval);
                    // 여기에서 시간이 종료되었을 때 실행해야 할 코드를 추가할 수 있습니다.
                    $('#result').text("시간이 종료되었습니다.");
                    $('#showAnswer').removeClass('blind');
                    $('#showHint').removeClass('blind');
                    $('#showRetry').removeClass('blind');
                    $('#answerText').text(result.answer);
                    $('#quizModal').css('display', 'block');

                }
            };

            // 타이머 업데이트 간격 (1초마다)
            var timerInterval = setInterval(updateTimer, 1000);
        });
    </script>
</body>

</html>