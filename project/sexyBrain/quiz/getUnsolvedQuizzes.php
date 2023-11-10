<?php
include "../connect/connect.php";
include "../connect/session.php";

$memberId = $_SESSION['memberId'];

$unsolvedSql = "SELECT * FROM quiz WHERE isSolved = 0 AND quizId NOT IN (SELECT quizId FROM quizMember WHERE memberId = '$memberId') ORDER BY quizId DESC";
$unsolvedResult = $connect->query($unsolvedSql);

while ($quiz = $unsolvedResult->fetch_assoc()) {
    // 안 푼 문제를 출력
    echo '<div class="c01">';
    echo '<div class="heart"><a href="#"></a></div>';
    echo '<a href="quiz.php?quizId=' . $quiz['quizId'] . '" class="go" title="콘텐츠 바로가기">문제 ' . $quiz['quizId'] . '</a>';
    echo '<img src="../portfolio/img/quiz01.jpg">';
    echo '</div>';
}