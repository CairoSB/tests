var cloudNumber = 50;

function Cloud() {
  this.centerZ = random(1, 20);
  this.centerX = random(width);
  this.centerY = map(this.centerZ, 1, 20, 1, 100);
  this.color = map(this.centerZ, 1, 20, 1, 50);
  this.size = map(this.centerZ, 1, 20, 1, 30);
  this.speed = map(this.centerZ, 1, 20, 0.05, 0.3);
  this.balls = [];
  for (var i = 0; i < cloudNumber; i++) {
    this.balls[i] = new Ball(this.centerX, this.centerY, this.speed, this.size);
  }

  function Ball(centerX, centerY, speed, size){
    this.X = centerX + random(-50, 50);
    this.Y = centerY + random(-20, 20);
    this.S = speed;
    this.sX = size + 20;
    this.sY = size + 10;
  }

  this.move = function() {
    var randPosition = random(-200, -100);
    for (var i = 0; i < cloudNumber; i++) {
      this.balls[i].X = this.balls[i].X + this.balls[i].S;
      if (this.balls[i].X > (width + 50)) {
        this.balls[i].X = randPosition;
      }
    }
  }

  this.show = function() {
    stroke(177+this.color, 114+this.color, 147+this.color); //chocolat color
    fill(176+this.color,113+this.color,146+this.color);
    for (var i = 0; i < cloudNumber; i++) {
      ellipse(this.balls[i].X, this.balls[i].Y, this.balls[i].sX, this.balls[i].sY);
    }
  }
}
