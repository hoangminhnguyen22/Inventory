<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Repositories\SupplierRepositoryInterface;

class SupplierController extends Controller
{
    private $supplierRepository;
  
    public function __construct(
        SupplierRepositoryInterface $supplierRepository, 
    )
    {
        $this->supplierRepository = $supplierRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = $this->supplierRepository->index(10);
        return $supplier;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}