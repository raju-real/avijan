<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::query();
        
        $data->when(request()->get('title'),function($query) {
            $title = request()->get('title');
            $query->where('title',"LIKE","%{$title}%");
        });
       
        if(request()->has('status')) {
            $data->where('status',request()->get('status'));
        }
        $articles = $data->paginate(20);
        return view('admin.article.article_list',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = route('admin.articles.store');
        return view('admin.article.article_add_edit',compact('route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:191',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5120',
            'status' => 'required|in:0,1',
            'description' => 'required|max:10000'
        ]);

        $row = new Article();
        $row->title = $request->title;
        $row->slug = Str::slug($request->title);
        if($request->file('image')) {
            $row->image = uploadImage($request->file('image'),'assets/admin/files/images/articles/');
        }
        $row->description = $request->description;
        $row->status = $request->status;
        $row->created_by = Auth::id();
        $row->save();
        return redirect()->route('admin.articles.index')->with(savedMessage());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::whereSlug($slug)->firstOrFail();
        return view('admin.article.article_details',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Article::findOrFail($id);
        $route = route('admin.articles.update',$id);
        return view('admin.article.article_add_edit',compact('route','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:191',
            'image' => 'nullable|sometimes|image|mimes:png,jpg,jpeg|max:5120',
            'status' => 'required|in:0,1',
            'description' => 'required|max:10000'
        ]);

        $row = Article::findOrFail($id);
        $row->title = $request->title;
        $row->slug = Str::slug($request->title);
        if($request->file('image')) {
            $row->image = uploadImage($request->file('image'),'assets/admin/files/images/articles/');
        }
        $row->description = $request->description;
        $row->status = $request->status;
        $row->created_by = Auth::id();
        $row->save();
        return redirect()->route('admin.articles.index')->with(updateMessage());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::findOrFail($id)->delete();
        return redirect()->route('admin.articles.index')->with(deleteMessage());
    }
}
