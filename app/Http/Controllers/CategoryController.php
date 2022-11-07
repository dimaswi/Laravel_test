<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Jobs\sendEmail;
use App\Mail\notif;
use App\User;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{
    public function call_data(Request $request)
    {
        $search = $request->search;
        $data_category = DB::table('category')->simplePaginate(10);

        return view('category', compact('data_category','search'));
    }
    
    public function search_data(Request $request)
    {
        $search = $request->search;
        $data_category = Category::where('id','LIKE','%'.$search.'%')
                        ->orWhere('name','LIKE','%'.$search.'%')
                        ->orWhere('is_publish','LIKE','%'.$search.'%')
                        ->simplePaginate(10);
        return view('category', compact('data_category','search'));
    }

    public function create_data(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'is_publish' => 'required'
        ]);
        $data_category = Category::create([
            'name'       => $request->name,
            'is_publish' => $request->is_publish,
        ]);

        $job = new sendEmail;
        $this->dispatch($job);

        return redirect('/')->with('success','Data Berhasil Ditambahkan!!!!!');;
    }

    public function edit_data_index(Request $request , $id)
    {
        $data_category = DB::table('category')
                         ->where('id',$id)
                         ->first();
        return view('edit_category', compact('data_category'));
    }

    public function edit_data(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'is_publish' => 'required'
        ]);
        $data_category = Category::where('id',$request->id)
                         ->update([
                            'name' => $request->name,
                            'is_publish' => $request->is_publish
                         ]);

        $job = new sendEmail;
        $this->dispatch($job);

        return redirect('/')->with('success','Berhasil Di Edit!!!!!');
    }

    public function hapus_data($id)
    {
        $data_category = DB::table('category')
                         ->where('id',$id)
                         ->delete();
        
        $job = new sendEmail;
        $this->dispatch($job);

        return redirect('/')->with('success','Berhasil Menghapus Data!!!!!');
    }
}
