<?php
use \Kaiser\Controller;
use \Kaiser\Plupload;
use \Kaiser\Response;
use \App\Domain\UploadFileUtils;

/**
 *
 */
class uploadAjax extends Controller
{
    protected function requireLogin()
    {
        return false;
    }

    function execute()
    {
        $tpl = $this->container->get('template');

        $tpl->define(array(
            "index" => "sboard/uploadAjax.html",
        ));

        $tpl->print_('index');
    }

    function upload()
    {
        $this->debug($_POST);
        $this->debug($_FILES);

        $config = $this->container->get('config');

//        $directory = date('Y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d');
//        $dest_dir = $config ['uploadPath'] . DIRECTORY_SEPARATOR . $directory;
//
//        // 절대경로생성
//        // Create target dir
//        if (!file_exists($dest_dir)) {
//            if (!mkdir($dest_dir, 0777, true)) { // 0777
//                throw new \Exception ("Failed to create folders...");
//            }
//        }
//        $directory = UploadFileUtils::calcPath($config ['uploadPath']);
////        var_dump($config);
////        exit;
//        $upload_conf = array_merge($config['plupload'], array(
//            'target_dir' => $directory,
//            'cb_sanitize_file_name' => array(__CLASS__, 'sanitize_file_name'),
//        ));
//        $this->debug($upload_conf);
//
//        $upload = new Plupload ($upload_conf);
//        $upload->no_cache_headers();
//        $upload->cors_headers();
//
//        if (($file = $upload->getFiles()) !== false) {
//            $this->debug($file);
//            $real = $upload->upload();
//            if (is_array($real)) {
//                $this->debug($real);
//            }
//        } else {
//            $this->err($upload->get_error_message());
//        }
        
        $real = UploadFileUtils::uploadFile($config['uploadPath'], $config['plupload']);

        return Response::getInstance()->getTEXT($real['name']);
    }
}