<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Design;
use App\Models\Admin\Printing;
use App\Models\Admin\Photography;
use App\Models\Admin\Videography;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $pending = Design::byStatus('pending')->count() + Photography::byStatus('pending')->count() + Videography::byStatus('pending')->count() + Printing::byStatus('pending')->count();
        $progress = Design::byStatus('progress')->count() + Photography::byStatus('progress')->count() + Videography::byStatus('progress')->count() + Printing::byStatus('progress')->count();
        $completed = Design::byStatus('completed')->count() + Photography::byStatus('completed')->count() + Videography::byStatus('completed')->count() + Printing::byStatus('completed')->count();

        return view('admin.dashboard.index', compact('pending', 'progress', 'completed'));
    }
}
