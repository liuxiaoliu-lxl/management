@include('header')
@include('logined')
<style>
    .customer-search-form label{
        margin-left: 20px;
    }
    .search-div{
        margin:20px 0;
    }
</style>
<div class="main-container" id="main-container">
    <div class="main-container-inner">
        @include('menu')
        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="#">首页</a>
                    </li>
                    <li class="active">客户列表</li>
                </ul><!-- .breadcrumb -->

            </div>
            <div class="page-content">
                <div class="search-div">
                    <form class="form-horizontal customer-search-form" role="form">
                        @csrf
                        <span>姓名:</span>
                        <input type="text" id="form-field-1" placeholder="" style="width: 100px;" name="name" />
                        <label>公司:</label>
                        <input type="text" id="form-field-1" placeholder="" style="width: 100px;" name="company" />
                        <label>类别:</label>
                        <select class="width-80 chosen-select" name="category" id="form-field-select-3">
                            @foreach(config('common.select_list')['category_select'] as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <label>重要程度:</label>
                        <select class="width-80 chosen-select" name="major" id="form-field-select-3">
                            @foreach(config('common.select_list')['major_select'] as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <label>状态:</label>
                        <select class="width-80 chosen-select" name="status" id="form-field-select-3">
                            @foreach(config('common.select_list')['status_select'] as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <label></label>
                        <button type="button" class="btn btn-sm btn-success btn-submit">
                            Search
                        </button>
                    </form>
                </div>
                <div class="customer-lists-data">
                    @include('customer/lists_data')
                </div>
            </div><!-- /.page-content -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->

<script>
    $(function(){
        $(".chosen-select").chosen({
            'width' : '100px',
            'color' : '#858585',
            'border': '1px solid #d5d5d5'
        });

        $(".btn-submit").click(function(){
            search_customer_list(1);
        });
    })

    function search_customer_list(page){
        let data = $('.customer-search-form').serialize() + '&page=' + page;
        $.ajax({
            type: "get",
            url: "/back/customer/lists" ,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                $('.customer-lists-data').html(result);
            },
            error : function() {
                alert("异常！");
            }
        });
    }

    function remove_customer(id){
        if(confirm('确认删除?')){
            $.ajax({
                type: "post",
                url: "/back/customer/remove" ,
                data: {"id" : id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (result) {
                    let page = $('.page-select-val').attr('val');
                    search_customer_list(page);
                },
                error : function() {
                    alert("异常！");
                }
            });
        }
    }
</script>
@include('footer')
