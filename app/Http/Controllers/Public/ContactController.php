<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show() { return view('public.contact'); }
    public function store(Request $request) { /* Phase C */ abort(501); }
}
