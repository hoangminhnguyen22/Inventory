<?php

namespace App\Http\Controllers;

use App\Http\Requests\Asset\StoreAssetRequest;
use App\Http\Requests\Asset\UpdateAssetRequest;
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

use Illuminate\Http\Request;

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
    public function index()
    {
        $assets = $this->assetRepository->index(10);
        return view('admin.asset.index')->with('assets', $assets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = $this->locationRepository->all();
        $modelAssets = $this->modelAssetRepository->all();
        $categories = $this->categoryRepository->all();
        $manufactorers = $this->manufactorerRepository->all();
        $suppliers = $this->supplierRepository->all();
        return view('admin.asset.create')->with('locations', $locations)                                        
                                        ->with('modelAssets', $modelAssets)
                                        ->with('manufactorers', $manufactorers)
                                        ->with('categories', $categories)
                                        ->with('suppliers', $suppliers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssetRequest $request)
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

        if($asset){
            return redirect()->route('asset.index')->with('success','thêm mới thành công');
        }else{
            return redirect()->route('asset.index')->with('success','thêm mới không thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        $asset = $this->assetRepository->show($asset->id);
        return view('admin.asset.view')->with('asset', $asset);
    }

    public function qrCode()
    {
        $assets = $this->assetRepository->index(10);
        return view('admin.asset.QRCode')
                                        ->with('assets', $assets);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        //
    }
}
