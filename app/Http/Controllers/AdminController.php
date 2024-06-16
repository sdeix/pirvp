<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Style;

class AdminController extends Controller
{
    public function makepost(Request $request)
    {
        if ($request->method() === 'POST') {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
    
                $post = DB::insert('INSERT INTO posts (img,text) VALUES (?, ?)',[$imageName,$request['text']]);
                return view('makepost',['message'=>'Пост загружен']);
            }
    
            return view('makepost',['message'=>'Ошибка загрузки изображения']);
        }

        return view('makepost');
    }
    public function makestyle(Request $request)
    {
        if ($request->method() === 'POST') {
            $img=0;
            if($request['img']){
                $img = 1;
            }
            $style = Style::create([
                'img'=>$img,
                'invert'=>$request['invert'],
                'blur'=>$request['blur'],
                'contrast'=>$request['contrast'],
                'brightness'=>$request['brightness'],
                'grayscale'=>$request['grayscale'],
                'opacity'=>$request['opacity'],
                'saturation'=>$request['saturation'],
                'sepia'=>$request['sepia'],
                'font-size'=>$request['{font-size}'],
                'font-weight'=>$request['{font-weight}'],
            ]);
            if($style){
                return view('makestyle',['message'=>'Создан стиль']);
            }
        }

        return view('makestyle');
    }
    public function userlist(Request $request)
    {
       
        $styles = DB::select('SELECT * FROM style');
        $users = DB::select('SELECT * FROM users');
        $userstyle = DB::select('SELECT * FROM userstyle');
        return view('userlist', ['users' => $users, 'styles' => $styles,'userstyle' => $userstyle]);

    }
    public function user($id)
    {

        $styles = DB::select('SELECT * FROM style');
        $users = DB::select('SELECT * FROM users where id = :id',['id'=>$id]);
        $userstyle = DB::select('SELECT * FROM userstyle where user_id = :id',['id'=>$id]);
        return view('user', ['users' => $users, 'styles' => $styles,'userstyle' => $userstyle]);

    }
    public function addstyle(Request $request)
    {
        if ($request->method() === 'POST') {
            $dub = DB::select('SELECT * from  userstyle WHERE (user_id,style_id) = (?, ?)',[$request['user_id'],$request['style_id']]);
            if($dub){
                return redirect('users');
            }
            $asd = DB::insert('INSERT INTO userstyle (user_id,style_id) VALUES (?, ?)',[$request['user_id'],$request['style_id']]);
            return redirect('users');
        }
       
        redirect('users');

    }
    public function deletestyle($user_id,$style_id)
    {
        DB::delete("DELETE from userstyle where (user_id,style_id) = (?, ?)",[$user_id,$style_id]);
        return redirect('users');


    }
}