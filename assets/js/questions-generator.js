let button;
var mySvg;

function preload() {
  mySvg = loadImage(generator.image);
  bold = loadFont(generator.font_bold);
  regular = loadFont(generator.font_regular);
}

function setup() {

  var canvasWidth = windowWidth,
      canvasHeight = windowWidth;
      
  if (windowWidth > windowHeight) {
    canvasHeight = windowHeight
    if( windowHeight < windowWidth/2.1 ) { canvasHeight = 1.5*windowHeight; };
  };

  var questionsCanvas = createCanvas(canvasWidth, canvasHeight);
  questionsCanvas.parent("generator");
  questionsCanvas.mousePressed(changeBG);
  questionsCanvas.style('cursor: pointer;')
  button = createButton(buttontext);
  button.parent('generator');
  button.mousePressed(changeBG);
  button.style("position: relative; left: 50%; top: auto; background-color: #bd4145; color: white; border: none; width: auto; height: auto; font-size: 1.2rem; cursor: pointer; padding: 0.8rem; transform: translate(-50%");
}

function draw() {
  karte();
}

function changeBG() {
  karte();
}

function karte() {
  textFont(regular);
  background(255);
  rectMode(CENTER);
  stroke(225);
  fill(150);
  rect(width/2+width/150, height/2+width/150, width/1.1, width/2, width/25);

  fill(255);
  rect(width/2, height/2, width/1.1, width/2, width/25); //rect(x, y, h, w, r);
  noLoop();
  var randomword = random(questions.length-1);
  fill('#e32c2c');
  
  textSize(width/25);
  textWrap(WORD);
  textAlign(CENTER);
  text(questions[round(randomword)], width/2, height/2-width/14, width/1.5);

  textSize(width/45);
  textFont(bold);
  text(cardtitle+" #"+round(randomword+1), width/2, height/2-width/7, width/3.3);

  //logo
  imageMode(CENTER);
  image(mySvg, width/2, height/2+width/6, width/10, width/10);
}