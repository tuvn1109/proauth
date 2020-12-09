<script>

var fileUpload = null;
var arrFiles = [];
var arrDataF = [];
var arrColor = [];



$('.list-group-item').on('click', function() {
    let dataId = $(this).data("id");
    let dataName = $(this).data("name");
    var json = $.parseJSON($('#json').val());
    var oj = {
        name: dataName,
        id: dataId
    };
    json.push(oj);
    console.log(json);



    $('#json').val(JSON.stringify(json));
    $.ajax({
        url: "/cpanel/createproduct/loaddetail",
        data: {
            id: dataId
        },
        dataType: "json",
        type: "POST",
        success: function(data) {
            $("#divve").empty();
            $.each(data, function(a, b) {
                $("#divve").append('<div class="properties-img" data-id=' + b.id +
                    '><img class="img-fluid w-100" src="/download/image?name=' + b
                    .value + '"></div/>');
            })
        },
        error: function() {}
    });

});

function test() {

}


$('#btn-submit').on('click', function() {
    var formData = new FormData($('#fr_createpro')[0]);
    $.ajax({
        type: 'post',
        url: '/cpanel/product/insert',
        dataType: "json",
        data: formData,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {

            //makeSAlert(data,5000);
            //$("#catlist").load(location.href + " #catlist");
            //$("#noti").html(data);
            //window.setTimeout(function(){location.reload()},1000);
        }
    });
});

$('#btn-add-color').on('click', function() {
    var reader = new FileReader();
    var color = $('#color').val();
    var json = JSON.parse($('#jsoncolor').val());
    var f = $("#inputlayoutcolor")[0].files[0];
    var oj = {
        'file': f,
        'color':color,
    }
    arrDataF.push(oj);

drawTableColor();
});

async function drawTableColor(){

    for (var i = arrDataF.length - 1; i >= 0; i--) {
        var val = arrDataF[i]; 
        var lin = await getBase64(val['file']);
console.log(lin)
    }
}


function getBase64(file) {

 return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => resolve(reader.result);
    reader.onerror = error => reject(error);
});

}
</script>