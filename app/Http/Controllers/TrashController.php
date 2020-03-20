<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class TrashController extends Controller
{
    public function index()
    {
        $data = post::onlyTrashed()->get();

        return view('crud.trash', compact('data'));
    }

    public function restoreAll()
    {
    	$data = post::onlyTrashed();
    	$data->restore();

    	return redirect('Trash')->with('success', 'Data Sukses Di Restore Semua!');
    }

    public function deleteAll($value='')
    {
    	$data = post::onlyTrashed();
    	$data->forceDelete();

    	return redirect('Trash')->with('success', 'Data Sukses Di Delete Semua!');
    }

    public function restore($id)
    {
    	$data = post::onlyTrashed()->where('id', $id);
    	$data->restore();

    	return redirect('Trash')->with('success', 'Data Sukses Di Restore!');
    }

    public function delete($id)
    {
    	$data = post::onlyTrashed()->where('id', $id);
    	$data->forceDelete();

    	return redirect('Trash')->with('success', 'Data Sukses Di Delete!');
    }
}
