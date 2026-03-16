@extends('front.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Kasiyer Düzenle</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="form-group">
                                            <label for="">İsim</label>
                                            <input type="text" name="name" id="" value="{{$user->name}}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" id="" value="{{$user->email}}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Şifre (Değiştirmek istemiyorsanız boş bırakın)</label>
                                            <input type="password" name="password" id="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Role</label>
                                            <select name="is_admin" id="" class="form-control">
                                                <option value="1" @if($user->is_admin == 1) selected @endif>Admin</option>
                                                <option value="2" @if($user->is_admin == 2) selected @endif>Kasiyer</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">Kasiyeri Güncelle</button>
                                    </form>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
