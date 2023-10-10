const quizWrap = document.querySelector(".quiz__wrap");

let quizInfo = [];
/* let shuffledQuizInfo = []; */

const fetchQuiz = () => {
    fetch("https://webstoryboy.github.io/webstoryboy/w_json/gineungsaShort.json")
        .then(res => res.json())
        .then(items => {
            quizInfo = items.map((item, index) => {
                const formattedQuiz = {
                    infoTime: item.time,
                    infoQuestion: item.question,
                    infoQuestion2: item.question_desc,
                    infoAnswer: item.correct_answer,
                }
                return formattedQuiz;
            });
            /* shuffledQuizInfo = [...quizInfo];
            shuffleArray(shuffledQuizInfo); */

            // console.log(quizInfo);
            updateQuiz(quizIndex);
        });
}
/* 
function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
} */

let quizIndex = 0;

const updateQuiz = (index) => {
    const quiz = quizInfo[index];
    const quizWrapTag = `
        <div class="quiz__header">
            <div class="quiz__time">${quiz.infoTime}</div>
        </div>

        <div class="quiz__header"></div>
        <div class="quiz__status">
                            <span class="stats__now">현재 문제: </span> / 
                            <span class="stats__lsat">남은 문제: </span>
                        </div>

        <div class="quiz__main">
            <div class="quiz__question">${index + 1}. ${quiz.infoQuestion}</div>
            ${quiz.infoQuestion2 ? `<div class="quiz__question2">${quiz.infoQuestion2}</div>` : ""} 
            <button class="quiz__confirm">정답</button>
            <div class="quiz__answer none">${quiz.infoAnswer}</div>
            <div class="quiz__desc none"></div>
        </div>
        <div class="quiz__footer">
            <div class="btn">
                <button class="quiz__left">이전</button>
                <button class="quiz__right">다음</button>
            </div>
        </div>
    `;

    quizWrap.innerHTML = quizWrapTag;

    const quizNext = quizWrap.querySelector(".quiz__right");
    const quizPrev = quizWrap.querySelector(".quiz__left");
    const quizConfirm = quizWrap.querySelector(".quiz__confirm");
    const quizAnswer = quizWrap.querySelector(".quiz__answer")
    const quizLogo = document.querySelector("h1");
    
     // "현재 문제"와 "남은 문제" 표시 업데이트
     const statsNow = document.querySelector(".stats__now");
     const statsLast = document.querySelector(".stats__lsat");

     statsNow.textContent = `현재 문제: ${quizIndex + 1}`;
     statsLast.textContent = `남은 문제: ${quizInfo.length - quizIndex - 1}`;

    quizNext.addEventListener("click", () => {
        if (quizIndex < quizInfo.length - 1) {
            quizIndex++;
            updateQuiz(quizIndex);
        } else {
            alert("퀴즈가 종료되었습니다.");
        }
    });


    quizPrev.addEventListener("click", () => {
        if (quizIndex > 0) {
            quizIndex--;
            updateQuiz(quizIndex);
        } else {
            alert("첫 문제입니다.");
        }
    });

    quizConfirm.addEventListener("click", () => {
        quizConfirm.classList.add("active");
        quizAnswer.classList.remove("none");
    });

    quizLogo.addEventListener("mouseover", () => {
        // document.querySelector("h1 > a > img").classList.remove("none");
        document.querySelector("h1 > a > img").style.opacity = "1";
        document.querySelector("h1 > a").style.color = "#fff";
    })
    quizLogo.addEventListener("mouseout", () => {
        // document.querySelector("h1 > a > img").classList.add("none");
        document.querySelector("h1 > a > img").style.opacity = "0";
        document.querySelector("h1 > a").style.color = "var(--black600)";
    })
}

document.addEventListener("DOMContentLoaded", () => {
    fetchQuiz();
});