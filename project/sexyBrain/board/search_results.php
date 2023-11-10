<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // 검색된 결과를 저장할 변수
    $searchedResults = "";

    if (isset($_POST['searchKeyword'])) {
        $searchKeyword = $_POST['searchKeyword'];

        $searchSql = "SELECT * FROM sexyBoard 
                    WHERE boardDelete = 1 AND (boardTitle LIKE '%$searchKeyword%' OR boardContents LIKE '%$searchKeyword%') 
                    ORDER BY boardId DESC";

        $searchResult = $connect->query($searchSql);

        if ($searchResult->num_rows > 0) {
            while ($post = $searchResult->fetch_assoc()) {
                $searchedResults .= "<div class='card'>";
                $searchedResults .= "<figure class='card__img'>";
                $searchedResults .= "<a href='boardView.php?boardId=" . $post['boardId'] . "'>";
                $searchedResults .= "<img src='../assets/board/" . $post['boardImgFile'] . "' alt='" . $post['boardTitle'] . "'>";
                $searchedResults .= "</a>";
                $searchedResults .= "</figure>";
                $searchedResults .= "<div class='card__text'>";
                $searchedResults .= "<h3><p>" . $post['boardCategory'] . "</p><div><p>" . $post['boardAuthor'] . "</p><p>" . $post['boardView'] . "</p></div></h3>";
                $searchedResults .= "<h4><a href='boardView.php?boardId=" . $post['boardId'] . "'>" . $post['boardTitle'] . "</a></h4>";
                $searchedResults .= "<div class='card__desc'>" . substr($post['boardContents'], 0, 100) . "</div>";
                $searchedResults .= "</div></div>";
            }
        } else {
            $searchedResults = "검색 결과가 없습니다.";
        }
    }

    // 검색 결과의 총 페이지 개수
    $searchTotalSql = "SELECT count(boardID) FROM sexyBoard WHERE boardDelete = 1 AND (boardTitle LIKE '%$searchKeyword%' OR boardContents LIKE '%$searchKeyword%')";
    $searchTotalResult = $connect->query($searchTotalSql);

    $searchTotalCount = $searchTotalResult->fetch_array(MYSQLI_ASSOC);
    $searchTotalCount = $searchTotalCount['count(boardID)'];

    $boardSql = "SELECT * FROM sexyBoard WHERE boardDelete = 1 ORDER BY boardId DESC";
    $boardInfo = $connect -> query($boardSql);

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
    <title>게시판 목록</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="wrap">
        <?php include "../include/header__login.php"?>
        <!-- //#header -->

        <main>
            <div class="intro__box">
                <h2>
                    뇌섹남녀 커뮤니티에서<br>
                    다양한 이야기를 나누세요
                </h2>
                <p>공지사항과 질문 외에도 자유롭게 이야기를 나눌 수 있습니다</p>
                <a href="boardWrite.php">글쓰기</a>
            </div>
            <!-- //header -->

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
<?php echo $searchedResults; ?>
<!-- //card -->
                    </div>
                    <!-- //card__inner -->
    
                    <div class="board__pages">
                        <ul>
<?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    $viewNum = 12;

    if ($searchTotalCount > 0) {
        $viewLimit = ($viewNum * $page) - $viewNum;
        $searchTotalCount = ceil($searchTotalCount / $viewNum);
        
        // 1 2 3 4 [5] 6 7 8 9 10
        $pageView = 5;
        $startPage = $page - $pageView;
        $endPage = $page + $pageView;

        // 처음 페이지 초기화 / 마지막 페이지 초기화
        if($startPage < 1) $startPage = 1;
        if($endPage >= $searchTotalCount) $endPage = $searchTotalCount;

        // 이전
        if($page != 1){
            $prevPage = $page - 1;
            echo "<li class='prev'><a href='search_results.php?page={$prevPage}'><</a></li>";
        }

        // 현재 페이지 표시하기
        for($i = $startPage; $i <= $endPage; $i++){
            $active = "";
            if($i == $page) $active = "active";

            echo "<li class='{$active}'><a href='search_results.php?page={$i}'>${i}</a></li>";
        }

        // 다음
        if ($page != $searchTotalCount) {
            $nextPage = $page + 1;
            echo "<li class='next'><a href='search_results.php?page={$nextPage}'>></a></li>";
        }
    }
?>
                        </ul>
                    </div>
                    <!-- //board__pages -->
                </div>
                <!-- //board__inner -->

                <?php include "boardCategory.php" ?>
                <!-- //board__filter -->

            </section>
            <!-- //board__wrap -->
        </main>
        <!-- //main -->

        <?php include "../include/footer.php"?>
        <!-- //footer -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>