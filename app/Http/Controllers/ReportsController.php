<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ReportRepository;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $reports = (new ReportRepository())->index();

        return view('reports.index')
            ->with([
                'reports' => $reports
            ]);
    }

    public function show($walletId)
    {
        $report = (new ReportRepository())->show($walletId);

        return view('reports.show')
            ->with([
                'report' => $report
            ]);
    }
}
