<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Siparişlerin listesi.
     */
    public function index()
    {
        $products = Product::all();
        $orders   = Order::with('orderdetail')->get();

        return view('admin.orders.index', [
            'products' => $products,
            'orders'   => $orders,
        ]);
    }

    /**
     * Yeni sipariş formu.
     */
    public function create()
    {
        $product = Product::all();
        return view('admin.orders.create', compact('product'));
    }

    /**
     * Siparişi kaydet.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'product_id'     => 'required|array|min:1',
            'product_id.*'   => 'exists:products,id',
            'price.*'        => 'required|numeric|min:0',
            'quantity.*'     => 'required|integer|min:1',
            'discount.*'     => 'nullable|numeric|min:0|max:100',
            'total_amount.*' => 'required|numeric|min:0',
            'paid_amount'    => 'required|numeric|min:0',
            'payment_method' => 'required|string',
        ]);

        try {
            DB::transaction(function () use ($request) {

                // 1) Ana siparişi oluştur
                $order          = new Order();
                $order->name    = $request->customer_name;
                $order->phone   = $request->customer_phone;
                $order->address = $request->address ?? '';
                $order->save();

                $totalAmount = 0;

                // 2) Sipariş satırlarını kaydet ve stok düş
                foreach ($request->product_id as $index => $productId) {
                    $detail             = new Order_Detail();
                    $detail->order_id   = $order->id;
                    $detail->product_id = $productId;
                    $detail->unit_price = $request->price[$index];
                    $detail->quantity   = $request->quantity[$index];
                    $detail->discount   = $request->discount[$index] ?? 0;
                    $detail->amount     = $request->total_amount[$index];
                    $detail->save();

                    $totalAmount += $request->total_amount[$index];

                    // Stok düş
                    $prod           = Product::findOrFail($productId);
                    $prod->quantity = max(0, $prod->quantity - $request->quantity[$index]);
                    $prod->save();
                }

                // 3) Ödeme kaydı
                $transaction                  = new Transaction();
                $transaction->order_id        = $order->id;
                $transaction->user_id         = auth()->id();
                $transaction->balance         = $request->balance ?? 0;
                $transaction->paid_amount     = $request->paid_amount;
                $transaction->payment_method  = $request->payment_method;
                $transaction->transact_amount = $totalAmount;
                $transaction->transact_date   = date('Y-m-d');
                $transaction->save();
            });

            return redirect()->route('orders.index')->with('success', 'Sipariş başarıyla eklendi.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sipariş eklenemedi: ' . $e->getMessage());
        }
    }

    /**
     * Siparişi göster.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Düzenleme formu.
     */
    public function edit($id)
    {
        $order   = Order::with('orderdetail')->findOrFail($id);
        $product = Product::all();
        return view('admin.orders.update', compact('order', 'product'));
    }

    /**
     * Siparişi güncelle.
     */
    public function update(Request $request, $id)
    {
        $order        = Order::findOrFail($id);
        $order->name  = $request->customer_name;
        $order->phone = $request->customer_phone ?? $order->phone;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Sipariş başarıyla güncellendi.');
    }

    /**
     * Siparişi sil.
     */
    public function delete($id)
    {
        $order = Order::find($id);

        if ($order) {
            Order_Detail::where('order_id', $order->id)->delete();
            Transaction::where('order_id', $order->id)->delete();
            $order->delete();
            return redirect()->route('orders.index')->with('success', 'Sipariş başarıyla silindi.');
        }

        return redirect()->route('orders.index')->with('error', 'Sipariş bulunamadı.');
    }

    public function destroy(Order $order)
    {
        //
    }
}
