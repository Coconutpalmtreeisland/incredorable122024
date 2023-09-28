const questions = [
    {
        question: "박새",
        answers: [
            { text: "", correct: false },
            { text: "", correct: true },
            { text: "", correct: false },
            { text: "", correct: false },
        ]
    },
    {
        question: "우리나라 화폐에 있는 인물",
        answers: [
            { text: "", correct: false },
            { text: "", correct: false },
            { text: "", correct: false },
            { text: "", correct: true },
        ]
    },
    {
        question: "파충류",
        answers: [
            { text: "", correct: false },
            { text: "", correct: false },
            { text: "", correct: true },
            { text: "", correct: false },
        ]
    },
    {
        question: "가장 큰 동물",
        answers: [
            { text: "", correct: false },
            { text: "", correct: false },
            { text: "", correct: true },
            { text: "", correct: false },
        ]
    },
    {
        question: "설치류",
        answers: [
            { text: "", correct: false },
            { text: "", correct: false },
            { text: "", correct: true },
            { text: "", correct: false },
        ]
    },
    {
        question: "유럽 연합에 속하지 않는 국가",
        answers: [
            { text: "", correct: false },
            { text: "", correct: false },
            { text: "", correct: true },
            { text: "", correct: false },
        ]
    }
];

const questionElement = document.getElementById("question"); // 질문
const answerButtons = document.getElementById("answer_buttons"); // 질문에 답하는 버튼들
const nextButton = document.getElementById("next_btn"); // 다음으로 넘어가는 버튼

let currentQuestionIndex = 0;
let score = 0;

function startQuiz() {
    currentQuestionIndex = 0; /* 문제와 스코어 초기화 */
    score = 0;
    nextButton.innerHTML = "Next";
    showQuestion();
}

function showQuestion() {
    resetState();
    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1; // 문제 번호
    questionElement.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text; // 함수로 만들어놓은 질문들과 HTML 값을 연동시킴
        button.classList.add("btn");
        answerButtons.appendChild(button);
        if(answer.correct){
            button.dataset.correct = answer.correct; //true & false 구분
        }
        button.addEventListener("click", selectAnswer); //버튼을 클릭했을때 이벤트
    });
}

function resetState() {
    nextButton.style.display = "none";
    while (answerButtons.firstChild) {
        answerButtons.removeChild(answerButtons.firstChild);
    }
}

function selectAnswer(e) {
    const selectedBtn = e.target;
    const isCorrect = selectedBtn.dataset.correct === "true";
    if (isCorrect) {
        selectedBtn.classList.add("correct");
        score++; // 정답인 경우 점수 증가
    } else {
        selectedBtn.classList.add("incorrect");
    }
    
    // 정답인 버튼에 "correct" 클래스 추가
    // 모든 버튼을 비활성화 처리
    Array.from(answerButtons.children).forEach(button => {
        if (button.dataset.correct === "true") {
            button.classList.add("correct");
        }
        button.disabled = true;
    });
    
    nextButton.style.display = "block"; // "Next" 버튼 표시
}

function showScore(){
    resetState();
    questionElement.innerHTML = `총 ${questions.length}점에서 당신의 점수는 ${score}입니다!`;
    nextButton.innerHTML = "Play Again";
    nextButton.style.display = "block";
}

function handleNextButton(){
    currentQuestionIndex++;
    if(currentQuestionIndex < questions.length){
        showQuestion();
    }else{
        showScore();
    }
}

nextButton.addEventListener("click", ()=>{
    if(currentQuestionIndex < questions.length){
        handleNextButton();
    }else{
        startQuiz();
    }
})
startQuiz();
