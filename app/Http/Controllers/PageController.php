<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Page;

class PageController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $categories = Category::all();
        return view('page.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'space_id' => 'required'
        ]);
        $input = $request->all();
        $input['user_id'] = auth()->id();
        $input['key'] = $request->space_id;


        if ($content = $request->file('content')) {
            $dbContent = time().'.'.$content->getClientOriginalExtension();  
            $content->move(public_path('pageFiles'), $dbContent);
            $input['content'] = "$dbContent";
        }
        Page::create($input);
     
        return back()->with('success','Page created successfully.');
    }

  
    public function show($id)
    {

        $userId = auth()->id();
        $page = Page::with('attachments')->where('user_id', '=', $userId)->find($id);
        $attachments = $page->attachments;
        return view('page.show',  compact('page', 'attachments'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $page = Page::find($id);

        return view('page.edit', compact('categories', 'page'));
   
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
