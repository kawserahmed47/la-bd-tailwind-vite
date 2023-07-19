<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('auth.pages.index');
        }
    }

    public function loginCheck(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|max:190',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            $data['status'] = false;
            $data['message'] = "Invalid input contains! Please check your entries...";
            $data['errors'] = $validate->errors();
            return response()->json($data, 400);
        }

        $user = User::where('email', $request->email)->first();
        if($user)
        {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember ?? false )) {
                $data['status'] = true;
                $data['message'] = "Successfully Authentication!";
                $data['redirect_url'] = route('admin.dashboard');
                return response()->json($data, 200);
            } 
        }

        $data['status'] = false;
        $data['message'] = "Authentication failed!";
        return response()->json($data, 401);

    }

    public function logout(Request $request)
    {

        try {
            Auth::logout();
            $data['status'] = true;
            $data['message'] = "Successfully Logout!";
            $data['redirect_url'] = route('home');
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to logout!";
            $data['errors'] = $th;
            return response()->json($data, 404);
        }

        
    }

}
