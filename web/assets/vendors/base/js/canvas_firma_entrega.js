	//Variables globales del canvas
	var canvas_firma_entrega, ctx_firma_entrega, flag_firma_entrega = false,
        prevX_firma_entrega = 0,
        currX_firma_entrega = 0,
        prevY_firma_entrega = 0,
        currY_firma_entrega = 0,
        dot_flag_firma_entrega = false;

    var x_firma_entrega = "black",
        y_firma_entrega = 2;
    
    function firma_entrega(){
		
		//Definimos dimensiones del canvas
        canvas_firma_entrega = document.getElementById('firma_entrega');
        ctx_firma_entrega = canvas_firma_entrega.getContext("2d");
		canvas_firma_entrega.width = $('#firma_recogida').width();
        w_firma_entrega = canvas_firma_entrega.width;
        h_firma_entrega = canvas_firma_entrega.height;

		
		//Eventos tactiles
		canvas_firma_entrega.addEventListener("touchstart", function (e) {
            e.preventDefault();
			mousePos = getTouchPos_firma_entrega(canvas_firma_entrega, e);
			var touch = e.touches[0];
			var mouseEvent = new MouseEvent("mousedown", {
				clientX: touch.clientX,
				clientY: touch.clientY
			});
			canvas_firma_entrega.dispatchEvent(mouseEvent);
		}, false);
		
		canvas_firma_entrega.addEventListener("touchend", function (e) {
            e.preventDefault();
			var mouseEvent = new MouseEvent("mouseup", {});
			canvas_firma_entrega.dispatchEvent(mouseEvent);
		}, false);
		
		canvas_firma_entrega.addEventListener("touchmove", function (e) {
            e.preventDefault();
			var touch = e.touches[0];
			var mouseEvent = new MouseEvent("mousemove", {
				clientX: touch.clientX,
				clientY: touch.clientY
			});
			canvas_firma_entrega.dispatchEvent(mouseEvent);
		}, false);
    
		//Evento de raton
        canvas_firma_entrega.addEventListener("mousemove", function (e) {
            findxy_firma_entrega('move', e)
        }, false);
        canvas_firma_entrega.addEventListener("mousedown", function (e) {
            findxy_firma_entrega('down', e)
        }, false);
        canvas_firma_entrega.addEventListener("mouseup", function (e) {
            findxy_firma_entrega('up', e)
        }, false);
        canvas_firma_entrega.addEventListener("mouseout", function (e) {
            findxy_firma_entrega('out', e)
        }, false);
    }
    
    function draw_firma_entrega() {
        ctx_firma_entrega.beginPath();
        ctx_firma_entrega.moveTo(prevX_firma_entrega, prevY_firma_entrega);
        ctx_firma_entrega.lineTo(currX_firma_entrega, currY_firma_entrega);
        ctx_firma_entrega.strokeStyle = x_firma_entrega;
        ctx_firma_entrega.lineWidth = y_firma_entrega;
        ctx_firma_entrega.stroke();
        ctx_firma_entrega.closePath();
    }
    
    function erase_firma_entrega() {
			canvas_firma_entrega.width=canvas_firma_entrega.width;
    }
	
	function getTouchPos_firma_entrega(canvasDom, touchEvent) {
		var rect_firma_entrega = canvasDom.getBoundingClientRect();
		return {
			x: touchEvent.touches[0].clientX - rect_firma_entrega.left,
			y: touchEvent.touches[0].clientY - rect_firma_entrega.top
		};
	}
    
    function findxy_firma_entrega(res, e) {
		var rect = canvas_firma_entrega.getBoundingClientRect();
		
        if (res == 'down') {
            prevX_firma_entrega = currX_firma_entrega;
            prevY_firma_entrega = currY_firma_entrega;
            currX_firma_entrega = e.clientX - rect.left;
            currY_firma_entrega = e.clientY - rect.top;
    
            flag_firma_entrega = true;
            dot_flag_firma_entrega = true;
            if (dot_flag_firma_entrega) {
                ctx_firma_entrega.beginPath();
                ctx_firma_entrega.fillStyle = x_firma_entrega;
                ctx_firma_entrega.fillRect(currX_firma_entrega, currY_firma_entrega, 2, 2);
                ctx_firma_entrega.closePath();
                dot_flag_firma_entrega = false;
            }
        }
        if (res == 'up' || res == "out") {
            flag_firma_entrega = false;
        }
        if (res == 'move') {
            if (flag_firma_entrega) {
                prevX_firma_entrega = currX_firma_entrega;
                prevY_firma_entrega = currY_firma_entrega;
                currX_firma_entrega = e.clientX - rect.left;
                currY_firma_entrega = e.clientY - rect.top;
                draw_firma_entrega();
            }
        }
    }