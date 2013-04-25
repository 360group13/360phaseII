$("button#submit").click(function () {
    if( $("#username").val() === "" || $("#password").val() === "" )
        $("div#ack").html("Please enter both username and password");
    else
        $.post($("#loginForm").attr("action"),
               $("#loginForm :input").serialize(),
               function(data) {
                   $("div#ack").html(data);
               });
    
    $("#loginForm").submit(function () {
       return false;
    });
});