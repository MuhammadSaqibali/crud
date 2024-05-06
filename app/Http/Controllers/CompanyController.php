<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        try {
            // Process logo upload if present
            $validatedData = $request->validated();
    
            if ($request->hasFile('logo')) {
                $uploadedLogo = $request->file('logo');
                $logoPath = $uploadedLogo->store('logos', 'public');
                $validatedData['logo'] = $logoPath;
            }
    
            // Create a new Company instance and save it to the database
            Company::create($validatedData);
    
            // Redirect back to the index page with a success message
            return redirect()->route('companies.index')->with('success', 'Company created successfully.');
        } catch (\Exception $e) {
            // If an error occurs, redirect back with error message
            return redirect()->back()->with('error', 'Error creating company: ' . $e->getMessage())->withInput();
        }
    }
    



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {
        // Validate incoming request data using CompanyRequest

        // Process logo update if present
        if ($request->hasFile('logo')) {
            $uploadedLogo = $request->file('logo');
            $logoPath = $uploadedLogo->store('logos', 'public'); // Store the logo in storage/app/public/logos directory
            $company->logo = $logoPath;
        }

        // Update other company details
        $company->fill($request->validated());
        $company->save();

        // Redirect back to the index page with a success message
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the company by ID
        $company = Company::findOrFail($id);

        // Delete the company's logo file from storage if it exists
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }

        // Delete the company
        $company->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
