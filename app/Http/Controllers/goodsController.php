<?php

namespace App\Http\Controllers;
use App\GoodsModel;

use Illuminate\Http\Request;

class goodsController extends Controller
{
    public function index(){
        $all = GoodsModel::all();
        return view('goods.index', ['all' => $all]);
    }
    public function add(Request $request){
        if (!$request->id) {
            $file = $request->file('file');
            $nama_file = time()."_";
            $tujuan_upload = 'image';
            $file->move($tujuan_upload,$nama_file);

            GoodsModel::create([
                "name" => $request->name,
                "price" => $request->price,
                "category" => $request->category,
                "stock" => $request->stock,
                "img" => $nama_file,
            ]);
            return back()->with('success', "Berhasil Menambahkan");

        }
        else{
            $file = $request->file('file');
            if(!$file){
                $nama_file = $request->image_hidden;
            }else{
                $nama_file = time()."_";
                $tujuan_upload = 'image';
                $file->move($tujuan_upload,$nama_file);
            }

            
            $model = GoodsModel::find($request->id);
            $model->name = $request->name;
            $model->price = $request->price;
            $model->category = $request->category;
            $model->stock = $request->stock;
            $model->img = $nama_file;
            $model->save();
            return back()->with('success', "Berhasil Mengubah");
        }
    }

    public function editData($id){
        return GoodsModel::find($id);
    }
    public function delete($id){
        GoodsModel::find($id)->delete();
        return back()->with('success', "Berhasil Menghapus");

    }
}
