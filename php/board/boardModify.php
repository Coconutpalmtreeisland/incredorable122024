<?php
    include "../connect/connect.php";
    include "../connect/session.php"; 
    include "../connect/sessionCheck.php"; 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 블로그 만들기</title>

    <?php include "../include/head.php" ?>
</head>
<body class="gray"> 
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" role="main">
        <div class="intro__inner bmStyle container">
            <div class="intro__img small">
                <img srcset="../assets/img/intro03-min.jpg, ../assets/img/intro03@2x-min.jpg, ../assets/img/intro03@3x-min.jpg"  alt="소개 이미지">
            </div>
            <div class="intro__text">
                <h2>게시글 수정하기</h2>
                <p>
                    웹디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.<br>
                </p>
            </div>
        </div>
        <section class="board__inner container">
            <div class="board__write">
                <form action="boardModifySave.php" name="boardModifySave" method="post">
                    <fieldset>
                        <legend class="blind">게시글 수정하기</legend>
<?php
    // 게시글 내용 가져오기
    $boardID = $_GET['boardID'];

    $sql = "SELECT * FROM board WHERE boardID = {$boardID}";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<div><label for='boardTitle'>제목</label><input type='text' id='boardTitle' name='boardTitle' class='input__style' value='".$info['boardTitle']."'></div>";
        echo "<div><label for='boardContents'>내용</label><textarea id='boardContents' name='boardContents' rows='20' class='input__style'>".$info['boardContents']."</textarea></div>";
    }

    // 게시글 수정하기
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $boardID = $_GET['boardID'];
        $boardTitle = $_POST['boardTitle'];
        $boardContents = $_POST['boardContents'];

        $sql = "UPDATE board SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE boardID = {$boardID}";
        $result = $connect->query($sql);

        if ($result) {
            echo "<script>alert('수정되었습니다.');</script>";
            echo "<script>location.href = 'board.php';</script>";
            exit;
        } else {
            echo "<script>alert('수정에 실패했습니다.');</script>";
        }
    }
?>
                        
                        <!-- <div>
                            <label for="boardTitle">제목</label>
                            <input type="text" id="boardTitle" name="boardTitle" class="input__style">
                        </div>
                        <div>
                            <label for="boardContents">내용</label>
                            <textarea name="boardContents" id="boardContents" rows="20" class="input__style"></textarea>
                        </div>
                         -->
                        <!-- <div class="mt50">
                            <label for="boardPass">비밀번호</label>
                            <input type="password" id="boardPass" class="input__style" autocomplete="off" placeholder="글을 수정하려면 로그인 비밀번호를 입력하셔야 합니다." required>
                        </div> 수정하기 버튼 눌러서 수정이 제대로 됐는지 확인한 후 비밀번호 입력해야 수정되도록 하기-->
                        <div class="board__btns">
                            <button type="submit" class="btn__style3">수정하기</button>
                        </div>
                    </fieldset>
                </form>
            </div>      
        </section>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
       <!-- //foter -->
</body>
</html>