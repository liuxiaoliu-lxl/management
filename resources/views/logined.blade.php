
<div class="navbar navbar-default" id="navbar">
    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    <i class="icon-leaf"></i>

                </small>
            </a><!-- /.brand -->
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right" role="navigation">
            @if (Session::get('user.id') > 0)
                <ul class="nav ace-nav">
                    <li class="light-blue">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="{{URL::asset('assets/avatars/user.jpg')}}" alt="Jason's Photo" />
                            <span class="user-info">
                                        <small>欢迎光临,</small>
                                        {{Session::get('user.nickname')}}
                                    </span>
                            <i class="icon-caret-down"></i>
                        </a>
                        <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a href="#">
                                    <i class="icon-cog"></i>
                                    设置
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-user"></i>
                                    个人资料
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="/back/user/loginOut">
                                    <i class="icon-off"></i>
                                    退出
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul><!-- /.ace-nav -->
            @endif
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</div>

