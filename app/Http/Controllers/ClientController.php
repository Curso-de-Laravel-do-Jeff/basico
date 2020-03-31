<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $clients = $this->client->paginate();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $this->client->create($data);

        return redirect(route('clients.index'));
    }

    public function show($id)
    {
        $client = $this->client->where('id', $id)->first();

        return view('clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = $this->client->where('id', $id)->first();

        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $instance = $this->client->find($id);
        $instance->fill($data);

        $instance->save();

        return redirect(route('clients.index'));
    }

    public function destroy($id)
    {
        return $this->client->destroy($id);
    }
}
