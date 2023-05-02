<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Http\Request;

class convenios extends Controller
{
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index()
    {
        return view(
            'admin.convenio.index',
            ['title' => 'Agregar Convenio']
        );
    }
}
