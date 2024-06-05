<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

                public function index(){

                if(Auth::id()){

                $user_type = Auth()->user()->usertype;


                if($user_type == 'admin'){

                $user =User::all()->count();
                $books =Book::all()->count();

                $borrow = Borrow::where('status','Approved')->count();

                $return = Borrow::where('status','Returned')->count();

                return view('admin.index',[
                    'user'=>$user,
                    'books'=>$books,
                    'borrow'=>$borrow,
                    'return'=>$return,
                ]);
                }


                else if($user_type == 'user'){
                    $books =Book::all()->count();
                    $borrow = Borrow::where('status','Approved')->count();
                    $reject = Borrow::where('status','Rejected')->count();
                return view('home.index',[
                    'borrow'=>$borrow,
                    'books'=>$books,
                    'reject'=>$reject,
                ]);
                }


                }


                else{
                return redirect()->back();
                }

                }


//student list
                function users(){
                    $users = User::where('id', '!=', Auth::id())->get();
                    $total_user = User::count();
                    return view('admin.user.studen_list', compact('users','total_user'));
                }

                function users_delete($id){
                    User::find($id)->Delete();
                    return back();
                }


                function trash(){
                    $users = User::onlyTrashed()->where('id', '!=', Auth::id())->orderBy('name', 'asc')->get();
                    $total_user = User::count();
                    return view('admin.user.trash_student', [
                        'users'=>$users,
                        'total_user'=>$total_user,
                    ]);
                }


                function restore($user_id){
                    User::withTrashed()->find($user_id)->restore();
                    return back();
                }
                function hard_delete($user_id){
                    User::onlyTrashed($user_id)->forceDelete();
                    return back();
                }


//user  profile

                function profile_update(){

                return view('admin.user.user_profile');

                }

                function user_info_update(Request $request){

                    $request->validate([
                    'name'=>'required',
                    'email'=>'required',
                    'email' => 'email:rfc,dns',
                    ]);


                    User::find(Auth::id())->update([
                    'name'=>$request->name,
                    'email'=>$request->email
                    ]);
                    return back();
                    }

                    function password_update(Request $request){
                        $request->validate([
                        'current_password'=>'required',
                        'password'=>'required|confirmed',
                        'password'=>Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols(),
                        'password_confirmation'=>'required',
                        ]);

                        $user = User::find(Auth::id());
                        if(password_verify($request->current_password, $user->password)){
                        User::find(Auth::id())->update([
                        'password'=>bcrypt($request->password),
                        ]);
                        return back()->with('pass_update', 'password updated');
                        }
                        else{
                        return back()->with('current_pass', 'Wrong current password');
                        }
                    }





                    function user_photo_update(Request $request){
                        $request->validate([
                        'photo'=>'required|mimes:png,jpg',
                        'photo'=>'file|max:512',
                        'photo'=>'dimensions:min_width=200,min_height=300',
                        ]);
                        if(Auth::user()->photo == null){
                        $photo = $request ->photo;
                        $extension = $photo ->extension();
                        $file_name = Auth::id().'.'.$extension;
                        $image = Image::make($photo)->resize(300, 200)->save(public_path('uploads/user/'.$file_name));

                        User::find(Auth::id())->update([
                            'photo'=>$file_name,
                        ]);
                        return back()->with('photo_update', 'profile photo updated');
                        }
                        else{

                        $current_photo = public_path('uploads/user/'.Auth::user()->photo);
                        unlink($current_photo);

                    $photo = $request ->photo;
                        $extension = $photo ->extension();
                        $file_name = Auth::id().'.'.$extension;
                        $image = Image::make($photo)->resize(300, 200)->save(public_path('uploads/user/'.$file_name));

                        User::find(Auth::id())->update([
                            'photo'=>$file_name,
                        ]);
                        return back()->with('photo_update', 'profile photo updated');
                        }

                    }
//Category Controller

function category_page(){
    $categories = Category::Paginate(5);
            return view('admin.category.category',[
                'categories'=>$categories,
            ]);

}




function category_post(Request $request){
    $request->validate([
      'cat_tittle'=>'required|unique:categories',
    ]);
    Category::insert([
     'cat_tittle'=>$request->cat_tittle,
     'created_at'=>Carbon::now(),
   ]);
   return back()->with('success','category added successfully');
  }


  function category_edit($category_id){
    $category_info = Category::find($category_id);
    return view('admin.category.category_edit',[
        'category_info'=>$category_info,
    ]);
}


function category_update(Request $request){
    $category = Category::find($request->category_id);
    Category::find($request->category_id)->update([
        'cat_tittle'=>$request->cat_tittle,
         'updated_at' =>Carbon::now(),
    ]);
    return redirect()->route('category.page');

}

                    function category_soft_delete($category_id){
                        category::find($category_id)->delete();
                        return back();
                    }

                function category_trash(){
                    $trash_category = Category::onlyTrashed()->get();
                    return view('admin.category.trash', [
                    'trash_category'=> $trash_category,
                    ]);
                }

            function category_restore($id){
                Category::onlyTrashed()->find($id)->restore();
                return redirect()->route('category.page');
            }


            function category_hard_delete($id){
            Category::onlyTrashed($id)->forceDelete();
            return redirect()->route('category.page');
            }



