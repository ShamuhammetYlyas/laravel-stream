<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use SoapBox\Formatter\Formatter;

class AdminController extends Controller
{
    public function index(Request $request)
    {
		$response = Http::get('http://172.20.1.24:5080/LiveApp/rest/v2/broadcasts/list/1/50');
		$streams = json_decode($response->getBody()->getContents(), false);
    	return view('admin.index', compact('streams'));
    }

    public function changePasswordForm()
    {
    	return view('auth.admin.change-password');
    }

    public function changePasswordPost(Request $request)
    {
    	// dd($admin);
    	$request->validate([
    		'password' => 'required|string|min:8|confirmed',
    	]);

    	try {
    		$user = Auth::guard('admin')->user();
    		$user->password = Hash::make($request->password);
    		$user->save();
    		return redirect()->route('admin.index')->withSuccess('Password has been changed successfully');
    	} catch (\Exception $e) {
    		return back()->withErrors($e->getMessage());
    	}
    }
}
