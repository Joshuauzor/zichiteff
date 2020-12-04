<?php

namespace App\Models;

use CodeIgniter\Model;

$db = \Config\Database::connect();

class RequestModel extends Model
{
    protected $table = 'requests';
    protected $allowedFields = ['name', 'email', 'phone', 'location', 'service_id', 'action_by', 'message'];
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    //--------------------------------------------------------------------

    public function getUniid($uniid){
        $builder = $this->db->table('requests');
        $builder->where('uniid', $uniid);
        $result = $builder->get();
        return $result->getRow();
    }

    //--------------------------------------------------------------------

    public function getAll(){
        $builder = $this->db->table('requests');
        $builder->join('services', 'requests.service_id = services.services_id');
        $builder->join('status', 'requests.status_id = status.stat_id');
        $builder->orderBy('id', 'DESC');
        $result = $builder->get();
        return $result->getResult();
    }

    
    // public function getAllExport(){
    //     $builder = $this->db->table('requests');
    //     $builder->join('services', 'requests.service_id = services.services_id');
    //     $builder->join('status', 'requests.status_id = status.stat_id');
    //     $result = $builder->get();
    //     return $result->getResultArray();
    // }

    //--------------------------------------------------------------------

    public function getReq($email){
        $builder = $this->db->table('requests');
        $builder->where('email', $email);
        $result = $builder->get();
        return $result->getRow();
    }

    //--------------------------------------------------------------------

    public function updateReq($id, $data){
        $builder = $this->db->table('requests');
        $builder->where('id', $id);
        $builder->set($data);
        $builder->update($data);
        $result = $builder->get();
        return $result->getRow();
    }

    //--------------------------------------------------------------------

    public function getPending(){
        $builder = $this->db->table('requests');
        $builder->where('status_id', '1');
        $builder->join('services', 'requests.service_id = services.services_id');
        $builder->join('status', 'requests.status_id = status.stat_id');
        $builder->orderBy('id', 'DESC');
        $result = $builder->get();
        return $result->getResult();
    }

    //--------------------------------------------------------------------

    public function getInProgress(){
        $builder = $this->db->table('requests');
        $builder->where('status_id', '2');
        $builder->join('services', 'requests.service_id = services.services_id');
        $builder->join('status', 'requests.status_id = status.stat_id');
        $builder->orderBy('id', 'DESC');        $result = $builder->get();
        return $result->getResult();
    }
    
    //--------------------------------------------------------------------

    public function getOnhold(){
        $builder = $this->db->table('requests');
        $builder->where('status_id', '3');
        $builder->join('services', 'requests.service_id = services.services_id');
        $builder->join('status', 'requests.status_id = status.stat_id');
        $builder->orderBy('id', 'DESC');        $result = $builder->get();
        return $result->getResult();
    }
    
    //--------------------------------------------------------------------

    public function getCompleted(){
        $builder = $this->db->table('requests');
        $builder->where('status_id', '4');
        $builder->join('services', 'requests.service_id = services.services_id');
        $builder->join('status', 'requests.status_id = status.stat_id');
        $builder->orderBy('id', 'DESC');        $result = $builder->get();
        return $result->getResult();
    }

    //--------------------------------------------------------------------

    // get 5 Total req and in descending order
    public function getRecentReq(){
        $builder = $this->db->table('requests');
        $builder->orderBy('id', 'DESC');
        $builder->join('status', 'requests.status_id = status.stat_id');
        $builder->join('services', 'requests.service_id = services.services_id');
        $builder->limit(5);
        $result = $builder->get();
        return $result->getResult();
    }
}