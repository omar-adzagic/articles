<?php namespace App\Controllers;

use App\Models\ImageModel;

class Images extends BaseController
{
    public function delete($id)
    {
        $model = new ImageModel();
        $image = $model->find($id);
        if ($image) {
            @unlink('.' . $image['image_path']);
            $model->delete($id);
            return redirect()->back();
        }
    }
}