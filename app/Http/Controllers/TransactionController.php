<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * İşlem listesi.
     */
    public function index()
    {
        $transactions = Transaction::with('order')->orderByDesc('transact_date')->get();
        return view('admin.transaction.index', compact('transactions'));
    }

    /**
     * Yeni işlem formu.
     */
    public function create()
    {
        $orders = Order::all();
        return view('admin.transaction.create', compact('orders'));
    }

    /**
     * İşlemi kaydet.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id'       => 'required|exists:orders,id',
            'paid_amount'    => 'required|numeric|min:0',
            'payment_method' => 'required|string',
        ]);

        $transaction                  = new Transaction();
        $transaction->order_id        = $request->order_id;
        $transaction->user_id         = auth()->id();
        $transaction->paid_amount     = $request->paid_amount;
        $transaction->balance         = $request->balance ?? 0;
        $transaction->payment_method  = $request->payment_method;
        $transaction->transact_amount = $request->transact_amount ?? 0;
        $transaction->transact_date   = date('Y-m-d');
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'İşlem başarıyla eklendi.');
    }

    /**
     * İşlemi göster.
     */
    public function show(Transaction $transaction)
    {
        return view('admin.transaction.show', compact('transaction'));
    }

    /**
     * Düzenleme formu.
     */
    public function edit(Transaction $transaction)
    {
        $orders = Order::all();
        return view('admin.transaction.edit', compact('transaction', 'orders'));
    }

    /**
     * İşlemi güncelle.
     */
    public function update(Request $request, $id)
    {
        $transaction               = Transaction::findOrFail($id);
        $transaction->paid_amount  = $request->paid_amount;
        $transaction->balance      = $request->balance ?? 0;
        $transaction->payment_method = $request->payment_method;
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'İşlem güncellendi.');
    }

    /**
     * İşlemi sil.
     */
    public function delete($id)
    {
        $transaction = Transaction::find($id);
        if ($transaction) {
            $transaction->delete();
            return redirect()->route('transactions.index')->with('success', 'İşlem silindi.');
        }
        return redirect()->route('transactions.index')->with('error', 'İşlem bulunamadı.');
    }

    public function destroy(Transaction $transaction)
    {
        //
    }
}
