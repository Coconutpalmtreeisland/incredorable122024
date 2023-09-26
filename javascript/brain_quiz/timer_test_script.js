const countdownElement = document.getElementById('countdown');
const startButton = document.getElementById('startButton');
const resetButton = document.getElementById('resetButton');

let countdownInterval; // 카운트다운을 저장할 변수
let count = 10; // 시작 숫자 (0까지 카운트다운)

function startCountdown() {
    countdownInterval = setInterval(function () {
        if (count <= 0) {
            clearInterval(countdownInterval); // 카운트다운 종료
            count = 10; // 다시 10으로 초기화
            countdownElement.textContent = count;
            startButton.textContent = "Start Countdown"; // 버튼 레이블 변경
        } else {
            countdownElement.textContent = count;
            count--;
            startButton.textContent = "Pause"; // 카운트다운 중에는 "Pause"로 버튼 레이블 변경
        }
    }, 1000); // 1초마다 업데이트
}

function resetCountdown() {
    clearInterval(countdownInterval); // 현재 카운트다운 종료
    count = 10; // 초기 숫자로 재설정
    countdownElement.textContent = count;
    startButton.textContent = "Start Countdown"; // 버튼 레이블 변경
}

startButton.addEventListener('DOMContentLoaded', function () {
    if (startButton.textContent === "Start Countdown") {
        startCountdown();
    } else {
        clearInterval(countdownInterval); // 카운트다운 일시 중지
        startButton.textContent = "Resume"; // 버튼 레이블 변경
    }
});

// 페이지 로드 시 자동으로 카운트다운 시작
document.addEventListener('DOMContentLoaded', startCountdown);