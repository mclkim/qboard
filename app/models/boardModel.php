<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-05-24
 * Time: 오후 2:23
 */
namespace App\Models;

use \Kaiser\Manager\DBManager;

class boardModel extends DBManager
{
    function createRecord($board)
    {
        $data = array(
            'title' => $board['title'],
            'content' => $board['content'],
            'writer' => $board['writer'],
        );
        return $insert = $this->table('tbl_board')->insert($data);
    }

    function listAll()
    {
        $query = $this->table('tbl_board')->where('bno', '>', 0)->orderBy('bno', 'DESC')->offset(10)->limit(30);
        logger($query->getQuery()->getRawSql());
        return $query->setFetchMode(\PDO::FETCH_ASSOC)->get();
    }

    function listPage($page)
    {
        if ($page <= 0) {
            $page = 1;
        }
        $page = ($page - 1) * 10;
        $query = $this->table('tbl_board')->where('bno', '>', 0)->orderBy('bno', 'DESC')->offset($page)->limit(10);
        logger($query->getQuery()->getRawSql());
        return $query->setFetchMode(\PDO::FETCH_ASSOC)->get();
    }

    function listCriteria($cri)
    {
        $query = $this->table('tbl_board')->where('bno', '>', 0)->orderBy('bno', 'DESC')->offset($cri->getPageStart())->limit($cri->getPerPageNum());
        logger($query->getQuery()->getRawSql());
        return $query->setFetchMode(\PDO::FETCH_ASSOC)->get();
    }

    function countCriteria($cri)
    {
        $query = $this->query('select count(bno) from tbl_board where bno > 0');
        return $query->setFetchMode(\PDO::FETCH_COLUMN)->first();
    }

    private function searchQuery($cri)
    {
        $type = $cri->getSearchType();
        $keyword = $cri->getKeyword();
        switch ($type) {
            case 't':
                $query = $this->table('tbl_board')->where('bno', '>', 0)->where('title', 'like', '%' . $keyword . '%');
                break;
            case 'c':
                $query = $this->table('tbl_board')->where('bno', '>', 0)->where('content', 'like', '%' . $keyword . '%');
                break;
            case 'w':
                $query = $this->table('tbl_board')->where('bno', '>', 0)->where('writer', 'like', '%' . $keyword . '%');
                break;
            case 'tc':
                $query = $this->table('tbl_board')->where('bno', '>', 0)
                    ->where(function ($q) use ($keyword) {
                        $q->where('title', 'like', '%' . $keyword . '%');
                        $q->orWhere('content', 'like', '%' . $keyword . '%');
                    });
                break;
            case 'cw':
                $query = $this->table('tbl_board')->where('bno', '>', 0)
                    ->where(function ($q) use ($keyword) {
                        $q->where('content', 'like', '%' . $keyword . '%');
                        $q->orWhere('writer', 'like', '%' . $keyword . '%');
                    });
                break;
            case 'tcw':
                $query = $this->table('tbl_board')->where('bno', '>', 0)
                    ->where(function ($q) use ($keyword) {
                        $q->where('title', 'like', '%' . $keyword . '%');
                        $q->orWhere('content', 'like', '%' . $keyword . '%');
                        $q->orWhere('writer', 'like', '%' . $keyword . '%');
                    });
                break;
            default:
                $query = $this->table('tbl_board')->where('bno', '>', 0);
        }

        return $query;
    }

    function listSearchCriteria($cri)
    {
        $query = $this->searchQuery($cri)
            ->orderBy('bno', 'DESC')->offset($cri->getPageStart())->limit($cri->getPerPageNum());
        logger($query->getQuery()->getRawSql());
        return $query->setFetchMode(\PDO::FETCH_ASSOC)->get();
    }

    function countSearchCriteria($cri)
    {
        return $this->searchQuery($cri)->count();
    }

    function readRecord($bno)
    {
        try {
            $this->pdo->beginTransaction();
            $this->updateViewCnt($bno);
            $query = $this->table('tbl_board')->where('bno', '=', $bno);
            logger($query->getQuery()->getRawSql());
            $this->pdo->commit();
            return $query->setFetchMode(\PDO::FETCH_ASSOC)->first();
        } catch (\Exception $e) {
            $this->pdo->rollBack();
            return $this;
        }
    }

    function removeRecord($bno)
    {
        $delete = $this->table('tbl_board')->where('bno', '=', $bno)->delete();
    }

    function modifyRecord($board)
    {
        $data = array(
            'title' => $board['title'],
            'content' => $board['content'],
            'writer' => $board['writer'],
            "updatedate" => $this->raw("NOW()")
        );
        return $update = $this->table('tbl_board')->where('bno', $board['bno'])->update($data);
    }

    function updateViewCnt($bno)
    {
        $data = array(
            $bno,
        );
        return $update = $this->query('update tbl_board set viewcnt = viewcnt+1 where bno=?', $data);
    }
}