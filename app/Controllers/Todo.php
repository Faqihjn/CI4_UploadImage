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
        
        $products = $this->todoModel->findAll();

        $payload = [
            "products" => $products
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
        $payload = [
            "id" => uniqid(),
            "title" => $this->request->getPost('title'),
            "description" => $this->request->getPost('description'),
            "finished_at" => $this->request->getPost('finished_at'),
            
        ];


        $this->todoModel->insert($payload);
        return redirect()->to('/todo');
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
        
        echo view('todo/edit', ["data" => $product]);
    }


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $payload = [
            "title" => $this->request->getPost('title'),
            "description" => $this->request->getPost('description'),
            "finished_at" => $this->request->getPost('finished_at'),

        ];

        $this->todoModel->update($id, $payload);
        return redirect()->to('/todo');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
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