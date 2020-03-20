<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\post;

class CRUDController extends Controller
{
    public function index()
    {
        $data = post::where('status', 0)->get();

        return view('crud.index', compact('data'));
    }

    public function create()
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('image');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'image';
        $file->move($tujuan_upload,$nama_file);

        $data = new post();
        $data->title = $request->title;
        $data->slug = $request->slug;
        $data->image = $nama_file;
        $data->content = $request->content;
        $data->view_count = $request->view_count;
        $data->save();
 
        return redirect('Crud')->with('success', 'Data Sukses Dibuat.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = post::find($id)->get();

        return view('crud.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = post::find($id);

        if($request->file('image') == "") {
            $data->image = $data->image;
        } else {
            $file = $request->file('image');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'image';
            $file->move($tujuan_upload,$nama_file);

            $data->title = $request->title;
            $data->slug = $request->slug;
            $data->image = $nama_file;
            $data->content = $request->content;
            $data->view_count = $request->view_count;
            $data->save();
        }

        

        return redirect('Crud')->with('success', 'Data Sukses Diedit.');
    }

    public function destroy($id)
    {
        $data = post::find($id);
        $data->delete();

        if ($data) {
            $data->status = 1;
        }

        return redirect('Crud')->with('success', 'Data Telah Dihapus.');
    }
}
