<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TodoModel; 

class Todo extends ResourceController
{
    public function __construct() {
        $this->todoModel = new TodoModel();

        
        
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        
        $todo = $this->todoModel->paginate(5, 'todo');

        $payload = [
            "products" => $todo,
            "pager" => $this->todoModel->pager

        ];

        echo view('todo/index', $payload);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        echo view('todo/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
    try{    
        $validate = $this->validate([
            'title' => 'required|is_unique[todos.title]',
            'description' => 'required',
            
        ],
        );
        if(!$validate) {
            session()->setFlashData("errors", $this->validator->listErrors());
            return redirect()->to(previous_url())->withInput();
        }
            $fileName = "";

            $photo = $this->request->getFile('photo');

            if ($photo->getError() ==4) {
                $fileName = 'default.png';
                
            }else{
                $fileName = $photo->getRandomName(); // Mendapatkan nama file baru secara acak

                $photo->move('photos', $fileName); // Memindahkan file ke public/photos dengan nama acak
            }
            
            $payload = [
                "id" => uniqid(),
                "title" => $this->request->getPost('title'),
                "description" => $this->request->getPost('description'),
                "finished_at" => $this->request->getPost('finished_at'),
                "photo" => $fileName, // Kita simpan nama filenya saja
            ];


            $this->todoModel->insert($payload);
            return redirect()->to('/todo');

        }catch(\Exception $e)
        {
            return redirect()->to(previous_url());
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $product = $this->todoModel->find($id);
        
        if (!$product) {
            throw new \Exception("Data not found!");   
        }
        $data = [
            "id" => uniqid(),
            "title" => $this->request->getPost('title'),
            "description" => $this->request->getPost('description'),
            "finished_at" => $this->request->getPost('finished_at'),
            "photo" =>$this->request->getPost('photo'), // Kita simpan nama filenya saja
        ];
        echo view('todo/edit', ["data" => $product]);
    }


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    

    public function update($id=null)
    {
        try{    
            $validate = $this->validate([
                'title' => 'required',
                'description' => 'required',
            ],
            );
            if(!$validate) {
                session()->setFlashData("errors", $this->validator->listErrors());
                return redirect()->to(previous_url())->withInput();
            }
                $fileName = "";
    
                $photo = $this->request->getFile('photo');
    
                if ($photo->getError() ==4) {
                    $fileName = $this->request->getVar('potolama');
                    
                }else{
                    $fileName = $photo->getRandomName(); // Mendapatkan nama file baru secara acak
                    $photo->move('photos', $fileName); // Memindahkan file ke public/photos dengan nama acak
                    if($this->request->getVar('potolama') != 'default.png')
                    {
                        unlink('photos/' . $this->request->getVar('potolama'));
                    }
                }
                
                $payload = [
                    "id" => uniqid(),
                    "title" => $this->request->getPost('title'),
                    "description" => $this->request->getPost('description'),
                    "finished_at" => $this->request->getPost('finished_at'),
                    "photo" => $fileName, // Kita simpan nama filenya saja
                ];
    
    
                $this->todoModel->update($id,$payload);
                return redirect()->to('/todo');
    
            }catch(\Exception $e)
            {
                return redirect()->to(previous_url());
            }

        

        }
    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $product = $this->todoModel->find($id);
        
        if($product['photo'] != 'default.png')
        {
            unlink('photos/' . $product['photo']);
        }
        
        $this->todoModel->delete($id);
        return redirect()->to('/todo');
    }

    public function finish($id = null)
    {
        $payload = [
            
            "status" => "Done",

        ];

        $this->todoModel->update($id, $payload);
        return redirect()->to('/todo');
    }
}