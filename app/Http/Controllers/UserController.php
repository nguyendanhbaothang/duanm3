<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequet;
use App\Http\Requests\ProductRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function index(){
        $this->authorize('viewAny', User::class);
        $users = User::all();
        // $users = User::search()->paginate(4);
        $param = [
            'users' => $users,
        ];
        return view('admin.user.index', $param);
    }

    public function showAdmin(){

        $admins = User::get();
        $param = [
            'admins' => $admins,
        ];
        return view('admin.user.admin', $param);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $groups = Group::get();
        $param = [
            'groups' => $groups,
        ];
        return view('admin.user.add', $param);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        // $file = $request->image;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public/assets/images/user/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $user->image = $new_image;
            $data['user_image'] = $new_image;
        }
        $user->save();

        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];
        // Mail::send('admin.mail.mail', compact('data'), function ($email) use($request) {
        //     $email->subject('NowSaiGon');
        //     $email->to($request->email, $request->name);
        // });

        $notification = [
            'message' => '????ng k?? th??nh c??ng!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }

    public function show($id)
    {
        $this->authorize('view', User::class);
        $user = User::findOrFail($id);
        $param =[
            'user'=>$user,
        ];


        // $productshow-> show();
        return view('admin.user.profile',  $param );
    }

    public function edit($id)
    {
        $this->authorize('view', User::class);
        $user = User::find($id);
        $groups=Group::get();
        $param = [
            'user' => $user ,
            'groups' => $groups
        ];
        return view('admin.user.edit' , $param);
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $file = $request->image;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public/assets/images/user/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $user->image = $new_image;
            $data['user_image'] = $new_image;
        }
        $user->save();
        $notification = [
            'message' => 'Ch???nh S???a Th??nh C??ng!',
            'alert-type' => 'success'
        ];
        return redirect()->route('user.index')->with($notification);
    }

    // hi???n th??? form ?????i m???t kh???u
    public function editpass($id){
        $this->authorize('view', User::class);
        $user = User::find($id);
        $param =[
            'user'=>$user,
        ];
        return view('admin.user.editpass', $param);
    }

     // hi???n th??? form ?????i m???t kh???u
     public function adminpass($id){
        $this->authorize('adminUpdatePass', User::class);
        $user = User::find($id);
        $param =[
            'user'=>$user,
        ];
        return view('admin.user.adminpass', $param);
    }

    // ch??? c?? superAdmin m???i c?? quy???n ?????i m???t kh???u ng?????i kh
    public function adminUpdatePass(Request $request, $id){
        $this->authorize('adminUpdatePass', User::class);
        $user = User::find($id);
        if($request->renewpassword==$request->newpassword)
        {
            $item = User::find($id);
            $item->password= bcrypt($request->newpassword);
            $item->save();
            $notification = [
                'message' => '?????i m???t kh???u th??nh c??ng!',
                'alert-type' => 'success'
            ];
            return redirect()->route('user.index')->with($notification);

        }else{
            $notification = [
                'sainhap' => 'B???n nh???p m???t kh???u kh??ng tr??ng kh???p!',
                'alert-type' => 'error'
            ];
            return back()->with($notification);
        }
    }

    public function updatepass(UserRequet $request)
    {
        if($request->renewpassword==$request->newpassword)
        {
            if ((Hash::check($request->password, Auth::user()->password))) {
                $item=User::find(Auth()->user()->id);
                $item->password= bcrypt($request->newpassword);
                $item->save();
                $notification = [
                    'message' => '?????i m???t kh???u th??nh c??ng!',
                    'alert-type' => 'success'
                ];
                return redirect()->route('user.index')->with($notification);
            }else{

                $notification = [
                    'saipass' => '!',

                ];
                return back()->with($notification);
            }
        }else{
            $notification = [
                'sainhap' => '!',
            ];
            return back()->with($notification);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('forceDelete', Product::class);
        $notification = [
            'sainhap' => '!',
        ];

        $user = User::find($id);
        if($user->group->name!='Supper Admin'){
            $user->delete();
        }
        else{
            return dd(__METHOD__);
        }
    }



























  //Hi???n Th??? ????ng Nh???p
  public function viewLogin()
  {

      return view('auth.login');
  }
  //x??? l?? ????ng nh???p
  public function login(Request $request){
    $validated = $request->validate([
        'email' => 'required',
        'password'=>'required|min:6',
    ],
        [
            'email.required'=>'Kh??ng ???????c ????? tr???ng',
            'password.required'=>'Kh??ng ???????c ????? tr???ng',
            'password.min'=>'L???n h??n :min',
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
          'email' => 'Th??ng tin ????ng nh???p ???????c cung c???p kh??ng kh???p v???i h??? s?? c???a ch??ng t??i.',
      ])->onlyInput('email');
  }

  //Hi???n Th??? ????ng K??
  public function viewRegister()
  {
      return view('auth.register');
  }
  //x??? l?? ????ng k??
  public function register(Request $request){
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password'=>'required|min:8',
    ],
        [
            'name.required'=>'Kh??ng ???????c ????? tr???ng',
            'email.required'=>'Kh??ng ???????c ????? tr???ng',
            'email.unique'=>'Tr??ng Email',
            'password.required'=>'Kh??ng ???????c ????? tr???ng',
            'password.min'=>'L???n h??n :min',
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
