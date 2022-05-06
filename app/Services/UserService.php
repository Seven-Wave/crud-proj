<?php


namespace App\Services;

use App\Contracts\UserControllerInterface;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserService implements UserControllerInterface
{
    public function index(Request $req) {
        return response()->json(['users' => User::get()]);
    }

    public function create(Request $req) {
        $validator = Validator::make($req->all(), [
                "name" => ["required"],
                "email" => ["required"],
                "phone" => ["required"],
            ]
        );

        $searchUserByEmail = User::where('email', $req->get('email'))->first();
        if ($searchUserByEmail) {
            return response()->json(['status' => 'error', 'message' => 'Пользователь с такой почтой уже есть в базе']);
        }

        $searchUserByPhone = User::where('phone', $req->get('phone'))->first();
        if ($searchUserByPhone) {
            return response()->json(['status' => 'error', 'message' => 'Пользователь с таким номером уже есть в базе']);
        }

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Заполните пустые поля!']);
        }

        $newUser = new User;
        $newUser->name = $req->get('name');
        $newUser->email = $req->get('email');
        $newUser->phone = $req->get('phone');
        $newUser->password = bcrypt('123');
        $newUser->save();

        return response()->json(['status' => 'ok', 'message' => 'Пользователь создан!']);
    }


    public function update(Request $req) {

        $editUser = User::find($req->get('id'));

        $validator = Validator::make($req->all(), [
                "name" => ["required"],
                "email" => ["required"],
                "phone" => ["required"],
            ]
        );

        if ($editUser->email != $req->get('email')) {
            $searchUserByEmail = User::where('email', $req->get('email'))->first();
            if ($searchUserByEmail) {
                return response()->json(['status' => 'error', 'message' => 'Пользователь с такой почтой уже есть в базе']);
            }
        }

        if ($editUser->phone != $req->get('phone')) {
            $searchUserByPhone = User::where('phone', $req->get('phone'))->first();
            if ($searchUserByPhone) {
                return response()->json(['status' => 'error', 'message' => 'Пользователь с таким номером уже есть в базе']);
            }
        }

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Заполните пустые поля!']);
        }

        $editUser->name = $req->get('name');
        $editUser->email = $req->get('email');
        $editUser->phone = $req->get('phone');

        $editUser->save();

        return response()->json(['status' => 'ok', 'message' => 'Пользователь успешно редактирован!']);
    }

    public function delete(Request $request) {

        User::find($request->id)->delete();

        return response()->json(['status' => 'ok', 'message' => 'Пользователь удалён!']);
    }

}
