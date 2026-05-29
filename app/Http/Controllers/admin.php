<?php

namespace App\Http\Controllers;

// you need to write capital i in illuminate otherwise data will not been send into database table 
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Book_details;
use App\Models\images;
use App\Models\contacts;
use App\Models\bookpdfs;
use Illuminate\Support\Facades\DB;

class admin extends BaseController
{

    // book details form 
    public function form()
    {
        return view('admin.pages.forms.basic_elements');
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
            return redirect("form?imgsuccess");
        } else {
            return back()->with("");
        }

    }


    public function insert(Request $request)
    {

       $request->validate([
        "image"=>"image|mimes:jpg,jpeg,png,gif,webp|max:2018",
       ]);

       $image =time().'.'. $request->image->extension();
       $request->image->move(public_path('uploads/'), $image);
       $image =Book_details::create([
        "image"=>$image,
        "title"=> $request->get("title"),
        "author_name"=>$request->get("author_name"),
        "price"=>$request->get("price"),
        "description"=>$request->get("description"),
        "author"=>$request->get("author"),
        "comment"=>$request->get("comment"),
        "pid"=>$request->get("pid"),
       ]);

       if(!is_null($image)){

           return redirect("form?success");
       }



    }

    // public function admin()
    // {
    //     return view("admin.index");
    // }

    public function admin(Request $request)
    {
        $email = $request->session()->get('email');
        return view("admin.index",compact('email'));
    }

    // table page 
    public function display()
    {
        $show = Book_details::all();
        return view('admin.pages.tables.basic-table', compact('show'));
    }



    public function delete($id)
    {
        $show = Book_details::find($id);
        $show->delete();
        return redirect('display');
    }

    public function table_edit($id)
    {
        $show = Book_details::find($id);
        return view('admin.pages.forms.book-detail', compact('show'));
    }

    public function table_update(Request $request, $id)
    {
        $show = Book_details::find($id);
        if($request->image !=''){
            $path=public_path().'/uploads/';

            if($request->show !=''){
                $old_file = $path.$show->image;
                unlink($old_file);
            }
            $image = $request->image;
            $filename= $image->getClientOriginalName();
            $image->move($path,$filename);
            $show->update(['image'=>$filename]);
            
        }
        $show->title = $request->get('title');
        $show->author_name = $request->get('author_name');
        $show->price = $request->get('price');
        $show->description = $request->get('description');
        $show->author = $request->get('author');
        $show->comment = $request->get('comment');   
        $show->pid = $request->get("pid");  
        // print_r($show);exit();
        // dd($show);
        $show->save();
        return redirect("display?updatebook");
    }

    // poster related code 
    public function poster_delete($id)
    {
        $poster = images::find($id);
        $poster->delete();
        return redirect('display');
    }

    public function poster_edit($id)
    {
        $show = images::find($id);
        return view('admin.pages.forms.image-edit', compact('show'));
    }

    public function poster_update(Request $request, $id)
    {
        $show = images::find($id);

        // request through column name file if it's not empty then go to loop 
        if ($request->file != '') {
            // save old path to new varible 
            $path = public_path() . '/uploads/';

            // get the old file via old path with the help of data base column 
            if ($show->file != '') {
                $file_old = $path . $show->file;
                // unlinking the old file location so that we can store new file loction by update 
                unlink($file_old);
            }

            // requesting the file and save file path in new varible $file 
            $file = $request->file;
            // inbuild function for changing path with orignal pathway 
            $filename = $file->getClientOriginalName();
            // replace old with who store in $path and change it with new path who store in the name of $filename 
            $file->move($path, $filename);

            $show->update(['file' => $filename]);
            return redirect('display');
        }

        
    }


    // contact show 
    public function contact_display()
    {
        $show = contacts::all();
        return view("admin.pages.tables.contact-table", compact("show"));
    }

    public function contact_delete($id)
    {
        $show = contacts::Find($id);
        $show->delete();
        return redirect("contact_display");
    }

    public function contact_edit($id)
    {
        $show = contacts::find($id);
        return view("admin.pages.tables.contact-edit", compact("show"));
    }


    // pdf related data 
    public function bookpdf(){
        return view("admin.pages.forms.bookpdf");
    }

   public function insertpdf(Request $request){
    $request->validate([
        "file"=>"file|mimes:pdf,doc,docx,txt,wps|max:12000",
    ]);
    $file =time().'.'. $request->file->extension();
    $request->file->move(public_path('bookpdf/'),$file);
    $file = bookpdfs::create([
        "file"=>$file,
    ]);

    if(!is_null($file)){
        return redirect('book?pdfsuccess');
    }
   }

   public function bookdisplay(){
    $display = bookpdfs::all();
    return view('admin.pages.tables.bookdisplay', compact('display'));
   }

//    public function bookdelete($pid =0){
//     $display= "delete * from bookpdfs where pid = '$pid'";
//     // $display = bookpdfs::find($pid);
//     // $display->delete();
//     return redirect('bookdisplay');
//    }    

   public function bookdelete($id) {
    DB::delete('delete from bookpdfs where pid = ?',[$id]);
    return redirect('/bookdisplay')->with('danger','Cab type deleted successfully');
    
 }

  public function bookpdf_details($id=0){
    $display = DB::select('select * from bookpdfs where pid = ?',[$id]);
    // $display = bookpdfs::find($id);
    // return view('admin.pages.forms.bookpdf-details',compact('display'));
    return view('admin.pages.forms.bookpdf-details',compact('display'));
  }

  public function bookupdate(Request $request,$id){
    $display = bookpdfs::find($id);
    if($request->file !=''){
        $path = public_path().'/bookpdf/';

        if($display->file != ''){
            $old_file = $path.$display->file;
            unlink($old_file);
        }

        $file = $request->file;
        $filename = $file ->getClientOriginalName();
        $file->move($path, $filename);
        $display->update(["file"=>$filename]);

    }
     $display->save();
     return redirect("bookdisplay");
  }



public function edit(Request $request,$id) {
      $name = $request->input('stud_name');
      DB::update('update student set name = ? where id = ?',[$name,$id]);
      echo "Record updated successfully.<br/>";
      echo '<a href = "/edit-records">Click Here</a> to go back.';
   }



public function logout(){
    return redirect('login');
}

}
