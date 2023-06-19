<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\post;
use Illuminate\Http\Request;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = post::orderBy('id', 'desc')->get();
        return view('post.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' =>'required',
            'konten' =>'required',
            'tgl_post' =>'required',
        ],[
            'judul.required' => 'Judul wajib diisi',
            'konten.required' => 'Deskripsi wajib diisi',
            'tgl_post.required' => 'Tanggal post wajib diisi',
        ]);
        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
            'tgl_post' => $request->tgl_post,
        ];
        post::create($data);
        return redirect()->to('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = post::find($id);
        return view('post.show', compact('post'));
    }

    public function detail($id)
    {
        $data = post::where('id', $id)->first();
        $komen = Comment::all();
        return view('detail', ['data'=>$data, 'komen'=>$komen, 'id'=>$id]);
    }

    public function insertData(Request $request, $id){
        $data = Comment::where('id_article', $id)->first();
        $user = new Comment();
        $user->name = $request->nama;
        $user->comment = $request->komentar;
        $user->id_article = $request->id;
        $user->save();
        return redirect()->route('detail',['data'=>$data, 'id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = post::where('judul',$id)->first();
        return view('post.edit')->with('data',$data);
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
        $request->validate([
            'judul' =>'required',
            'konten' =>'required',
            'tgl_post' =>'required',
        ],[
            'judul.required' => 'Judul wajib diisi',
            'konten.required' => 'Deskripsi wajib diisi',
            'tgl_post.required' => 'Tanggal post wajib diisi',
        ]);
        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
            'tgl_post' => $request->tgl_post,
        ];
        post::where('judul', $id)->update($data);
        return redirect()->to('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::where('id_article', $id)->delete();
        post::where('judul', $id)->delete();
        return redirect()->to('post');
    }
}
