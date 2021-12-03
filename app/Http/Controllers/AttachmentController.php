<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;
use App\Models\Page;



class AttachmentController extends Controller
{

    public function index()
    {
        $userId = auth()->id();
        $attachments = Attachment::where('user_id', '=', $userId)->get();
        return view('attachment.index', compact('attachments'));
        // dd($attachments);

    }


    public function create(Request $request)
    {
        $Space_id = $request->space_id;
        return view('attachment.create', compact('Space_id'));
    }

    public function store(Request $request)
    {
        

        $request->validate([
            'page_id' => 'required',
            'filePath' => 'required',

        ]);

        $pageId = $request->page_id;
        $page = Page::find($pageId);
        $spaceId = $page->space_id;
        $input = $request->all();
        $input['space_id'] = "$spaceId";
        $input['user_id'] = auth()->id();

        if ($filePath = $request->file('filePath')) {
            $dbFilePath = time().'.'.$filePath->getClientOriginalExtension();  
            $filePath->move(public_path('attachments'), $dbFilePath);
            $input['filePath'] = "$dbFilePath";
        }
       $save =  Attachment::create($input);
     
        return back()->with('success','Attachment created successfully.');
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

    public function download(Request $request)
{
    $filePath = $request->filePath;
    $file = public_path(). "/attachments/$filePath";

    return \Response::download($file);
}


public function spaceList($id)
{
    $attachments = Attachment::where('space_id', '=', $id)->get();
    // dd($attachments);
    return view('attachment.index', compact('attachments') );

}
}
