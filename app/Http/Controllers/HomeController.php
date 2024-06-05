<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use App\Models\Category;
use App\Models\PopularBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//Student information.................
    function student_update(){

        return view('home.user.student_profile');
        }
        function student_info_update(Request $request){

            $request->validate([
              'name'=>'required',
              'address'=>'required',
              'phone'=>'required',
              'desp'=>'required',
              'language'=>'required',
              'session'=>'required',
              'email'=>'required',
              'email' => 'email:rfc,dns',
            ]);

              User::find(Auth::id())->update([
               'name'=>$request->name,
               'email'=>$request->email,
               'address'=>$request->address,
               'phone'=>$request->phone,
               'desp'=>$request->desp,
               'language'=>$request->language,
               'exprience'=>$request->exprience,
               'session'=>$request->session,
              ]);
              return redirect()->back()->with('message','Profile updated successfully!');
            }

            function student_password_update(Request $request){
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

              function student_photo_update(Request $request){
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
///////////////////////////////////////////

//Student book

        function student_book(){

        $student_book = Book::all();

        $latest_book = Book::latest('created_at')->get();

        $popular_books = PopularBook::groupBy('book_id')
        ->selectRaw('book_id, sum(total_view) as sum')
        ->orderBy('sum','DESC')
        ->get();

        return view('home.show_book.show_book',[
        'student_book'=>$student_book,
        'popular_books'=>$popular_books,
        'latest_book'=>$latest_book,
        ]);
        }

        function borrow_book($id){

            $quantity_check =Book::find($id);
            $book_id =$id;
            $quantity = $quantity_check->quantity;

            if($quantity > 0)
            {
                if(Auth::id()){
                $user_id = Auth::user()->id;
                $borrow = new Borrow;
                $borrow->book_id =$book_id;
                $borrow->user_id =$user_id;
                $borrow->save();
                return redirect()->back()->with('message','Request has been sent to admin to borrow this book');

                }
                else{
                return redirect()->route('login');
                }

            }else
            {
            return redirect()->back()->with('message','Not enough book available');
            }

        }

//book  history///
            function book_history(){

                if(Auth::id()){
                      $userid = Auth::user()->id;
                      $data = Borrow::where('user_id','=',$userid)->get();
                      return view('home.book_history.book_history',[
                      'data'=>$data,
                      ]);
                }

            }
                function cancel_book($id){

                $data  =Borrow::find($id);
                $data->delete();
                return redirect()->back()->with('message','APPLIED BOOK HAS BEEN CANCELED SUCCESSFULLY!');
                }
//explore book///////
                function explore(){
                $student_book = Book::all();
                $category = Category::all();
                return view('home.explore.explore',[
                    'student_book'=>$student_book,
                    'category'=>$category,
                ]);
                }
// search book/////

            function search(Request $request){

              $category = Category::all();
              $search = $request->search;
              $student_book = Book::where('title','LIKE','%'.$search.'%')->orWhere('auther_name','LIKE','%'.$search.'%')->get();
              return view('home.explore.explore',[
                    'student_book'=>$student_book,
                    'category'=>$category,
              ]);

            }

                function category_search($id){
                    $category = Category::all();
                    $student_book =Book::where('category_id',$id)->get();
                    return view('home.explore.explore',[
                        'student_book'=>$student_book,
                        'category'=>$category,
                  ]);

                }

                function book_details($book_id){

                    $student_book = Book::where('id',$book_id)->get();

                    if(PopularBook::where('book_id',$student_book->first()->id)->exists()){
                        PopularBook::where('book_id',$student_book->first()->id)->increment('total_view',1);
                       }else{
                        PopularBook::insert([
                            'book_id'=>$student_book->first()->id,
                            'total_view'=>1,
                             'created_at'=>Carbon::now(),
                         ]);
                       }

                       $popular_books = PopularBook::groupBy('book_id')
                       ->selectRaw('book_id, sum(total_view) as sum')
                       ->orderBy('sum','DESC')
                       ->get();



                    return view('home.show_book.book_details',[
                        'student_book'=>$student_book,
                    ]);

                }

}
