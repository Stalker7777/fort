<?php

include ($dir_root . '/controllers/Controller.php');
include ($dir_root . '/models/SiteModel.php');

/**
 * Class SiteController
 */
class SiteController extends Controller
{
    /**
     * @return array
     */
    public function index(): array
    {
        $model = new SiteModel();
        
        $result = $model->select();
        
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
                    ]
            ];
    }
    
    /**
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
     * @param int $id
     */
    public function delete(int $id)
    {
        $model = new SiteModel();
        
        $model->delete($id);
        
        $this->redirect('index.php');
    }
    
}