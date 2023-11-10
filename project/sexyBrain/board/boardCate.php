<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // 총 페이지 개수
    $sql = "SELECT count(boardID) FROM sexyBoard";
    $result = $connect -> query($sql);

    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(boardID)'];

    // 체크된 카테고리들을 저장할 배열
    $selectedCategories = [];

    // 체크된 체크박스를 확인하여 배열에 추가
    if(isset($_GET['category'])) {
        $selectedCategories = explode(",", $_GET['category']);
    }

    // 선택된 카테고리들을 이용하여 쿼리 생성
    $selectedCategoriesString = implode("', '", $selectedCategories);
    $categorySql = "SELECT * FROM sexyBoard WHERE boardDelete = 1 AND boardCategory IN ('$selectedCategoriesString') ORDER BY boardId DESC";
    $categoryResult = $connect->query($categorySql);
    $categoryInfo = $categoryResult->fetch_array(MYSQLI_ASSOC);
    $categoryCount = $categoryResult->num_rows;
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 카테고리 페이지</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="wrap">
        <?php include "../include/header__login.php"?>
        <!-- //header -->

        <main>
            <div class="intro__box">
                <h2>
                    뇌섹남녀 커뮤니티에서<br>
                    다양한 이야기를 나누세요
                </h2>
                <p>공지사항과 질문 외에도 자유롭게 이야기를 나눌 수 있습니다</p>
                <a href="boardWrite.php">글쓰기</a>
            </div>
            <!-- //intro__box -->

            <section class="board__wrap container">
                <div class="board__inner">
                    <div class="card__inner column4">
                        <legend class="blind">게시판 검색</legend> 
                        <form method="post" action="search_results.php">  
                            <input type="text" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력하세요" required>
                        </form>
<?php 
    if (isset($searchResult)) {
        foreach ($searchResult as $result) { 
    ?>
<!-- 여기서 검색된 결과를 출력합니다 -->
    <?php 
        } 
    } 
?>
<?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    $viewNum = 12;
    $viewLimit = ($viewNum * $page) - $viewNum;

    $sql = "SELECT boardId, boardTitle, boardContents, boardCategory, boardAuthor, boardRegTime, boardView, boardImgFile FROM sexyBoard ORDER BY boardId DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);

    if ($result){
        $count = $result -> num_rows;

        if($count > 0){
            for($i=0; $i<$count; $i++){
                $sexyBoard = $result->fetch_array(MYSQLI_ASSOC);

                echo "<div class='card'>";
                echo "<figure class='card__img'>";
                echo "<a href='boardView.php?boardId=" . $sexyBoard['boardId'] . "'>";
                echo "<img src='../assets/board/" . $sexyBoard['boardImgFile'] . "' alt='" . $sexyBoard['boardTitle'] . "'>";
                echo "</a>";
                echo "</figure>";
                echo "<div class='card__text'>";
                echo "<h3>";
                echo "<p>" . $sexyBoard['boardCategory'] . "</p>";
                echo "<div>";
                echo "<p>" . $sexyBoard['boardAuthor'] . "</p>";
                echo "<p>" . $sexyBoard['boardView'] . "</p>";
                echo "</div>";
                echo "</h3>";
                echo "<h4>";
                echo "<a href='boardView.php?boardId=" . $sexyBoard['boardId'] . "'>";
                echo $sexyBoard['boardTitle'];
                echo "</a>";
                echo "</h4>";
                echo "<div class='card__desc'>";
                echo substr($sexyBoard['boardContents'], 0, 100);
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div class='card__text'><h3>게시글이 없습니다. 작성해주세요</h3></div>";
        }
    } else {
        echo "관리자에게 문의해주세요!";
    }
?>
                        <!-- //card -->
                    </div>
                    <!-- //card__inner -->
    
                    <div class="board__pages">
                        <ul>
<?php
    $boardTotalCount = ceil($boardTotalCount/$viewNum);
    // 1 2 3 4 [5] 6 7 8 9 10
    $pageView = 5;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    // 처음 페이지 초기화 / 마지막 페이지 초기화
    if($startPage < 1) $startPage = 1;
    if($endPage >= $boardTotalCount) $endPage = $boardTotalCount;

    // 이전
    if($page != 1){
        $prevPage = $page -1;
        echo "<li class='prev'><a href='search_results.php?page={$prevPage}'><</a></li>";
    }

    // 현재 페이지 표시하기
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";

        echo "<li class='{$active}'><a href='search_results.php?page={$i}'>${i}</a></li>";
    }

    // 다음
    if($page != $boardTotalCount){
        $nextPage = $page +1;
        echo "<li class='next'><a href='search_results.php?page={$nextPage}'>></a></li>";
    }
?>
                        </ul>
                    </div>
                    <!-- //board__pages -->
                </div>
                <!-- //board__inner -->

                <?php include "../board/boardCategory.php" ?>
                <!-- //board__filter -->

            </section>
            <!-- //board__wrap -->
        </main>
        <!-- //main -->

        <?php include "../include/footer.php"?>
        <!-- //footer -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#searchKeyword").on('keypress', function(e) {
            if (e.which === 13) {
                let keyword = $(this).val();
                $.ajax({
                    url: 'search.php', // 검색을 처리하는 PHP 파일의 경로
                    type: 'POST',
                    data: { keyword: keyword },
                    success: function(response) {
                        $('.board__inner').html(response);
                    }
                });
            }
        });
    });
</script>
</body>
</html>