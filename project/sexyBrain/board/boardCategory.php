<aside class="board__filter">
    <div class="filter__head">말머리</div>
    <div class="filter__type">
        <div class="type__check">
        <label for="filter-toggle1" class="checkbox">
            <input type="checkbox" id="filter-toggle1" onClick="handleCheckboxClick('filter-toggle1', 'link-toggle1')">
            <span class="on"></span>
            <div id="link-toggle1" href="boardCate.php" class="fillter__toggle">전체</div>
        </label>
        <label for="filter-toggle2" class="checkbox">
            <input type="checkbox" id="filter-toggle2" onClick="handleCheckboxClick('filter-toggle2', 'link-toggle2')">
            <span class="on"></span>
            <div id="link-toggle2" href="boardCate.php?category=공지" class="fillter__toggle">공지</div>
            </label>
        <label for="filter-toggle3" class="checkbox">
            <input type="checkbox" id="filter-toggle3" onClick="handleCheckboxClick('filter-toggle3', 'link-toggle3')">
            <span class="on"></span>
            <div id="link-toggle3" href="boardCate.php?category=질문" class="fillter__toggle">질문</div>
            </label>
            <label for="filter-toggle4" class="checkbox">
            <input type="checkbox" id="filter-toggle4" onClick="handleCheckboxClick('filter-toggle4', 'link-toggle4')">
            <span class="on"></span>
            <div id="link-toggle4" href="boardCate.php?category=자유" class="fillter__toggle">자유</div>
            </label>
        </div>
    </div>
    <button class="filter__button" onclick="filterByCategory()">검색</button>
</aside>
<!-- //board__filter -->

<!-- <script>
    function handleCheckboxClick(checkboxId, linkId) {
        const checkbox = document.getElementById(checkboxId);
        const link = document.getElementById(linkId);

        // 체크박스 상태에 따라 링크의 href 속성을 조작
        if (checkbox.checked) {
            const category = link.getAttribute('href').split('=')[1]; // 선택한 카테고리 추출
            const currentHref = window.location.href; // 현재 URL
            const newHref = currentHref.split('?')[0] + `?category=${category}`; // 카테고리를 쿼리 매개변수로 추가
            link.setAttribute('href', newHref);
        } else {
            // 체크박스가 해제된 경우, 링크를 원래의 페이지로 설정
            link.setAttribute('href', link.getAttribute('href').split('?')[0]);
        }
    }

    function filterByCategory() {
        const categorySelect = document.getElementById('filter-select');
        const selectedCategory = categorySelect.value;

        if (selectedCategory === '전체') {
            // "전체" 카테고리를 선택한 경우, 모든 게시글을 표시
            window.location.href = 'boardCate.php';
        } else {
            // 선택한 카테고리에 따라 URL을 업데이트
            window.location.href = `boardCate.php?category=${selectedCategory}`;
        }
    }
</script> -->
<!-- <script>
    // 체크박스 상태에 따라 링크를 동적으로 생성하는 JavaScript 함수
    function filterByCategory() {
        var selectedCategories = [];
        var checkboxes = document.querySelectorAll('.checkbox input[type="checkbox"]');
        
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                selectedCategories.push(checkbox.getAttribute('data-category'));
            }
        });

        var categoryQueryString = selectedCategories.join(',');
        var filterLink = document.getElementById('filterLink');
        filterLink.href = 'boardCate.php?category=' + categoryQueryString;
        filterLink.click();
    }

    // 체크박스 클릭 이벤트 처리 함수
    function handleCheckboxClick(checkboxId, linkId) {
        var checkbox = document.getElementById(checkboxId);
        var link = document.getElementById(linkId);

        if (checkbox.checked) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    }
</script> -->

<!-- 필터링된 링크를 클릭하기 위한 숨겨진 링크 -->
<!-- <a id="filterLink" href="#" style="display: none;"></a> -->

