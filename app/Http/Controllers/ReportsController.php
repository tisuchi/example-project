<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ReportRepository;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Show the index page of report section.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('reports.index')
            ->with([
                'reports' => (new ReportRepository())->index()
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
