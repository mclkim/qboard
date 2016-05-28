<?php
use \Kaiser\Controller;

/**
 * http://localhost/test/public/?index
 */
class index extends Controller
{
    protected function requireLogin()
    {
        return false;
    }

    function execute()
    {
//        echo 'Kaiser PHP framework~~';
        $tpl = $this->container->get('template');
//        $tpl->assign($var);
        $tpl->define(array(
            "content_wrapper" => "include/content_wrapper.html",
            "control_sidebar" => "include/control_sidebar.html",
            "main_footer" => "include/main_footer.html",
            "main_header" => "include/main_header.html",
            "main_sidebar" => "include/main_sidebar.html",
            "index" => "include/layout.html",
        ));

        $tpl->print_('index');
        flush();
    }
}