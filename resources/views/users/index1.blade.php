<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<input type="text" class="username" name="username"/>
<input type="password" class="password" name="password"/>
<input type="button" class="btn_submit" value="登录"/>

<script typet="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script>
    $('.btn_submit').click(function(){
        $.ajax({
            type    : "post",
            url     : "/back/user/login",
            data    : {"username" : $('.username').val(), "password" : $('.password').val()},
            async   : false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success : function(data) {
                console.log(data);
            },
            error:function(xhr,ts,et){
                location.href = '/back/user/index';
            }
        });
    })
</script>

</html>
