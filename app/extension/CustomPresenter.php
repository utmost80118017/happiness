<?php
 class CustomPresenter extends Illuminate\Pagination\Presenter {

    public function getActivePageWrapper($text)
    {
        $url = $this->paginator->getUrl($this->paginator->getCurrentPage());
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $params);
        return '<a href=""><span class="thispage">' .$text.'</span></a>';
        // return '<a href="" style=border:0px;color:#000; >'.$text.'</a>';
    }

    public function getDisabledTextWrapper($text)
    {
        return '<a href=""><span>'.$text.'</span></a> ';
    }

    public function getPageLinkWrapper($url, $page, $rel = null)
    {
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $params);
        $id = $params['page'];
        // <a href=""><span>2</span></a>
        return ' <a href="'.$url.'"><span>'.$page.'</span></a> ';
    }
}
