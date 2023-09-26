// HTML 요소 참조
const timerElement = document.getElementById('timer');

let timerInterval; // 카운트다운을 저장할 변수

function startTimer() {
    let count = 60; // 시작 숫자 (60부터 시작)

    timerInterval = setInterval(function () {
        if (count <= 0) {
            clearInterval(timerInterval); // 카운트다운 종료
            count = 60; // 다시 60으로 초기화
            timerElement.textContent = 'XX';

        } else {
            timerElement.textContent = count;
            count--;
        }
    }, 1000); // 1초마다 업데이트
}


// 페이지 로드 시 자동으로 카운트다운 시작
document.addEventListener('DOMContentLoaded', startTimer);