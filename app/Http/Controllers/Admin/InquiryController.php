<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index() { return view('admin.inquiries.index'); }
    public function show(Inquiry $inquiry) { return view('admin.inquiries.show', compact('inquiry')); }
    public function markRead(Inquiry $inquiry) { abort(501); }
    public function destroy(Inquiry $inquiry) { abort(501); }
}
