<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use App\Models\Asset;
use App\Repositories\AssetRepositoryInterface;
use App\Http\Resources\AssetResource;

class AdminController extends Controller
{
    private $userRepository;
    private $assetRepository;
  
    public function __construct(
        UserRepositoryInterface $userRepository,
        AssetRepositoryInterface $assetRepository, 
    )
    {
        $this->userRepository = $userRepository;
        $this->assetRepository = $assetRepository;
    }

    public function dashboard(){
        $users = $this->userRepository->all();
        $assets = $this->assetRepository->all();
        $recentAsset = $this->assetRepository->getRecent(10);
        $recentUser = $this->userRepository->getRecent(10);
        
        return response()->json([
            'total_users' => count($users),
            'total_assets' => count($assets),
            'recent_users' => $recentUser,
            'recent_assets' => AssetResource::collection($recentAsset),
        ]);
    }
}
