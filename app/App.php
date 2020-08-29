<?php

include ($dir_root . '/controllers/SiteController.php');

/**
 * Class App
 */
class App
{
    private $dir_root;
    private $data;
    
    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->dir_root = $_SERVER['DOCUMENT_ROOT'];
    }
    
    /**
     * App start
     */
    public function run()
    {
        $controller = new SiteController();
        
        $page = 'index';
        
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        
        switch ($page) {
            case 'index':
                $content = $controller->index();
                break;
            case 'create':
                $content = $controller->create();
                break;
            case 'delete':
                $id = null;
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $content = $controller->delete($id);
                break;
            default:
                $content = $controller->index();
        }
        
        if(isset($content['params'])) {
            foreach ($content['params'] as $key => $value) {
                $this->data[$key] = $value;
            }
        }
        
        include($this->dir_root . '/views/layouts/header.php');
        
        include($this->dir_root . $content['view']);
    
        include($this->dir_root . '/views/layouts/footer.php');
    }
}