<?php
include "../connect/connect.php";
include "../connect/session.php";

// 폼에서 POST로 전달된 데이터 받기
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $youName = mysqli_real_escape_string($connect, $_POST['youName']);
    $youEmail = mysqli_real_escape_string($connect, $_POST['youEmail']);

    $sql = "SELECT youId FROM sexyMembers WHERE youName = '$youName' AND youEmail = '$youEmail';";
    $result = $connect->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['youId']; //
        } else {
            echo ""; // 일치하는 정보가 없을 때 빈 문자열 반환
        }
    } else {
        echo ""; // 쿼리 실행 오류 시 빈 문자열 반환
    }
} else {
    echo ""; // POST 요청이 아닐 때 빈 문자열 반환
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>아이디 찾기</title>

  <link rel="stylesheet" href="../assets/css/cube.css">
</head>
<body>
  <div class="success__box">
    <a href="#" class="logo"></a>
      <!-- <p><?=$youName?>님의 아이디는<?=$findId['youId']?> 입니다.</p> -->
      <p><?=$text?></p>
      <a href="login.php" class="go__login btn__style2">로그인</a>
  </div>
  <!-- <input type="checkbox" id="shadows" checked /><label for="shadows">Soft shadows</label> -->
<div class="cubes">
  <!--   row, column, z -->
  <div class="cube" data-cube="111">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-z" data-cube="112"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="121">
    <div class="cube-wrap">
      <div class="cube-top">
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="131">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-z" data-cube="132"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="211">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="111"></div>
        <div class="shadow-y" data-cube="111"></div>
        <div class="shadow-z" data-cube="212"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="221">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="121"></div>
        <div class="shadow-y" data-cube="121"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="231">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="131"></div>
        <div class="shadow-y" data-cube="131"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="311">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="211"></div>
        <div class="shadow-y" data-cube="211"></div>
        <div class="shadow-z" data-cube="312"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="321">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="221"></div>
        <div class="shadow-y" data-cube="221"></div>
        <div class="shadow-z" data-cube="322"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="331">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="231"></div>
        <div class="shadow-y" data-cube="231"></div>
        <div class="shadow-z" data-cube="332"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>

  <!-- top layer -->
  <div class="cube" data-cube="112">
    <div class="cube-wrap">
      <div class="cube-top">

      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="122">
    <div class="cube-wrap">
      <div class="cube-top">
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="132">
    <div class="cube-wrap">
      <div class="cube-top">
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="212">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="112"></div>
        <div class="shadow-y" data-cube="112"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="222">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="122"></div>
        <div class="shadow-y" data-cube="122"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="232">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="132"></div>
        <div class="shadow-y" data-cube="132"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="312">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="212"></div>
        <div class="shadow-y" data-cube="212"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="322">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="222"></div>
        <div class="shadow-y" data-cube="222"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="332">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="232"></div>
        <div class="shadow-y" data-cube="232"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>

  <!-- bottom layer -->
  <div class="cube" data-cube="113">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-z" data-cube="111"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="123">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-z" data-cube="121"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="133">
    <div class="cube-wrap">
      <div class="cube-top">
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="213">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="113"></div>
        <div class="shadow-y" data-cube="113"></div>
        <div class="shadow-z" data-cube="211"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="223">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-y" data-cube="123"></div>
        <div class="shadow-z" data-cube="221"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="233">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-y" data-cube="133"></div>
        <div class="shadow-z" data-cube="231"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="313">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="213"></div>
        <div class="shadow-y" data-cube="213"></div>
        <div class="shadow-z" data-cube="311"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="323">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="223"></div>
        <div class="shadow-y" data-cube="223"></div>
        <div class="shadow-z" data-cube="321"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  <div class="cube" data-cube="333">
    <div class="cube-wrap">
      <div class="cube-top">
        <div class="shadow-flip" data-cube="233"></div>
        <div class="shadow-y" data-cube="233"></div>
        <div class="shadow-z" data-cube="331"></div>
      </div>
      <div class="cube-bottom"></div>
      <div class="cube-front-left"></div>
      <div class="cube-front-right"></div>
      <div class="cube-back-left"></div>
      <div class="cube-back-right"></div>
    </div>
  </div>
  
  <div class="large-shadows">
    <div class="large-shadow" data-cube="113"></div>
    <div class="large-shadow" data-cube="123"></div>
    <div class="large-shadow" data-cube="133"></div>
    <div class="large-shadow" data-cube="213"></div>
    <div class="large-shadow" data-cube="223"></div>
    <div class="large-shadow" data-cube="233"></div>
    <div class="large-shadow" data-cube="313"></div>
    <div class="large-shadow" data-cube="323"></div>
    <div class="large-shadow" data-cube="333"></div>
  </div>
</div>

</body>
</html>