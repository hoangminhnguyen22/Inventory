<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\ModelAsset;
use App\Models\Location;
use App\Models\Category;
use App\Models\Manufactorer;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Repositories\AssetRepositoryInterface;
use App\Repositories\ModelAssetRepositoryInterface;
use App\Repositories\LocationRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ManufactorerRepositoryInterface;
use App\Repositories\SupplierRepositoryInterface;
use App\Repositories\PurchaseRepositoryInterface;
use App\Http\Resources\AssetResource;

class AssetController extends Controller
{

    private $assetRepository;
    private $locationRepository;
    private $modelAssetRepository;
    private $categoryRepository;
    private $manufactorerRepository;
    private $supplierRepository;
    private $purchaseRepository;
  
    public function __construct(
        LocationRepositoryInterface $locationRepository,
        AssetRepositoryInterface $assetRepository, 
        ModelAssetRepositoryInterface $modelAssetRepository,
        CategoryRepositoryInterface $categoryRepository,
        ManufactorerRepositoryInterface $manufactorerRepository,
        SupplierRepositoryInterface $supplierRepository,
        PurchaseRepositoryInterface $purchaseRepository,
    )
    {
        $this->locationRepository = $locationRepository;
        $this->assetRepository = $assetRepository;
        $this->modelAssetRepository = $modelAssetRepository;
        $this->categoryRepository = $categoryRepository;
        $this->manufactorerRepository = $manufactorerRepository;
        $this->supplierRepository = $supplierRepository;
        $this->purchaseRepository = $purchaseRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $assets = $this->assetRepository->index(10);
        if($request->name)
        {
            $assets = Asset::where('name', 'LIKE', '%'. $request->name .'%')->paginate(10);
        }elseif($request->code)
        {
            $assets = Asset::where('code', 'LIKE', '%'. $request->code .'%')->paginate(10);
        }
        
        return AssetResource::collection($assets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $purchase = [
            'date' => $request->date,
            'serial' => $request->serial,
            'warranty' => $request->warranty,
            'supplier_id' => $request->supplier_id,
            'manufactorer_id' => $request->manufactorer_id,
            'model_id' => $request->model_id,
        ];
        $purchase = $this->purchaseRepository->store($purchase);

        $asset = [
            'code' => $request->code,
            'name' => $request->name,
            'location_id' => $request->location_id,            
            'category_id' => $request->category_id,            
            'condition' => $request->condition,            
            'purchase_id' => $purchase->id,            
            'price' => $request->price,            
            'note' => $request->note,            
        ];
        $asset = $this->assetRepository->store($asset);

        return new AssetResource($asset);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $assets = $this->assetRepository->find($id);
        return new AssetResource($assets);
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
