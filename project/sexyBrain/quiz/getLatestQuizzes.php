<?php
include "../connect/connect.php";
include "../connect/session.php";

$latestSql = "SELECT * FROM quiz WHERE isSolved = 0 ORDER BY createdTime DESC, quizId DESC";
$latestResult = $connect->query($latestSql);

while ($quiz = $latestResult->fetch_assoc()) {
    // 최신순으로 정렬된 문제를 출력
    echo '<div class="c01">';
    echo '<div class="heart"><a href="#"></a></div>';
    echo '<a href="quiz.php?quizId=' . $quiz['quizId'] . '" class="go" title="콘텐츠 바로가기">문제 ' . $quiz['quizId'] . '</a>';
    echo '<img src="../portfolio/img/quiz01.jpg">';
    echo '</div>';
}
?>