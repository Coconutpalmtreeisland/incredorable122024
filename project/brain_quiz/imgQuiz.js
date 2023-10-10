// 선택자
const quizWrap = document.querySelector(".quiz__wrap");
const quizChoices = quizWrap.querySelector(".quiz__choices");
const medalImg = document.querySelector(".medal__img");

// 문제 정보
let quizInfo = [
    {
        question: "오목눈이",
        choices: [
            { img: "assets/img/img01-1.jpg", correct: true },
            { img: "assets/img/img01-2.jpg", correct: false },
            { img: "assets/img/img01-3.jpg", correct: false },
            { img: "assets/img/img01-4.jpg", correct: false }
        ]
    },
    {
        question: "우리나라 화폐에 없는 인물",
        choices: [
            { img: "assets/img/img02-1.jpg", correct: false },
            { img: "assets/img/img02-2.jpg", correct: false },
            { img: "assets/img/img02-3.jpg", correct: false },
            { img: "assets/img/img02-4.jpg", correct: true }
        ]
    },
    {
        question: "파충류",
        choices: [
            { img: "assets/img/img03-1.jpg", correct: false },
            { img: "assets/img/img03-2.jpg", correct: true },
            { img: "assets/img/img03-3.jpg", correct: false },
            { img: "assets/img/img03-4.jpg", correct: false }
        ]
    },
    {
        question: "가장 큰 동물",
        choices: [
            { img: "assets/img/img04-1.jpg", correct: false },
            { img: "assets/img/img04-2.jpg", correct: false },
            { img: "assets/img/img04-3.jpg", correct: true },
            { img: "assets/img/img04-4.jpg", correct: false }
        ]
    },
    {
        question: "설치류 2마리",
        choices: [
            { img: "assets/img/img05-1.jpg", correct: false },
            { img: "assets/img/img05-2.jpg", correct: true },
            { img: "assets/img/img05-3.jpg", correct: true },
            { img: "assets/img/img05-4.jpg", correct: false }
        ]
    },
    {
        question: "유럽 연합에 속하지 않는 국가",
        choices: [
            { img: "assets/img/img06-1.jpg", correct: true },
            { img: "assets/img/img06-2.jpg", correct: false },
            { img: "assets/img/img06-3.jpg", correct: false },
            { img: "assets/img/img06-4.jpg", correct: false }
        ]
    },
    {
        question: "기원전 사람 2명",
        choices: [
            { img: "assets/img/img07-1.jpg", correct: false },
            { img: "assets/img/img07-2.jpg", correct: true },
            { img: "assets/img/img07-3.jpg", correct: false },
            { img: "assets/img/img07-4.jpg", correct: true }
        ]
    },
    {
        question: "빌런",
        choices: [
            { img: "assets/img/img08-1.jpg", correct: false },
            { img: "assets/img/img08-2.jpg", correct: false },
            { img: "assets/img/img08-3.jpg", correct: true },
            { img: "assets/img/img08-4.jpg", correct: false }
        ]
    },
    {
        question: "가수",
        choices: [
            { img: "assets/img/img09-1.jpg", correct: true },
            { img: "assets/img/img09-2.jpg", correct: false },
            { img: "assets/img/img09-3.jpg", correct: false },
            { img: "assets/img/img09-4.jpg", correct: false }
        ]
    },
    {
        question: "Tvn 프로그램이 아닌 것",
        choices: [
            { img: "assets/img/img10-1.jpg", correct: false },
            { img: "assets/img/img10-2.jpg", correct: false },
            { img: "assets/img/img10-3.jpg", correct: true },
            { img: "assets/img/img10-4.jpg", correct: false }
        ]
    },
    {
        question: "가장 늦게 데뷔한 그룹",
        choices: [
            { img: "assets/img/img11-1.jpg", correct: false },
            { img: "assets/img/img11-2.jpg", correct: true },
            { img: "assets/img/img11-3.jpg", correct: false },
            { img: "assets/img/img11-4.jpg", correct: false }
        ]
    },
    {
        question: "창제자를 알 수 있는 문자",
        choices: [
            { img: "assets/img/img12-1.jpg", correct: false },
            { img: "assets/img/img12-2.jpg", correct: true },
            { img: "assets/img/img12-3.jpg", correct: false },
            { img: "assets/img/img12-4.jpg", correct: false }
        ]
    },
    {
        question: "유네스코에 등재된 유산이 아닌 것",
        choices: [
            { img: "assets/img/img13-1.jpg", correct: false },
            { img: "assets/img/img13-2.jpg", correct: false },
            { img: "assets/img/img13-3.jpg", correct: false },
            { img: "assets/img/img13-4.jpg", correct: true }
        ]
    },
    {
        question: "과일",
        choices: [
            { img: "assets/img/img14-1.jpg", correct: false },
            { img: "assets/img/img14-2.jpg", correct: false },
            { img: "assets/img/img14-3.jpg", correct: false },
            { img: "assets/img/img14-4.jpg", correct: true }
        ]
    },
    {
        question: "고려시대 배경 사극",
        choices: [
            { img: "assets/img/img15-1.jpg", correct: false },
            { img: "assets/img/img15-2.jpg", correct: false },
            { img: "assets/img/img15-3.jpg", correct: false },
            { img: "assets/img/img15-4.jpg", correct: true }
        ]
    },
    {
        question: "가장 많은 언어로 번역된 책",
        choices: [
            { img: "assets/img/img16-1.jpg", correct: true },
            { img: "assets/img/img16-2.jpg", correct: false },
            { img: "assets/img/img16-3.jpg", correct: false },
            { img: "assets/img/img16-4.jpg", correct: false }
        ]
    },
    {
        question: "대한민국 1대 대통령",
        choices: [
            { img: "assets/img/img17-1.jpg", correct: true },
            { img: "assets/img/img17-2.jpg", correct: false },
            { img: "assets/img/img17-3.jpg", correct: false },
            { img: "assets/img/img17-4.jpg", correct: false }
        ]
    },
    {
        question: "12지신 7번째 동물",
        choices: [
            { img: "assets/img/img18-1.jpg", correct: false },
            { img: "assets/img/img18-2.jpg", correct: false },
            { img: "assets/img/img18-3.jpg", correct: false },
            { img: "assets/img/img18-4.jpg", correct: true }
        ]
    },
    {
        question: "광역시 2곳",
        choices: [
            { img: "assets/img/img19-1.jpg", correct: false },
            { img: "assets/img/img19-2.jpg", correct: true },
            { img: "assets/img/img19-3.jpg", correct: true },
            { img: "assets/img/img19-4.jpg", correct: false }
        ]
    },
    {
        question: "고흐의 작품",
        choices: [
            { img: "assets/img/img20-1.jpg", correct: false },
            { img: "assets/img/img20-2.jpg", correct: false },
            { img: "assets/img/img20-3.jpg", correct: true },
            { img: "assets/img/img20-4.jpg", correct: false }
        ]
    },
    {
        question: "태양계에서 가장 큰 행성",
        choices: [
            { img: "assets/img/img21-1.jpg", correct: false },
            { img: "assets/img/img21-2.jpg", correct: true },
            { img: "assets/img/img21-3.jpg", correct: false },
            { img: "assets/img/img21-4.jpg", correct: false }
        ]
    },
    {
        question: "남극에 사는 동물",
        choices: [
            { img: "assets/img/img22-1.jpg", correct: false },
            { img: "assets/img/img22-2.jpg", correct: false },
            { img: "assets/img/img22-3.jpg", correct: false },
            { img: "assets/img/img22-4.jpg", correct: true }
        ]
    },
    {
        question: "영토가 가장 넓은 나라",
        choices: [
            { img: "assets/img/img23-1.jpg", correct: true },
            { img: "assets/img/img23-2.jpg", correct: false },
            { img: "assets/img/img23-3.jpg", correct: false },
            { img: "assets/img/img23-4.jpg", correct: false }
        ]
    },
    {
        question: "인구가 가장 많은 나라",
        choices: [
            { img: "assets/img/img24-1.jpg", correct: false },
            { img: "assets/img/img24-2.jpg", correct: false },
            { img: "assets/img/img24-3.jpg", correct: false },
            { img: "assets/img/img24-4.jpg", correct: true }
        ]
    },
    {
        question: "기업의 창업주가 아닌 사람",
        choices: [
            { img: "assets/img/img25-1.jpg", correct: false },
            { img: "assets/img/img25-2.jpg", correct: false },
            { img: "assets/img/img25-3.jpg", correct: true },
            { img: "assets/img/img25-4.jpg", correct: false }
        ]
    },
    {
        question: "픽사 제작이 아닌 영화",
        choices: [
            { img: "assets/img/img26-1.jpg", correct: false },
            { img: "assets/img/img26-2.jpg", correct: true },
            { img: "assets/img/img26-3.jpg", correct: false },
            { img: "assets/img/img26-4.jpg", correct: false }
        ]
    },
    {
        question: "11번째로 스페이스 클럽에 가입한 국가의 발사체",
        choices: [
            { img: "assets/img/img27-1.jpg", correct: true },
            { img: "assets/img/img27-2.jpg", correct: false },
            { img: "assets/img/img27-3.jpg", correct: false },
            { img: "assets/img/img27-4.jpg", correct: false }
        ]
    },
    {
        question: "외국 브랜드",
        choices: [
            { img: "assets/img/img28-1.jpg", correct: true },
            { img: "assets/img/img28-2.jpg", correct: false },
            { img: "assets/img/img28-3.jpg", correct: false },
            { img: "assets/img/img28-4.jpg", correct: false }
        ]
    },
    {
        question: "브랜드명이 보통명사가 된 것 3개",
        choices: [
            { img: "assets/img/img29-1.jpg", correct: true },
            { img: "assets/img/img29-2.jpg", correct: true },
            { img: "assets/img/img29-3.jpg", correct: false },
            { img: "assets/img/img29-4.jpg", correct: true }
        ]
    },
    {
        question: "다른 대륙에 있는 랜드마크",
        choices: [
            { img: "assets/img/img30-1.jpg", correct: true },
            { img: "assets/img/img30-2.jpg", correct: false },
            { img: "assets/img/img30-3.jpg", correct: false },
            { img: "assets/img/img30-4.jpg", correct: false }
        ]
    },
]

