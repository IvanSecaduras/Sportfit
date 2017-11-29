	//Cargamos los 3 canvas
	window.onload=function(){
		init();
		firma_recogida();
		firma_entrega();
	}
	
	//Variables globales del canvas
	var canvas, ctx, flag = false,
        prevX = 0,
        currX = 0,
        prevY = 0,
        currY = 0,
        dot_flag = false;

    var x = "red",
        y = 2;
    
    function init() {
		
		//Definimos dimensiones del canvas
        canvas = document.getElementById('can');
        ctx = canvas.getContext("2d");
		canvas.width = document.getElementById("coche").offsetWidth-20;
        w = canvas.width;
        h = canvas.height;
		
		//Cargamos la imagen en el canvas
		img = document.createElement('img');
		img.onload=function(){
			ctx.drawImage(img,0,0,canvas.width,canvas.height);
		};
		img.src="./assets/media/template.png";
		
		//Eventos tactiles
		canvas.addEventListener("touchstart", function (e) {
            e.preventDefault();
			mousePos = getTouchPos(canvas, e);
			var touch = e.touches[0];
			var mouseEvent = new MouseEvent("mousedown", {
				clientX: touch.clientX,
				clientY: touch.clientY
			});
			canvas.dispatchEvent(mouseEvent);
		}, false);
		
		canvas.addEventListener("touchend", function (e) {
            e.preventDefault();
			var mouseEvent = new MouseEvent("mouseup", {});
			canvas.dispatchEvent(mouseEvent);
		}, false);
		
		canvas.addEventListener("touchmove", function (e) {
            e.preventDefault();
			var touch = e.touches[0];
			var mouseEvent = new MouseEvent("mousemove", {
				clientX: touch.clientX,
				clientY: touch.clientY
			});
			canvas.dispatchEvent(mouseEvent);
		}, false);
    
		//Evento de raton
        canvas.addEventListener("mousemove", function (e) {
            findxy('move', e)
        }, false);
        canvas.addEventListener("mousedown", function (e) {
            findxy('down', e)
        }, false);
        canvas.addEventListener("mouseup", function (e) {
            findxy('up', e)
        }, false);
        canvas.addEventListener("mouseout", function (e) {
            findxy('out', e)
        }, false);
    }
    
    function draw() {
        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(currX, currY);
        ctx.strokeStyle = x;
        ctx.lineWidth = y;
        ctx.stroke();
        ctx.closePath();
    }
    
    function erase() {
		canvas.width=canvas.width;
			
		//Cargamos la imagen en el canvas
		img = document.createElement('img');
		img.onload=function(){
			ctx.drawImage(img,0,0,canvas.width,canvas.height);
		};
		img.src="./assets/media/template.png";
    }
	
	function getTouchPos(canvasDom, touchEvent) {
		var rect = canvasDom.getBoundingClientRect();
		return {
			x: touchEvent.touches[0].clientX - rect.left,
			y: touchEvent.touches[0].clientY - rect.top
		};
	}
    
    function findxy(res, e) {
		var rect = canvas.getBoundingClientRect();
		
        if (res == 'down') {
            prevX = currX;
            prevY = currY;
            currX = e.clientX - rect.left;
            currY = e.clientY - rect.top;
    
            flag = true;
            dot_flag = true;
            if (dot_flag) {
                ctx.beginPath();
                ctx.fillStyle = x;
                ctx.fillRect(currX, currY, 2, 2);
                ctx.closePath();
                dot_flag = false;
            }
        }
        if (res == 'up' || res == "out") {
            flag = false;
        }
        if (res == 'move') {
            if (flag) {
                prevX = currX;
                prevY = currY;
                currX = e.clientX - rect.left;
                currY = e.clientY - rect.top;
                draw();
            }
        }
    }
	
	function mandar_canvas() {
		document.getElementById('canvas_coche').value = canvas.toDataURL();
        document.getElementById('form').submit();
    }
	