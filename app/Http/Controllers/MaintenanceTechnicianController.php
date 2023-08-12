<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceTechnician;
use App\Http\Requests\MaintenanceTechnicianRequest;

class MaintenanceTechnicianController extends Controller
{
    public function index()
    {
        $maintenanceTechnicians = MaintenanceTechnician::all();
        return view('pages.maintenance-technicians.list', ['maintenanceTechnicians' => $maintenanceTechnicians]);
    }

    public function create()
    {
        return view('pages.maintenance-technicians.add');
    }

    public function store(MaintenanceTechnicianRequest $request)
    {
        $formFields = $request->validated();

        MaintenanceTechnician::create([
            'name' => $formFields['name'],
            'email' => isset($formFields['email']) ? $formFields['email'] : null,
            'phone' => $formFields['phone'],
            'city' => $formFields['city'],
            'password' => $formFields['password']
        ]);

        return redirect('/maintenance-technicians');
    }

    public function edit(MaintenanceTechnician $maintenanceTechnician)
    {
        return view('pages.maintenance-technicians.edit', ['maintenanceTechnician' => $maintenanceTechnician]);
    }

    public function update(MaintenanceTechnicianRequest $request, MaintenanceTechnician $maintenanceTechnician)
    {
        $formFields = $request->validated();

        $maintenanceTechnician->update([
            'name' => $formFields['name'],
            'email' => isset($formFields['email']) ? $formFields['email'] : null,
            'phone' => $formFields['phone'],
            'city' => $formFields['city'],
            'password' => $formFields['password']
        ]);

        return redirect('/maintenance-technicians');
    }

    public function destroy(MaintenanceTechnician $maintenanceTechnician)
    {
        $maintenanceTechnician->delete();
        return redirect('/maintenance-technicians');
    }
}
