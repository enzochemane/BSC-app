<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Request as RequestModel;
use GuzzleHttp\Psr7\Request;
use Inertia\Inertia;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

class requestController extends Controller
{
   public function index() {
    $requests = \App\Models\Request::with(['user', 'manager', 'agent'])->get();

    return Inertia::render('Requests/requests', [
        'requests' => $requests
    ]);
}

    public function create(){
           $managers = User::where('role', 'manager')->get();

    return Inertia::render('Requests/createRequest', [
        'manager' => $managers,
    ]);
    }

    public function store(HttpRequest $request)
    {
       $request->validate([
        'request_type' => 'required|string',
        'message' => 'required|string',
    ]);

    RequestModel::create([
        'user_id' => Auth::id(),
        'request_type' => $request->request_type,
        'message' => $request->message,
        'status' => $request->status ?? 'pending',
        'agent_id' => null,
        'manager_id' => $request->manager_id,
    ]);

    return redirect()->route('request.index');
}

    public function edit( $id) {
    $request = \App\Models\Request::with(['user', 'manager', 'agent'])->findOrFail($id);
    $managers = User::where('role', 'manager')->get();

    return Inertia::render('Requests/editRequest', [
        'request' => $request,
        'manager' => $managers
    ]);
    }

    public function update(HttpRequest $request, $id) {

    $request->validate([
        'request_type' => 'required|string',
        'message' => 'required|string',
        'status' => 'required|string',
        'agent_id' => 'required|exists:users,id',
        'manager_id' => 'required|exists:users,id',
    ]);

    $requests =  RequestModel::findOrFail($id);
    $requests->update($request->all());

    return redirect()->route('request.index');
}

    public function destroy($id) {
    RequestModel::findOrFail($id)->delete();
    return redirect()->route('request.index');
    }
}
