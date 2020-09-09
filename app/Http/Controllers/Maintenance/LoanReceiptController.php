<?php

namespace App\Http\Controllers\Maintenance;

use Illuminate\Http\Request;
use App\Models\Maintenance\Loan;
use App\Models\Maintenance\Param;
use App\Http\Controllers\Controller;
use App\Models\Maintenance\Customer;
use App\Models\Maintenance\TableCode;
use App\Models\Maintenance\LoanReceipt;
use App\Http\Requests\Maintenance\LoanReceiptRequest;

//recibo de préstamo
class LoanReceiptController extends Controller
{
    public function store(LoanReceiptRequest $request)
    {
        $loan = null;
        $customer = null;
        $param = Param::first();
        $now = now();

        if (!$param) {
            return back()->with('danger', 'No existen parámetros para la compañía.');
        }

        if (in_array($request->payment_type, ['payment'])) {
            $loan = Loan::code($request->param_id)->first();

            if (!$loan) {
                return back()->with('danger', 'Este préstamo no existe');
            }
        }

        if (in_array($request->payment_type, ['other_incoming'])) {
            $customer = Customer::code($request->param_id)->first();

            if (!$customer) {
                return back()->with('danger', 'Este cliente no existe.');
            }
        }

        $loan_receipt = new LoanReceipt;

        $loan_receipt->rec_cia = $request->user()->usr_cia;
        $loan_receipt->rec_fecha = $param->par_fecpro;
        $loan_receipt->rec_hora = $now->format('d/m/Y h:i:s a');
        $loan_receipt->rec_user = $request->user()->usr_usuari;
        $loan_receipt->rec_estado = 'A';
        $loan_receipt->rec_ncf = 0;
        $loan_receipt->rec_ref = 0;
        $loan_receipt->rec_manual = 0;
        $loan_receipt->rec_movimi = 0;

        $this->{'store_' . $request->payment_type}($request, $loan_receipt, $loan);

        $loan_receipt->save();

        return back()->withSuccess('El ingreso ha sido registrado con éxito.');
    }

    public function loadParams(Request $request, $method)
    {
        $loan = null;
        $customer = null;

        if (in_array($method, ['payment', 'extraordinary_charge'])) {
            $loan = Loan::code($request->param_id)->first();
        }

        if (in_array($method, ['other_incoming'])) {
            $customer = Customer::code($request->param_id)->first();
        }

        $payment_methods = TableCode::getToSelect('paymentMethods');
        $currencies = TableCode::getToSelect('currencies');

        return compact('loan', 'customer', 'payment_methods', 'currencies');
    }

    public function payment(Request $request)
    {
        $method = __FUNCTION__;

        return view('maintenance.loan.payment.' . $method, $this->loadParams($request, $method));
    }

    public function store_payment(Request $request, LoanReceipt $loan_receipt, $loan = null)
    {
        $loan_receipt->rec_numero = 0;
        $loan_receipt->rec_codpre = $loan->pre_codigo;
        $loan_receipt->rec_cuota = $request->amount_payable;
        $loan_receipt->rec_ingres = 0;
        $loan_receipt->rec_mora = $loan->getQuotaLatePay();
        $loan_receipt->rec_descue = $request->discount;
        $loan_receipt->rec_descri = '';
        $loan_receipt->rec_tipmov = '2';
        $loan_receipt->rec_saldar = $request->pay_off ? 'S' : 'N';
        $loan_receipt->rec_codcli = $loan->pre_codcli;
        $loan_receipt->rec_tipoid = '';
        $loan_receipt->rec_identi = '';
    }

    public function other_incoming(Request $request, $param_id = 'a')
    {
        $method = __FUNCTION__;

        return view('maintenance.loan.payment.' . $method, $this->loadParams($request, $method));
    }

    public function store_other_incoming(Request $request, LoanReceipt $loan_receipt, $loan = null)
    {
        $loan_receipt->rec_numero = 0;
        $loan_receipt->rec_codpre = 0;
        $loan_receipt->rec_cuota = 0;
        $loan_receipt->rec_ingres = (
            $request->cash_amount +
            $request->tdc_amount +
            $request->check_amount +
            $request->other_amount
        );
        $loan_receipt->rec_mora = 0;
        $loan_receipt->rec_descue = 0;
        $loan_receipt->rec_descri = $request->observation;
        $loan_receipt->rec_tipmov = 'I';
        $loan_receipt->rec_saldar = 'N';
        $loan_receipt->rec_codmon = $request->currency_id;
        $loan_receipt->rec_codcli = $request->customer_id;
        $loan_receipt->rec_tipoid = $request->identification_type_id;
        $loan_receipt->rec_identi = $request->identification;
    }

    public function extraordinary_charge(Request $request)
    {
        $method = __FUNCTION__;

        return view('maintenance.loan.payment.' . $method, $this->loadParams($request, $method));
    }

    public function store_extraordinary_charge(Request $request, LoanReceipt $loan_receipt, $loan = null)
    {
        $loan_receipt->rec_numero = 0;
        $loan_receipt->rec_codpre = $loan->pre_codigo;
        $loan_receipt->rec_cuota = $request->amount_payable;
        $loan_receipt->rec_ingres = 0;
        $loan_receipt->rec_mora = $loan->getQuotaLatePay();
        $loan_receipt->rec_descue = $request->discount;
        $loan_receipt->rec_descri = '';
        $loan_receipt->rec_tipmov = '2';
        $loan_receipt->rec_saldar = $request->pay_off ? 'S' : 'N';
        $loan_receipt->rec_codcli = $loan->pre_codcli;
        $loan_receipt->rec_tipoid = '';
        $loan_receipt->rec_identi = '';
    }
}
