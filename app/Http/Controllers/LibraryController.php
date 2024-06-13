<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use Illuminate\Support\Facades\File as File2;
use Illuminate\Support\Facades\Storage;

class LibraryController extends Controller
{
    /***********************************/
    public function create()
    {
        $files = Library::all();
        return view('create', ['files' => $files]);
    }
    /***********************************/
    public function store(Request $request)
    {
        $validated = $request->validate([
            'filenames' => 'required',
            'filenames.*' => 'required'
        ]);

        $files = [];
        $filenames =array();
        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $file)
            {
                $name = rand(1,100).'.'.$file->getClientOriginalName();
                // $name = time().rand(1,100).'.'.$file->extension();
                $file->storeAs('images', $name);
                $filenames['filenames'] = $name;
                $files[]=$filenames;
            }
        }
        // print_r($files); die();

        Library::insert($files);
        return back()->with(['success'=> 'Data Your files has been successfully added']);
        //return back()->with('success', 'Data Your files has been successfully added');
    }
    /***********************************/
    public function edit($id)
    {
        $files = Library::find($id);
        //print_r($files->filenames); die();
        return view('create', ['list_images' => $files->filenames, 'id' => $id]);
    }
    /***********************************/
    public function update(Request $request)
    {
        $input = $request->all();
        $files = [];
        $files_remove = [];
        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->storeAs(public_path('images'), $name);
                $files[] = $name;
            }
        }

        if (isset($input['images_uploaded'])) {
            $files_remove = array_diff(json_decode($input['images_uploaded_origin']), $input['images_uploaded']);
            $files = array_merge($input['images_uploaded'], $files);
        } else {
            $files_remove = json_decode($input['images_uploaded_origin']);
        }

        $file = Library::find($input['id']);
        $file->filenames = $files;
        if($file->update()) {
            foreach ($files_remove as $file_name) {
                File2::delete(public_path("images/".$file_name));
            }
        }

        return back()->with('success', 'Data Your files has been successfully updated');
    }
    /************************************/
    public function libraries()
    {
       $files_temp =  Storage::disk('local')->files('images');
        $files = array_map(function($file){
            return basename($file); // remove the folder name
        }, $files_temp);
        //print_r($files);die();
        //$files = Library::all()->toArray();
        //print_r($files);die();
        return response()->json(['files' => $files], 200);
    }
    /***********************************/
    public function add_image_library(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required',
            'file.*' => 'required'
        ]);

        $files = [];
        $filenames =array();
        if($request->hasfile('file'))
        {
            foreach($request->file('file') as $file)
            {
                $name = rand(1,100).'.'.$file->getClientOriginalName();
                $file->storeAs('images', $name);
                $filenames['filenames'] = $name;
                $files[]=$filenames;
            }
        }
        // print_r($files); die();

        Library::insert($files);

        return response()->json(['files' => $files], 200);
    }

}
