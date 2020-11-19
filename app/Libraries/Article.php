<?php namespace App\Libraries;

class Article
{
    public function articleItem($params)
    {
        return view('components/articleItemAuthUser', $params);
    }
    public function articleItemAuthUser($params)
    {
        return view('components/articleItem', $params);
    }
}