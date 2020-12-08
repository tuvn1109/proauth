<script>

$('.list-group-item').on('click', function () {
    let dataId = $(this).data("id");
    let dataName = $(this).data("name");
    var json = $.parseJSON($('#json').val());
    var oj = {name: dataName,id:dataId};
    json.push(oj);
    console.log(json);



    $('#json').val(JSON.stringify(json));
    $.ajax({
                            url: "/cpanel/createproduct/loaddetail",
                            data:{id:dataId},
                            dataType: "json",
                            type: "POST",
                            success: function (data) {
                                $("#divve").empty();
                               $.each(data,function(a,b){
                                $("#divve").append('<div class="properties-img" data-id='+b.id+'><img class="img-fluid w-100" src="/download/image?name='+b.value+'"></div/>');
                               })
                            },
                            error: function () {
                            }
                        });

});

function test(){
   
}
</script>