<?php

namespace App\Http\Controllers;
use App\Models\CustomerModel;
use App\Util\ResponseUtil;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    static $customer_model;
    public function __construct()
    {
        self::$customer_model = new CustomerModel();
    }

    public function lists(Request $request){

        $name       = $request->post('name', '');
        $company    = $request->post('company', '');
        $phone      = $request->post('phone', '');
        $category   = $request->post('category', '');
        $major      = $request->post('major', '');
        $status     = $request->post('status', '');
        $pageIndex  = $request->post('page', 1);
        $pageSize   = 10;

        $search_array = [
            'name'      => $name,
            'company'   => $company,
            'phone'     => $phone,
            'category'  => $category,
            'major'     => $major,
            'status'    => $status,
        ];

        $result = self::$customer_model->selectList($search_array, $pageIndex, $pageSize);

        //data
        $data = $result['data'];
        $select_list = config('common.select_list');
        foreach($data as $k => $v){
            $data[$k]['major_text']       = $v['major'] ? $select_list['major_select'][$v['major']] : '';
            $data[$k]['status_text']      = $v['status'] ? $select_list['status_select'][$v['status']] : '';
            $data[$k]['receipt_text']     = $v['receipt'] ? $select_list['receipt_select'][$v['receipt']] : '';
            $data[$k]['category_text']    = $v['category'] ? $select_list['category_select'][$v['category']] : '';
        }

        //total
        $total = $result['total'];
        $totalPage = intval($total / $pageSize);
        $totalPage = $total % $pageSize == 0 ? $totalPage : $totalPage + 1;

        //show page
        $showPageCount = 7;
        $showPage = range(1, $totalPage);
        if($totalPage > 7){
            $both   = intval($showPageCount / 2);
            if($pageIndex <= $both){
                $showPage = range(1,$showPageCount);
            }
            elseif($pageIndex > $totalPage - $both){
                $showPage = range($totalPage - $showPageCount + 1, $totalPage);
            }
            else{
                $showPage = range($pageIndex - $both,$pageIndex + $both);
            }
        }

        $pageList = [
            'pageIndex' => $pageIndex,
            'total'     => $total,
            'showPage'  => $showPage
        ];

        $view = 'customer.lists';
        if($request->ajax()){
            $view = 'customer.lists_data';
        }

        return view($view, ['data' => $data, 'page_list' => $pageList]);
    }

    public function save(Request $request){
        $id         = $request->post('id', 0);
        $name       = $request->post('name', '');
        $company    = $request->post('company', '');
        $phone      = $request->post('phone', '');
        $wechat     = $request->post('wechat', '');
        $email      = $request->post('email', '');
        $address    = $request->post('address', '');
        $category   = $request->post('category', '');
        $major      = $request->post('major', '');
        $status     = $request->post('status', '');
        $receipt    = $request->post('receipt', '');

        if(empty($name) || empty($company) || empty($phone)){
            return ResponseUtil::responseJson(ResponseUtil::CUSTOMER_EMPTY, '姓名、公司、手机号不能为空');
        }

        $customer = self::$customer_model->getCustomer($name, $company, $phone);
        if($customer && $customer['id'] != $id){
            return ResponseUtil::responseJson(ResponseUtil::CUSTOMER_EXISTS);
        }

        $data = [
            'name'  => $name,
            'company'  => $company,
            'phone'  => $phone,
            'wechat'  => $wechat,
            'email'  => $email,
            'address'  => $address,
            'category'  => $category,
            'major'  => $major,
            'status'  => $status,
            'receipt'  => $receipt,
        ];

        if(empty($id)){
            self::$customer_model->insert($data);
        }
        else{
            self::$customer_model->where('id', $id)->update($data);
        }

        return ResponseUtil::responseJson(ResponseUtil::SUCCESS);
    }

    public function edit(Request $request){
        $id         = $request->post('id', '');
        $customer   = (new CustomerModel())->getCustomerById($id);
        return view('customer.edit', ['data' => $customer]);
    }

    public function show(Request $request){
        $id         = $request->post('id', '');
        $customer   = (new CustomerModel())->getCustomerById($id);
        return view('customer.show', ['data' => $customer]);
    }

    public function remove(Request $request){
        $id         = $request->post('id', '');
        self::$customer_model->where('id', $id)->delete();
        return ResponseUtil::responseJson(ResponseUtil::SUCCESS);
    }

    public function __call($method, $parameters)
    {
        return view('customer.' . $method);
    }

}
