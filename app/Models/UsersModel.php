<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';

    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    public function getUserByName($username){
        $result = $this->where('username', $username)->first();
        return $result ? $result->toArray() : [];
    }

    public function selectUser(){

    }
}
