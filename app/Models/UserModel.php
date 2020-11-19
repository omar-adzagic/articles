<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $allowedFields = ['first_name', 'last_name', 'email', 'password', 'created_at', 'updated_at'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data) {

        return $data;
    }

    protected function beforeUpdate(array $data) {

        return $data;
    }
}