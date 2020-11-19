<?php namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model {
    protected $DBGroup = 'default';
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $allowedFields = ['image_path', 'article_id'];
    protected $returnType = 'array';

//    public function getArticle()
//    {
//        $builder = $this->db->table('articles');
//        $builder->join('images', 'images.article_id = articles.id');
//        $images = $builder->get()->getResult();
//        return $images[0];
//    }
}