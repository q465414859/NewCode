$(function(){
    $('#submit').on('click',function () {
        login_button();
    });
});

function login_button() {
    var userd     = $('#user').val();
    var passwordd = $('#password').val();

    $.post(
        '/bac/login/checkout',
        {user:userd,password:passwordd},
        function(result){
            var result = JSON.parse(result);

            console.log(result);
            console.log(result.url);

            window.location.href = result.url;

        }
    );
}