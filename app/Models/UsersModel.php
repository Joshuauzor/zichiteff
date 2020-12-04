<?php

namespace App\Models;

use CodeIgniter\Model;

$db = \Config\Database::connect();

class UsersModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['uniid','firstname', 'lastname', 'status', 'email', 'phone', 'profile_pics', 'gender', 'password', 'rights', 'updated_at'];
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getUniid($uniid){
        $builder = $this->db->table('users');
        $builder->where('uniid', $uniid);
        $result = $builder->get();
        return $result->getRow();
    }

    public function getAll(){
        $builder = $this->db->table('users');
        $result = $builder->get();
        return $result->getResult();
    }

    public function getEmail($email){
        $builder = $this->db->table('users');
        $builder->where('email', $email);
        $result = $builder->get();
        return $result->getRow();
    }

    public function updateUser($uniid, $data){
        $builder = $this->db->table('users');
        $builder->where('uniid', $uniid);
        $builder->set($data);
        $builder->update($data);
        $result = $builder->get();
        return $result->getRow();
    }

    public function updateEmail($email, $data){
        $builder = $this->db->table('users');
        $builder->where('email', $email);
        $builder->set($data);
        $builder->update($data);
        $result = $builder->get();
        return $result->getRow();
    }

    public function insertLoginInfo($data){
        $builder = $this->db->table('loginactivity');
        $builder->insert($data);
        return $this->db->insertID(); //intelliphense doesn't recognise new syntax yet
    }

    public function updateLogoutTime($id){
        $builder = $this->db->table('loginactivity');
        $builder->where('id', $id);
        $builder->update(['logout_time' => date('Y-m-d h:i:s')]);
        $result = $builder->get();
        return $result->getRow();
    }

    public function getloginActivity($id){
        $builder = $this->db->table('loginactivity');
        $builder->where('uniid', $id);
        $builder->orderBy('id', 'DESC');
        $builder->limit('5');
        $result = $builder->get();
        return $result->getResult();
    }
}