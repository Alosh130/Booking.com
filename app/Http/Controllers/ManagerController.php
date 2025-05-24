<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Manager;

class ManagerController extends Controller
{
    public function create()
    {
        Gate::authorize('create', Manager::class);
        return view('manager.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Manager::class);
        auth()->user()->manager()->create(
            $request->validate([
            'company_name' => 'required|min:3|unique:managers,company_name',
            'phone' => 'required|string|max:15',
        ]));

        return redirect()->route('pick_a_property')
            ->with('success', 'Manager profile created successfully.');
    }
}
