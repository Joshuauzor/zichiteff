<?php namespace App\Controllers\Admin;
use CodeIgniter\Controller;
// import configurations
use Config\Services;
use Config\Database;

// import model
use App\Models\UsersModel;
use App\Models\MasterModel;
use App\Models\RequestModel;

class Export extends Controller
{

    public function __construct()
    {
        helper(['form','url','date']);
    }

    public function total(){
        $session = session();
        $RequestModel = new RequestModel();

        if(! session()->get('isLoggedIn'))
		return  redirect()->to(base_url('auth'));

       
        if($this->request->getMethod() == 'post'){
            $file_name = 'total_request_on_'.date('Ymd').'.csv';

            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Type: application/csv;");

            $total_stock = $RequestModel->getAll();

                $results = array();
                $i = 1;
                foreach($total_stock as $row) {
                    $data['id'] = $i++;
                    $data['name'] = $row->name;                   
                    $data['email'] = $row->email;
                    $data['phone'] = $row->phone;
                    $data['location'] = $row->location;
                    $data['type'] = $row->type;
                    $data['message'] = $row->message;
                    $data['status_name'] = $row->status_name;
                    $data['date'] = date('l d M Y h:i:s a', strtotime($row->date));
                   
                    $results[] = $data;
                }
                // var_dump($results); die;
    
            $file = fopen('php://output', 'w');
    
            $header = array('#', 'NAME', 'EMAIL', 'PHONE NUMBER', 'LOCATION', 'SERVICE', 'DESCRIPTION', 'STATUS', 'DATE');
    
            fputcsv($file, $header);
    
            foreach($results as $row){
                fputcsv($file, $row);
            }
            fclose($file);
            exit;  
         }
    }

    //--------------------------------------------------------------------

    public function pending(){
        $session = session();
        $RequestModel = new RequestModel();

        if(! session()->get('isLoggedIn'))
		return  redirect()->to(base_url('auth'));

       
        if($this->request->getMethod() == 'post'){
            $file_name = 'total_pending_request_on_'.date('Ymd').'.csv';

            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Type: application/csv;");

            $total_stock = $RequestModel->getPending();

                $results = array();
                $i = 1;
                foreach($total_stock as $row) {
                    $data['id'] = $i++;
                    $data['name'] = $row->name;                   
                    $data['email'] = $row->email;
                    $data['phone'] = $row->phone;
                    $data['location'] = $row->location;
                    $data['type'] = $row->type;
                    $data['message'] = $row->message;
                    $data['status_name'] = $row->status_name;
                    $data['date'] = date('l d M Y h:i:s a', strtotime($row->date));
                   
                    $results[] = $data;
                }
                // var_dump($results); die;
    
            $file = fopen('php://output', 'w');
    
            $header = array('#', 'NAME', 'EMAIL', 'PHONE NUMBER', 'LOCATION', 'SERVICE', 'DESCRIPTION', 'STATUS', 'DATE');
    
            fputcsv($file, $header);
    
            foreach($results as $row){
                fputcsv($file, $row);
            }
            fclose($file);
            exit;  
         }
    }

    //--------------------------------------------------------------------

    public function inProgress(){
        $session = session();
        $RequestModel = new RequestModel();

        if(! session()->get('isLoggedIn'))
		return  redirect()->to(base_url('auth'));

       
        if($this->request->getMethod() == 'post'){
            $file_name = 'total_request_in_progress_on_'.date('Ymd').'.csv';

            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Type: application/csv;");

            $total_stock = $RequestModel->getInProgress();

                $results = array();
                $i = 1;
                foreach($total_stock as $row) {
                    $data['id'] = $i++;
                    $data['name'] = $row->name;                   
                    $data['email'] = $row->email;
                    $data['phone'] = $row->phone;
                    $data['location'] = $row->location;
                    $data['type'] = $row->type;
                    $data['message'] = $row->message;
                    $data['status_name'] = $row->status_name;
                    $data['date'] = date('l d M Y h:i:s a', strtotime($row->date));
                   
                    $results[] = $data;
                }
                // var_dump($results); die;
    
            $file = fopen('php://output', 'w');
    
            $header = array('#', 'NAME', 'EMAIL', 'PHONE NUMBER', 'LOCATION', 'SERVICE', 'DESCRIPTION', 'STATUS', 'DATE');
    
            fputcsv($file, $header);
    
            foreach($results as $row){
                fputcsv($file, $row);
            }
            fclose($file);
            exit;  
         }
    }
    //--------------------------------------------------------------------

    public function onHold(){
        $session = session();
        $RequestModel = new RequestModel();

        if(! session()->get('isLoggedIn'))
		return  redirect()->to(base_url('auth'));

       
        if($this->request->getMethod() == 'post'){
            $file_name = 'total_request_on_hold_on_'.date('Ymd').'.csv';

            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Type: application/csv;");

            $total_stock = $RequestModel->getOnhold();

                $results = array();
                $i = 1;
                foreach($total_stock as $row) {
                    $data['id'] = $i++;
                    $data['name'] = $row->name;                   
                    $data['email'] = $row->email;
                    $data['phone'] = $row->phone;
                    $data['location'] = $row->location;
                    $data['type'] = $row->type;
                    $data['message'] = $row->message;
                    $data['status_name'] = $row->status_name;
                    $data['date'] = date('l d M Y h:i:s a', strtotime($row->date));
                   
                    $results[] = $data;
                }
                // var_dump($results); die;
    
            $file = fopen('php://output', 'w');
    
            $header = array('#', 'NAME', 'EMAIL', 'PHONE NUMBER', 'LOCATION', 'SERVICE', 'DESCRIPTION', 'STATUS', 'DATE');
    
            fputcsv($file, $header);
    
            foreach($results as $row){
                fputcsv($file, $row);
            }
            fclose($file);
            exit;  
         }
    }
    //--------------------------------------------------------------------
    public function completed(){
        $session = session();
        $RequestModel = new RequestModel();

        if(! session()->get('isLoggedIn'))
		return  redirect()->to(base_url('auth'));

       
        if($this->request->getMethod() == 'post'){
            $file_name = 'total_request_completed_on_'.date('Ymd').'.csv';

            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Type: application/csv;");

            $total_stock = $RequestModel->getCompleted();

                $results = array();
                $i = 1;
                foreach($total_stock as $row) {
                    $data['id'] = $i++;
                    $data['name'] = $row->name;                   
                    $data['email'] = $row->email;
                    $data['phone'] = $row->phone;
                    $data['location'] = $row->location;
                    $data['type'] = $row->type;
                    $data['message'] = $row->message;
                    $data['status_name'] = $row->status_name;
                    $data['date'] = date('l d M Y h:i:s a', strtotime($row->date));
                   
                    $results[] = $data;
                }
                // var_dump($results); die;
    
            $file = fopen('php://output', 'w');
    
            $header = array('#', 'NAME', 'EMAIL', 'PHONE NUMBER', 'LOCATION', 'SERVICE', 'DESCRIPTION', 'STATUS', 'DATE');
    
            fputcsv($file, $header);
    
            foreach($results as $row){
                fputcsv($file, $row);
            }
            fclose($file);
            exit;  
         }
    }

    //--------------------------------------------------------------------
}