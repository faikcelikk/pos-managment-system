<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Tedarikçi listesi.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.supplier.index', compact('suppliers'));
    }

    /**
     * Yeni tedarikçi formu.
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Tedarikçiyi kaydet.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
        ]);

        $supplier        = new Supplier();
        $supplier->name  = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->save();

        return redirect()->route('suppliers.index')->with('success', 'Tedarikçi başarıyla eklendi.');
    }

    /**
     * Tedarikçiyi göster.
     */
    public function show(Supplier $supplier)
    {
        return view('admin.supplier.show', compact('supplier'));
    }

    /**
     * Düzenleme formu.
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Tedarikçiyi güncelle.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
        ]);

        $supplier        = Supplier::findOrFail($id);
        $supplier->name  = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->save();

        return redirect()->route('suppliers.index')->with('success', 'Tedarikçi başarıyla güncellendi.');
    }

    /**
     * Tedarikçiyi sil.
     */
    public function delete($id)
    {
        $supplier = Supplier::find($id);
        if ($supplier) {
            $supplier->delete();
            return redirect()->route('suppliers.index')->with('success', 'Tedarikçi başarıyla silindi.');
        }
        return redirect()->route('suppliers.index')->with('error', 'Tedarikçi bulunamadı.');
    }

    public function destroy(Supplier $supplier)
    {
        //
    }
}
