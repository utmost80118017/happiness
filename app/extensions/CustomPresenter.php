<?php class CustomPresenter extends Illuminate\Pagination\Presenter {

    public function getActivePageWrapper($text)
    {
        $url = $this->paginator->getUrl($this->paginator->getCurrentPage());
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $params);

        return '<li id="page['.$params['page'].']" class="active"><a href="">'.$text.'</a></li>';
    }

    public function getDisabledTextWrapper($text)
    {
        return '<li class="disabled"><a href="">'.$text.'</a></li>';
    }

    public function getPageLinkWrapper($url, $page, $rel = null)
    {
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $params);
        $id = $params['page'];
        return '<li id="page['.$id.']"><a href="'.$url.'">'.$page.'</a></li>';
    }
}
