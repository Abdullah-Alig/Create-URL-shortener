<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;  
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function userHome()
    {
        $userId = auth()->id();
        $shortLinks = ShortLink::latest()->where('userId',$userId)->get();  
     
        return view('user/home', compact('shortLinks'));  
    }

    public function store(Request $request)  
    {  

        $request->validate([  
           'link' => 'required|url'  
        ]);  

        $userId = auth()->id();
        $input['userId'] = $userId;
        $input['link'] = $request->link;  
        $input['code'] = Str::random(6);
     
        ShortLink::create($input);  
    
        return redirect('/home')  
             ->with('success', 'Shorten Link Generated Successfully!');  
    } 
    
    public function shortenLink($code)  
    {  
        $find = ShortLink::where('code', $code)->first();  
     
        return redirect($find->link);  
    }  

    public function adminHome()
    {
        $shortLinks = ShortLink::latest()->get();  
     
        return view('admin/home', compact('shortLinks'));  
    }
}
