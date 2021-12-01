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
        // dd($input);
        Space::create($input);
    
        // Space::create($request->all());
     
        return back()->with('success','Space created successfully.');
    }


    public function show($id)
    {
        //
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
}
