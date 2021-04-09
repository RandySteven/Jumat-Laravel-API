<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //Peraturan API client mengirimkan request server
    public function index(){
        $blogs = Blog::all();
        return response()->json([
            'message' => 'Get All Datas Success',
            'data' => $blogs
        ]);
    }

    public function create(Request $request){
        $attr = $request->all();
        $attr['slug'] = \Str::slug($request->title);
        $blog = Blog::create($attr);
        if(!$blog){
            $statusCode = 400;
            return response()->json([
                'messsage' => 'Error',
                'error' => 'status code 400 error dari server'
            ])->setStatusCode($statusCode);
        }
        $statusCode = 201;
        return response()->json([
            'messsage' => 'Create data success',
            'blog' => $blog
        ])->setStatusCode($statusCode);
    }

    public function getDataById($id){
        $blog = Blog::findOrFail($id);
        if($blog==[]){
            $message = response()->json([
                'message' => 'Data not found'
            ])->setStatusCode(404);
        }
        $message = response()->json([
            'message' => 'Get All Datas Success',
            'data' => $blog
        ]);
        return $message;
    }

    public function edit(Request $request, $id){
        $blog = Blog::where('id', $id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => \Str::slug($request->title)
        ]);
        return response()->json([
            'message' => 'Update data success',
            'data' => $blog
        ]);
    }

    public function delete($id){
        Blog::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Delete data success'
        ]);
    }

    public function search(Request $request){
        $blog = Blog::where('title', 'LIKE', '%'.$request->title.'%')->get();
        $message = response()->json([
            'message' => 'Get All Datas Success',
            'data' => $blog
        ]);
        return $message;
    }
}
