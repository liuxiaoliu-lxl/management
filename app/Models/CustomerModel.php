<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{

    protected $table = 'customer';

    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    public function getCustomerById($id){
        $result = $this->where('id', $id)->first();
        return $result ? $result->toArray() : [];
    }

    public function getCustomer($name, $company, $phone){
        $where = [
            ['name', '=', $name],
            ['company', '=', $company],
            ['phone', '=', $phone]
        ];

        $result = $this->where($where)->first();

        return $result ? $result->toArray() : [];
    }

    public function selectList($search_array, $pageIndex, $pageSize){

        $where = [];

        if(!empty($search_array['name'])){
            $where[] = ['name', 'like', $search_array['name'] . '%'];
        }

        if(!empty($search_array['company'])){
            $where[] = ['company', 'like', $search_array['company'] . '%'];
        }

        if(!empty($search_array['phone'])){
            $where[] = ['phone', '=', $search_array['phone']];
        }

        if(!empty($search_array['category'])){
            $where[] = ['category', '=', $search_array['category']];
        }

        if(!empty($search_array['major'])){
            $where[] = ['major', '=', $search_array['major']];
        }

        if(!empty($search_array['status'])){
            $where[] = ['status', '=', $search_array['status']];
        }

        $pageIndex  = $pageIndex > 0 ? $pageIndex : 1;
        $pageSize   = $pageSize  > 0 ? $pageSize  : 10;

        $data = $this->where($where)
            ->limit($pageSize)
            ->offset(($pageIndex - 1) * $pageSize)
            ->orderBy('id', 'desc')->get();

        $total = $this->where($where)->count();

        $result = [
            'data' => $data ? $data->toArray() : [],
            'total'=> $total
        ];

        return $result;

    }

}
