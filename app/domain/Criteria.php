<?php
namespace App\Domain;

class Criteria
{

    private $page;
    private $perPageNum;

    public function __construct($page, $perPageNum)
    {
        $this->setPage($page);
        $this->setPerPageNum($perPageNum);
    }

    public function setPage($page)
    {

        if ($page <= 0) {
            $this->page = 1;
            return;
        }

        $this->page = $page;
    }

    public function setPerPageNum($perPageNum)
    {

        if ($perPageNum <= 0 || $perPageNum > 100) {
            $this->perPageNum = 10;
            return;
        }

        $this->perPageNum = $perPageNum;
    }

    public function getPage()
    {
        return $this->page;
    }

    //method for MyBatis SQL Mapper -
    public function getPageStart()
    {
        return ($this->page - 1) * $this->perPageNum;
    }

    //method for MyBatis SQL Mapper
    public function getPerPageNum()
    {
        return $this->perPageNum;
    }

    public function getCriteria()
    {
        return array(
            'page' => $this->getPage(),
            'perPageNum' => $this->getPerPageNum()
        );
    }

    public function makeQuery()
    {
        return http_build_query($this->getCriteria());
    }
}


