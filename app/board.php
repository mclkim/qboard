<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-05-24
 * Time: 오전 9:53
 */
//namespace app;
//use \Kaiser\Controller;
use \Kaiser\Response;
use \App\Models\boardModel;
use \App\Domain\Criteria;
use \App\Domain\PageMaker;

class board extends \Kaiser\Controller
{
    protected function requireLogin()
    {
        return false;
    }

    function form()
    {
        $this->debug('register get ..........');
        $tpl = $this->container->get('template');

        $tpl->define(array(
            "content_wrapper" => "board/register.html",
            "control_sidebar" => "include/control_sidebar.html",
            "main_footer" => "include/main_footer.html",
            "main_header" => "include/main_header.html",
            "main_sidebar" => "include/main_sidebar.html",
            "index" => "include/layout.html",
        ));

        $tpl->print_('index');
    }

    function register()
    {
        $this->debug('register post ..........');
        $this->debug($_POST);

        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $model->createRecord($_POST);

        $_SESSION ['msg'] = "SUCCESS";//flashdata

        Response::getInstance()->redirect("?board.listPage");
    }

    function listAll()
    {
        $this->debug('show all list ..........');
        $page = $this->getParameter('page', 1);
        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $list = $model->listPage($page);
//        var_dump($list);
//        exit;
        $tpl = $this->container->get('template');
        $tpl->assign(array(
            "msg" => if_exists($_SESSION, 'msg', null),
            "list" => $list
        ));//flashdata
        unset($_SESSION['msg']);

        $tpl->define(array(
            "content_wrapper" => "board/listCri.html",
            "control_sidebar" => "include/control_sidebar.html",
            "main_footer" => "include/main_footer.html",
            "main_header" => "include/main_header.html",
            "main_sidebar" => "include/main_sidebar.html",
            "index" => "include/layout.html",
        ));

        $tpl->print_('index');
    }

    function listCri()
    {
        $this->debug('show list Page with Criteria ..........');
        $page = $this->getParameter('page', 1);
        $perPageNum = $this->getParameter('perPageNum', 10);
        $cri = new Criteria ($page, $perPageNum);

        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $list = $model->listCriteria($cri);
//        var_dump($list);
//        exit;
        $tpl = $this->container->get('template');
        $tpl->assign(array(
            "msg" => if_exists($_SESSION, 'msg', null),
            "list" => $list
        ));//flashdata
        unset($_SESSION['msg']);

        $tpl->define(array(
            "content_wrapper" => "board/listCri.html",
            "control_sidebar" => "include/control_sidebar.html",
            "main_footer" => "include/main_footer.html",
            "main_header" => "include/main_header.html",
            "main_sidebar" => "include/main_sidebar.html",
            "index" => "include/layout.html",
        ));

        $tpl->print_('index');
    }

    function listPage()
    {
        $this->debug('show list Page with Criteria ..........');
        $page = $this->getParameter('page', 1);
        $perPageNum = $this->getParameter('perPageNum', 10);
        $cri = new Criteria ($page, $perPageNum);

        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $list = $model->listCriteria($cri);

        $pageMaker = new PageMaker ();
        $pageMaker->setUrl('?board.listPage');
        $pageMaker->setCri($cri);
        $pageMaker->setTotalCount($model->countCriteria($cri));
//        var_dump($pageMaker->getPageLayout());
//        exit;
        $tpl = $this->container->get('template');
        $tpl->assign(array(
            "msg" => if_exists($_SESSION, 'msg', null),
            "list" => $list,
            "pageMaker" => $pageMaker->getPageMaker(),
            "pageLayout" => $pageMaker->getPageLayout()
        ));
        unset($_SESSION['msg']);

        $tpl->define(array(
            "content_wrapper" => "board/listPage.html",
            "control_sidebar" => "include/control_sidebar.html",
            "main_footer" => "include/main_footer.html",
            "main_header" => "include/main_header.html",
            "main_sidebar" => "include/main_sidebar.html",
            "index" => "include/layout.html",
        ));

        $tpl->print_('index');
    }

    function readPage()
    {
        $bno = $this->getParameter('bno', 1);
        $page = $this->getParameter('page', 1);
        $perPageNum = $this->getParameter('perPageNum', 10);
        $cri = new Criteria ($page, $perPageNum);

        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $boardVO = $model->readRecord($bno);
//var_dump($boardVO);
        $tpl = $this->container->get('template');
        $tpl->assign(array(
            'cri' => $cri->getCriteria(),
            'boardVO' => $boardVO,
        ));

        $tpl->define(array(
            "content_wrapper" => "board/readPage.html",
            "control_sidebar" => "include/control_sidebar.html",
            "main_footer" => "include/main_footer.html",
            "main_header" => "include/main_header.html",
            "main_sidebar" => "include/main_sidebar.html",
            "index" => "include/layout.html",
        ));

        $tpl->print_('index');
    }

    function removePage()
    {
        $bno = $this->getParameter('bno', 1);
        $page = $this->getParameter('page', 1);
        $perPageNum = $this->getParameter('perPageNum', 10);
        $cri = new Criteria ($page, $perPageNum);

        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $model->removeRecord($bno);

        $_SESSION ['msg'] = "SUCCESS";//flashdata

        Response::getInstance()->redirect("?board.listPage" . '&' . $cri->makeQuery());
    }

    function modifyPage()
    {
        $bno = $this->getParameter('bno', 1);
        $page = $this->getParameter('page', 1);
        $perPageNum = $this->getParameter('perPageNum', 10);
        $cri = new Criteria ($page, $perPageNum);

        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $boardVO = $model->readRecord($bno);

        //var_dump($boardVO);
        $tpl = $this->container->get('template');
        $tpl->assign(array(
            'cri' => $cri->getCriteria(),
            'boardVO' => $boardVO,
        ));

        $tpl->define(array(
            "content_wrapper" => "board/modifyPage.html",
            "control_sidebar" => "include/control_sidebar.html",
            "main_footer" => "include/main_footer.html",
            "main_header" => "include/main_header.html",
            "main_sidebar" => "include/main_sidebar.html",
            "index" => "include/layout.html",
        ));

        $tpl->print_('index');
    }

    function modifyPost()
    {
        $this->debug('modify post ..........');
        $this->debug($_POST);

        $page = $this->getParameter('page', 1);
        $perPageNum = $this->getParameter('perPageNum', 10);
        $cri = new Criteria ($page, $perPageNum);

        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $model->modifyRecord($_POST);

        $_SESSION ['msg'] = "SUCCESS";//flashdata

        Response::getInstance()->redirect("?board.listPage" . '&' . $cri->makeQuery());

    }
}