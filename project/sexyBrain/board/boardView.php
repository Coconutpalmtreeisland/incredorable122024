<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_SESSION['memberId'])){
        $memberId = $_SESSION['memberId'];
    } else {
        $memberId = 0;
    }

    if(isset($_GET['boardId'])){
        $boardId = $_GET['boardId'];
    } else {
        Header("Location: board.php");
    }
    $youId = $_SESSION['youId'];

    // 조회수 추가
    $updateViewSql = "UPDATE sexyBoard SET boardView = boardView +1 WHERE boardId = '$boardId'";
    $connect -> query($updateViewSql);

    // 조회수 불러오기
    $boardView = "SELECT boardView FROM sexyBoard WHERE boardId = '$boardId'";
    $boardViewResult = $connect -> query($boardView);
    $boardViewInfo = $boardViewResult -> fetch_array(MYSQLI_ASSOC);

    // 게시글 정보 가져오기
    $boardSql = "SELECT * FROM sexyBoard WHERE boardId = '$boardId'";
    $boardResult = $connect -> query($boardSql);
    $boardInfo = $boardResult -> fetch_array(MYSQLI_ASSOC);

    // 이전글 가져오기
    $preBoardSql = "SELECT * FROM sexyBoard WHERE boardId < '$boardId' ORDER BY boardId DESC LIMIT 1";
    $preBoardResult = $connect -> query($preBoardSql);
    $preBoardInfo = $preBoardResult -> fetch_array(MYSQLI_ASSOC);

    // 다음글 가져오기
    $nextBoardSql = "SELECT * FROM sexyBoard WHERE boardId > '$boardId' ORDER BY boardId ASC LIMIT 1";
    $nextBoardResult = $connect -> query($nextBoardSql);
    $nextBoardInfo = $nextBoardResult -> fetch_array(MYSQLI_ASSOC);

    // 댓글 정보 가져오기
    $commentSql = "SELECT * FROM sexyComment WHERE boardId = '$boardId' AND commentDelete = '1' ORDER BY commentId ASC";
    $commentResult = $connect -> query($commentSql);
    $commentInfo = $commentResult -> fetch_array(MYSQLI_ASSOC);

    $isAuthor = ($youId == $boardInfo['boardAuthor']);
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>뇌섹남녀 글보기</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div id="boardWrap">
        <?php include "../include/header__login.php"?>
        <!-- //#header -->

        <main id="boardMain">
            <div id="b_write_wrap">
                <div class="write_board"></div>
                <div class="view__wrap">
                    <form action="boardWriteSave.php" name="boardWriteSave" method="post" class="board_write">
                        <div class="board__view">
                            <section class="table__inner">
                                    <table>
                                        <tbody class="tby">
                                            <tr>
                                                <th>제목</th>
                                                <td><?=$boardInfo['boardTitle']?></td>
                                            </tr>
                                            <tr>
                                                <th>등록일</th>
                                                <td class="date"><?=date('Y-m-d', $boardInfo['boardRegTime'])?></td>
                                            </tr>
                                            <tr>
                                                <th>조회수</th>
                                                <td>조회수 <?=$boardViewInfo['boardView']?></td>
                                            </tr>
                                            <tr>
                                                <th>내용</th>
                                                <td class="b_contents_style" style="text-align: left; line-height: 1.6rem;">
                                                    <img  class="contImg" src="../assets/board/<?=$boardInfo['boardImgFile']?>" alt="<?=$boardInfo['boardTitle']?>">
                                                    <?=$boardInfo['boardContents']?>
                                                </td>
                                                <tr>
                                                    <th>등록자</td>
                                                    <td class="writer">작성자 <?=$boardInfo['boardAuthor']?></td>
                                                </tr>
                                            </tr>
                                            <tr>
                                                <th>게시글 이동</th>
                                                <td class="board__index">
                                                    <?php if(!empty($preBoardInfo)){?>
                                                        <a href="boardView.php?boardId=<?=$preBoardInfo['boardId']?>" class="prev">
                                                            이전 글 <?=substr($preBoardInfo['boardTitle'], 0, 20)?>...
                                                        </a>
                                                    <?php } else {?>
                                                        <span>이전 글이 없습니다.</span>
                                                    <?php }?>

                                                    <?php if(!empty($nextBoardInfo)){?>
                                                        <a href="boardView.php?boardId=<?=$nextBoardInfo['boardId']?>" class="next">
                                                            다음 글 <?=substr($nextBoardInfo['boardTitle'], 0, 20)?>...
                                                        </a>
                                                    <?php } else {?>
                                                        <span class="next">다음 글이 없습니다.</span>
                                                    <?php }?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </section>
                            <div class="board__btns">
                                <a href="board.php" class="btn__style03 m10aa">목록보기</a>
