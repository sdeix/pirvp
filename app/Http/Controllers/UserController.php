<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function posts(Request $request)
    {
        $posts = DB::select('SELECT * FROM posts');
        $user = DB::table('users')->where('id', Auth::user()->id)->first();  
        $stl = DB::table('style')->where('id', $user->style)->first();  
        $style = '';
        if ($stl){
            $style = 'filter:invert('.$stl->invert."%) blur(".$stl->blur."px) contrast(".$stl->contrast."%) brightness(".$stl->brightness."%) grayscale(".$stl->grayscale."%) opacity(".$stl->opacity."%) saturate(".$stl->saturate."%) sepia(".$stl->sepia."%); font-size:".$stl->{'font-size'}."; font-weight:".$stl->{'font-weight'};
            return view('posts', ['posts' => $posts, 'style' =>$style, 'font-size'=>$stl->{'font-size'}, 'font-weight'=>$stl->{'font-weight'} ]);
        }
        return view('posts', ['posts' => $posts, 'style' =>$style]);
    }
    public function selectstyle($id)
    {
        $posts = DB::select('SELECT * FROM posts');
        $userstyle = DB::select('SELECT * FROM userstyle where user_id = :id',['id'=>$id]);
        $arr = [];
        if($userstyle){
            foreach($userstyle as $i){
                $arr[] = DB::select("SELECT * FROM style WHERE id = {$i->style_id}");
            }
            if(count($arr)==0){
                return redirect('posts');
            }
            return view('selectstyle', ['styles' => $arr]);
        }
        return redirect('posts');
    }
    public function select($user_id,$style_id)
    {
        DB::table('users')
    ->where('id', $user_id)
    ->update(['style' => $style_id]);

        return redirect('posts');

    }

}