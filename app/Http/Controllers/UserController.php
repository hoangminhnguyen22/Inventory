<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Models\Location;
use App\Models\Role;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\LocationRepositoryInterface;
use App\Repositories\RoleRepositoryInterface;
use App\Notifications\InforAccount;

class UserController extends Controller
{

    private $userRepository;
    private $locationRepository;
    private $roleRepository;
  
    public function __construct(
        UserRepositoryInterface $userRepository,
        LocationRepositoryInterface $locationRepository,
        RoleRepositoryInterface $roleRepository,
    )
    {
        $this->userRepository = $userRepository;
        $this->locationRepository = $locationRepository;
        $this->roleRepository = $roleRepository;
        // $this->middleware('can:view,user')->only('show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userRepository->index(10);
        return view('admin.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleRepository->all();
        $locations = $this->locationRepository->all();
        return view('admin.user.create')->with('roles', $roles)
                                        ->with('locations', $locations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $data['password'] = '123456';
        $data['status'] = '2';
        $user = $this->userRepository->store($data);
        
        if($user){
            $sendMAil = $user->notify(new InforAccount($user->email));
            return redirect()->route('user.index')->with('success','thêm mới thành công');
        }else{
            $this->userRepository->delete($user->id);
            return redirect()->route('user.index')->with('success','thêm mới không thành công');
        }

        //gửi mail mk mặc định
        //status 0: chưa kích hoạt mã code bằng mail
        //status 1: đã kích hoạt
        //status 2: cấp tài khoản mà chưa đổi mk
        //status 3: tài khoản bị khóa

        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = $this->roleRepository->all();
        $locations = $this->locationRepository->all();
        
        return view('admin.user.edit')->with('user', $user)
                                        ->with('roles', $roles)
                                        ->with('locations', $locations);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $id = $request->id;
        $data = $request->all();
        $result = $this->userRepository->update($id, $data);

        if($result){
            return redirect()->route('user.index')->with('success','sửa thành công');
        }else{
            return redirect()->route('user.index')->with('error','sửa không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $result = $this->userRepository->delete($user->id);

        if($result){
            return redirect()->route('user.index')->with('success','xóa thành công');
        }else{
            return redirect()->route('user.index')->with('error','xóa không thành công');
        }
    }
}
