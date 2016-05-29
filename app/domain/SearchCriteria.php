<?php
namespace App\Domain;

class SearchCriteria extends Criteria
{

    private $searchType;
    private $keyword;

    public function __construct($page, $perPageNum, $type, $keyword)
    {
        parent::__construct($page, $perPageNum);

        $this->setSearchType($type);
        $this->setKeyword($keyword);
    }

    public function setSearchType($type)
    {
        $this->searchType = $type;
    }

    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }

    public function getSearchType()
    {
        return $this->searchType;
    }

    public function getKeyword()
    {
        return $this->keyword;
    }

    public function getSearchCriteria()
    {
        return array_merge($this->getCriteria(),
            array(
                'searchType' => $this->getSearchType(),
                'keyword' => $this->getKeyword()
            ));
    }

    public function makeQuery()
    {
        return http_build_query($this->getSearchCriteria());
    }
}