<?php if($isAuthor) { ?> 
    <a href="boardModify.php?boardId=<?= $_GET['boardId'] ?>" class="btn__style03 m10aa">수정하기</a>
    <a href="boardDelete.php?boardId=<?= $_GET['boardId'] ?>" class="btn__style03 m10aa" onclick="return confirm('정말 삭제하시겠습니까?')">삭제하기</a>
<?php } ?>
                            </div>
                        </div>
                    </form>

                    <section id="boardComment" class="board__comment">
                        <h4>댓글</h4>
                        <div class="comment">
                            <div class="comment__input">
                                <form action="boardCommentWrite.php" method="POST">
                                    <fieldset>
                                        <legend class="blind">댓글 쓰기</legend>
                                        <button type="button" id="commentWriteBtn" class="check-login">작성하기</button>
                                        <label for="commentWrite" class="blind">댓글쓰기</label>
                                        <input type="hidden" name="boardId" value="<?=$boardId?>">
                                        <input type="text" id="commentWrite" name="msg" class="commentWrite" placeholder="댓글을 작성하세요" required>
                                    </fieldset>
                                </form>
                                <div class="comment__view">
<?php
    if ($commentResult->num_rows == 0) { ?>
            <div class="comment_wrap">
                <div class="text">
                    <span>
                        <span>아무런 흔적이 없어!!</span>
                        <p>댓글이 없어! 😨 작성해라!</p>
                    </span>
                </div>
            </div>
<?php } else {
        foreach ($commentResult as $comment) { ?>
                <div class="comment_wrap">
                    <div class="text">
                        <span>
                            <span class="author"><?= $comment['commentName'] ?></span>
                            <span class="date"><?= date('Y-m-d H:i', $comment['regTime']) ?></span>
                            <a href="#" class="modify" data-comment-id="<?= $comment['commentId'] ?>">수정</a>
                            <a href="#" class="delete" data-comment-id="<?= $comment['commentId'] ?>">삭제</a>
                        </span>
                        <p><?= $comment['commentMsg'] ?></p>
                    </div>
                </div>

<?php }}?>
                            </div>
                        </div>
                    </section>
                </div>      
            </div>
        </main>
        <!-- main -->

        <?php include "../include/footer.php"?>
        <!-- //footer -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
$(document).ready(function(){
            let isLoggedIn = <?php echo isset($_SESSION['youId']) ? 'true' : 'false'; ?>;
            $('#commentWriteBtn').click(function(e){
                if (!isLoggedIn) {
                    e.preventDefault(); 
                    alert('댓글을 작성하려면 로그인해주세요.'); 
                } else if ($("#commentWrite").val().trim() == "") {
                    e.preventDefault();
                    alert("댓글을 작성해주세요!");
                    $("#commentWrite").focus();
                } else {
                    $.ajax({
                    url: "boardCommentWrite.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "boardId": <?=$boardId?>,
                        "memberId": <?=$memberId?>,
                        "msg": $("#commentWrite").val(),
                    },
                    success: function(data){
                        console.log(data);
                        location.reload();
                    },
                    error: function(request, status, error){
                        console.log("request: " + request);
                        console.log("status: " + status);
                        console.log("error: " + error);
                    }
                })
                }
            });
        });

        $(".delete").click(function(e){
            e.preventDefault();
            let commentId = $(this).data("comment-id");
            if (confirm("댓글을 삭제하시겠습니까?")) {
                $.ajax({
                    url: "boardCommentDelete.php",
                    method: "POST",
                    data: {
                        "boardId": <?=$boardId?>,
                        "commentId": commentId,
                    },
                    success: function(data){
                        location.reload();
                    },
                    error: function(request, status, error){
                        alert("댓글 삭제에 실패했습니다. 다시 시도해주세요.");
                    }
                })
            }
        });

        $(".modify").click(function(e){
            e.preventDefault();
            let commentId = $(this).data("comment-id");

            let commentMsg = $(this).closest(".text").find("p").text();
            $("#commentModifyMsg").val(commentMsg);
            
            let msg = prompt("수정하실 내용을 입력하세요.");
            if (msg) {
                console.log(msg); // 수정된 메시지 출력
                $.ajax({
                    url: "boardCommentModify.php",
                    method: "POST",
                    data: {
                        "boardId": <?=$boardId?>,
                        "commentId": commentId,
                        "msg": msg
                    },
                    success: function(data){
                        location.reload();
                    },
                    error: function(request, status, error){
                        alert("댓글 수정에 실패했습니다. 다시 시도해주세요.");
                    }
                })
            }
        });
    </script>
</body>

</html>