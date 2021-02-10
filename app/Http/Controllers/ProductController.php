<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product = [
        [
            'id' => 1,
            'name' => 'arroz',
            'preco' => 30,
        ],
        [
            'id' => 2,
            'name' => 'feijão',
            'preco' => 5,
        ],
        [
            'id' => 3,
            'name' => 'macarrão',
            'preco' => 5,
        ],
    ];

    public function index()
    {
        return $this->product;
    }

    public function show($id)
    {
        foreach ($this->product as $value) {
            if ($value['id'] == $id) {
                return $value;
            }
        }
    }

    public function create()
    {
        return $this->product;
    }

    public function edit($id)
    {
        foreach ($this->product as $value) {
            if ($value['id'] == $id) {
                return $value;
            }
        }
    }
}
