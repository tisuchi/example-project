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

    /**
     * Show the transaction details of a page.
     *
     * @param $walletId
     * @return \Illuminate\View\View
     */
    public function show($walletId)
    {
        return view('reports.show')
            ->with([
                'report' => (new ReportRepository())->show($walletId)
            ]);
    }
}
