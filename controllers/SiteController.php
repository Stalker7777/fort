<?php

include ($dir_root . '/controllers/Controller.php');
include ($dir_root . '/models/SiteModel.php');

class SiteController extends Controller
{
    public function index()
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
}