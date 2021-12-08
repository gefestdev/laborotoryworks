$(function(){
    $('.report__accept').click(function(){
        var clickId = this.id;
        $.ajax({
            type: "GET",
            url: '/php/check_work.php',
            data: {id: clickId},
            success: function(data){
                location.reload();
            }
        });
    });
});