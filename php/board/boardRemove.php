<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php"; 

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";

    $boardID = $_GET['boardID'];
    $memberID = $_SESSION['memberID'];
    
    //echo $memberID;

        // 게시글 소유자 확인
        $sql = "SELECT memberID FROM board WHERE boardID = {$boardID}";
        $result = $connect->query($sql);
    
        if ($result) {
            $info = $result->fetch_array(MYSQLI_ASSOC);
            $boardOwnerID = $info['memberID'];
    
            // 게시글 작성자만 삭제할 수 있도록 확인
            if ($memberID == $boardOwnerID) {
                $sql = "DELETE FROM board WHERE boardID = {$boardID}";
                $connect->query($sql);
                echo "<script>alert('게시글이 삭제되었습니다.');</script>";
            } else {
                echo "<script>alert('게시글 작성자만 삭제할 수 있습니다.');</script>";
            }
        } else {
            echo "<script>alert('게시글 정보를 가져올 수 없습니다.');</script>";
        }

    /* // 로그인 한 사람만 지우기
    if (isset($_SESSION['memberID'])){
        $sql = "DELETE FROM board WHERE boardID = {$boardID}";
        $connect -> query($sql);
    } else {
        echo "<script>alert('삭제 권한이 없습니다. 로그인 해주세요!');</script>";
    } */

    // 작성자만 게시글 지우기


    /* // 게시글 정보 조회
    $sql = "SELECT b.memberID FROM board b JOIN members m ON(b.memberID = m.memberID) WHERE b.boardID = {$boardID}";
    $result = $connect->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $boardAuthorID = $row['memberID'];

        // 로그인한 사용자와 게시글 작성자 아이디가 일치하면 삭제
        if (isset($_SESSION['memberID']) && $_SESSION['memberID'] == $boardAuthorID) {
            $deleteSQL = "DELETE FROM board WHERE boardID = {$boardID}";
            $connect->query($deleteSQL);
        } else {
            echo "<script>alert('삭제 권한이 없습니다.');</script>";
        }
    } */
?>
    <script>
        location.href = "board.php";
    </script>
</body>
</html>