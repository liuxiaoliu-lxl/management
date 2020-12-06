@include('header')
@include('logined')
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>
        @include('menu')
        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="#">首页</a>
                    </li>
                    <li>客户管理</li>
                    <li class="active">修改客户</li>
                </ul>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <form class="form-horizontal customer-create-form" role="form">
                            @csrf
                            <input type="hidden" name="id" value="{{$data['id']}}"/>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 客户姓名： </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-3" name="name" value="{{$data['name']}}" />
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 公司名称： </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-3" name="company" value="{{$data['company']}}" />
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 联系电话： </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-3" name="phone" value="{{$data['phone']}}" />
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微信： </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-3" name="wechat" value="{{$data['wechat']}}" />
                                </div>
                            </div>
                            <div class="space-4"></div><div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 邮箱： </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-3" name="email" value="{{$data['email']}}" />
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 住址： </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-3" name="address" value="{{$data['address']}}" />
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 客户类别： </label>
                                <div class="col-sm-9">
                                    <select class="width-80 chosen-select" name="category" id="form-field-select-3">
                                        @foreach(config('common.select_list')['category_select'] as $key => $value)
                                            <option value="{{$key}}" @if($key == $data['category']) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 重要程度： </label>
                                <div class="col-sm-9">
                                    <select class="width-80 chosen-select" name="major" id="form-field-select-3">
                                        @foreach(config('common.select_list')['major_select'] as $key => $value)
                                            <option value="{{$key}}" @if($key == $data['major']) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 客户状态： </label>
                                <div class="col-sm-9">
                                    <select class="width-80 chosen-select" name="status" id="form-field-select-3">
                                        @foreach(config('common.select_list')['status_select'] as $key => $value)
                                            <option value="{{$key}}" @if($key == $data['status']) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 合同： </label>
                                <div class="col-sm-9">
                                    <select class="width-80 chosen-select" name="receipt" id="form-field-select-3">
                                        @foreach(config('common.select_list')['receipt_select'] as $key => $value)
                                            <option value="{{$key}}" @if($key == $data['receipt']) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  </label>
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-sm btn-success btn-submit">
                                        Submit
                                        <i class="icon-arrow-right icon-on-right bigger-110"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="space-4"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $(".chosen-select").chosen({
            'width' : '25%',
            'color' : '#858585',
            'border': '1px solid #d5d5d5'
        });

        $(".btn-submit").click(function(){
            $.ajax({
                //几个参数需要注意一下
                type: "post",//方法类型
                dataType: "json",//预期服务器返回的数据类型
                url: "/back/customer/save" ,//url
                data: $('.customer-create-form').serialize(),
                success: function (result) {
                    if(result.code == 200){
                        alert('修改成功');
                    }
                    else{
                        alert(result.msg);
                    }
                },
                error : function() {
                    alert("异常！");
                }
            });
        });
    })
</script>
@include('footer')
