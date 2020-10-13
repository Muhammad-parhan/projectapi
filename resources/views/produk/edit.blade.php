
@extends('main')

@section('content')
<div class="card-body">
        <!-- Credit Card -->
        <div id="pay-invoice">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center">edit produk</h3>
                </div>
                <hr>
                <form action="{{url('produk/'.$produk->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Kode Produk</label>
                        <input id="kode" name="kode" type="text" class="form-control"  value="{{$produk->kode}}">
                    </div>
                        <div class="form-group has-success">
                            <label class="control-label mb-1">Nama Produk</label>
                            <input id="nama" name="nama" type="nama" class="form-control"  value="{{$produk->nama}}">
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true" ></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-1">Harga Produk</label>
                            <input id="harga" name="harga" class="form-control"  value="{{$produk->harga}}">
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-1">berat</label>
                            <input id="berat" name="berat" class="form-control" value="{{$produk->berat}}">
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-1">Kategori Produk</label>
                            <select data-placeholder="Pilih Kategori" class="form-control" id="kd_kategori" name="kd_kategori">
                                <option value="{{$produk->kd_kategori}}">{{$produk->kategori->nama_kategori}}</option>
                                @foreach($kategori as $item)
                                <option value="{{$item->kd_kategori}}">{{$item->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                            </div>
                            </div>
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">SIMPAN</span>
                            </button>
                        </div>
                </form>
            </div>
        </div>

    </div>
</div> <!-- .card -->
@endsection
