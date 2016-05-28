<?php
use \Kaiser\Controller;

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
            "index" => "reply/ex00.html",
        ));

        $tpl->print_('index');
    }
}