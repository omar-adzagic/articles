<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Database\MySQLi\Connection;
use CodeIgniter\Model;

class ArticleModel extends Model {
//    public function __construct() {
//        parent::__construct();
//        $this->table = 'articles';
//        $this->primaryKey = 'id';
//    }

    protected $DBGroup = 'default';
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'text'];
    protected $returnType = 'array';
//    protected $useSoftDeletes = false;
//    protected $useTimestamps = false;
//    protected $createdField = 'created_at';
//    protected $updatedField = 'updated_at';
//    protected $deletedField = 'deleted_at';
//    protected $validationRules = [];
//    protected $validationMessages = [];
//    protected $skipValidation = false;

//    public function __construct(ConnectionInterface &$db) {
//        $this->db =& $db;
//    }

    public function getImages($articleId)
    {
        $builder = $this->db->table('images');
        return $builder->where('article_id', $articleId)->get()->getResult();
    }
}