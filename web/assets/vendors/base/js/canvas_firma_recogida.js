	//Variables globales del canvas
	var canvas_firma_recogida, ctx_firma_recogida, flag_firma_recogida = false,
        prevX_firma_recogida = 0,
        currX_firma_recogida = 0,
        prevY_firma_recogida = 0,
        currY_firma_recogida = 0,
        dot_flag_firma_recogida = false;

    var x_firma_recogida = "black",
        y_firma_recogida = 2;
    
    function firma_recogida(){
		
		//Definimos dimensiones del canvas
        canvas_firma_recogida = document.getElementById('firma_recogida');
        ctx_firma_recogida = canvas_firma_recogida.getContext("2d");
		canvas_firma_recogida.width = $('#firma').width();
        w_firma_recogida = canvas_firma_recogida.width;
        h_firma_recogida = canvas_firma_recogida.height;
		
		//Eventos tactiles
		canvas_firma_recogida.addEventListener("touchstart", function (e) {
            e.preventDefault();
			mousePos = getTouchPos_firma_recogida(canvas_firma_recogida, e);
			var touch = e.touches[0];
			var mouseEvent = new MouseEvent("mousedown", {
				clientX: touch.clientX,
				clientY: touch.clientY
			});
			canvas_firma_recogida.dispatchEvent(mouseEvent);
		}, false);
		
		canvas_firma_recogida.addEventListener("touchend", function (e) {
            e.preventDefault();
			var mouseEvent = new MouseEvent("mouseup", {});
			canvas_firma_recogida.dispatchEvent(mouseEvent);
		}, false);
		
		canvas_firma_recogida.addEventListener("touchmove", function (e) {
			var touch = e.touches[0];
			var mouseEvent = new MouseEvent("mousemove", {
				clientX: touch.clientX,
				clientY: touch.clientY
			});
			canvas_firma_recogida.dispatchEvent(mouseEvent);
		}, false);
    
		//Evento de raton
        canvas_firma_recogida.addEventListener("mousemove", function (e) {
            findxy_firma_recogida('move', e)
        }, false);
        canvas_firma_recogida.addEventListener("mousedown", function (e) {
            findxy_firma_recogida('down', e)
        }, false);
        canvas_firma_recogida.addEventListener("mouseup", function (e) {
            findxy_firma_recogida('up', e)
        }, false);
        canvas_firma_recogida.addEventListener("mouseout", function (e) {
            findxy_firma_recogida('out', e)
        }, false);
    }
    
    function draw_firma_recogida() {
        ctx_firma_recogida.beginPath();
        ctx_firma_recogida.moveTo(prevX_firma_recogida, prevY_firma_recogida);
        ctx_firma_recogida.lineTo(currX_firma_recogida, currY_firma_recogida);
        ctx_firma_recogida.strokeStyle = x_firma_recogida;
        ctx_firma_recogida.lineWidth = y_firma_recogida;
        ctx_firma_recogida.stroke();
        ctx_firma_recogida.closePath();
    }
    
    function erase_firma_recogida() {
			canvas_firma_recogida.width=canvas_firma_recogida.width;
    }
	
	function getTouchPos_firma_recogida(canvasDom, touchEvent) {
		var rect_firma_recogida = canvasDom.getBoundingClientRect();
		return {
			x: touchEvent.touches[0].clientX - rect_firma_recogida.left,
			y: touchEvent.touches[0].clientY - rect_firma_recogida.top
		};
	}
    
    function findxy_firma_recogida(res, e) {
		var rect = canvas_firma_recogida.getBoundingClientRect();
		
        if (res == 'down') {
            prevX_firma_recogida = currX_firma_recogida;
            prevY_firma_recogida = currY_firma_recogida;
            currX_firma_recogida = e.clientX - rect.left;
            currY_firma_recogida = e.clientY - rect.top;
    
            flag_firma_recogida = true;
            dot_flag_firma_recogida = true;
            if (dot_flag_firma_recogida) {
                ctx_firma_recogida.beginPath();
                ctx_firma_recogida.fillStyle = x_firma_recogida;
                ctx_firma_recogida.fillRect(currX_firma_recogida, currY_firma_recogida, 2, 2);
                ctx_firma_recogida.closePath();
                dot_flag_firma_recogida = false;
            }
        }
        if (res == 'up' || res == "out") {
            flag_firma_recogida = false;
        }
        if (res == 'move') {
            if (flag_firma_recogida) {
                prevX_firma_recogida = currX_firma_recogida;
                prevY_firma_recogida = currY_firma_recogida;
                currX_firma_recogida = e.clientX - rect.left;
                currY_firma_recogida = e.clientY - rect.top;
                draw_firma_recogida();
            }
        }
    }