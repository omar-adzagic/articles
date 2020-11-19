<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }
    public function login()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Unesite email adresu.',
                        'valid_email' => 'Unijeli ste nevalidan format email adrese.',
                    ],
                ],
                'password' => [
                    'rules' => 'required|validateUser[email,password]',
                    'errors' => [
                        'required' => 'Unesite lozinku.',
                        'max_length' => 'Naslov ne smije imati više od 255 karaktera.',
                        'validateUser' => 'Unijeli ste nevalidne kredencijale.',
                    ]
                ]
            ];

//            $errors = [
//                'password' => [
//                    'validateUser' => 'Unijeli ste nevalidne kredencijale.'
//                ]
//            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('login', $data);
            } else {
                $model = new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();
                $this->setUserSession($user);
                session()->get('first_name');
                return redirect()->to('/articles');
            }
        }
    }

    private function setUserSession($user) {
        $data = [
            'id' => $user['id'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];
         session()->set($data);
         return true;
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/articles');
    }

    //--------------------------------------------------------------------

}