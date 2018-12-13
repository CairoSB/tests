// Purple Rain
// (138, 43, 226)
// (230, 230, 250) // background

var drops = [];
var clouds = [];

function setup() {
  createCanvas(windowWidth-21, windowHeight-21);
  for (var i = 0; i < 500; i++) {
    drops[i] = new Drop();
  }
  for (var i = 0; i < 50; i++) {
    clouds[i] = new Cloud();
  }
}

function draw() {
  background(100, 100, 120);
  for (var i = 0; i < drops.length; i++) {
    drops[i].fall();
    drops[i].show();
  }
  for (var i = 0; i < clouds.length; i++) {
    clouds[i].show();
    clouds[i].move();
  }
}
