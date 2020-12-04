<?php

namespace App\Models;

use CodeIgniter\Model;

$db = \Config\Database::connect();

class MasterModel extends Model
{
    protected $table = 'master';
    protected $allowedFields = ['id','com_email', 'com_address', 'com_phone', 'project_completed', 'happy_clients'];
    protected $primaryKey = 'id';

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // public function getUniid($uniid){
    //     $builder = $this->db->table('master');
    //     $builder->where('uniid', $uniid);
    //     $result = $builder->get();
    //     return $result->getRow();
    // }

    public function getOne(){
        $builder = $this->db->table('master');
        $result = $builder->get();
        return $result->getRow();
    }

    public function updateMaster($data){
        $builder = $this->db->table('master');
        $builder->where('id', '1');
        $builder->set($data);
        $builder->update($data);
        $result = $builder->get();
        return $result->getRow();
    }


    public function updateSocial($data){
        $builder = $this->db->table('master');
        $builder->where('id', '1');
        $builder->set($data);
        $builder->update($data);
        $result = $builder->get();
        return $result->getRow();
    }
}