<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
  //Hiển Thị Đăng Nhập
  public function viewLogin()
  {
      return view('auth.login');
  }
  //xử lí đăng nhập
  public function login(Request $request){
    $validated = $request->validate([
        'email' => 'required',
        'password'=>'required|min:8',
    ],
        [
            'email.required'=>'Không được để trống',
            'password.required'=>'Không được để trống',
            'password.min'=>'Lớn hơn :min',
        ]
);

      $credentials = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
      ]);

      if (Auth::attempt($credentials)) {

          $request->session()->regenerate();

          return redirect()->route('dasboar');
      }
      // dd($request->all());
      return back()->withErrors([
          'email' => 'Thông tin đăng nhập được cung cấp không khớp với hồ sơ của chúng tôi.',
      ])->onlyInput('email');
  }

  //Hiển Thị Đăng Ký
  public function viewRegister()
  {
      return view('auth.register');
  }
  //xử lí đăng ký
  public function register(Request $request){
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password'=>'required|min:8',
    ],
        [
            'name.required'=>'Không được để trống',
            'email.required'=>'Không được để trống',
            'email.unique'=>'Trùng Email',
            'password.required'=>'Không được để trống',
            'password.min'=>'Lớn hơn :min',
        ]
);
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      try {
          $user->save();
          return redirect()->route('login');
      } catch (\Exception $e) {
          Log::error("message:".$e->getMessage());
      }
    }
      public function logout(Request $request)
      {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
      }
}
