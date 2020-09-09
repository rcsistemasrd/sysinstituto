<?php

namespace App\Http\Controllers\Maintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Maintenance\Customer;
use App\Models\Maintenance\TableCode;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Maintenance\IdentificationType;
use App\Http\Requests\Maintenance\CustomerRequest;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $customers = Customer::query();

            return DataTables::eloquent($customers)->toJson();
        }

        return view('maintenance.customer.index');
    }

    public function create(Request $request)
    {
        return view('maintenance.customer.create', $this->loadParams());
    }

    public function store(CustomerRequest $request)
    {
        $customer = new Customer;

        $customer->cli_cia = $request->user()->usr_cia;
        $customer->cli_codigo = 0;
        $customer->cli_tipoid = $request->identification_type;
        $customer->cli_cedula = $request->identification;
        $customer->cli_nombre = $request->names;
        $customer->cli_apelli = $request->surnames;
        $customer->cli_calle = $request->street;
        $customer->cli_numero = $request->street_number;
        $customer->cli_sector = $request->sector;
        $customer->cli_telefo = $request->phone;
        $customer->cli_2telef = $request->phone2;
        $customer->cli_celula = $request->cell_phone;
        $customer->cli_email = $request->email;
        $customer->cli_zona = $request->zone;
        $customer->cli_empres = $request->company;
        $customer->cli_dempre = $request->department;
        $customer->cli_posici = $request->position;
        $customer->cli_direcc = $request->address;
        $customer->cli_sueldo = $request->salary;
        $customer->cli_otrosi = $request->other_salary;
        $customer->cli_status = 'A';

        $customer->save();

        return back()->withSuccess('El cliente ha sido creado con éxito.');
    }

    public function edit(Request $request, Customer $customer)
    {
        return view('maintenance.customer.edit', array_merge($this->loadParams(), compact('customer')));
    }

    public function update(CustomerRequest $request, $customer)
    {
        Customer::code($customer)->update([
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

    public function destroy(Request $request, $customer)
    {
        Customer::code($customer)->update([
            'cli_status' => '',
        ]);

        return redirect()->route('maintenance.customer.index')->withSuccess('El cliente ha sido eliminado con éxito.');
    }

    public function loadParams()
    {
        $identification_types = IdentificationType::getToSelect();

        $zones = TableCode::getToSelect('zones');

        return compact('identification_types', 'zones');
    }
}
