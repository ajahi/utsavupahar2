<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::all();
        return view('cms.package.index', compact('packages'));
    }

    public function create()
    {
        return view('cms.package.create');
    }

    public function store(PackageRequest $request)
    {
        $validatedData = $request->validated();
        Package::create($validatedData);

        return redirect()->route('cms.package.index')->with('success', 'Package created successfully');
    }

    public function show(Package $package)
    {
        return view('cms.package.show', compact('package'));
    }

    public function edit(Package $package)
    {
        return view('cms.package.edit', compact('package'));
    }

    public function update(PackageRequest $request, Package $package)
    {
        $validatedData = $request->validated();
        $package->update($validatedData);

        return redirect()->route('cms.package.index')->with('success', 'Package updated successfully');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('cms.package.index')->with('success', 'Package deleted successfully');
    }
}
