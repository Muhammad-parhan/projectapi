@extends('main')
@section('title','Dhasboard')
@section('content')
    <h5 class="mb-0"><strong>Form wizard</strong></h5>
    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> form wizard</span>

    <div class="row mt-3">
        <div class="col-sm-12">
            <!--Form wizard-->
            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                <h6>Menu Checkout</h6>
                <p>Lengkapi form dibawah ini</p>

                <div class="wizard-container">
                    <div class="card wizard-card" data-color="theme" id="wizardProfile">
                        <form action="{{url('checkout')}}" method="get">
                            @csrf
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h6>Nama Anda</h6>
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <h6>Kirim dari</h6>
                                            <select name="province_form" id="" class="form-control">
                                                <option value="" holder>Pilih Provinsi</option>
                                                @foreach($provinsi as $item)
                                                <option value="{{$item->id}}">{{$item->province}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="origin" id="" class="form-control">
                                                <option value="" holder>Pilih Kota</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <h6>Kirim Ke</h6>
                                            <select name="province_to" id="" class="form-control">
                                                <option value="" holder>Pilih Provinsi</option>
                                                @foreach($provinsi as $item)
                                                <option value="{{$item->id}}">{{$item->province}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="destination" class="form-control">
                                                <option value="" holder>Pilih Kota</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <h6>Berat Paket</h6>
                                            <input type="text" name="weight" id="" class="form-control">
                                            <small>Contoh : 1700 / 1,7kg</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <h6>Pilih Kurir</h6>
                                            <select value="" name="courier" class="form-control">
                                                <option value="" holder>Pilih Kurir</option>
                                                <option value="jne" holder>JNE</option>
                                                <option value="tiki" holder>TIKI</option>
                                                <option value="pos" holder>POS Indonesia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info btn-block">Hitung Ongkir </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if($cekongkir)
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <!--Datatable-->
                            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                                <h6 class="mb-2">Datatable</h6>
                                <a href="{{url('produk/add')}}">ADD</a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hovered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Service</th>
                                                <th>Jenis Layanan</th>
                                                <th>Harga</th>
                                                <th>Estimasi</th>
                                                <th>Catatan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cekongkir as $item)
                                            <tr>
                                                <td>{{$item['service']}}</td>
                                                <td>{{$item['description']}}</td>
                                                <td>{{$item['cost'][0]['value']}}</td>
                                                <td>{{$item['cost'][0]['etd']}}</td>
                                                <td>{{$item['cost'][0]['note']}}</td>
                                                <td>
                                                    <a href=""><button>Pilih</button></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>




@endsection
