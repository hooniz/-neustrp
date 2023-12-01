$('.sale').click(function (e) {
    let id = $('.sale').attr('id');
    $.ajax({
        type: "post",
        url: "/myActions/sale",
        data: {
            id: id
        }
    }).done(function (e){
        if(e == 1)
        {
            location.href = "/myActions/index";
        }
    }).fail(function (e){
        console.log(e);
    });
});