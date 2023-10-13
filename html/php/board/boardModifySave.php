<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $memberID = $_SESSION['memberID'];
    $boardID = $_POST['boardID'];
    $boardPass = $_POST['boardPass'];

    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    $boardPass = $connect -> real_escape_string($boardPass);
    
    // echo $boardID, $boardTitle, $boardContents, $memberID, $boardPass;

    $sql = "SELECT * FROM members WHERE memberID = ${memberID}";
    $result = $connect->query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        if($info['memberID'] === $memberID && $info['youPass'] === $boardPass){
            // 수정
            $sql = "UPDATE board SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE boardID = '{$boardID}'";
            $connect->query($sql);
            echo "<script>alert('게시글이 수정되었습니다.'); window.location.href = 'boardView.php?boardID=$boardID';</script>";

        } else {
            echo "<script>alert('비밀번호가 틀렸습니다. 다시 한번 확인해주세요!');</script>";
            echo "<script>window.history.back()</script>";
        }
    } else {
        echo "<script>alert('관리자에게 문의하세요!');</script>";
    }

    // 비밀번호 검사
    /* $sql = "SELECT * FROM board WHERE boardID='$boardID' AND memberID = $memberID";
    $result = $connect->query($sql);

    if ($result) {
        $boardData = $result->fetch_assoc();
        $storedPassword = $boardData['boardPass'];
    }

    // 데이터베이스 업데이트
    $sql = "UPDATE board SET boardTitle = '$boardTitle', boardContents = '$boardContents' WHERE boardID='$boardID' AND memberID = $memberID";
    $result = $connect -> query($sql);

    if ($result) {
        // 업데이트가 성공
        echo "<script>alert('게시글이 성공적으로 수정되었습니다.'); window.location.href = 'boardView.php?boardID=$boardID';</script>";
    } else {
        // 업데이트 실패
        echo "<script>alert('게시글을 수정할 수 없습니다.');</script>";
        echo "<script>window.history.back()</script>";
    }
 */
    // $sql = "";
    // $connect -> query($sql);
?>