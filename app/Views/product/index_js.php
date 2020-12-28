<script>

    var canvas = new fabric.Canvas('c');
    canvas.setBackgroundImage('/download/image?name=product/24/layout/font.png', canvas.renderAll.bind(canvas), {
        // Needed to position backgroundImage at 0/0
        originX: 'left',
        originY: 'top'
    });


    $('#btn-add-text').click(function () {
        var text = new fabric.IText('Hi , ohio', {
            fontFamily: 'Noto Serif',
            lockRotation: true,
            lockUniScaling: true,
            fontSize: 30,
            left: 100,
            top: 100,
        });
        canvas.add(text);
        canvas.setActiveObject(text);
    });

    $(".divlayout").click(function () {
        $('.divlayout').removeClass("active-lay");
        let img = $(this).data("img");
        $(this).addClass('active-lay');
        canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas), {
            // Needed to position backgroundImage at 0/0
            originX: 'left',
            originY: 'top'
        });
    });


</script>