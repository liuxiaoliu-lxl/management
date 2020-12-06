@include('header')
<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <i class="icon-leaf green"></i>
                            <span class="red">0.0</span>
                            <span class="white">back</span>
                        </h1>
                        <h4 class="blue">&copy; hello</h4>
                    </div>
                    <div class="space-6"></div>
                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="icon-coffee green"></i>
                                        Please Enter Your Information
                                    </h4>
                                    <div class="space-6"></div>
                                        <fieldset>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="text" class="form-control username" placeholder="Username" />
                                                    <i class="icon-user"></i>
                                                </span>
                                            </label>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="password" class="form-control password" placeholder="Password" />
                                                    <i class="icon-lock"></i>
                                                </span>
                                            </label>
                                            <label class="hidden clearfix login-error-msg">
                                                <span class="block input-icon input-icon-right red"></span>
                                            </label>
                                            <div class="space"></div>
                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"> Remember Me</span>
                                                </label>
                                                <button type="button" class="width-35 pull-right btn btn-sm btn-primary btn-submit">
                                                    <i class="icon-key"></i>
                                                    Login
                                                </button>
                                            </div>
                                            <div class="space-4"></div>
                                        </fieldset>

                                </div><!-- /widget-main -->
                            </div><!-- /widget-body -->
                        </div><!-- /login-box -->
                    </div><!-- /position-relative -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div><!-- /.main-container -->
<script>
    $('.btn-submit').click(function(){
        login_submit();
    })

    $(document).keypress(function(e){
        if(e.keyCode==13){
            login_submit();
        }
    })

    function login_submit(){
        $.ajax({
            type    : "post",
            url     : "/back/user/login",
            data    : {"username" : $('.username').val(), "password" : $('.password').val()},
            dataType: 'json',
            async   : false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success : function(data) {
                if(data.code != 200){
                    $('.login-error-msg').removeClass('hidden').addClass('block').find('span').text(data.msg);
                }
                else{
                    location.href = '/back/customer/lists'
                }
            }
        });
    }
</script>
@include('footer')

