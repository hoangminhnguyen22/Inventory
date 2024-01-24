<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Role;
Use App\Models\RouteName;
use App\Repositories\RoleRepositoryInterface;
use Route;

class RoleController extends Controller
{
    private $locationRepository;
    private $departmentRepository;
  
    public function __construct(
        RoleRepositoryInterface $roleRepository,
    )
    {
        $this->roleRepository = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleRepository->index(10);
        return view('admin.role.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = [];
        $all = Route::getRoutes();
        $asset = [];
        $user = [];
        $location = [];
        $role = [];

        foreach($all as $r){
            $name = $r->getName();

            if(strpos($name, 'asset') == 6){
                continue;
            }
            
            $pos = strpos($name,'asset');
            if($pos !== false){
                $route = new RouteName();
                $route->name = 'asset';
                $route->route = $name;
                if(!in_array($route, $asset))
                {
                    array_push($asset, $route);
                }
            }         
        }

        foreach($all as $r){
            $name = $r->getName();

            $pos = strpos($name,'user');
            if($pos !== false){
                $route = new RouteName();
                $route->name = 'user';
                $route->route = $name;
                if(!in_array($route, $user))
                {
                    array_push($user, $route);
                }
            }        
        }
        
        foreach($all as $r){
            $name = $r->getName();

            $pos = strpos($name,'location');
            if($pos !== false){
                $route = new RouteName();
                $route->name = 'location';
                $route->route = $name;
                if(!in_array($route, $location))
                {
                    array_push($location, $route);
                }                
            }         
        }

        foreach($all as $r){
            $name = $r->getName();

            $pos = strpos($name,'role');
            if($pos !== false){
                $route = new RouteName();
                $route->name = 'role';
                $route->route = $name;
                if(!in_array($route, $role))
                {
                    array_push($role, $route);
                }                
            }         
        }
        $array = [
            'asset' => $asset,
            'user' => $user,
            'location' => $location,
            'role' => $role,
        ];
        
        return view('admin.role.create')->with('roles', $array);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $routes = json_encode($request->route);
        $data = [
            'name' => $request->name,
            'permissions' => $routes,
        ];

        $result = $this->roleRepository->store($data);

        if($result){
            return redirect()->route('role.index')->with('success','sửa thành công');
        }else{
            return redirect()->route('role.index')->with('error','sửa không thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