// 전역변수
let timer;
let QuestionNum = 0;
let score = 0;

// 타이머 10초 함수 생성
function startTimer() {
    clearInterval(timer);                                       // 다음 문제로 넘어갔을 때를 위해 타이머 멈추기
    let timerLeft = 10;                                         // 타이머 남은 시간 10초 설정
    const timerNum = document.querySelector(".timer__num");     // 변수 timerNum에 클래스 timer__num 할당


    timer = setInterval(() => {
        timerLeft--;
        timerNum.textContent = timerLeft;                       // 변수 timerNum 요소의 텍스트에 timerLeft의 값인 10을 설정 -> 타이머의 초기값은 10이며 timer__num은 남은 시간을 표시하게 됨
        if (timerLeft <= 0) {
            clearInterval(timer);
            nextQusetion();
        }
    }, 1000);
}
startTimer();                                                   // 타이머 실행




function restartGame() {
    QuestionNum = 0; // 문제 번호 초기화
    score = 0; // 점수 초기화
    updateQuiz(); // 첫 번째 문제 표시
    startTimer(); // 타이머 시작
    uncheckCheckboxes(); // 체크박스 초기화
    const modal = document.getElementById("myModal");
    modal.style.display = "none"; // 모달 닫기
}

// 다음 문제로 넘어가는 함수
function nextQusetion() {
    QuestionNum++;
    if (QuestionNum < quizInfo.length) {
        updateQuiz();
        startTimer();
        uncheckCheckboxes();                                    // 체크박스 초기화
    } else {
        // 점수를 localStorage에 저장
        localStorage.setItem('score', score);
        // 게임 종료 시 호출되는 함수
        function endGame() {

            const modal = document.getElementById("myModal");
            const closeModal = document.getElementById("closeModal");
            const scoreText = document.getElementById("scoreText");
            const restartButton = document.getElementById("restartGame");

            // 맞힌 문제의 개수를 가져와서 표시
            const totalQuestions = quizInfo.length;
            scoreText.textContent = `맞힌 문제: ${score} / 총 문제 수: ${totalQuestions}`;

            // 모달 팝업 열기
            modal.style.display = "flex";

            // 닫기 버튼 클릭 시 모달 닫기
            closeModal.onclick = function () {
                modal.style.display = "none";
            }

            // 게임 다시 시작 버튼 클릭 시 게임 다시 시작
            restartButton.addEventListener("click", function () {
                restartGame();
            });
            // 모달 외부 클릭 시 모달 닫기
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }

        // 모든 문제를 푼 후에 호출하도록 코드에서 조정
        if (QuestionNum >= quizInfo.length) {
            endGame();
        }
    }
}




