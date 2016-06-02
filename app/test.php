<?php
use \Kaiser\Controller;
use \Kaiser\Plupload;

/**
 * http://localhost/test/public/?hello.world
 */
class test extends Controller
{
    protected function requireLogin()
    {
        return false;
    }

    function execute()
    {
        $tpl = $this->container->get('template');

        $tpl->define(array(
            "index" => "test/uploadForm.html",
        ));

        $tpl->print_('index');
    }

    function upload()
    {
        $this->debug($_POST);
        $this->debug($_FILES);

        $config = $this->container->get('config');

        $upload = new Plupload ($config->get('plupload'));

        $upload->no_cache_headers();
        $upload->cors_headers();

        if (($file = $upload->getFiles()) !== false) {
            $this->debug($file);
            $real = $upload->upload();
            if (is_array($real)) {
                $this->debug($real);
            }
        } else {
            $this->err($upload->get_error_message());
        }

        $tpl = $this->container->get('template');
        $tpl->assign(array(
            'savedName' => $file['name'],
        ));

        $tpl->define(array(
            "index" => "test/uploadResult.html",
        ));

        $tpl->print_('index');
    }

    public static function sanitize_file_name($filename)
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        ) . '_' . $filename;

        return sprintf('%08x-%04x-%04x-%04x-%04x%08x',
            mt_rand(0, 0xffffffff),
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff), mt_rand(0, 0xffffffff)
        ) . '_' . $filename;
    }
}