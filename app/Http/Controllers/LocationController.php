<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Location\StoreLocationRequest;
use App\Http\Requests\Location\UpdateLocationRequest;
use App\Models\Location;
use App\Models\Department;
use App\Repositories\LocationRepositoryInterface;
use App\Repositories\DepartmentRepositoryInterface;

use App\Imports\LocationImport;
use Maatwebsite\Excel\Facades\Excel;

class LocationController extends Controller
{
    private $locationRepository;
    private $departmentRepository;
  
    public function __construct(
        LocationRepositoryInterface $locationRepository, 
        DepartmentRepositoryInterface $departmentRepository,
    )
    {
        $this->locationRepository = $locationRepository;
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = $this->locationRepository->index(10);
        return view('admin.location.index')->with('locations', $locations);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = $this->departmentRepository->all();
        return view('admin.location.create')->with('departments', $department);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $data = $request->all();

        $location = $this->locationRepository->store($data);

        if($location){
            return redirect()->route('location.index')->with('success','thêm mới thành công');
        }else{
            return redirect()->route('location.index')->with('error','thêm mới không thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        $department = $this->departmentRepository->all();
        return view('admin.location.edit')->with('departments', $department)
                                        ->with('location', $location);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $id = $request->id;
        $data = $request->all();
        $result = $this->locationRepository->update($id, $data);

        if($result){
            return redirect()->route('location.index')->with('success','sửa thành công');
        }else{
            return redirect()->route('location.index')->with('error','sửa không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $result = $this->locationRepository->delete($location->id);

        if($result){
            return redirect()->route('location.index')->with('success','xóa thành công');
        }else{
            return redirect()->route('location.index')->with('error','xóa không thành công');
        }
    }

    public function getFile() {
        return view('admin.location.import');
    }

    public function import(Request $request) {
        $file = Excel::import(new LocationImport, $request->file('file_upload'));
        if($file){
            return redirect()->route('location.index')->with('success','import thành công');
        }
        else{
            return redirect()->route('location.index')->with('error','import không thành công');
        }
    }
}
