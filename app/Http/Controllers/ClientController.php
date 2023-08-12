<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('pages.clients.list', ['clients' => $clients]);
    }

    public function create()
    {
        return view('pages.clients.add');
    }

    public function store(ClientRequest $request)
    {
        $formFields = $request->validated();

        Client::create([
            'name' => $formFields['name'],
            'email' => isset($formFields['email']) ? $formFields['email'] : null,
            'phone' => $formFields['phone'],
            'city' => $formFields['city'],
            'password' => bcrypt($formFields['password'])
        ]);

        notify()->success('Welcome to Laravel Notify ⚡️');
        // Session::flash('toast_success', 'Client added successfully!');
        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('pages.clients.edit', ['client' => $client]);
    }

    public function update(ClientRequest $request, Client $client)
    {
        $formFields = $request->validated();

        $client->update([
            'name' => $formFields['name'],
            'email' => isset($formFields['email']) ? $formFields['email'] : null,
            'phone' => $formFields['phone'],
            'city' => $formFields['city'],
            'password' => bcrypt($formFields['password'])
        ]);

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
