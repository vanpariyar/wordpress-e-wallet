jQuery(document).ready(function($){
    $('.send-money').click(function(){
        $('#exampleModalCenter').modal();
    });
    $('.t-form').submit(function(e){
        e.preventDefault();
    
        jQuery.ajax({
            type : "post",
            dataType : "json",
            url : myAjax.ajaxurl,
            data : {action: "send_money", user_id : $('#user_id').val(), send_user: $('#exampleFormControlSelect1').val(), amount: $('#exampleFormControlInput1').val() ,type: "send" },
            success: function(response) {
            if(response) {
                console.log(response);
            }
            else {
                console.log(response);
            }
            }
        });  
    });
});