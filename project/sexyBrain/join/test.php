<?php
include "../connect/connect.php";
include "../connect/session.php";

// 폼에서 POST로 전달된 데이터 받기
$youName = mysqli_real_escape_string($connect, $_POST['youName']);
$youEmail = mysqli_real_escape_string($connect, $_POST['youEmail']);

// SQL 쿼리 생성
$sql = "SELECT youId FROM sexyMembers WHERE youName = '$youName' AND youEmail = '$youEmail';";
$result = $connect -> query($sql);

$count = $result -> num_rows;

$findId = $result -> fetch_array(MYSQLI_ASSOC);

echo $findId['youId'];
$ID = $findId['youId'];
$_SESSION[]


// if ($result) {
//     // SQL 쿼리 실행 성공
//     if (mysqli_num_rows($result) > 0) {
//         // 일치하는 회원이 있는 경우
//         $row = mysqli_fetch_assoc($result);
//         $youId = $row['youId'];
//         // 아이디 찾은 후의 동작을 수행하거나 메시지를 표시할 수 있습니다.
//     } else {
        
//     }
// } else {
//     // SQL 오류 처리
//     echo "SQL 오류: " . mysqli_error($connect);
// }

// 데이터베이스 연결 닫기
// mysqli_close($connect);
?>