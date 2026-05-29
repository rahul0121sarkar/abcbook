<?php

namespace App\Http\Controllers;

use App\Models\bookpdfs;
use App\Models\contacts;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
// this line need to be added for image and file uploading 
use Illuminate\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Book_details;
use App\Models\images;
use Illuminate\Support\Facades\DB;





class Home extends BaseController
{

    public function category()
    {
        $detail = Book_details::all();
        return view("theme.abcbook.categories", compact("detail"));
    }

    public function about()
    {
        return view("theme.abcbook.about");
    }

    public function contact()
    {
        return view("theme.abcbook.contact");
    }
    public function home()
    {
        // $table = images::all();
        $detail = Book_details::all();
        return view("theme.abcbook.index", compact("detail"));
    }

    // public function librarie(){
    //     $display = bookpdfs::all();
    //     return view("theme.abcbook.allbooks",compact("display"));
    // }


    public function librarie()
    {

        // $detail = Book_details::find($id);
        $library['display'] = DB::table('book_details')
            ->join('bookpdfs', 'book_details.pid', '=', 'bookpdfs.pid')
            ->select('book_details.*', 'bookpdfs.*', 'book_details.image', 'bookpdfs.file')
            ->get();


        return view("theme.abcbook.allbooks", $library);
        // return view("theme.abcbook.allbooks",$detail,$library);
        // }
        // $detail = bookpdfs::all();
        // // $data['display'] =Book_details::all();
        // $data['display']=Book_details::select('book_details.*','bookpdfs.file as pdf')
        // ->join('bookpdfs','book_details.pid ','=','bookpdfs.pid')
        // ->get();

        // return view("table",$display);

    }

    public function form()
    {
        return view("register");
    }
    public function insert(Request $request)
    {

        $data_save = new Book_details([
            "title" => $request->get("title"),
            "author_name" => $request->get("author_name"),
            "price" => $request->get("price"),
            "description" => $request->get("description"),
            "author" => $request->get("author"),
            "comment" => $request->get("comment"),
        ]);

        $data_save->save();

        return redirect("form");



    }



    public function img()
    {
        return view("ima");
    }
    public function image_insert(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpeg,jpg,gif,svg,webp|max:2018',
        ]);
        // here file is table column name 
        $image = time() . '.' . $request->file->extension();

        $request->file->move(public_path('uploads'), $image);

        // image is model name 
        $image = images::create([
            "file" => $image
        ]);

        if (!is_null($image)) {
            redirect("regi");
        } else {
            return back()->with("");
        }

    }

    public function book_detail($id)
    {
        $detail = Book_details::find($id);
        // $detail = Book_details::all();
        return view("theme.abcbook.book-details", compact('detail'));
    }

    public function login()
    {
        return view('theme.abcbook.login');
    }

    public function loginsert(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $login = DB::select("select * from login where email = '$email' and password = '$password'");
        if (!empty($login)) {
            $request->session()->put('email', $email);
            session()->put('id', $login[0]->id);
            // return view('admin.index',compact('login'));
            return redirect('admin');
        } else {
            return redirect('login?error');
        }

    }
}
