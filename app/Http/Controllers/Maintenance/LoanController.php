<?php

namespace App\Http\Controllers\Maintenance;

use Illuminate\Http\Request;
use App\Models\Maintenance\Loan;
use App\Http\Controllers\Controller;
use App\Models\Maintenance\Customer;
use App\Models\Maintenance\LoanType;
use App\Models\Maintenance\TableCode;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Maintenance\LoanRequest;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $loans = Loan::query()->with('customer');

            // dd($loans);

            return DataTables::eloquent($loans)->toJson();
        }

        return view('maintenance.loan.index');
    }

    public function create(Request $request)
    {
        $customer = null;

        if ($request->customer_id) {
            $customer = Customer::find($request->customer_id);
        }

        return view('maintenance.loan.create', array_merge($this->loadParams(), compact('customer')));
    }

    public function store(LoanRequest $request)
    {
        $loan = new Loan;

        $loan->pre_cia = $request->user()->usr_cia;
        $loan->pre_codigo = 0;
        $loan->pre_codcli = $request->customer_id;
        $loan->pre_codtip = $request->loan_type_id;
        $loan->pre_suc = $request->user()->usr_codsuc;
        $loan->pre_smonto = $request->amount;
        $loan->pre_amonto = $request->amount;
        $loan->pre_aproba = $request->disbursement;
        $loan->pre_1racuo = $request->first_quota;
        $loan->pre_tasint = $request->interest_rate;
        $loan->pre_tasmor = $request->late_rate;
        $loan->pre_balanc = $request->amount;
        $loan->pre_capitp = 0;
        $loan->pre_interp = 0;
        $loan->pre_tiempo = $request->duration;
        $loan->pre_amorti = $request->amortiza ? 'S' : 'N';
        $loan->pre_formap = $request->periodicity_id;
        $loan->pre_estado = 'D';
        $loan->pre_user = $request->user()->usr_usuari;
        $loan->pre_gracia = $request->gracia;
        $loan->pre_moracu = 'N';
        $loan->pre_gastoc = $request->closing_costs;
        $loan->pre_soloin = $request->pay_id;
        $loan->pre_cedcob = $request->seller_id;
        $loan->pre_movimi = 0;
        $loan->pre_solici = now()->format('Y-m-d');
        $loan->pre_tdomin = $request->sunday_pay ? 'S' : 'N';
        $loan->pre_tiempod = 0;
        $loan->pre_tasmen = 0;
        $loan->pre_2dacuo = $request->second_quota;
        $loan->pre_preant = 0;
        $loan->pre_efecti = 0;
        $loan->pre_cheque = 0;
        $loan->pre_tarjet = 0;
        $loan->pre_transf = 0;
        $loan->pre_deposi = 0;
        $loan->pre_otro = 0;
        $loan->pre_nocheque = 0;
        $loan->pre_notarjet = 0;
        $loan->pre_noctat = 0;
        $loan->pre_noctad = 0;
        $loan->pre_nootro = 0;
        $loan->pre_ctades = 0;
        $loan->pre_legal = 'A';
        $loan->pre_codmon = $request->currency_id;

        $loan->save();

        return back()->withSuccess('El préstamo ha sido creado con éxito.');
    }

    public function edit(Request $request, Loan $loan)
    {
        return view('maintenance.loan.edit', array_merge($this->loadParams(), compact('loan')));
    }

    public function update(LoanRequest $request, $loan)
    {
        Loan::code($loan)->update([
            'cli_tipoid' => $request->identification_type,
            'cli_cedula' => $request->identification,
            'cli_nombre' => $request->names,
            'cli_apelli' => $request->surnames,
            'cli_calle' => $request->street,
            'cli_numero' => $request->street_number,
            'cli_sector' => $request->sector,
            'cli_telefo' => $request->phone,
            'cli_2telef' => $request->phone2,
            'cli_celula' => $request->cell_phone,
            'cli_email' => $request->email,
            'cli_zona' => $request->zone,
            'cli_empres' => $request->company,
            'cli_dempre' => $request->department,
            'cli_posici' => $request->position,
            'cli_direcc' => $request->address,
            'cli_sueldo' => $request->salary,
            'cli_otrosi' => $request->other_salary,
        ]);

        return back()->withSuccess('El cliente ha sido editado con éxito.');
    }

    public function destroy(Request $request, $loan)
    {
        Loan::code($loan)->update([
            'cli_status' => '',
        ]);

        return redirect()->route('maintenance.loan.index')->withSuccess('El cliente ha sido eliminado con éxito.');
    }

    public function loadParams()
    {
        $loan_types = LoanType::getToSelect();

        $periodicities = TableCode::getToSelect('periodicities');

        $payment_methods = TableCode::getToSelect('paymentMethods');

        $currencies = TableCode::getToSelect('currencies');

        return compact('loan_types', 'periodicities', 'payment_methods', 'currencies');
    }
}