//Book Add

            public function  Add_book(){
                $data = Category::all();
            return view('admin.Book.add_book',[
                'data'=>$data,
            ]);
            }


public function store_book(Request $request){

    $request->validate([
        'title'=>'required',
        'auther_name'=>'required',
        'description'=>'required',
        'category_id'=>'required',
        'price'=>'required',
        'quantity'=>'required',
      ]);
        $img = $request->book_img;
        $extension = $img->extension();
        $file_name = Str::lower(str_replace(' ','-', $request->title)).'-'.random_int(100000,900000).'.'.$extension;
        Image::make($img)->save(public_path('uploads/book/'.$file_name));
       Book::insert([
        'title'=>$request->title,
        'auther_name'=>$request->auther_name,
        'description'=>$request->description,
        'category_id'=>$request->category_id,
        'price'=>$request->price,
        'quantity'=>$request->quantity,
         'book_img'=>$file_name,
         'created_at'=>Carbon::now(),
       ]);
        return redirect()->back();

}


            public function book_list(){

                        $book_data = Book::all();
                        return view('admin.Book.book_list',[
                        'book_data'=>$book_data,
                        ]);

            }


            function book_edit($book_id){
                $book_info = Book::find($book_id);
                $data = Category::all();
                    return view('admin.Book.book_edit',[
                        'book_info'=>$book_info,
                        'data'=>$data,
                    ]);
              }



                public function book_update(Request $request){
                    $request->validate([
                        'title'=>'required',
                        'auther_name'=>'required',
                        'description'=>'required',
                        'category_id'=>'required',
                        'price'=>'required',
                        'quantity'=>'required',
                      ]);

                      $book = Book::find($request->book_id);

                      if($request->book_img == ''){
                        Book::find($request->book_id)->update([
                            'title'=>$request->title,
                            'auther_name'=>$request->auther_name,
                            'description'=>$request->description,
                            'category_id'=>$request->category_id,
                            'price'=>$request->price,
                            'quantity'=>$request->quantity,
                             'updated_at' =>Carbon::now(),
                        ]);
                        return redirect()->back();
                      }
                      else{
                         $current_img = public_path('uploads/book/' . $book->book_img);
                         unlink($current_img);

                         $img = $request->book_img;
                         $extension = $img->extension();
                         $file_name = Str::lower(str_replace(' ','-', $request->title)).'-'.random_int(100000,900000).'.'.$extension;
                         Image::make($img)->save(public_path('uploads/book/'.$file_name));

                         Book::find($request->book_id)->update([
                            'title'=>$request->title,
                            'auther_name'=>$request->auther_name,
                            'description'=>$request->description,
                            'category_id'=>$request->category_id,
                            'price'=>$request->price,
                            'quantity'=>$request->quantity,
                             'book_img'=>$file_name,
                             'updated_at' =>Carbon::now(),
                        ]);
                        return redirect()->back();
                      }

                }

             public function book_soft_delete($book_id){
                    Book::find($book_id)->delete();
                    return back();
                   }

                   function book_trash(){
                    $trash_book = Book::onlyTrashed()->get();
                    return view('admin.Book.book_trash', [
                      'trash_book'=> $trash_book,
                    ]);
                }

                function book_restore($id){
                    Book::onlyTrashed()->find($id)->restore();
                    return back();
                   }

                   function book_hard_delete($id){
                    $book = Book::onlyTrashed()->find($id);
                    $img = public_path('uploads/book/'.$book->book_img);
                    unlink($img);
                        Book::onlyTrashed($id)->forceDelete();
                        return back();
                }

//Borrow book

                    function borrow_request(){

                    $borrow_book=Borrow::all();
                    return  view('admin.borrow.borrow_book',[
                    'borrow_book'=> $borrow_book,
                    ]);
                        }

//Approve book
                function approve_book($id){

                            $approve_book =Borrow::find($id);
                            $status =$approve_book->status;

                            if($status == 'Approved'){

                                return redirect()->back()->with('message','This book has already been approved');

                            }else{
                                $approve_book->status ='Approved';
                                $approve_book->save();

                                $bookid = $approve_book->book_id;
                                $book_info  =Book::find($bookid);
                                $book_qty  =$book_info->quantity -'1';
                                $book_info->quantity = $book_qty;
                                $book_info->save();
                                return redirect()->back()->with('message','This book has approved successfully');

                            }


                }

//Return book
                function return_book($id){

                            $approve_book =Borrow::find($id);
                            $status =$approve_book->status;

                            if($status == 'Returned'){

                            return redirect()->back()->with('message','This book has already been returned');

                            }else{
                            $approve_book->status ='Returned';
                            $approve_book->save();

                            $bookid = $approve_book->book_id;
                            $book_info  =Book::find($bookid);
                            $book_qty  =$book_info->quantity +'1';
                            $book_info->quantity = $book_qty;
                            $book_info->save();
                            return redirect()->back()->with('message','This book has returned successfully');

                            }

                  }
//Reject book

function reject_book($id){
    $approve_book =Borrow::find($id);
    $approve_book->status ="Rejected";
    $approve_book->save();
    return redirect()->back()->with('message','This book has rejected successfully');
}


}
