<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::latest()->paginate(20);
        return view('admin.faq.faq_list',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = route('admin.faqs.store');
        return view('admin.faq.faq_add_edit',compact('route'));
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
            'question' => 'required|max:191',
            'answer' => 'required|max:1000'
        ]);

        $row = new Faq();
        $row->question = $request->question;
        $row->answer = $request->answer;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.faqs.index')->with(savedMessage());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Faq::findOrFail($id);
        $route = route('admin.faqs.update',$id);
        return view('admin.faq.faq_add_edit',compact('route','data'));
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
            'question' => 'required|max:191',
            'answer' => 'required|max:1000'
        ]);

        $row = Faq::findOrFail($id);
        $row->question = $request->question;
        $row->answer = $request->answer;
        $row->status = $request->status;
        $row->save();
        return redirect()->route('admin.faqs.index')->with(updateMessage());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faq::findOrFail($id)->delete();
        return redirect()->route('admin.faqs.index')->with(deleteMessage());
    }
}
