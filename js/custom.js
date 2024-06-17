jQuery(document).ready(function($){

    $(".menu-slider").each(function(i){
      $(this).find(".slider").attr("data-slick", i);
      $(this).find(".thumbnail").attr("data-slick", i);
    });

      $('.slider').each(function(){
        let attr = $(this).attr('data-slick');
        $(this).slick({
          fade: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          asNavFor: '.thumbnail[data-slick="'+attr+'"]',
        });
        $('.thumbnail[data-slick="'+attr+'"]').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          focusOnSelect: true,
          asNavFor: '.slider[data-slick="'+attr+'"]',
        });
      });


      $(function () {
      $('.staff-slider').slick({
        autoplay: true,
        infinite: true,
        centerMode: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        prevArrow: '<img src="'+ path + '/img/common/prev-arrow.png" class="slide-arrow prev-arrow">',
        nextArrow: '<img src="'+ path + '/img/common/next-arrow.png" class="slide-arrow next-arrow">',
        responsive: [
            {
              breakpoint: 768, 
              settings: {
                slidesToShow: 1,
                centerMode: true,
                centerPadding:20,
                dots:true,
                prevArrow:false,
                nextArrow:false,
                centerPadding:"20%"
              },
            },
        ],
      });
    });

    $(function () {
      $(window).scroll(function () {
        const windowHeight = $(window).height();
        const scroll = $(window).scrollTop();
    
        $('.js-fadeIn').each(function () {
          const targetPosition = $(this).offset().top;
          if (scroll > targetPosition - windowHeight) {
            $(this).addClass("is-fadein");
          }
        });
      });
    });
    

    Loadr = new (function Loadr(id) {
      const max_size = 184;
      const max_particles = 1000;
      const min_vel = 500;
      const max_generation_per_frame = 50;
    
      var canvas = document.getElementById(id);
      var ctx = canvas.getContext('2d');
      var height = canvas.height;
      var center_y = height / 2;
      var width = canvas.width;
      var center_x = width / 2;
      var animate = true;
      var particles = [];
      var last = Date.now(),
        now = 0;
      var died = 0,
        len = 0,
        dt;
      var fadeOutStarted = false;
      var opacity = 1;
    
      function isInsideHeart(x, y) {
        x = ((x - center_x) / center_x) * 3;
        y = ((y - center_y) / center_y) * -3;
        var x2 = x * x;
        var y2 = y * y;
        return Math.pow(x2 + y2 - 1, 3) - x2 * (y2 * y) < 0;
      }
    
      function random(size, freq) {
        var val = 0;
        var iter = freq;
    
        do {
          size /= iter;
          iter += freq;
          val += size * Math.random();
        } while (size >= 1);
    
        return val;
      }
    
      function Particle() {
        var x = center_x;
        var y = center_y;
        var size = ~~random(max_size, 2.4);
        var x_vel = (max_size + min_vel - size) / 2 - (Math.random() * (max_size + min_vel - size));
        var y_vel = (max_size + min_vel - size) / 2 - (Math.random() * (max_size + min_vel - size));
        var nx = x;
        var ny = y;
        var img = new Image();
        img.src = path + "/img/common/bubble.png";
    
        this.draw = function () {
          ctx.drawImage(img, x - size / 2, y - size / 2, size, size);
        };
    
        this.move = function (dt) {
          nx += x_vel * dt;
          ny += y_vel * dt;
          if (!isInsideHeart(nx, ny)) {
            if (!isInsideHeart(nx, y)) {
              x_vel *= -1;
              return;
            }
    
            if (!isInsideHeart(x, ny)) {
              y_vel *= -1;
              return;
            }
    
            x_vel = -1 * y_vel;
            y_vel = -1 * x_vel;
            return;
          }
    
          x = nx;
          y = ny;
        };
      }
    
      function movementTick() {
        len = particles.length;
        var dead = max_particles - len;
        for (var i = 0; i < dead && i < max_generation_per_frame; i++) {
          particles.push(new Particle());
        }
    
        now = Date.now();
        dt = last - now;
        dt /= 700;
        last = now;
        particles.forEach(function (p) {
          p.move(dt);
        });
      }
    
      function tick() {
        ctx.clearRect(0, 0, width, height);
        particles.forEach(function (p) {
          p.draw();
        });
    
        if (fadeOutStarted && opacity > 0) {
          opacity -= 0.02;
          ctx.globalAlpha = opacity;
        }
    
        if (opacity > 0) {
          requestAnimationFrame(tick);
        } else {
          done();
        }
      }
    
      function done() {
        animate = false;
      }
    
      this.start = function () {
        setTimeout(function () {
          fadeOutStarted = true;
          $(".op-anime").fadeOut(1000);
        }, 3000);
        setInterval(movementTick, 16);
        tick();
      };
    })("loader-pc");
    
    Loadr.start();
    
    LoadrSP = new (function LoadrSP(id) {
      const max_size = 80;
      const max_particles = 500;
      const min_vel = 200;
      const max_generation_per_frame = 25;
    
      var canvas = document.getElementById(id);
      var ctx = canvas.getContext('2d');
      var height = canvas.height;
      var center_y = height / 2;
      var width = canvas.width;
      var center_x = width / 2;
      var animate = true;
      var particles = [];
      var last = Date.now(),
        now = 0;
      var died = 0,
        len = 0,
        dt;
      var fadeOutStarted = false;
      var opacity = 1;
    
      function random(size, freq) {
        var val = 0;
        var iter = freq;
    
        do {
          size /= iter;
          iter += freq;
          val += size * Math.random();
        } while (size >= 1);
    
        return val;
      }
    
      function Particle() {
        var x = center_x;
        var y = center_y;
        var size = ~~random(max_size, 1.6);
        var x_vel = (max_size + min_vel - size) / 2 - (Math.random() * (max_size + min_vel - size));
        var y_vel = (max_size + min_vel - size) / 2 - (Math.random() * (max_size + min_vel - size));
        var nx = x;
        var ny = y;
        var img = new Image();
        img.src = path + "/img/common/bubble.png";
    
        this.draw = function () {
          ctx.drawImage(img, x - size / 2, y - size / 2, size, size);
        };
    
        this.move = function (dt) {
          nx += x_vel * dt;
          ny += y_vel * dt;
          if (nx < 0 || nx > width || ny < 0 || ny > height) {
            nx = center_x;
            ny = center_y;
          }
          x = nx;
          y = ny;
        };
      }
    
      function movementTick() {
        len = particles.length;
        var dead = max_particles - len;
        for (var i = 0; i < dead && i < max_generation_per_frame; i++) {
          particles.push(new Particle());
        }
    
        now = Date.now();
        dt = last - now;
        dt /= 700;
        last = now;
        particles.forEach(function (p) {
          p.move(dt);
        });
      }
    
      function tick() {
        ctx.clearRect(0, 0, width, height);
        particles.forEach(function (p) {
          p.draw();
        });
    
        if (fadeOutStarted && opacity > 0) {
          opacity -= 0.02;
          ctx.globalAlpha = opacity;
        }
    
        if (opacity > 0) {
          requestAnimationFrame(tick);
        } else {
          done();
        }
      }
    
      function done() {
        animate = false;
      }
      this.start = function () {
        setTimeout(function () {
          fadeOutStarted = true;
          $(".op-anime").fadeOut(1000);
        }, 3000);
        setInterval(movementTick, 16);
        tick();
      };
    })("loader-pc");
    
    Loadr.start();
    
    LoadrSP = new (function LoadrSP(id) {
      // SP用のコードを記述
      const max_size = 80;
      const max_particles = 1000;
      const min_vel = 300;
      const max_generation_per_frame = 25;
    
      var canvas = document.getElementById(id);
      var ctx = canvas.getContext('2d');
      var height = canvas.height;
      var center_y = height / 2;
      var width = canvas.width;
      var center_x = width / 2;
      var animate = true;
      var particles = [];
      var last = Date.now(),
        now = 0;
      var died = 0,
        len = 0,
        dt;
      var fadeOutStarted = false;
      var opacity = 1;
    
      function random(size, freq) {
        var val = 0;
        var iter = freq;
    
        do {
          size /= iter;
          iter += freq;
          val += size * Math.random();
        } while (size >= 1);
    
        return val;
      }
    
      function Particle() {
        var x = center_x;
        var y = center_y;
        var size = ~~random(max_size, 1.6);
        var x_vel = (max_size + min_vel - size) / 2 - (Math.random() * (max_size + min_vel - size));
        var y_vel = (max_size + min_vel - size) / 2 - (Math.random() * (max_size + min_vel - size));
        var nx = x;
        var ny = y;
        var img = new Image();
        img.src = path + "/img/common/bubble.png";
    
        this.draw = function () {
          ctx.drawImage(img, x - size / 2, y - size / 2, size, size);
        };
    
        this.move = function (dt) {
          nx += x_vel * dt;
          ny += y_vel * dt;
          if (nx < 0 || nx > width || ny < 0 || ny > height) {
            nx = center_x;
            ny = center_y;
          }
          x = nx;
          y = ny;
        };
      }
    
      function movementTick() {
        len = particles.length;
        var dead = max_particles - len;
        for (var i = 0; i < dead && i < max_generation_per_frame; i++) {
          particles.push(new Particle());
        }
    
        now = Date.now();
        dt = last - now;
        dt /= 700;
        last = now;
        particles.forEach(function (p) {
          p.move(dt);
        });
      }
    
      function tick() {
        ctx.clearRect(0, 0, width, height);
        particles.forEach(function (p) {
          p.draw();
        });
    
        if (fadeOutStarted && opacity > 0) {
          opacity -= 0.02;
          ctx.globalAlpha = opacity;
        }
    
        if (opacity > 0) {
          requestAnimationFrame(tick);
        } else {
          done();
        }
      }
    
      function done() {
        animate = false;
      }
    
      this.start = function () {
        setTimeout(function () {
          fadeOutStarted = true;
          $(".op-anime").fadeOut(1000);
        }, 3000);
        setInterval(movementTick, 16);
        tick();
      };
    })("loader-sp");
    
    LoadrSP.start();
    
     

});