let quizImg = [];
let numImg = 33;
let counter = 0;

let size = 13;
let timer = 10;

let imgInfo = [
  'assets/img/banana-min.jpg',
  'assets/img/bycicle-min.jpg',
  'assets/img/cacao-min.jpg',
  'assets/img/candy-min.jpg',
  'assets/img/cap-min.jpg',
  'assets/img/cap-min.jpg',
  'assets/img/cat-min.jpg',
  'assets/img/chicken-min.jpg',
  'assets/img/clock-min.jpg',
  'assets/img/clown-min.jpg',
  'assets/img/colorPencil-min.jpg',
  'assets/img/cumputer-min.jpg',
  'assets/img/dog-min.jpg',
  'assets/img/garlic-min.jpg',
  'assets/img/glasses-min.jpg',
  'assets/img/grapefruit-min.jpg',
  'assets/img/horse-min.jpg',
  'assets/img/kimchi-min.jpg',
  'assets/img/kingSejong-min.jpg',
  'assets/img/lake-min.jpg',
  'assets/img/library-min.jpg',
  'assets/img/pig-min.jpg',
  'assets/img/pizza-min.jpg',
  'assets/img/platypus-min.jpg',
  'assets/img/quokka-min.jpg',
  'assets/img/Rhinoceros-min.jpg',
  'assets/img/soap-min.jpg',
  'assets/img/squirrel-min.jpg',
  'assets/img/sunflower-min.jpg',
  'assets/img/tanghulu-min.jpg',
  'assets/img/themaPark-min.jpg',
  'assets/img/tiger-min.jpg',
  'assets/img/tissue-min.jpg',
  'assets/img/waterPark-min.jpg',
];

let endImg;

function preload(){
  for (let index = 0; index < numImg; index++){
    quizImg[index] = loadImage(imgInfo.length);
  }
  endImg = loadImage(imgInfo.length); // 마지막 이미지 경로 추가
}

function setup(){
  createCanvas(640, 550);
  frameRate(1);

  rectMode(CENTER);
}

function draw(){
  clear();
  if(counter < numImg){
    for(let x=0; x<width; x+=size){
      for(let y=0; y<height; y+=size){
        let questionImg = quizImg[counter];
        
        // 이미지를 표시하는 데 image() 함수를 사용합니다.
        image(questionImg, x, y, size, size);
      }
    }
    textSize(90);
    fill(0);
    text(timer, width - 70, 50);

    if(timer > 1){
      timer--;
      size -= 1;
    } else if (timer == 1){
      timer--;
    } else if (timer == 0){
      image(quizImg[counter], 0, 0, width, height);

      noLoop();
    }
  } else if (counter == numImg){
    image(endImg, 0, 0, width, height);
    noLoop();
  }
}

function mousePressed(){
  if (timer == 0){
    counter++;
    timer = 10;
    size = 13;
    loop();
  }
}