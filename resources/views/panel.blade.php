@extends('front.master')
@section('content')

    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-sm-6 mb-4 mb-xl-0">
                        <div class="d-lg-flex align-items-center">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center justify-content-md-end">
                            <div class="pe-1 mb-3 mb-xl-0">
                                <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                                    Geri Bildirim
                                    <i class="mdi mdi-message-outline btn-icon-append"></i>
                                </button>
                            </div>
                            <div class="pe-1 mb-3 mb-xl-0">
                                <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                                    Yazdır
                                    <i class="mdi mdi-printer btn-icon-append"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h4 class="card-title">Satış Farkı</h4>
                                        <canvas id="salesDifference"></canvas>
                                        <p class="mt-3 mb-4 mb-lg-0">Aylık bazda satış farklarını ve
                                            büyüme oranlarını buradan takip edebilirsiniz.
                                        </p>
                                    </div>
                                    <div class="col-lg-5">
                                        <h4 class="card-title">En Çok Satanlar</h4>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <ul class="graphl-legend-rectangle">
                                                    <li><span class="bg-danger"></span>Otomotiv</li>
                                                    <li><span class="bg-warning"></span>Kitaplar</li>
                                                    <li><span class="bg-info"></span>Yazılım</li>
                                                    <li><span class="bg-success"></span>Oyunlar</li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-8 grid-margin">
                                                <canvas id="bestSellers"></canvas>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-4 mb-lg-0">En çok satan kategorilerin
                                            oransal dağılımını ifade eder.
                                        </p>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="card-title">Sosyal Medya İstatistikleri</h4>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="progress progress-lg grouped mb-2">
                                                    <div class="progress-bar  bg-danger" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <ul class="graphl-legend-rectangle">
                                                    <li><span class="bg-danger"></span>Instagram (15%)</li>
                                                    <li><span class="bg-warning"></span>Facebook (20%)</li>
                                                    <li><span class="bg-info"></span>Web Sitesi (25%)</li>
                                                    <li><span class="bg-success"></span>Youtube (40%)</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="mb-0 mt-2">Ziyaretçilerin sosyal medya platformlarından
                                            gelme oranını gösterir.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-8 flex-column d-flex stretch-card">
                        <div class="row">
                            <div class="col-lg-4 d-flex grid-margin stretch-card">
                                <div class="card bg-primary">
                                    <div class="card-body text-white">
                                        <h3 class="font-weight-bold mb-3">18,39 (75GB)</h3>
                                        <div class="progress mb-3">
                                            <div class="progress-bar  bg-warning" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="pb-0 mb-0">Bant Genişliği Kullanımı</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex grid-margin stretch-card">
                                <div class="card sale-diffrence-border">
                                    <div class="card-body">
                                        <h2 class="text-dark mb-2 font-weight-bold">$6475</h2>
                                        <h4 class="card-title mb-2">Satış Farkı</h4>
                                        <small class="text-muted">NİSAN 2019</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex grid-margin stretch-card">
                                <div class="card sale-visit-statistics-border">
                                    <div class="card-body">
                                        <h2 class="text-dark mb-2 font-weight-bold">$3479</h2>
                                        <h4 class="card-title mb-2">Ziyaret İstatistikleri</h4>
                                        <small class="text-muted">NİSAN 2019</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 grid-margin d-flex stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-2">Satış Değişimi</h4>
                                            <div class="dropdown">
                                                <a href="#" class="text-success btn btn-link  px-1"><i class="mdi mdi-refresh"></i></a>
                                                <a href="#" class="text-success btn btn-link px-1 dropdown-toggle dropdown-arrow-none" data-bs-toggle="dropdown" id="settingsDropdownsales">
                                                    <i class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="settingsDropdownsales">
                                                    <a class="dropdown-item">
                                                        <i class="mdi mdi-grease-pencil text-primary"></i>
                                                        Düzenle
                                                    </a>
                                                    <a class="dropdown-item">
                                                        <i class="mdi mdi-delete text-primary"></i>
                                                        Sil
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="nav nav-tabs tab-no-active-fill" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active ps-2 pe-2" id="revenue-for-last-month-tab" data-bs-toggle="tab" href="#revenue-for-last-month" role="tab" aria-controls="revenue-for-last-month" aria-selected="true">Geçen Ayın Geliri</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link ps-2 pe-2" id="server-loading-tab" data-bs-toggle="tab" href="#server-loading" role="tab" aria-controls="server-loading" aria-selected="false">Sunucu Yükü</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link ps-2 pe-2" id="data-managed-tab" data-bs-toggle="tab" href="#data-managed" role="tab" aria-controls="data-managed" aria-selected="false">Yönetilen Veri</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link ps-2 pe-2" id="sales-by-traffic-tab" data-bs-toggle="tab" href="#sales-by-traffic" role="tab" aria-controls="sales-by-traffic" aria-selected="false">Trafiğe Göre Satış</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content tab-no-active-fill-tab-content">
                                                <div class="tab-pane fade show active" id="revenue-for-last-month" role="tabpanel" aria-labelledby="revenue-for-last-month-tab">
                                                    <div class="d-lg-flex justify-content-between">
                                                        <p class="mb-4">son 7 güne göre %+5.2</p>
                                                        <div id="revenuechart-legend" class="revenuechart-legend">f</div>
                                                    </div>
                                                    <canvas id="revenue-for-last-month-chart"></canvas>
                                                </div>
                                                <div class="tab-pane fade" id="server-loading" role="tabpanel" aria-labelledby="server-loading-tab">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-4">son 7 güne göre %+5.2</p>
                                                        <div id="serveLoading-legend" class="revenuechart-legend">f</div>
                                                    </div>
                                                    <canvas id="serveLoading"></canvas>
                                                </div>
                                                <div class="tab-pane fade" id="data-managed" role="tabpanel" aria-labelledby="data-managed-tab">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-4">son 7 güne göre %+5.2</p>
                                                        <div id="dataManaged-legend" class="revenuechart-legend">f</div>
                                                    </div>
                                                    <canvas id="dataManaged"></canvas>
                                                </div>
                                                <div class="tab-pane fade" id="sales-by-traffic" role="tabpanel" aria-labelledby="sales-by-traffic-tab">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-4">son 7 güne göre %+5.2</p>
                                                        <div id="salesTrafic-legend" class="revenuechart-legend">f</div>
                                                    </div>
                                                    <canvas id="salesTrafic"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-success font-weight-bold">18390</h2>
                                    <i class="mdi mdi-account-outline mdi-18px text-dark"></i>
                                </div>
                            </div>
                            <canvas id="newClient"></canvas>
                            <div class="line-chart-row-title">YENİ MÜŞTERİLERİM</div>
                        </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-danger font-weight-bold">839</h2>
                                    <i class="mdi mdi-refresh mdi-18px text-dark"></i>
                                </div>
                            </div>
                            <canvas id="allProducts"></canvas>
                            <div class="line-chart-row-title">Tüm Ürünler</div>
                        </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-info font-weight-bold">244</h2>
                                    <i class="mdi mdi-file-document-outline mdi-18px text-dark"></i>
                                </div>
                            </div>
                            <canvas id="invoices"></canvas>
                            <div class="line-chart-row-title">YENİ FATURALAR</div>
                        </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-warning font-weight-bold">3259</h2>
                                    <i class="mdi mdi-folder-outline mdi-18px text-dark"></i>
                                </div>
                            </div>
                            <canvas id="projects"></canvas>
                            <div class="line-chart-row-title">TÜM PROJELER</div>
                        </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-secondary font-weight-bold">586</h2>
                                    <i class="mdi mdi-cart-outline mdi-18px text-dark"></i>
                                </div>
                            </div>
                            <canvas id="orderRecieved"></canvas>
                            <div class="line-chart-row-title">Alınan Siparişler</div>
                        </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-dark font-weight-bold">7826</h2>
                                    <i class="mdi mdi-cash text-dark mdi-18px"></i>
                                </div>
                            </div>
                            <canvas id="transactions"></canvas>
                            <div class="line-chart-row-title">İŞLEMLER</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 grid-margin grid-margin-md-0 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="card-title">Destek Talepleri</h4>
                                    <h4 class="text-success font-weight-bold">Biletler<span class="text-dark ms-3">163</span></h4>
                                </div>
                                <div id="support-tracker-legend" class="support-tracker-legend"></div>
                                <canvas id="supportTracker"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 grid-margin grid-margin-md-0 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-lg-flex align-items-center justify-content-between mb-4">
                                    <h4 class="card-title">Ürün Siparişleri</h4>
                                    <p class="text-dark">son 7 güne göre %+5.2</p>
                                </div>
                                <div class="product-order-wrap padding-reduced">
                                    <div id="productorder-gage" class="gauge productorder-gage"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->

@endsection
