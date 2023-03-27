<?php

namespace App\Http\Controllers\Office;
use App\Http\Controllers\Controller;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserApiController;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $user = User::
            where('name','like','%'.$request->keywords.'%')->
            paginate(10);
            return view('page.office.users.list', compact('user'));
        }
        return view('page.office.users.main');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('page.office.users.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.office.users.modal', ['user' => new User]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    // public function store(Request $request)
    // {
    //     try {
    //         $this->validate($request, [
    //             'role' => 'required|string',
    //             'email' => 'required|email|unique:users',
    //             'password' => 'required',
    //             'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
    //         ]);
    //     }catch (Exception $e) {
    //         return response()->json([
    //             'alert' => 'error',
    //             'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
    //         ]);
    //     }
    //     try {
    //         $user = new User;
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->password = bcrypt($request->password);
    //         $user->role = $request->role;

    //         $user->photo = User::$FILE_DESTINATION . '/' . 'default.jpg';

    //         if($request->hasFile('photo')) {
    //             $file = $request->file('photo');
    //             $extension = $file->getClientOriginalExtension();
    //             $filename = preg_replace('/\s+/', '', $request->name) . '-' . $user->id .  '.' . $extension;
    //             $file->move(User::$FILE_DESTINATION, $filename);

    //             $user->photo = User::$FILE_DESTINATION . '/' . $filename;
    //         }

    //         $user->save();
    //         return response()->json([
    //             'alert' => 'success',
    //             'message' => 'User '. $request->name . ' telah didaftarkan',
    //         ]);
    //     }catch (Exception $e) {
    //         return response()->json([
    //             'alert' => 'error',
    //             'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
    //         ]);
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('page.office.users.modal', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAdmin(Request $request, User $user)
    {
        try {
            $user->role = 'admin';
            $user->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Role '. $request->name . ' telah di Update',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }
    public function updateUser(Request $request, User $user)
    {
        try {
         
            $user->role = 'user';
            $user->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Role '. $request->name . ' telah di Update',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }
    public function updateSuper(Request $request, User $user)
    {
        try {
         
            $user->role = 'supervisor';
            $user->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Role '. $request->name . ' telah di Update',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        try {
            Storage::delete($user->photo);
            $user->delete();
            return response()->json([
                'alert' => 'success',
                'message' => 'User '. $user->name . ' Dihapus',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }

    public function editPassword(Request $request){
        try {
            $this->validate($request, [
                'password' => 'required',
                'new_password' => 'required|min:8|confirmed', // name of fields must be new_password and new_password_confirmation
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Gagal untuk mengubah password, silahkan coba lagi.',
            ]);
        }
        try{
            $user = User::find(Auth::user()->id);
            if(Hash::check($request->password, $user->password)) {
                $user->password = bcrypt($request->new_password);
                $user->update();
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Password berhasil diubah',
                ]);
            }
            else {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Password lama tidak sesuai',
                ]);
            }
        }
        catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, silahkan coba lagi.',
            ]);
        }
    }
}
