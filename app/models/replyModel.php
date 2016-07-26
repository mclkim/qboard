<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-05-27
 * Time: 오후 12:36
 */
namespace App\Models;

//use \Kaiser\Manager\DBManager;

class replyModel extends \Pixie\QueryBuilder\QueryBuilderHandler//DBManager
{
    function createReply($reply)
    {
        $data = array(
            'bno' => $reply['bno'],
            'replytext' => $reply['replytext'],
            'replyer' => $reply['replyer'],
        );

        try {
            $this->pdo->beginTransaction();
            $insert = $this->table('tbl_reply')->insert($data);
            $this->updateReplyCnt($reply['bno'], 1);
            $this->pdo->commit();
        } catch (\Exception $e) {
            $this->pdo->rollBack();
            return $this;
        }
    }

    function listReply($bno)
    {
        $query = $this->table('tbl_reply')->where('bno', '=', $bno)
            ->orderBy('rno', 'DESC');
        logger($query->getQuery()->getRawSql());
        return $query->setFetchMode(\PDO::FETCH_ASSOC)->get();
    }

    function updateReply($rno, $reply)
    {
        $data = array(
            'replytext' => $reply['replytext'],
            "updatedate" => $this->raw("NOW()")
        );
        return $update = $this->table('tbl_reply')->where('rno', $rno)->update($data);
    }

    function deleteReply($rno)
    {
        try {
            $this->pdo->beginTransaction();
            $bno = $this->getBno($rno);
            logger($bno);
            $delete = $this->table('tbl_reply')->where('rno', $rno)->delete();
            $this->updateReplyCnt($bno, -1);
            $this->pdo->commit();
        } catch (\Exception $e) {
            $this->pdo->rollBack();
            return $this;
        }
    }

    function listPage($bno, $cri)
    {
        $query = $this->table('tbl_reply')->where('bno', '=', $bno)
            ->orderBy('rno', 'DESC')->offset($cri->getPageStart())->limit($cri->getPerPageNum());
        logger($query->getQuery()->getRawSql());

        return $query->setFetchMode(\PDO::FETCH_ASSOC)->get();
    }

    function countCriteria($bno)
    {
        $query = $this->table('tbl_reply')->where('bno', '=', $bno);
        return $query->count();
    }

    function getBno($rno)
    {
        $query = $this->table('tbl_reply')->select('bno')->where('rno', '=', $rno);
        logger($query->getQuery()->getRawSql());
        return $query->setFetchMode(\PDO::FETCH_COLUMN)->first();
    }

    function updateReplyCnt($bno, $amount)
    {
        $data = array(
            $amount,
            $bno,
        );
        return $update = $this->query('update tbl_board set replycnt = replycnt+? where bno=?', $data);
    }
}