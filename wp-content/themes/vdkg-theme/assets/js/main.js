// Doryo Theme Main JavaScript File
(function () {
  "use strict";

  /**
   * Initializes the sticky header functionality.
   * Adds or removes the sticky class to the header based on scroll position.
   * Also considers the WordPress admin bar offset if present.
   */
  function initHeader() {
    const header = document.querySelector(".doryo-header");

    if (!header) {
      console.warn("Doryo Header not found");
      return;
    }

    const threshold = 80; // px
    const adminBar = document.getElementById("wpadminbar");
    let ticking = false;

    const apply = () => {
      const y = window.scrollY || window.pageYOffset || 0;
      const makeSticky = y >= threshold;

      header.classList.toggle("doryo-header--sticky", makeSticky);

      // Optional: Adminbar-Offset berücksichtigen
      if (makeSticky) {
        const topOffset = adminBar ? adminBar.offsetHeight : 0;
        header.style.top = topOffset ? `${topOffset}px` : "0";
      } else {
        header.style.top = "";
      }
      ticking = false;
    };

    const onScroll = () => {
      if (!ticking) {
        ticking = true;
        requestAnimationFrame(apply);
      }
    };

    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", apply, { passive: true });
    window.addEventListener("load", apply);
    apply(); // Initialer Zustand
  }

  /**
   * Custom JavaScript for the Doryo Hero Unit Elementor widget.
   * This function is called each time the widget is initialized by Elementor frontend.
   * @param {object} $scope - The jQuery-wrapped widget scope element.
   * @param {object} $ - The jQuery object.
   */
  /**
   * Custom JavaScript for the Doryo Hero Unit Elementor widget.
   * This function is called each time the widget is initialized by Elementor frontend.
   * It creates a fluid animated blob in the canvas with ID 'doryo-blob-canvas'.
   * @param {object} $scope - The jQuery-wrapped widget scope element.
   * @param {object} $ - The jQuery object.
   */
  function initHeroUnit($scope, $) {
    const canvas = $scope.find('#doryo-blob-canvas')[0];
    if (!canvas) return;
    
    // Responsive canvas sizing - reads actual CSS size
    function resizeCanvas() {
      const rect = canvas.getBoundingClientRect();
      const size = Math.min(rect.width, rect.height);
      
      // Set internal canvas resolution to match display size
      canvas.width = size;
      canvas.height = size;
    }
    
    // Initialize canvas size
    resizeCanvas();
    
    // Get color from canvas data-color attribute
    const blobColor = canvas.getAttribute('data-color') || '#17b26a';
    
    let ctx = canvas.getContext('2d');
    let blob;

    class Point {
      constructor(azimuth, parent) {
        this.parent = parent;
        this.azimuth = Math.PI - azimuth;
        this._components = { 
          x: Math.cos(this.azimuth),
          y: Math.sin(this.azimuth)
        };
        
        this.acceleration = -0.3 + Math.random() * 0.6;
      }
      
      solveWith(leftPoint, rightPoint) {
        this.acceleration = (-0.3 * this.radialEffect + ( leftPoint.radialEffect - this.radialEffect ) + ( rightPoint.radialEffect - this.radialEffect )) * this.elasticity - this.speed * this.friction;
      }
      
      set acceleration(value) {
        if(typeof value == 'number') {
          this._acceleration = value;
          this.speed += this._acceleration * 2;
        }
      }
      get acceleration() {
        return this._acceleration || 0;
      }
      
      set speed(value) {
        if(typeof value == 'number') {
          this._speed = value;
          this.radialEffect += this._speed * 5;
        }
      }
      get speed() {
        return this._speed || 0;
      }
      
      set radialEffect(value) {
        if(typeof value == 'number') {
          this._radialEffect = value;
        }
      }
      get radialEffect() {
        return this._radialEffect || 0;
      }
      
      get position() {
        return { 
          x: this.parent.center.x + this.components.x * (this.parent.radius + this.radialEffect), 
          y: this.parent.center.y + this.components.y * (this.parent.radius + this.radialEffect) 
        }
      }
      
      get components() {
        return this._components;
      }

      set elasticity(value) {
        if(typeof value === 'number') {
          this._elasticity = value;
        }
      }
      get elasticity() {
        return this._elasticity || 0.001;
      }
      set friction(value) {
        if(typeof value === 'number') {
          this._friction = value;
        }
      }
      get friction() {
        return this._friction || 0.0085;
      }
    }

    class Blob {
      constructor() {
        this.points = [];
        this.idleTime = 0; // Track time for idle animation
      }
      
      init() {
        this.points = [];
        for(let i = 0; i < this.numPoints; i++) {
          let point = new Point(this.divisional * ( i + 1 ), this);
          this.push(point);
        }
      }
      
      render() {
        let canvas = this.canvas;
        let ctx = this.ctx;
        let position = this.position;
        let pointsArray = this.points;
        let radius = this.radius;
        let points = this.numPoints;
        let divisional = this.divisional;
        let center = this.center;
        
        ctx.clearRect(0,0,canvas.width,canvas.height);
        
        // Increment idle time for subtle animation
        this.idleTime += 0.008;
        
        // Apply subtle idle animation to points
        pointsArray.forEach((point, index) => {
          // Add very subtle random movement even when idle
          const idleWave = Math.sin(this.idleTime + index * 0.5) * 0.005;
          const idleWave2 = Math.cos(this.idleTime * 0.7 + index * 0.3) * 0.003;
          point.acceleration += idleWave + idleWave2;
        });
        
        pointsArray[0].solveWith(pointsArray[points-1], pointsArray[1]);

        let p0 = pointsArray[points-1].position;
        let p1 = pointsArray[0].position;
        let _p2 = p1;

        ctx.beginPath();
        ctx.moveTo(center.x, center.y);
        ctx.moveTo( (p0.x + p1.x) / 2, (p0.y + p1.y) / 2 );

        for(let i = 1; i < points; i++) {
          
          pointsArray[i].solveWith(pointsArray[i-1], pointsArray[i+1] || pointsArray[0]);

          let p2 = pointsArray[i].position;
          var xc = (p1.x + p2.x) / 2;
          var yc = (p1.y + p2.y) / 2;
          ctx.quadraticCurveTo(p1.x, p1.y, xc, yc);

          p1 = p2;
        }

        var xc = (p1.x + _p2.x) / 2;
        var yc = (p1.y + _p2.y) / 2;
        ctx.quadraticCurveTo(p1.x, p1.y, xc, yc);

        ctx.fillStyle = this.color;
        ctx.shadowColor = this.color + '88';
        ctx.shadowBlur = 20;
        ctx.fill();
        ctx.shadowBlur = 0;
        
        requestAnimationFrame(this.render.bind(this));
      }
      
      push(item) {
        if(item instanceof Point) {
          this.points.push(item);
        }
      }
      
      set color(value) {
        this._color = value;
      }
      get color() {
        return this._color || blobColor;
      }
      
      set canvas(value) {
        if(value instanceof HTMLElement && value.tagName.toLowerCase() === 'canvas') {
          this._canvas = value;
          this.ctx = this._canvas.getContext('2d');
        }
      }
      get canvas() {
        return this._canvas;
      }
      
      set numPoints(value) {
        if(value > 2) {
          this._points = value;
        }
      }
      get numPoints() {
        return this._points || 16; // Fewer points for smoother blob
      }
      
      set radius(value) {
        if(value > 0) {
          this._radius = value;
        }
      }
      get radius() {
        return this._radius || Math.min(this.canvas.width, this.canvas.height) / 3;
      }
      
      set position(value) {
        if(typeof value == 'object' && value.x && value.y) {
          this._position = value;
        }
      }
      get position() {
        return this._position || { x: 0.5, y: 0.5 };
      }
      
      get divisional() {
        return Math.PI * 2 / this.numPoints;
      }
      
      get center() {
        return { x: this.canvas.width * this.position.x, y: this.canvas.height * this.position.y };
      }
      
      set running(value) {
        this._running = value === true;
      }
      get running() {
        return this.running !== false;
      }
    }

    // Initialize blob
    blob = new Blob();
    blob.canvas = canvas;
    blob.color = blobColor;
    blob.init();

    // Mouse interaction
    let oldMousePoint = { x: 0, y: 0};
    let hover = false;
    let mouseMove = function(e) {
      const rect = canvas.getBoundingClientRect();
      const clientX = e.clientX - rect.left;
      const clientY = e.clientY - rect.top;
      
      let pos = blob.center;
      let diff = { x: clientX - pos.x, y: clientY - pos.y };
      let dist = Math.sqrt((diff.x * diff.x) + (diff.y * diff.y));
      let angle = null;
      
      blob.mousePos = { x: pos.x - clientX, y: pos.y - clientY };
      
      if(dist < blob.radius && hover === false) {
        let vector = { x: clientX - pos.x, y: clientY - pos.y };
        angle = Math.atan2(vector.y, vector.x);
        hover = true;
      } else if(dist > blob.radius && hover === true){ 
        let vector = { x: clientX - pos.x, y: clientY - pos.y };
        angle = Math.atan2(vector.y, vector.x);
        hover = false;
        blob.color = blobColor;
      }
      
      if(typeof angle == 'number') {
        
        let nearestPoint = null;
        let distanceFromPoint = 100;
        
        blob.points.forEach((point)=> {
          if(Math.abs(angle - point.azimuth) < distanceFromPoint) {
            nearestPoint = point;
            distanceFromPoint = Math.abs(angle - point.azimuth);
          }
        });
        
        if(nearestPoint) {
          let strength = { x: oldMousePoint.x - clientX, y: oldMousePoint.y - clientY };
          strength = Math.sqrt((strength.x * strength.x) + (strength.y * strength.y)) * 3;
          if(strength > 100) strength = 100;
          nearestPoint.acceleration = strength / 100 * (hover ? -0.3 : 0.3);
        }
      }
      
      oldMousePoint.x = clientX;
      oldMousePoint.y = clientY;
    }
    
    // Add pointer event listeners to canvas
    canvas.addEventListener('pointermove', mouseMove);
    canvas.setAttribute('touch-action', 'none');

    // Scroll interaction - makes blob react to page scrolling
    let lastScrollY = window.scrollY || window.pageYOffset;
    let scrollDirection = 0;

    function onScroll() {
      const currentScrollY = window.scrollY || window.pageYOffset;
      const scrollDelta = currentScrollY - lastScrollY;
      scrollDirection = scrollDelta;
      
      // Apply scroll effect to random points in the blob
      if (blob && blob.points.length > 0) {
        const scrollStrength = Math.min(Math.abs(scrollDelta) / 10, 5); // Limit strength
        const affectedPoints = Math.floor(blob.points.length / 3); // Affect 1/3 of points
        
        for (let i = 0; i < affectedPoints; i++) {
          const randomIndex = Math.floor(Math.random() * blob.points.length);
          const point = blob.points[randomIndex];
          if (point) {
            // Apply acceleration based on scroll direction and strength
            point.acceleration += (scrollDirection > 0 ? 1 : -1) * scrollStrength * 0.02;
          }
        }
      }
      
      lastScrollY = currentScrollY;
    }

    // Add scroll event listener with throttling
    let scrollTimeout;
    window.addEventListener('scroll', () => {
      if (!scrollTimeout) {
        scrollTimeout = setTimeout(() => {
          onScroll();
          scrollTimeout = null;
        }, 16); // ~60fps throttling
      }
    }, { passive: true });

    // Start blob animation
    blob.render();

    // Optional: Resize on window resize
    window.addEventListener('resize', () => {
      resizeCanvas();
      if (blob) {
        blob.init(); // Reinitialize blob with new canvas size
      }
    });
  }

  /**
   * Registers Elementor frontend hooks for custom widgets.
   * Ensures that custom widget JS is executed when Elementor loads the widget in the frontend.
   */
  function initElementorHooks() {
    if (!window.elementorFrontend) return;

    jQuery(window).on("elementor/frontend/init", function () {
      elementorFrontend.hooks.addAction("frontend/element_ready/doryo-hero-unit.default", initHeroUnit);
    });
  }

  /**
   * Initializes all theme-related JavaScript functionality.
   * Calls header and Elementor widget initializers.
   */
  function initializeTheme() {
    initHeader();
    initElementorHooks();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initializeTheme);
  } else {
    initializeTheme();
  }
})();
