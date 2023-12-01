$('.buy').click(function (e) {
    let id = $('.buy').attr('id');
    $.ajax({
        type: "post",
        url: "/buyActions/buy",
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