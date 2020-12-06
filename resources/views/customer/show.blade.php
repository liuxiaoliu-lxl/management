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
                    <li class="active">客户展示</li>
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
                                    {{$data['name']}}
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 公司名称： </label>
                                <div class="col-sm-9">
                                    {{$data['company']}}
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 联系电话： </label>
                                <div class="col-sm-9">
                                    {{$data['phone']}}
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微信： </label>
                                <div class="col-sm-9">
                                    {{$data['wechat']}}
                                </div>
                            </div>
                            <div class="space-4"></div><div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 邮箱： </label>
                                <div class="col-sm-9">
                                    {{$data['email']}}
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 住址： </label>
                                <div class="col-sm-9">
                                    {{$data['address']}}
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 客户类别： </label>
                                <div class="col-sm-9">
                                    @if($data['category'])
                                        {{config('common.select_list')['category_select'][$data['category']]}}
                                    @endif
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 重要程度： </label>
                                <div class="col-sm-9">
                                    @if($data['major'])
                                        {{config('common.select_list')['major_select'][$data['major']]}}
                                    @endif
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 客户状态： </label>
                                <div class="col-sm-9">
                                    @if($data['status'])
                                        {{config('common.select_list')['status_select'][$data['status']]}}
                                    @endif
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 合同： </label>
                                <div class="col-sm-9">
                                    @if($data['receipt'])
                                        {{config('common.select_list')['receipt_select'][$data['receipt']]}}
                                    @endif
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
