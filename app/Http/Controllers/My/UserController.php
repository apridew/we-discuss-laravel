<?php

namespace App\Http\Controllers\My;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Discussion;
use App\Models\Answer;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->first();

        if(!$user){
            return abort(404);
        }

        $picture = filter_var($user->picture, FILTER_VALIDATE_URL)
        ? $user->picture : Storage::url($user->picture);

        $perPage = 5;
        $columns = ['*'];
        $discussionPageName = 'discussions';
        $answersPageName = 'answers';


        return view('pages.users.show',[
            'user' => $user,
            'picture' => $picture,
            'discussions' => Discussion::where('user_id', $user->id)->paginate($perPage, $columns, $discussionPageName),
            'answers' => Answer::where('user_id', $user->id)->paginate($perPage, $columns, $answersPageName),
        ]);
    }
}
