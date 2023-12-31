<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Coa;
use App\Models\Company;
use App\Models\Journalvoucher;
use App\Models\Vouchertype;
use Illuminate\Http\Request;

class JournalvoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jvoucher = Journalvoucher::with('branch')->latest()->paginate();
        return view('Accounts.Journalvoucher.index',compact('jvoucher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $voucherprefix = Vouchertype::where('voucherprefix', 'JV')->value('voucherprefix');
        $vtypeCount = Journalvoucher::where('v_type',1)->count();
        $jvdata = $voucherprefix .'-'. $vtypeCount+1;
        $branch = Branch::all();
        $company = Company::all();
        $coas = Coa::where('operational', 1)->get();
        return view('Accounts.Journalvoucher.create', compact('branch', 'coas', 'jvdata','company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vtypeCount = Journalvoucher::where('v_type',1)->count();
        $vtypeCount = $vtypeCount+1;
        Journalvoucher::create([
            'v_docNo' => $vtypeCount,
            'v_type' => 1,
            'memo' => $request->input('bulkMemo'),
            'doc_create_date' => $request->input('jvdate'),
            'debit_total' => $request->input('totalDebit'),
            'credit_total' => $request->input('totalCredit'),
            'jvdate' => $request->input('jvdate'),
            'tvoucher_id' => 1,
            'branch_id' => $request->input('branch'),
            'company_id' => 1,
        ]);
            //redirect the user and send friendly message
            return redirect()->route('journalvoucher.create')->with('success', 'Journal Voucher made successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
