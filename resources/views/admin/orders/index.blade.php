@extends('front.master')
@section('title', 'Sipariş Listesi')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Başarılı!</strong> {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hata!</strong> {{ session()->get('error') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Sipariş Listesi</h4>
            <a href="{{ route('orders.create') }}" class="btn btn-success">
                <i class="mdi mdi-plus"></i> Yeni Sipariş Ekle
            </a>
        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Müşteri Adı</th>
                                        <th>Telefon</th>
                                        <th>Tarih</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->phone ?? '-' }}</td>
                                            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('orders.edit', $order->id) }}"
                                                   class="btn btn-sm btn-outline-primary"
                                                   title="Düzenle">
                                                    <i class="mdi mdi-account-edit"></i>
                                                </a>

                                                {{-- DELETE: POST form --}}
                                                <form action="{{ route('orders.delete', $order->id) }}"
                                                      method="POST" style="display:inline-block;"
                                                      onsubmit="return confirm('Siparişi silmek istediğinizden emin misiniz?')">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Sil">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>

                                                <button type="button"
                                                        onclick="printReceipt({{ $order->id }})"
                                                        class="btn btn-sm btn-outline-secondary"
                                                        title="Yazdır">
                                                    <i class="fa fa-print"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">
                                                Henüz sipariş bulunmamaktadır.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Ödeme Paneli --}}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Ödeme Bilgileri</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-6">
                                <label>Ödeme Yöntemi</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment_method" id="cash" value="cash" checked>
                                    <label class="form-check-label" for="cash">
                                        <i class="fa fa-money-bill text-success"></i> Peşin
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment_method" id="transfer" value="bank_transfer">
                                    <label class="form-check-label" for="transfer">
                                        <i class="fa fa-university text-danger"></i> Havale
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment_method" id="card" value="credit_card">
                                    <label class="form-check-label" for="card">
                                        <i class="fa fa-credit-card text-info"></i> Kart
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <div class="col-6">
                                <label>Ödenen Tutar</label>
                                <input type="number" id="paid_amount_display" class="form-control" placeholder="0.00">
                            </div>
                            <div class="col-6">
                                <label>Para Üstü</label>
                                <input type="number" id="balance_display" class="form-control" placeholder="0.00" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Fiş Yazdırma Modali --}}
        <div class="modal fade" id="receiptModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sipariş Fişi</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="receiptContent">
                        @include('reports.receipt')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" onclick="window.print()">
                            <i class="fa fa-print"></i> Yazdır
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    // Bildirimleri 5 saniye sonra kapat
    setTimeout(function () {
        var alerts = document.querySelectorAll('.alert');
        alerts.forEach(function (el) {
            el.style.transition = 'opacity 0.5s';
            el.style.opacity = '0';
            setTimeout(function () { el.style.display = 'none'; }, 500);
        });
    }, 5000);

    // Fiş yazdırma
    function printReceipt(orderId) {
        $('#receiptModal').modal('show');
    }
</script>
@endsection
