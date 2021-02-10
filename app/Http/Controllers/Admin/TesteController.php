<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only([
            'index'
        ]);
    }

    public function index()
    {
        return 'Index';
    }

    public function dashboard()
    {
        return 'dashboard';
    }

    public function financeiro()
    {
        return 'financeiro';
    }

    public function produtos()
    {
        return 'produtos';
    }
}
