<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-05-26
 * Time: 오후 4:46
 */
use \Kaiser\Controller;
use \Kaiser\Response;
use \App\Models\boardModel;
use \App\Domain\PageMaker;
use \App\Domain\SearchCriteria;

class sboard extends Controller
{
    protected function requireLogin()
    {
        return false;
    }

    function listPage()
    {
        $page = $this->getParameter('page', 1);
        $perPageNum = $this->getParameter('perPageNum', 10);
        $searchType = $this->getParameter('searchType', null);
        $keyword = $this->getParameter('keyword', null);
        $cri = new SearchCriteria ($page, $perPageNum, $searchType, $keyword);

        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $list = $model->listSearchCriteria($cri);

        $pageMaker = new PageMaker ();
        $pageMaker->setCri($cri);
        $pageMaker->setTotalCount($model->countSearchCriteria($cri));
//        var_dump($pageMaker->getPageMaker());
//        exit;
        $tpl = $this->container->get('template');
        $tpl->assign(array(
            "msg" => if_exists($_SESSION, 'msg', null),
            "list" => $list,
            "pageMaker" => $pageMaker->getPageMaker()
        ));
        unset($_SESSION['msg']);

        $tpl->define(array(
            "content_wrapper" => "sboard/listPage.html",
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
        $searchType = $this->getParameter('searchType', null);
        $keyword = $this->getParameter('keyword', null);
        $cri = new SearchCriteria ($page, $perPageNum, $searchType, $keyword);

        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $boardVO = $model->readRecord($bno);
//var_dump($boardVO);
        $tpl = $this->container->get('template');
        $tpl->assign(array(
            'cri' => $cri->getSearchCriteria(),
            'boardVO' => $boardVO,
        ));

        $tpl->define(array(
            "content_wrapper" => "sboard/readPage.html",
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
        $searchType = $this->getParameter('searchType', null);
        $keyword = $this->getParameter('keyword', null);
        $cri = new SearchCriteria ($page, $perPageNum, $searchType, $keyword);

        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $model->removeRecord($bno);

        $_SESSION ['msg'] = "SUCCESS";//flashdata

        Response::getInstance()->redirect("?sboard.listPage" . '&' . $cri->makeQuery());
    }

    function modifyPage()
    {
        $bno = $this->getParameter('bno', 1);
        $page = $this->getParameter('page', 1);
        $perPageNum = $this->getParameter('perPageNum', 10);
        $searchType = $this->getParameter('searchType', null);
        $keyword = $this->getParameter('keyword', null);
        $cri = new SearchCriteria ($page, $perPageNum, $searchType, $keyword);

        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $boardVO = $model->readRecord($bno);

        //var_dump($boardVO);
        $tpl = $this->container->get('template');
        $tpl->assign(array(
            'cri' => $cri->getSearchCriteria(),
            'boardVO' => $boardVO,
        ));

        $tpl->define(array(
            "content_wrapper" => "sboard/modifyPage.html",
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
        $searchType = $this->getParameter('searchType', null);
        $keyword = $this->getParameter('keyword', null);
        $cri = new SearchCriteria ($page, $perPageNum, $searchType, $keyword);

        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $model->modifyRecord($_POST);

        $_SESSION ['msg'] = "SUCCESS";//flashdata

        Response::getInstance()->redirect("?sboard.listPage" . '&' . $cri->makeQuery());

    }

    function registerPage()
    {
        $tpl = $this->container->get('template');

        $tpl->define(array(
            "content_wrapper" => "sboard/registerPage.html",
            "control_sidebar" => "include/control_sidebar.html",
            "main_footer" => "include/main_footer.html",
            "main_header" => "include/main_header.html",
            "main_sidebar" => "include/main_sidebar.html",
            "index" => "include/layout.html",
        ));

        $tpl->print_('index');
    }

    function registerPost()
    {
        $pdo = $this->container->get('QB');
        $model = new boardModel ($pdo); // 디비 연결 객체 생성
        $model->createRecord($_POST);

        $_SESSION ['msg'] = "SUCCESS";//flashdata

        Response::getInstance()->redirect("?sboard.listPage");
    }
}