// 체크박스 초기화 함수
function uncheckCheckboxes() {
    checkboxInputs.forEach(input => {
        input.checked = false;
    });
}
// 문제 출력 함수 (질문과 이미지 불러오기)
function updateQuiz() {
    const questionElement = document.querySelector(".quiz__question");
    const questionchoices = quizChoices.querySelectorAll("label");
    const medalTextElement = document.querySelector(".medal__text"); // medal__text 요소 선택

    // 질문 표시
    questionElement.textContent = quizInfo[QuestionNum].question;

    // 이미지와 보기 표시
    for (let i = 0; i < questionchoices.length; i++) {
        const choiceLabel = questionchoices[i];
        const choiceImage = quizInfo[QuestionNum].choices[i].img;
        choiceLabel.querySelector("img").src = choiceImage;
    }

    // 현재 문제 번호와 총 문제 개수를 medal__text에 넣기
    medalTextElement.textContent = ` ${QuestionNum + 1} / ${quizInfo.length}`;
}
updateQuiz();

// 선택자
const questionchoices = quizChoices.querySelectorAll("label");
const checkboxInputs = quizChoices.querySelectorAll("input[type='checkbox']");

// 체크박스 변경 이벤트 리스너
checkboxInputs.forEach(input => {
    input.addEventListener("change", function () {
        checkAnswers();

        const checkedboxes = document.querySelectorAll("input[type='checkbox']:checked");
        if (checkedboxes.length === getCorrectChoicesCount()) {
            setTimeout(nextQusetion, 500); // 0.5초 딜레이 후 다음 문제로 이동
        }
    });
});

