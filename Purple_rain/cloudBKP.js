function Cloud() {
  this.center[0] = random(width);
  this.center[2] = random(1, 20);
  this.center[1] = map(this.center[2], 1, 20, 1, 60);
  this.size = map(this.center[2], 1, 20, 1, 30);
  this.speed = map(z, 1, 20, 0.03, 0.3);
  this.ySize = 10;

  for (var i = 1; i < 20; i++) {
    this.x[i] = this.xCenter + random(1, 100);
    this.y[i] = this.yCenter + random(-20, 20);
    this.z[i] = this.zCenter + random(1, 20);
    this.xspeed = map(this.z[i], 1, 20, 0.03, 0.3);
    this.size = map(this.z[i], 1, 20, 1, 30);
  }

  this.move = function() {
    //var randSpeed = random(0.05, 0.2);
    var randPosition = random(-200, -100);
    
    for (var i = 1; i < 20; i++) {
      this.x[i] = this.x[i] + this.xspeed;
      this.size = map(this.z[i], 1, 20, 1, 30);
      if (this.x[i] > (width - 20)) {
        this.x[i] = randPosition;
      }
    }
  }

  this.show = function() {
    stroke(227, 164, 197);
    fill(226,163,196);
    for (var i = 1; i < 11; i++) {
      ellipse(this.x[i], this.y[i], 20+this.size, 10+this.size);
    }
  }
}
