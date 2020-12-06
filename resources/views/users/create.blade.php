<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<form action="/user/save" method="post">
    @csrf
    <input type="text" name="username"/>
    <input type="password" name="password"/>
    <input type="text" name="nickname"/>
    <input type="text" name="id"/>
    <input type="button" class="btn_submit" value="登录"/>
</form>

<script typet="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script>
    $('.btn_submit').click(function(){
        $.ajax({
            type    : "post",
            url     : "/user/save",
            // data    : {"username" : $('.username').val(), "password" : $('.password').val()},
            async   : false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success : function(data) {
                console.log(data);
            },
            error:function(xhr,ts,et){
                location.href = '/user/index';
            }
        });
    })
</script>

</html>
