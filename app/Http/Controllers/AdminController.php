<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use App\Models\Asset;
use App\Repositories\AssetRepositoryInterface;
use App\Http\Controllers\Controller;

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

    public function dashboard()
    {
        $users = $this->userRepository->all();
        $assets = $this->assetRepository->all();
        $recentAsset = $this->assetRepository->getRecent(10);
        $recentUser = $this->userRepository->getRecent(10);
        return view('admin.dashboard')->with('total_user', $users)
                                        ->with('total_asset', $assets)
                                        ->with('recent_user', $recentUser)
                                        ->with('recent_asset', $recentAsset);
    }

    public function error()
    {
        $code = request()->code;

        return view('admin.error')->with('code', $code);
    }

    public function ban()
    {
        echo "bạn đã bị khóa tài khoản do vi phạm chính sách. Vui lòng liên hệ ... để kiểm tra thông tin nếu không phải";
    }
}
