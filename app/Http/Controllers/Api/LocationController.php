<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Repositories\LocationRepositoryInterface;

class LocationController extends Controller
{
    private $locationRepository;
  
    public function __construct(
        LocationRepositoryInterface $locationRepository, 
    )
    {
        $this->locationRepository = $locationRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $location = $this->locationRepository->index(10);
        if($request->name)
        {
            $location = Location::where('name', 'LIKE', '%'. $request->name .'%')->paginate(10);
        }
        return $location;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $location = $this->locationRepository->store($data);

        return $location;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $result = $this->locationRepository->update($id, $data);
        $location = $this->locationRepository->find($id);
        return $location;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->locationRepository->delete($id);
    }
}
