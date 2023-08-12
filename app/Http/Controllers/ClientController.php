<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

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
            'password' => $formFields['password']
        ]);

        return redirect('/clients');
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
            'password' => $formFields['password']
        ]);

        return redirect('/clients');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('/clients');
    }
}
