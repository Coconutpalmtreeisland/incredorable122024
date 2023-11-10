<?php
include "../connect/connect.php";
include "../connect/session.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quizId = $_POST['quizId'];
    $memberId = $_SESSION['memberId'];

    // 이미 좋아요를 눌렀는지 확인
    $likeSql = "SELECT * FROM quizMember WHERE quizId = '$quizId' AND memberId = '$memberId'";
    $likeResult = $connect->query($likeSql);

    if ($likeResult->num_rows > 0) {
        // 취소할 때
        $cancelDeleteSql = "DELETE FROM quizMember WHERE quizId = '$quizId' AND memberId = '$memberId'";
        $connect->query($cancelDeleteSql);

        // quiz 테이블의 likes 업데이트
        $updateLikesSql = "UPDATE quiz SET likes = likes - 1 WHERE quizId = '$quizId'";
        $connect->query($updateLikesSql);

        echo 'cancel_liked';
    } else {
        // 좋아요 추가
        $insertSql = "INSERT INTO quizMember (memberId, quizId, isSolved, `like`) VALUES ('$memberId', '$quizId', 1, 1)";
        $connect->query($insertSql);

        // quiz 테이블의 likes 업데이트
        $updateLikesSql = "UPDATE quiz SET likes = likes + 1 WHERE quizId = '$quizId'";
        $connect->query($updateLikesSql);

        echo 'liked';
    }
}
?>