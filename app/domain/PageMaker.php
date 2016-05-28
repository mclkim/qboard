<?php
namespace App\Domain;

class PageMaker
{
    private $Url;
    private $totalCount;
    private $startPage;
    private $endPage;
    private $prev;
    private $next;

    private $displayPageNum = 10;

    private $cri;

    public function setUrl($url)
    {
        $this->Url = $url;
    }

    public function setCri($cri)
    {
        $this->cri = $cri;
    }

    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;

        $this->calcData();
    }

    private function calcData()
    {

        $this->endPage = ceil($this->cri->getPage() / $this->displayPageNum) * $this->displayPageNum;

        $this->startPage = ($this->endPage - $this->displayPageNum) + 1;

        $tempEndPage = ceil($this->totalCount / $this->cri->getPerPageNum());

        if ($this->endPage > $tempEndPage) {
            $this->endPage = $tempEndPage;
        }

        $this->prev = $this->startPage == 1 ? false : true;

        $this->next = $this->endPage * $this->cri->getPerPageNum() >= $this->totalCount ? false : true;

    }

    public function getTotalCount()
    {
        return $this->totalCount;
    }

    public function getStartPage()
    {
        return $this->startPage;
    }

    public function getEndPage()
    {
        return $this->endPage;
    }

    public function isPrev()
    {
        return $this->prev;
    }

    public function isNext()
    {
        return $this->next;
    }

    public function getDisplayPageNum()
    {
        return $this->displayPageNum;
    }

    public function getCri()
    {
        return $this->cri;
    }

    public function makeQuery($page)
    {
        $data = array(
            'page' => $page,
            'perPageNum' => $this->cri->getPerPageNum()
        );

        return http_build_query($data);
    }

    public function makeSearch($page)
    {
        $data = array(
            'page' => $page,
            'perPageNum' => $this->cri->getPerPageNum(),
            'searchType' => $this->cri->getSearchType(),
            'keyword' => $this->cri->getKeyword()
        );

        return http_build_query($data);
    }

    public function getPageMaker()
    {
        $search = ($this->cri instanceof SearchCriteria);
        $pages = array();
        for ($idx = $this->startPage; $idx <= $this->endPage; $idx++) {
            $pages [$idx] = ($search) ? $this->makeSearch($idx) : $this->makeQuery($idx);
        } // end for

        return array(
            'totalCount' => $this->totalCount,
            'startPage' => $this->startPage,
            'endPage' => $this->endPage,
            'prev' => $this->prev,
            'next' => $this->next,
            'displayPageNum' => $this->displayPageNum,
            'cri' => ($search) ? $this->cri->getSearchCriteria() : $this->cri->getCriteria(),
            'pages' => $pages,
            'first' => $this->makeQuery(1),
            'query' => ($search) ? $this->makeSearch($this->cri->getPage()) : $this->makeQuery($this->cri->getPage())
        );
    }

    public function getPageLayout()
    {
        ob_start();

        if ($this->prev) {
            echo '<li><a href="' . $this->Url . '&' . $this->makeQuery($this->startPage - 1) . '">&laquo;</a></li>';
        }

        for ($idx = $this->startPage; $idx <= $this->endPage; $idx++) {
            if ($this->cri->getPage() == $idx)
                echo "<li class='active'>";
            else
                echo "<li>";

            echo '<a href="' . $this->Url . '&' . $this->makeQuery($idx) . '">' . $idx . '</a></li>';
        } // end for

        if ($this->next && $this->endPage > 0) {
            echo '<li><a href="' . $this->Url . '&' . $this->makeQuery($this->endPage + 1) . '">&raquo;</a></li>';
        }

        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }
}
