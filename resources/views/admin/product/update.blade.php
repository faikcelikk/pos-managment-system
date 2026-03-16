@extends('front.master')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                        <div class="col-4 col-sm-3 col-xl-2">
                        </div>
                        <div class="col-3 col-sm-2 col-xl-2 ps-0 text-center">
                      <span>
                      </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ürün Güncelle</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data"  >
                                        @csrf
                                        <div class="form-group">
                                            <label for="">İsim</label>
                                            <input  class="form-control" name="product_name" value="{{$product->product_name}}" required="" placeholder="Ürün ismini giriniz" >
                                        </div>
                                        <div class="form-group">
                                            <label for="" >Tanım</label>
                                            <input  class="form-control" name="description" required="" value="{{$product->description}}" placeholder="Ürün tanımını giriniz" >
                                        </div>
                                        <div class="form-group">
                                            <label for="" >Marka</label>
                                            <input  class="form-control" name="brand" required="" value="{{$product->brand}}" placeholder="Ürün tanımını giriniz" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Resim</label>
                                            <input  type="file" name="image" class="form-control" laceholder="Ürün resmini giriniz" >
                                            <img src="{{asset($product->image)}}" width="250">
                                        </div>
                                        <div class="form-group">
                                            <label for="" >Fiyat</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary text-white">$</span>
                                                </div>
                                                <input name="price" type="text" value="{{$product->price}}" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >Miktar</label>
                                            <input min="1" type="number" name="quantity" value="{{$product->quantity}}" class="form-control" required="" placeholder="Ürün miktarı giriniz" >
                                        </div>

                                        <button type="submit" class="btn btn-primary">Ürünü Güncelle</button>
                                    </form>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection

