<?php namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\ImageModel;

class Articles extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }
	public function index()
	{
        $model = new ArticleModel();
        $data = [
            'articles' => $model->paginate(3, 'custom'),
            'pager' => $model->pager
        ];
		return view('articles/index', $data);
	}

    public function show($id)
    {
        $model = new ArticleModel();
        $article = $model->find($id);
        $article['images'] = $model->getImages($id);
        return view('articles/show', ['article' => $article]);
	}

	public function create() {
	    return view('articles/create');
    }

	public function edit($id) {
	    $model = new ArticleModel();
        $article = $model->find($id);
        $article['images'] = $model->getImages($id);
	    return view('articles/edit', ['article' => $article]);
    }

	public function save() {

	    if ($this->validate($this->getRules())) {
            $model = new ArticleModel();
            $articleId = $model->insert($_POST);
            if(! empty($_FILES['images']['size'][0])) {
                $images = $this->request->getFiles('images');
                foreach ($images['images'] as $image) {
                    if (!$image->hasMoved()) {
                        $filename = $image->getRandomName();
                        $image->move('./images', $filename);
                        $imageModel = new ImageModel();
                        $imageModel->save([
                            'image_path' => '/images/' . $filename,
                            'article_id' => $articleId
                        ]);
                    }
                }
            }
            return redirect('articles');
        } else {
	        $data['validation'] = $this->validator;
	        return view('articles/create', $data);
        }
    }

	public function update($id) {
        if ($this->validate($this->getRules())) {
            $model = new ArticleModel();
            $_POST['id'] = $id;
            $model->save($_POST);
            if(! empty($_FILES['images']['size'][0])) {
                $images = $this->request->getFiles('images');
                foreach ($images['images'] as $image) {
                    if (! $image->hasMoved()) {
                        $filename = $image->getRandomName();
                        $image->move('./images', $filename);
                        $imageModel = new ImageModel();
                        $imageModel->save([
                            'image_path' => '/images/' . $filename,
                            'article_id' => $id
                        ]);
                    }
                }
            }
            return redirect()->to('/articles');
        } else {
            $data['validation'] = $this->validator;
            $model = new ArticleModel();
            $data['article'] =  $model->find($id);
            $data['article']['images'] = $model->getImages($id);
            return view('articles/edit', $data);
        }
    }

    public function delete($id)
    {
        $model = new ArticleModel();
        $model->delete(intval($id));
        $article = $model->find($id);
        if (!empty($article)) {
            $images = $model->getImages($id);
            if (count($images) > 0) {
                $imageModel = new ImageModel();
                foreach ($images as $image) {
                    @unlink('.' . $image->image_path);
                    $imageModel->delete($image->id);
                }
            }
            $model->delete(intval($id));
            return redirect()->to('/articles');
        }
        return null;
    }

    public function getRules()
    {
        return [
            'title' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Naslov je neophodan za unos.',
                    'max_length' => 'Naslov ne smije imati više od 255 karaktera.'
                ]
            ],
            'text' => [
                'rules' => 'required|max_length[5000]',
                'errors' => [
                    'required' => 'Tekst je neophodan za unos.',
                    'max_length' => 'Tekst ne smije imati više od 5000 karaktera.'
                ]
            ],
//            'images' => [
//                'rules' => 'required',
//                'errors' => [
//                    'required' => 'Potrebno je dodati barem jednu sliku.'
//                ]
//            ]
        ];
    }

	//--------------------------------------------------------------------

}
