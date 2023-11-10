<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body class="login__wrap">
    <main id="loginMain">
        <?php include "../include/login__aside.php"?>
        <!-- //#login__aside -->
        <div class="join_wrap">
            <div class="insert_inner">
                <div class="inner_form">
                    <form action="searchIdResult.php" class="join__form" name="joinSuccess" method="post" onsubmit="return joinChecks();">
                        <fieldset>
                            <legend>뇌섹남녀 아이디 찾기</legend>
                            <div class="form-group2 mt20">
                                <div class="position_msg">

                                <div class="position_msg">
                                    <label for="youName" class="label">이름<div class="msg" id="youNameComment"></div></label>
                                    <input type="text" id="youName" name="youName" placeholder="이름을 입력해주세요" class="input__box1">
                                </div>
                                <p class="msg" id="youNameComment"></p>
                            </div>
                            <div class="position_msg">
                                <label for="youEmail" class="label required">이메일</label>
                                <div class="form-group2">
                                    <input type="email" id="youEmail" name="youEmail" placeholder="이메일을 입력해주세요" class="input__box1">
                                </div>
                                <p class="msg" id="youEmailComment"></p>
                            </div>
                            <button type="submit" id="submitBtn" class="btn__style">아이디 찾기</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
    <script>
        function joinChecks(){
            // 이름 공백 확인
            if($("#youName").val() == ''){
                $("#youNameComment").text("이름을 입력해주세요.");
                $("#youName").focus();
                return false;
            }

            // 이메일 공백 확인
            if($("#youEmail").val() == ''){
                $("#youEmailComment").text("이메일을 입력해주세요.");
                $("#youEmail").focus();
                return false;
            }
            $.ajax({
            type: "POST",
            url: "searchIdResult.php",
            data: $(".join__form").serialize(),
            success: function(response) {
                if (response.trim() !== "") {
                    if (confirm("당신의 사용자 ID는 " + response + " 입니다. 로그인 페이지로 이동하시겠습니까?")) {
                        window.location.href = "login.php"; // 확인을 누르면 login.php로 이동
                    }
                } else {
                    alert("사용자 ID를 찾을 수 없습니다.");
                }
            }
        });
        return false;
        }
    </script>
</body>
</html>