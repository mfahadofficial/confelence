<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Space;
use App\Models\Category;

class SpaceController extends Controller
{

    public function index()
    {
        $userId = auth()->id();
        $spaces = Space::with('user')->where('user_id', '=', $userId)->get();
        // foreach($spaces as $space){
        //     dd($space->user->name);
        // }
        
        return view('space/index', compact('spaces'));
    }


    public function create()
    {


        $categories = Category::all();
        return view('space.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'itemCode' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);
        $input = $request->all();
        $input['user_id'] = auth()->id();
        Space::create($input);
     
        return back()->with('success','Space created successfully.');
    }


    public function show($id)
    {
        $userId = auth()->id();
        $space = Space::with('pages')->where('user_id', '=', $userId)->find($id);
        $pages = $space->pages;

        return view('space.show', compact('space', 'pages'));

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


    public function allSpaces()
    {
        $userId = auth()->id();
        $spaces = Space::with('user')->where('user_id', '=', $userId)->get();
        $categories = Category::all();
        // foreach($spaces as $space){
        //     dd($space->user->name);
        // }
        
        return view('space/allSpaces', compact('spaces', 'categories'));
    }

    public function siteSpaces()
    {
        $userId = auth()->id();
        $spaces = Space::with('user')->where('user_id', '=', $userId)->get();
        $categories = Category::all();
        // foreach($spaces as $space){
        //     dd($space->user->name);
        // }
        
        return view('space/siteSpaces', compact('spaces', 'categories'));
    }

    public function personalSpaces()
    {
        $userId = auth()->id();
        $spaces = Space::with('user')->where('user_id', '=', $userId)->get();
        $categories = Category::all();
        // foreach($spaces as $space){
        //     dd($space->user->name);
        // }
        
        return view('space/personalSpaces', compact('spaces', 'categories'));
    }

    public function archivedSpaces()
    {
        $userId = auth()->id();
        $spaces = Space::with('user')->where('user_id', '=', $userId)->get();
        $categories = Category::all();
        // foreach($spaces as $space){
        //     dd($space->user->name);
        // }
        
        return view('space/archivedSpaces', compact('spaces', 'categories'));
    }
}
