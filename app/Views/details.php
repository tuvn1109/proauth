<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script src="/assets/js/fabric.min.js"></script>
    <style>
        canvas {
            margin: auto;
            border: 1px solid rgb(204, 204, 204);
            position: absolute;
            touch-action: none;
            user-select: none;
        }

        .canvas-container {
            margin: auto;
        }

    </style>
</head>

<canvas id="c" width="1000" height="1000" class="lower-canvas"></canvas>
<div id="info"></div>
<button type="button" onclick="testt('https://i.pinimg.com/originals/44/5e/e8/445ee8895ef81f2c02b38147e8ad6ae6.jpg')">
    click
</button>
<script>

    var canvas = new fabric.Canvas('c');

    var info = document.getElementById('info');

    canvas.on({
        'touch:drag': function () {
            var text = document.createTextNode(' Dragging ');
           console.log('xxx')
        },
    });
    (function () {
        canvas.setBackgroundImage('https://image.freepik.com/free-psd/blank-white-kids-t-shirt-mockup-template_34168-966.jpg', canvas.renderAll.bind(canvas), {
            // Needed to position backgroundImage at 0/0
            width: canvas.width,
            height: canvas.height,
            pacity: 0.5,
            originX: 'left',
            originY: 'top',
        });

    })();

    function testt(link) {
        fabric.Image.fromURL('https://i.imgur.com/CGsxrJY.png', function (oImg) {
            oImg.scaleToWidth(100);
            canvas.add(oImg);
        })
        var text20 = new fabric.Text("I'm at fontSize 20", {
            fontSize: 25
        });
        canvas.add(text20);
        var ai = canvas.getObjects();
        console.log(ai)

    }
</script>