// 정답 확인 및 알림 표시 함수
function checkAnswers() {
    const checkedCheckboxes = document.querySelectorAll("input[type='checkbox']:checked");
    const correctChoicesCount = getCorrectChoicesCount();
    const correctAnswerElement = document.querySelector(".correct-answer");
    const incorrectAnswerElement = document.querySelector(".incorrect-answer");

    // 모든 정답이 선택되었을 때
    if (checkedCheckboxes.length === correctChoicesCount) {
        let allCorrect = true;
        checkedCheckboxes.forEach(checkbox => {
            const choiceIndex = parseInt(checkbox.value);
            if (!quizInfo[QuestionNum].choices[choiceIndex].correct) {
                allCorrect = false;
            }
        });


        if (allCorrect) {
            // 모든 선택이 정답이면 점수 올리고 정답 표시
            score++;

            // 정답 표시
            correctAnswerElement.style.display = "block";
        } else {
            // 오답 표시
            incorrectAnswerElement.style.display = "block";
        }

        setTimeout(() => {
            correctAnswerElement.style.display = "none";
            incorrectAnswerElement.style.display = "none";
        }, 500); 

    } else {
        // 정답 미선택 시 숨기기
        correctAnswerElement.style.display = "none";
        incorrectAnswerElement.style.display = "none";
    }
}



// 현재 질문의 정답 개수를 반환하는 함수
function getCorrectChoicesCount() {
    return quizInfo[QuestionNum].choices.filter(choice => choice.correct).length;
}


// 셔플 함수
function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}



// 페이지가 로드된 후 실행
document.addEventListener("DOMContentLoaded", () => {
    updateQuiz(QuestionNum);
});