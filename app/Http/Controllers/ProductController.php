<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {
        return 'Home';
    }
    public function create()
    {
        return 'Create';
    }
    public function update()
    {
        return 'Update';
    }
    public function delete()
    {
        return 'Delete';
    }
    public function findOne()
    {
        return 'FindOne';
    }
}

