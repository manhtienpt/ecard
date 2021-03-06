<?php
namespace App\Ecard;

use Storage;
use DB;
use Illuminate\Http\Request;
use Auth;
use Validator;

class Person {
    public static $rule = [
        'name'      => 'max:64',
        'email'     => 'email',
        'birth'     => 'date'
    ];

    public function __construct() {

    }

    static public function create($data) {
        $result = DB::table('person')
            ->insert($data);

        return $result;
    }
    
    static public function update(Request $request) {
        $validator  = Validator::make($request->all(), self::$rule);
        $result     = [];

        if($validator->fails()){
            $result['status'] = 0;
            $result['reason'] = $validator->errors();
        }else{
            $id = Auth::user()->id;
            $result = DB::table('person')
                ->where('id', '=', $id)
                ->update($data);
        }

        return $result;
    }

    static public function get() {
        $user = Auth::user();
        if($user) {
            $result = DB::table('person')
                ->where('user_id', '=', $user->id)
                ->first();

            return $result;
        }
    }

    static public function getHistory() {
        $user = Auth::user();
        if($user) {
            $result = DB::table('mail_history')
                ->where('user_id', '=', $user->id)
                ->get();
        }

        return $result;
    }

    static public function getLike() {
        $user = Auth::user();
        if($user) {
            $result = DB::table('like')
                ->leftJoin('card', 'card.id', '=', 'like.card_id')
                ->where('like.user_id', '=', $user->id)
                ->get();
        }

        return $result;
    }

    static public function getCollect() {
        $user = Auth::user();
        if($user) {
            $result = DB::table('collect')
                ->leftJoin('card', 'card.id', '=', 'collect.card_id')
                ->where('collect.user_id', '=', $user->id)
                ->get();
        }

        return $result;
    }

    static public function getContact() {
        $user = Auth::user();
        if($user) {
            $result = DB::table('contact')
                ->where('user_id', '=', $user->id)
                ->get();
        }

        return $result;
    }
}
?>
