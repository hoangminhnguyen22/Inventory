<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Requests\Asset\StoreAssetRequest;
use App\Http\Controllers\Api\Requests\Asset\UpdateAssetRequest;
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
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
    public function store(StoreAssetRequest $request)
    {
        $purchase =  $request->purchase()['purchase'];
        $purchase = $this->purchaseRepository->store($purchase);

        $asset = $request->purchase()['asset'];
        $asset['purchase_id'] = $purchase->id;
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
    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        $purchase_id = $asset->purchase_id;
        $asset_id = $asset->id;
        $purchase =  $request->purchase()['purchase'];
        $purchase = $this->purchaseRepository->update($asset->purchase_id, $purchase);

        $asset = $request->purchase()['asset'];
        $asset['purchase_id'] = $purchase_id;
        $asset = $this->assetRepository->update($asset_id, $asset);
        $asset = $this->assetRepository->find($asset_id);

        return new AssetResource($asset);
    }

    public function qrCode()
    {
        $assets = $this->assetRepository->index(10);
        return QrCode::generate(
            'Hello, World!',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        if(
            $this->purchaseRepository->delete($asset->purchase_id) &&
            $this->assetRepository->delete($asset->id)
        ){
            return response()->json(
                [
                    'message' => 'Xóa thành công',
                ],
            );
        }else{
            return response()->json(
                [
                    'message' => 'Xóa không thành công',
                ],
            );
        }
    }
}
