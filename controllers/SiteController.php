<?php

include ($dir_root . '/controllers/Controller.php');
include ($dir_root . '/models/SiteModel.php');

/**
 * Class SiteController
 */
class SiteController extends Controller
{
    /**
     * list objects
     *
     * @return array
     */
    public function index(): array
    {
        $model = new SiteModel();
    
        $find_name = null;
        $find_note = null;
    
        if(isset($_POST['find_name'])) {
            $find_name = $_POST['find_name'];
        }
    
        if(isset($_POST['find_note'])) {
            $find_note = $_POST['find_note'];
        }
    
        $find = null;
    
        if(!is_null($find_name)) {
            $find['name'] = $find_name;
        }
    
        if(!is_null($find_note)) {
            $find['note'] = $find_note;
        }

        $result = $model->select($find);
        
        if($result['error']) {
            $error_text = $result['message'];
        }
        else {
            $rows = $result['data'];
        }
        
        return
            [
                'view' => '/views/site/index.php',
                'params' =>
                    [
                        'error_text' => $error_text,
                        'rows' => $rows,
                        'find_name' => $find_name,
                        'find_note' => $find_note,
                    ]
            ];
    }
    
    /**
     * create object
     *
     * @return array
     */
    public function create(): array
    {
        $model = new SiteModel();
        
        if($this->isPost()) {
            
            $model->load($_POST);
            
            $result = $model->valid();
            
            if($result['error']) {
                $error_text = $result['message'];
            }
            else {
                
                $result = $model->insert();
                
                if($result['error']) {
                    $error_text = $result['message'];
                }
                else {
                    $this->redirect('index.php');
                }
            }
        }
        
        return
            [
                'view' => '/views/site/create.php',
                'params' =>
                    [
                        'error_text' => $error_text,
                        'name' => $model->name,
                        'note' => $model->note,
                    ]
            ];
    }
    
    /**
     * delete object
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $model = new SiteModel();
        
        $model->delete($id);
        
        $this->redirect('index.php');
    }
    
}