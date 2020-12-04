<?php

namespace App\Models;

use CodeIgniter\Model;

$db = \Config\Database::connect();

class ServicesModel extends Model
{
    protected $table = 'services';
    protected $allowedFields = ['id', 'type', 'description', 'date', 'services_id'];
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    //--------------------------------------------------------------------

    public function getUniid($uniid){
        $builder = $this->db->table('services');
        $builder->where('uniid', $uniid);
        $result = $builder->get();
        return $result->getRow();
    }

    //--------------------------------------------------------------------

    public function getAll(){
        $builder = $this->db->table('services');
        $result = $builder->get();
        return $result->getResult();
    }

    //--------------------------------------------------------------------

    public function getReq($email){
        $builder = $this->db->table('services');
        $builder->where('email', $email);
        $result = $builder->get();
        return $result->getRow();
    }

    //--------------------------------------------------------------------

    public function updateReq($id, $data){
        $builder = $this->db->table('services');
        $builder->where('id', $id);
        $builder->set($data);
        $builder->update($data);
        $result = $builder->get();
        return $result->getRow();
    }

    //--------------------------------------------------------------------
    
    public function deleteService($id){
        $builder = $this->db->table('services');
        $builder->where('services_id', $id);
        $builder->delete();
        $result = $builder->get();
        return $result->getRow();
    }
}