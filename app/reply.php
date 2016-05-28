<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-05-27
 * Time: 오후 12:30
 */
use \Kaiser\Controller;
use \Kaiser\Request;
use \Kaiser\Response;
use \App\Models\replyModel;
use \App\Domain\PageMaker;
use \App\Domain\Criteria;

class reply extends Controller
{
    protected function requireLogin()
    {
        return false;
    }

    function execute()
    {
        $method = Request::getInstance()->method();
        switch ($method) {
            case 'GET':
                $this->listTemplate();
                break;
            case 'POST':
                $this->registerPost();
                break;
            case 'PUT':
                $this->modifyPeply();
                break;
            case 'DELETE':
                $this->removePeply();
                break;
        }
    }

    function registerPost()
    {
        $request_body = Request::getInstance()->getContent();
        $reply = json_decode(stripcslashes($request_body), true);
        $this->debug($reply);

        $pdo = $this->container->get('QB');
        $model = new replyModel ($pdo); // 디비 연결 객체 생성
        $model->createReply($reply);

        return Response::getInstance()->getTEXT('SUCCESS');
    }

    function listPeply()
    {
        $bno = $this->getParameter('bno');
        $pdo = $this->container->get('QB');
        $model = new replyModel ($pdo); // 디비 연결 객체 생성
        $list = $model->listReply($bno);

        return Response::getInstance()->getJSON($list);
    }

    function modifyPeply()
    {
        $rno = $this->getParameter('rno');
        $request_body = Request::getInstance()->getContent();
        $reply = json_decode(stripcslashes($request_body), true);
        $this->debug($reply);

        $pdo = $this->container->get('QB');
        $model = new replyModel ($pdo); // 디비 연결 객체 생성
        $model->updateReply($rno, $reply);

        return Response::getInstance()->getTEXT('SUCCESS');
    }

    function removePeply()
    {
        $rno = $this->getParameter('rno');
        $pdo = $this->container->get('QB');
        $model = new replyModel ($pdo); // 디비 연결 객체 생성
        $model->deleteReply($rno);

        return Response::getInstance()->getTEXT('SUCCESS');
    }

    function listPage()
    {
        $bno = $this->getParameter('bno');
        $page = $this->getParameter('page');
        $perPageNum = $this->getParameter('perPageNum');
        $cri = new Criteria ($page, $perPageNum);

        $pdo = $this->container->get('QB');
        $model = new replyModel ($pdo); // 디비 연결 객체 생성
        $list = $model->listPage($bno, $cri);

        $pageMaker = new PageMaker ();
        $pageMaker->setCri($cri);
        $pageMaker->setTotalCount($model->countCriteria($bno));
        $ret = array('list' => $list, 'pageMaker' => $pageMaker->getPageMaker());

        return Response::getInstance()->getJSON($ret);
    }

    function listTemplate()
    {
        $bno = $this->getParameter('bno');
        $page = $this->getParameter('page');
        $perPageNum = $this->getParameter('perPageNum');
        $cri = new Criteria ($page, $perPageNum);

        $pdo = $this->container->get('QB');
        $model = new replyModel ($pdo); // 디비 연결 객체 생성
        $list = $model->listPage($bno, $cri);

        $pageMaker = new PageMaker ();
        $pageMaker->setCri($cri);
        $pageMaker->setTotalCount($model->countCriteria($bno));
        $var = array('list' => $list, 'pageMaker' => $pageMaker->getPageMaker());

        $tpl = $this->container->get('template');
        $tpl->assign($var);
        $tpl->define("listTemplate", "reply/listTemplate.html");

        $ret = [
            'listTemplate' => $tpl->fetch("listTemplate"),
            'pageMaker' => $pageMaker->getPageMaker()
        ];

        return Response::getInstance()->getJSON($ret);
    }
}