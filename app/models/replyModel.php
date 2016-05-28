<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-05-27
 * Time: 오후 12:36
 */
namespace App\Models;

use \Kaiser\Manager\DBManager;

class replyModel extends DBManager
{
    function createReply($reply)
    {
        $data = array(
            'bno' => $reply['bno'],
            'replytext' => $reply['replytext'],
            'replyer' => $reply['replyer'],
        );
        return $this->table('tbl_reply')->insert($data);
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
        return $this->table('tbl_reply')->where('rno', $rno)->update($data);
    }

    function deleteReply($rno)
    {
        return $this->table('tbl_reply')->where('rno', $rno)->delete();
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
}