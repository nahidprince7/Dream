<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\User;
use App\UserRole;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public $user_storage_path = 'public/user-picture';
    public function getUserFieldList(){
        return ['id','name','email','gender','picture','number'];
    }
    public function getUser($searchKey='',$user_id=''){
//        dd($searchKey);
        $additionalWhereCondition = [];
        if(!empty($user_id)){
            $additionalWhereCondition [] =  ['id','=',$user_id];
        }
        $fields = $this->getUserFieldList();
        if(!empty($searchKey)){
            return  User::whereNull('deleted_at')
                ->select($fields)
                ->with([
                    'userRoles' => function ($query){
                        return $query->select('id','user_id','role_id');
                    }
                ])
                ->where(function ($query) use($searchKey){
                    $query->where('name','like',"%$searchKey%")
                        ->orWhere('number','like',"%$searchKey%")
                        ->orWhere('email','like',"%$searchKey%");
                })
//                ->where($additionalWhereCondition)
                ->orderBy('id',"DESC")
                ->paginate(LIMIT_PER_PAGE_DEFAULT);
//            dd($user);
        }
        else{
            return User::whereNull('deleted_at')
                ->select($fields)
                ->with([
                    'userRoles' => function ($query){
                        return $query->select('id','user_id','role_id');
                    }
                ])
                ->where($additionalWhereCondition)
                ->orderBy('id',"DESC")
                ->paginate(LIMIT_PER_PAGE_DEFAULT);
        }




    }
    public function index(Request $request){

    $searchKey = '';
    if(!empty($request->searchKey)){
        $searchKey = $request->searchKey;
    }

    if(in_array(ADMIN,Auth::user()->role)){
        $users = $this->getUser($searchKey);
    }
    else{
        $users = $this->getUser($searchKey);
    }
//    dd(ROLES);
//    dd($users->toArray());
        return view ('users.index',compact('users'));
    }

    public function store(CreateUserRequest $request)
    {
        $userData = $request->validated();
//      Validated through CreateUserReq
        $userData = CommonController::mergeOnCreate($userData);

        if ($userData) {

            if ($request->hasFile('picture')) {
                $maxID = DB::table('users')->max('id');
                $uploadedFileName = CommonController::fileUpload($this->user_storage_path, $request->picture, $maxID);
                if (strlen($uploadedFileName) > 0) $userData['picture'] = $uploadedFileName;

            }

            $userData['password'] = Hash::make($userData['password']);

            $status = DB::transaction(function () use ($userData, $request) {
                $newlyCreatedEntry = User::create($userData);
                if (!empty($request->role_ids) && count($request->role_ids) > 0) {
                    $userRoleToInsert = [];
                    foreach ($request->role_ids as $k => $v) {
                        $userRoleToInsert [$k] ['user_id'] = $newlyCreatedEntry->id;
                        $userRoleToInsert [$k] ['role_id'] = $v;
                        $userRoleToInsert [$k] = CommonController::mergeOnCreate($userRoleToInsert [$k]);
                    }
                }
                $status = 1;

                try {
                    if (count($userRoleToInsert) > 0) {
                        UserRole::insert($userRoleToInsert);
                    }
                } catch (\Exception $e) {
                    $status = 0;
                }
                return $status;
            });

            if ($status == 0) {
                $errors = [
                    0 => "failed to save"
                ];
                return redirect()->back()->withErrors($errors);
            }

            Session::flash('message', 'User has been created');
            return redirect()->route('user-index');
        }
        else {
                Session::flash('message', 'fail to save');
                return redirect()->route('user-index')->withInput();
            }
    }
    //end of class
    public function showUser($id){

//        dd($id);
        if(empty($id) || empty(User::find($id))) return abort(404);

        $fields = $this->getUserFieldList();
        $selectedUser = User::where('id',$id)
            ->select($fields)
            ->with([
                'userRoles'=>function($query){
                return $query->select('id','user_id','role_id');
                }
            ])->first();
//        dd($selectedUser);

        return view ('users.showUser',compact('selectedUser'));

    }

    public function apiData(Request $request){
        dd($request->all());
    }
}
