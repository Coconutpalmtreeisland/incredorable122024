<?php
include "../connect/connect.php"; // 데이터베이스 연결 설정 등을 포함한 파일

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchKeyword = $_POST['keyword'];

    // 여기에서 $searchKeyword를 사용하여 데이터베이스에서 검색을 수행하고 결과를 가져옵니다.
    // 예시로, sexyBoard 테이블에서 검색어를 이용하여 게시물을 검색하는 쿼리를 작성합니다.
    $searchSql = "SELECT * FROM sexyBoard WHERE boardDelete = 1 AND (boardTitle LIKE '%$searchKeyword%' OR boardContents LIKE '%$searchKeyword%') ORDER BY boardId DESC";
    $searchResult = $connect->query($searchSql);

    if ($searchResult->num_rows > 0) {
        while ($row = $searchResult->fetch_assoc()) {
            echo "<div>
                    <h3>" . $row['boardTitle'] . "</h3>
                    <p>" . $row['boardContents'] . "</p>
                  </div>";
        }
    } else {
        echo "검색 결과가 없습니다.";
    }
}
?>