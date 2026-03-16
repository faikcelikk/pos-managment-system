<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Şirket listesi.
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.company.index', compact('companies'));
    }

    /**
     * Yeni şirket formu.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Şirketi kaydet.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255',
            'phone'   => 'nullable|string|max:30',
            'address' => 'nullable|string|max:500',
        ]);

        $company          = new Company();
        $company->name    = $request->name;
        $company->email   = $request->email;
        $company->phone   = $request->phone;
        $company->address = $request->address;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Şirket başarıyla eklendi.');
    }

    /**
     * Şirketi göster.
     */
    public function show(Company $company)
    {
        return view('admin.company.show', compact('company'));
    }

    /**
     * Düzenleme formu.
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Şirketi güncelle.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255',
            'phone'   => 'nullable|string|max:30',
            'address' => 'nullable|string|max:500',
        ]);

        $company          = Company::findOrFail($id);
        $company->name    = $request->name;
        $company->email   = $request->email;
        $company->phone   = $request->phone;
        $company->address = $request->address;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Şirket başarıyla güncellendi.');
    }

    /**
     * Şirketi sil.
     */
    public function delete($id)
    {
        $company = Company::find($id);
        if ($company) {
            $company->delete();
            return redirect()->route('companies.index')->with('success', 'Şirket başarıyla silindi.');
        }
        return redirect()->route('companies.index')->with('error', 'Şirket bulunamadı.');
    }

    public function destroy(Company $company)
    {
        //
    }
}
