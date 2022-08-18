let button;
var mySvg;

function preload() {
  mySvg = loadImage(generator.image);
  bold = loadFont(generator.font_bold);
  regular = loadFont(generator.font_regular);
}

function setup() {
  var questionsCanvas = createCanvas(windowWidth, windowHeight);
  questionsCanvas.parent("generator");
  button = createButton('Nächste Frage');
  button.parent('generator');
  button.mousePressed(changeBG);
  button.style("position: relative; left: 50%; top: auto; background-color: #e32c2c; color: white; border: none; width: auto; height: auto; font-size: 1.6rem; cursor: pointer; padding: 0.8rem; transform: translate(-50%");
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
  rect(width/2+width/150, height/2+width/150, width/1.5, width/2.7, width/25);

  fill(255);
  rect(width/2, height/2, width/1.5, width/2.7, width/25);
  noLoop();
  var randomword = random(questions.length-1);
  fill('#e32c2c');
  textSize(width/30);
  textWrap(WORD);
  textAlign(CENTER);
  text(questions[round(randomword)], width/2, height/2-width/20, width/2);
  textSize(width/60);
  textFont(bold);
  text("Demokratiefrage #"+round(randomword+1), width/2, height/2-width/7.5, width/3.3);
  imageMode(CENTER);
  mySvg.resize(width/15, 0);
  image(mySvg, width/2, height/2+width/8);
}