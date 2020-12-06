<table id="sample-table-2" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th>编号</th>
        <th>客户姓名</th>
        <th>公司名称</th>
        <th>联系电话</th>
        <th>客户类别</th>
        <th>重要程度</th>
        <th>客户状态</th>
        <th>合同</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $key => $value)
        <tr>
            <td>{{$value['id']}}</td>
            <td>{{$value['name']}}</td>
            <td>{{$value['company']}}</td>
            <td>{{$value['phone']}}</td>
            <td>{{$value['category_text']}}</td>
            <td>{{$value['major_text']}}</td>
            <td>{{$value['status_text']}}</td>
            <td>{{$value['receipt_text']}}</td>
            <td>
                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                    <a class="blue" href="/back/customer/show?id={{$value['id']}}">
                        <i class="icon-zoom-in bigger-130"></i>
                    </a>
                    <a class="green" href="/back/customer/edit?id={{$value['id']}}">
                        <i class="icon-pencil bigger-130"></i>
                    </a>
                    <a class="red" href="javascript:;" onclick="remove_customer({{$value['id']}});">
                        <i class="icon-trash bigger-130"></i>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="row">
    <div class="col-sm-6">
        <div class="dataTables_info" id="sample-table-2_info">
            一共查询到 <span class="red">{{$page_list['total']}}</span> 条数据
        </div>
    </div>
    @if($page_list['total'] > 0)
        <div class="col-sm-6">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination">
                    @foreach($page_list['showPage'] as $index)
                        <li @if($page_list['pageIndex'] == $index) class="active page-select-val" val="{{$index}}" @endif>
                            <a href="javascript:;" onclick="search_customer_list({{$index}})">{{$index}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
