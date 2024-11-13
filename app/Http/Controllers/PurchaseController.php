<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserFile;

class PurchaseController extends Controller
{
    public function index()
    {
        $pageTitle = 'User Purchases';
        $breadcrumbs = [
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'User Purchases', 'url' => null]
        ];

        $purchases = UserFile::with(['user', 'file.subject'])
            ->orderBy('unlocked_at', 'desc')
            ->paginate(15); // Paginate results, 15 per page

        return view('admin.purchases.index', compact('purchases', 'pageTitle', 'breadcrumbs'));
    }
}