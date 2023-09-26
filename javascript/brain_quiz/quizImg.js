// 이미지 파일 경로 배열
const imagePaths = [
    '../assets/img/banana.jpg',
    '../assets/img/bycicle.jpg',
    '../assets/img/cacao.jpg',
    '../assets/img/candy.jpg',
    '../assets/img/cap.jpg',
    
];

// 이미지를 추가할 컨테이너 엘리먼트를 가져옵니다.
const imagesContainer = document.getElementById('quizImgs');

// 이미지를 동적으로 추가합니다.
imagePaths.forEach((imagePath, index) => {
    const imageElement = document.createElement('img');
    imageElement.src = imagePath;
    imageElement.alt = `문제 이미지 ${index + 1}`;
    imagesContainer.appendChild(imageElement);
});