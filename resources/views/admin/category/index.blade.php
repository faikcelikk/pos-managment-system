@extends('front.master')
@section('title','Tüm Kategoriler')
@section('content')
    <br><br><br><div class="row ">
        <div class="col md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluşur</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('category.store')}}">
                        @csrf
                        <div class="form-group">
                            <label>Kategori Adı</label>
                            <input type="text" class="form-control" name="category" required />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> @yield('title')</h6>
                </div>
                <div class="card-body">

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Kategori Adı</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($category as $cat)
                                    <tr>
                                        <td>{{$cat->name}}</td>
                                        <td>
                                               <a href="{{route('category.delete',$cat->id)}}" onclick="return confirm('Silmek istediğinizden emin misiniz?')" class="mdi mdi-delete badge badge-outline-danger" title="sil">
                                               </a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Kategoriyi Düzenle</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="get">
                            @csrf
                            <div class="form-group">
                                <label>Kategori Adı</label>
                                <input id="category" type="text" class="form-control" name="category"/>
                            </div>

                            <div class="form-group">
                                <label>Kategori Slug</label>
                                <input id="slug" type="text" class="form-control" name="slug"/>
                            </div>

                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-success">Kaydet</button>
                    </div>

                </div>
            </div>
        </div>
        <script>
            $(function() {
                $('.edit-click').click(function(){
                    id = $(this)[0].getAttribute('category-id');
                    $.ajax({
                        type:'GET',
                        url:'{{route('category.create')}}',
                        data:{id:id},
                        success:function(data){
                            console.log(data);
                            $('#editModal').modal();
                        }
                    })
                });
            })
        </script>


@endsection
        <script>
            setTimeout(function() {
                var messageElement = document.querySelector('.alert');
                if (messageElement) {
                    messageElement.style.display = 'none';
                }
            }, 5000);
        </script>
    </div>

