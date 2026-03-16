@extends('front.master')
@section('content')
    <head>
        <style type="text/css">
            .table_t{
                margin:auto;
                width: 100%;
                margin-top: 20px;

            }
        </style>
    </head>
    <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <strong>Başarılı!</strong>
                    {{session()->get('message')}}
                </div>
            @endif
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="card-title mb-0">Ürün Barkod Etiketleri</h4>
                                <button onclick="printBarcodes()" class="btn btn-primary btn-icon-text">
                                    <i class="mdi mdi-printer btn-icon-prepend"></i> Yazdır
                                </button>
                            </div>
                            
                            <div class="card-body bg-light rounded pt-4">
                                <div id="printArea">
                                    <div class="row">
                                        @foreach($productsBarcode as $barcode)
                                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                                <div class="card h-100 border text-center p-3 shadow-none bg-white">
                                                    <h5 class="font-weight-bold text-dark mb-1">{{$barcode->product_name}}</h5>
                                                    <p class="text-muted small mb-3">Fiyat: {{number_format($barcode->price, 2)}} ₺</p>
                                                    
                                                    <div class="d-flex justify-content-center mb-2" style="overflow: hidden;">
                                                        {!! $barcode->barcode !!}
                                                    </div>
                                                    
                                                    <p class="mt-2 mb-0 font-weight-bold" style="letter-spacing: 2px;">{{$barcode->product_code}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function printBarcodes() {
                var printContents = document.getElementById('printArea').innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = "<html><head><title>Barkod Yazdır</title></head><body>" + printContents + "</body></html>";

                window.print();

                document.body.innerHTML = originalContents;
                location.reload(); // Sayfayı yenileyerek elementleri geri yükle
            }
        </script>
@endsection
