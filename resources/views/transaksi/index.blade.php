@extends('main')
@section('title','Dhasboard')


@section('content')
<div id="load_screen" style="visibility:hidden;opacity:0"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>


<form id="form1" action="/transaksi_penjualan/post_produk" method="POST">
<input type="hidden" name="action" value="">
<input type="hidden" name="kode_customer_data">
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed" id="container">

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            {{csrf_field()}}
            <div class="layout-px-spacing">

                <div class="tab-content" id="pills-tabContent">

                    <!-- CONTAINER PRODUK -->
                    <div class="tab-pane fade show active" id="pills-produk" role="tabpanel" aria-labelledby="pills-produk-tab">

                        <div class="row layout-top-spacing mt-1" id="tableSimple">

                            <div class="col-lg-8 col-md-8 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-6">
                                                <h4>Daftar Penjualan</h4>
                                            </div>

                                            <div class="col-lg-2 col-sm-6">
                                                <button  style="font-size:13px;width:100%" type="button" class="btn btn-primary mb-2 mr-2 btn-lg" data-toggle="modal" data-target="#exampleModal">
                                                    Cari
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="table-responsive">
                                            <table class="table mb-4" id="tabelProduk">
                                                <thead>
                                                    <tr>
                                                        <th>Barcode</th>
                                                        <th class="text-center">Nama</th>
                                                        <th class="text-center">Harga</th>
                                                        <th class="text-center">Kategori</th>
                                                        <th class="text-center">Berat</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div id="promoContent" style="display:none">
                                        <div class="widget-header">
                                            <h4>Produk Promo</h4>
                                        </div>
                                        <div class="widget-content widget-content-area">
                                            <div class="table-responsive">
                                                <table class="table mb-4" id="tabelPromo">
                                                    <thead>
                                                        <tr>
                                                            <th>Produk</th>
                                                            <th>Harga</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="layout-spacing">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-content widget-content-area">
                                            <span>Total</span>
                                            <h1 id="totalNominalDisplay" class="mb-3">{{ isset($optional_data[0][1]) ? 'Rp. '.number_format($optional_data[0][1] , 0, ',', '.') : 'Rp. 0'}}</h1>
                                            <input type="hidden" name="total_nominal" value="{{ isset($optional_data[0][1]) ? $optional_data[0][1] : '0'}}" id="totalNominal">
                                            <button type="submit" id="checkout" value="payment" class="button-group-2 btn btn-primary mt-1 btn-action" />Pembayaran</button>
                                            <button type="submit" id="cancel" value="cancel_produk" class="button-group-2 btn btn-danger mt-1 btn-action" />Cancel</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="customerDetail">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>

</form>

    <!-- MODAL DAFTAR PRODUK -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">

                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Berat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($produk as $item)
                            <tr>
                                <form action="" method="post">
                                    <td><input type="hidden" value="{{$item->kode}}">{{$item->kode}}</td>
                                    <td><input type="hidden" value="{{$item->nama}}">{{$item->nama}}</td>
                                    <td><input type="hidden"value="{{$item->harga}}">{{$item->harga}}</td>
                                    <td><input type="hidden" value="{{$item->kd_kategori}}">{{$item->kd_kategori}}</td>
                                    <td><input type="hidden" value="{{$item->berat}}">{{$item->berat}}</td>
                                    <td>
                                        <button class="btn btn-primary">Pilih</button>
                                    </td>
                                    </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script src="{{asset('admin/plugins/notification/snackbar/snackbar.min.js')}}"></script>
<script src="{{asset('admin/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{asset('admin/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <script>

        var jumlahProduk = document.getElementsByClassName('jumlah-produk');
        var hargaProduk = document.getElementsByClassName('harga-produk');
        var hargaProdukDisplay = document.getElementsByClassName('harga-produk-display');
        var diskonProduk = document.getElementsByClassName('diskon-produk');
        var totalHargaProduk = document.getElementsByClassName('total-harga-produk');
        var totalHargaProdukDisplay = document.getElementsByClassName('total-harga-produk-display');
        var totalNominal = document.getElementById('totalNominal');
        var totalNominalDisplay = document.getElementById('totalNominalDisplay');
        var kodeProduk = document.getElementsByClassName('kode-produk');
        var kodeProdukSupliyer = document.getElementsByClassName('kode-produk-supliyer');
        var namaProduk = document.getElementsByClassName('nama-produk');
        var kodeSatuanProduk = document.getElementsByClassName('kode-satuan-produk');
        var namaSatuanProduk = document.getElementsByClassName('nama-satuan-produk');
        var btnCostum1 = document.getElementsByClassName('btn-costum-1');
        var statusPromo  = false;
        var dataPromo;

        var kodeProdukPromo = document.getElementsByClassName('kode-produk-promo');
        var poinPromo = document.getElementsByClassName('poin-promo');
        var kodeSatuanProdukPromo = document.getElementsByClassName('kode-satuan-produk-promo');
        var diskonProdukPromo = document.getElementsByClassName('diskon-produk-promo');
        var hargaProdukPromo = document.getElementsByClassName('harga-produk-promo');
        var hargaSatuanPromo = document.getElementsByClassName('harga-satuan-promo');
        var namaProdukPromo = document.getElementsByClassName('nama-produk-promo');
        var idPromo = document.getElementsByClassName('id-promo-btn');
        var poin = document.getElementsByClassName('kode-produk-promo');

        var metode_pembayaran = document.getElementsByName('metode_pembayaran');

        // @php
        //     if(isset($optional_data[0][6])) {
        //         echo 'var dataInTable = '.json_encode($optional_data[0][6]).';';
        //     } else {
        //         echo "var dataInTable = [''];";
        //     }
        //     if(isset($optional_data[0][5])) {
        //         echo 'var dataPromoProduk = '.json_encode($optional_data[0][5]).';';
        //     } else {
        //         echo "var dataPromoProduk = [''];";
        //     }
        // @endphp
        // var dataStoreVoucher = [''];

        // function setCookie(name,value,days) {
        //         var expires ='';
        //         if (days) {
        //             var date = new Date();
        //             date.setTime(date.getTime() + (days*24*60*1000));
        //             expires = '; expires=' + date.toUTCString();
        //         }
        //         document.cookie = name + '=' + (value || '') + expires + '; path=/';
        //     }

        /** Add tipe action $$$ */

        $(".input-pembayaran").click(function(){
            finalCountingVoucher();
        });

        $(".btn-action").click(function(){
            let actionVal = $(this).val();
            $("input[name=action]").val(actionVal);
        });

        $(".jumlah-produk").change(function(){
            finalCounting();

            /** Hapus tabel promo jika nilai berubah */
            dataPromoProduk.length = 0
            $('#tabelPromo tbody tr').remove();
            displayTabelPromo();
        });

        $(".jumlah-produk").keyup(function(){
            if( this.value <= '0' && this.value != '' ) {
                this.value = '1';
            }
            this.value = this.value.replace(/^0+/, '');
            finalCounting();
        });

        $(".jumlah-produk").blur(function(){
            if(this.value == '' || this.value == '0') {
                this.value = '1';
            }
            finalCounting();
        });

        $(".harga-produk").keyup(function(){
            finalCounting();
            this.value = formatRupiah(this.value, 'Rp. ');
        });

        $(".harga-produk").blur(function(){
            if(this.value == '') {
                this.value = 'Rp. 0';
            }
            finalCounting();
        });

        $(".diskon-produk").keyup(function(){
            finalCounting();
            this.value = formatRupiah(this.value, 'Rp. ');
        });

        $(".diskon-produk").blur(function(){
            if(this.value == '') {
                this.value = 'Rp. 0';
            }
            finalCounting();
        });

        $("#tabelProduk").on('click', '.delete-row', function () {
            $(this).closest('tr').remove();
            var kodeProduk = $(this).attr('kode-produk');
            dataInTable = $.grep(dataInTable, function(value) {
                return value != kodeProduk;
            });
            finalCounting();

            /** Hapus tabel promo jika nilai berubah */
            dataPromoProduk.length = 0
            $('#tabelPromo tbody tr').remove();
            displayTabelPromo();
        });

        $("#selectProduk").unbind().change(function(){
            let kodeProdukData = $("#selectProduk").children("option:selected").val();
            insertDataPembelian(kodeProdukData);

        });

        $(".insert-data-produk").unbind().click(function(){
            let kodeProdukData = $(this).attr("produk");
            insertDataPembelian(kodeProdukData);
            $('.form-produk').val(null).trigger('change');

        });

        /** tambahkan produk ke list tabel produk */
        function insertDataPembelian(kodeProduk) {
            if(kodeProduk != '') {
                // CeK ketersedian produk di array dataInTable
                $.ajax({
                    type: "GET",
                    url: "/transaksi_penjualan/"+kodeProduk+"/get_produk_data",
                    dataType: "json",
                    asyn: true,
                    beforeSend: function(){
                        document.getElementById('load_screen').style.visibility = 'visible';
                        document.getElementById('load_screen').style.opacity = '0.8';
                    },
                    success: function(response){
                        if(!dataInTable.includes(response["kode_produk"])) {
                            var tableRow = $('#tabelProduk tr').length;

                            if(response["kode_produk"].indexOf('basmalah') != -1){
                                var row =
                                    '<tr>'+
                                        '<td>'+
                                            '<input type="hidden" value="'+response["kode_produk"]+'" id-produk="'+tableRow+'" name="kode_produk[]" class="kode-produk">'+
                                            '<input type="hidden" value="-" name="kode_produk_supliyer[]" class="kode-produk-supliyer">'+
                                            '<span class="nama-produk">'+response['nama_produk']+'</span>'+
                                        '</td>'+
                                        '<td class="text-center">'+
                                            '<input type="number" class="form-control jumlah-produk" name="jumlah[]" id-jumlah="'+tableRow+'" value="1" min="0" style="width:90px" onclick="select()"/>'+
                                        '</td>'+
                                        '<td class="text-center">'+
                                            '<input type="hidden" class="kode-satuan-produk" value="-" name="kode_satuan_produk[]">'+
                                            '<span class="nama-satuan-produk">-</span>'+
                                        '</td>'+
                                        '<td class="text-center">'+
                                            '<input type="text" class="form-control harga-produk" name="harga_satuan[]" value="'+formatRupiah(String(response["harga"]),'Rp. ')+'" style="width:120px"  onclick="select()"/>'+
                                        '</td>'+
                                        '<td class="text-center">'+
                                            '<input type="text" class="form-control diskon-produk" name="sub_diskon[]" value="Rp. 0" style="width:120px"  onclick="select()"/>'+
                                        '</td>'+
                                        '<td class="text-center">'+
                                            '<input type="hidden" name="total_trx[]" value="'+response["harga"]+'" class="total-harga-produk">'+
                                            '<span class="total-harga-produk-display">'+formatRupiah(String(response["harga"]),'Rp. ')+'</span>'+
                                        '</td>'+
                                        '<td class="text-center">'+
                                            '<button kode-produk="'+response["kode_produk"]+'" class="delete-row  btn-costum-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>'+
                                        '</td>'+
                                    '</tr>';
                            } else {
                                var row =
                                    '<tr>'+
                                        '<td>'+
                                            '<input type="hidden" value="'+response["kode_produk"]+'" id-produk="'+tableRow+'" name="kode_produk[]" class="kode-produk">'+
                                            '<input type="hidden" value="'+response["kode_produk_supliyer"]+'" name="kode_produk_supliyer[]" class="kode-produk-supliyer">'+
                                            '<span class="nama-produk">'+response['nama_produk']+'</span>'+
                                        '</td>'+
                                        '<td class="text-center">'+
                                            '<input type="number" class="form-control jumlah-produk" name="jumlah[]" id-jumlah="'+tableRow+'" value="1" min="0" style="width:90px" onclick="select()"/>'+
                                        '</td>'+
                                        '<td class="text-center">'+
                                            '<input type="hidden" class="kode-satuan-produk" value="'+response["kode_satuan_produk"]+'" name="kode_satuan_produk[]">'+
                                            '<span class="nama-satuan-produk">'+response["kode_satuan_produk"]+'</span>'+
                                        '</td>'+
                                        '<td class="text-center">'+
                                            '<input type="hidden" name="harga_satuan[]" value="'+response["harga_jual_terakhir"]+'" class="harga-produk">'+
                                            '<span class="harga-produk-display">'+formatRupiah(response["harga_jual_terakhir"],'Rp. ')+'</span>'+
                                        '</td>'+
                                        '<td class="text-center">'+
                                            '<input type="text" class="form-control diskon-produk" name="sub_diskon[]" value="Rp. 0" style="width:120px"  onclick="select()"/>'+
                                        '</td>'+
                                        '<td class="text-center">'+
                                            '<input type="hidden" name="total_trx[]" value="'+response["harga_jual_terakhir"]+'" class="total-harga-produk">'+
                                            '<span class="total-harga-produk-display">'+formatRupiah(response["harga_jual_terakhir"],'Rp. ')+'</span>'+
                                        '</td>'+
                                        '<td class="text-center">'+
                                            '<button kode-produk="'+response["kode_produk"]+'" class="delete-row  btn-costum-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>'+
                                        '</td>'+
                                    '</tr>';
                            }

                            $('#tabelProduk > tbody:last-child').append(row);

                            $(".jumlah-produk").change(function(){
                                finalCounting();

                                /** Hapus tabel promo jika nilai berubah */
                                dataPromoProduk.length = 0
                                $('#tabelPromo tbody tr').remove();
                                displayTabelPromo();
                            });

                            $(".jumlah-produk").keyup(function(){
                                if( this.value <= '0' && this.value != '' ) {
                                    this.value = '1';
                                }
                                this.value = this.value.replace(/^0+/, '');
                                finalCounting();
                            });

                            $(".jumlah-produk").blur(function(){
                                if(this.value == '') {
                                    this.value = '0';
                                }
                                finalCounting();
                            });

                            $(".harga-produk").keyup(function(){
                                finalCounting();
                                this.value = formatRupiah(this.value, 'Rp. ');
                            });

                            $(".harga-produk").blur(function(){
                                if(this.value == '') {
                                    this.value = 'Rp. 0';
                                }
                                finalCounting();
                            });

                            $(".diskon-produk").keyup(function(){
                                finalCounting();
                                this.value = formatRupiah(this.value, 'Rp. ');
                            });

                            $(".diskon-produk").blur(function(){
                                if(this.value == '') {
                                    this.value = 'Rp. 0';
                                }
                                finalCounting();
                            });

                            $("#tabelProduk").on('click', '.delete-row', function () {
                                $(this).closest('tr').remove();
                                var kodeProduk = $(this).attr('kode-produk');
                                dataInTable = $.grep(dataInTable, function(value) {
                                    return value != kodeProduk;
                                });
                                finalCounting();

                                /** Hapus tabel promo jika nilai berubah */
                                dataPromoProduk.length = 0
                                $('#tabelPromo tbody tr').remove();
                                displayTabelPromo();
                            });

                            Snackbar.show({
                                text: 'Produk ' + response["nama_produk"] + ' berhasil ditambahkan',
                                duration: 3000,
                                showAction: false,
                            });

                            dataInTable.push(response["kode_produk"]);
                            finalCounting();

                        } else {

                            var idRowProduk = $('.kode-produk[value='+response["kode_produk"]+']').attr('id-produk');
                            let jumlahProdukLama = $('input[id-jumlah='+idRowProduk+']').val()
                            $('input[id-jumlah='+idRowProduk+']').unbind().val(parseInt(jumlahProdukLama) + 1);
                            finalCounting();

                            Snackbar.show({
                                text: 'Produk ' + response["nama_produk"] + ' jumlah ditambahkan',
                                duration: 3000,
                                showAction: false,
                            });
                            finalCounting();

                        }


                    },
                    complete: function(){
                    document.getElementById('load_screen').style.visibility = 'hidden';
                    document.getElementById('load_screen').style.opacity = '0';
                    }
                });
            };
        }

        $("#selectVoucher").unbind().change(function(){
            let kodeVoucherSelect = $("#selectVoucher").children("option:selected").val();
            insertDataVoucher(kodeVoucherSelect);
        });

        /** Setup form,tag,etc function */

        $("#nominalPembayaranVoucher").keyup(function(){
            finalCountingVoucher();
            this.value = formatRupiah(this.value, 'Rp. ');
        });

        $("#nominalPembayaranVoucher").blur(function(){
            if(this.value == '') {
                this.value = 'Rp. 0';
            }
            finalCountingVoucher();
        });

        /** ========================================================================== */
        /** MAIN COUNTING PRODUK */
        /** ========================================================================== */

        var init = 0;
        var selectDiskon = '';
        function finalCounting() {

            /** main price counter */
            var mainTotal = 0;
            var subTotal;

            /** daftar produk dibeli */
            for (var x = 0; x < hargaProduk.length; x++ ) {
                let cal1 = jumlahProduk[x].value * parseInt(hargaProduk[x].value.replace(/[^,\d]/g, '').toString());
                if(cal1 < diskonProduk[x].value.replace(/[^,\d]/g, '').toString() ) {
                    subTotal = 0;
                } else {
                    subTotal = cal1 - diskonProduk[x].value.replace(/[^,\d]/g, '').toString();
                }
                totalHargaProduk[x].value = subTotal;
                totalHargaProdukDisplay[x].innerHTML = formatRupiah(String(subTotal),'Rp. ');
                mainTotal += subTotal;
            }

            /** daftar produk promo yg diambil */
            var mainTotalPromo = 0;
            for (let y = 0; y < hargaProdukPromo.length; y++ ) {
                mainTotalPromo += Number(hargaProdukPromo[y].value);
            }

            totalNominal.value = mainTotal + mainTotalPromo;
            totalNominalDisplay.innerHTML = formatRupiah(String(mainTotal + mainTotalPromo),'Rp. ');

            /** Fungsi Promo */
            $('#tabelPromoModal tbody tr').remove();
            if( statusPromo == true) {
                for(let i = 0; i < dataPromo.length; i++) {

                    if(dataPromo[i]['nilai_transaksi'] !== null) {
                        if(mainTotal >= dataPromo[i]['nilai_transaksi'] ) {

                            /** Notif promo */
                            $('.widget-content .html-jquery').on('click', function () {
                                swal({
                                    title: 'Promo Idul Adha',
                                    animation: false,
                                    customClass: 'animated tada',
                                    padding: '2em'
                                })
                            })

                            /** Tambah data promo ke tabel promo  */
                            var tableRow = $('#tabelPromoModal tr').length;

                            var row =
                                '<tr>'+
                                    '<td>'+
                                        '<input type="hidden" value="'+dataPromo[i]["produk_promo"]+'" id-produk="'+tableRow+'" name="kode_produk[]" class="kode-produk">'+
                                        '<span class="nama-produk">'+dataPromo[i]["produk_promo_kode_produk"]["nama_produk"]+'</span>'+
                                    '</td>'+
                                    '<td>'+
                                        '<span>Rp. '+formatRupiah(String(dataPromo[i]["potongan_harga"], 'Rp. '))+' / '+dataPromo[i]["diskon_persen"]+'%</span>'+
                                    '</td>'+
                                    '<td>'+
                                        '<span class="nama-produk">'+formatRupiah(String(dataPromo[i]["produk_promo_kode_produk"]["harga_jual"] - dataPromo[i]["potongan_harga"]), 'Rp. ')+'</span>'+
                                    '</td>'+
                                    '<td>'+
                                        '<a onclick="tambahProdukPromo(this)" class="btn btn-primary" poin="'+dataPromo[i]["poin"]+'" id-promo="'+dataPromo[i]["kode_promo"] + dataPromo[i]["kode_produk"] + dataPromo[i]["nilai_transaksi"] +'" diskon-produk="'+dataPromo[i]["potongan_harga"]+'" harga-satuan="'+dataPromo[i]["produk_promo_kode_produk"]["harga_jual"]+'" satuan-produk="'+ dataPromo[i]["produk_promo_kode_produk"]["kode_satuan_produk"] +'" kode-produk="'+dataPromo[i]["produk_promo"]+'" nama-produk="'+dataPromo[i]["produk_promo_kode_produk"]["nama_produk"]+'" harga-produk="'+formatRupiah(String(dataPromo[i]["produk_promo_kode_produk"]["harga_jual"] - dataPromo[i]["potongan_harga"]), 'Rp. ')+'" >Ambil</a>'+
                                    '</td>'+
                                '</tr>';

                            // $('#btnModalPromo').unbind().click();

                            $('#tabelPromoModal > tbody:last-child').append(row);
                        }
                    }

                    if(dataPromo[i]['kode_produk'] !== null) {
                        for(var b = 0; b < jumlahProduk.length; b++) {
                            if(kodeProduk[b].value == dataPromo[i]["kode_produk"] && Number(jumlahProduk[b].value) >= Number(dataPromo[i]["qty"])) {

                                /** Notif promo */
                                $('.widget-content .html-jquery').on('click', function () {
                                    swal({
                                        title: 'Promo Idul Adha',
                                        animation: false,
                                        customClass: 'animated tada',
                                        padding: '2em'
                                    })
                                })

                                /** Tambah data promo ke tabel promo  */
                                var tableRow = $('#tabelPromoModal tr').length;

                                var row =
                                    '<tr>'+
                                        '<td>'+
                                            '<input type="hidden" value="'+dataPromo[i]["produk_promo"]+'" id-produk="'+tableRow+'" name="kode_produk[]" class="kode-produk">'+
                                            '<span class="nama-produk">'+dataPromo[i]["produk_promo_kode_produk"]["nama_produk"]+'</span>'+
                                        '</td>'+
                                        '<td>'+
                                            '<span>Rp. '+formatRupiah(String(dataPromo[i]["potongan_harga"], 'Rp. '))+' / '+dataPromo[i]["diskon_persen"]+'%</span>'+
                                        '</td>'+
                                        '<td>'+
                                            '<span class="nama-produk">'+formatRupiah(String(dataPromo[i]["produk_promo_kode_produk"]["harga_jual"] - dataPromo[i]["potongan_harga"]), 'Rp. ')+'</span>'+
                                        '</td>'+
                                        '<td>'+
                                        '<a onclick="tambahProdukPromo(this)" class="btn btn-primary" poin="'+dataPromo[i]["poin"]+'" id-promo="'+dataPromo[i]["kode_promo"] + dataPromo[i]["kode_produk"] + dataPromo[i]["nilai_transaksi"] +'" diskon-produk="'+dataPromo[i]["potongan_harga"]+'" harga-satuan="'+dataPromo[i]["produk_promo_kode_produk"]["harga_jual"]+'" satuan-produk="'+ dataPromo[i]["produk_promo_kode_produk"]["kode_satuan_produk"] +'" kode-produk="'+dataPromo[i]["produk_promo"]+'" nama-produk="'+dataPromo[i]["produk_promo_kode_produk"]["nama_produk"]+'" harga-produk="'+formatRupiah(String(dataPromo[i]["produk_promo_kode_produk"]["harga_jual"] - dataPromo[i]["potongan_harga"]), 'Rp. ')+'" >Ambil</a>'+
                                        '</td>'+
                                    '</tr>';

                                // $('#btnModalPromo').unbind().click();

                                $('#tabelPromoModal > tbody:last-child').append(row);

                            }
                        }
                    }
                }

                displayBtnPromoModal();

            }


            /** create array for cookies $$$*/

            var tableProduk = [];
            var optionalData = [];
            var tablePromo = [];

            for (var x = 0; x < hargaProduk.length; x++ ) {
                tableProduk.push([
                    kodeProduk[x].value,
                    namaProduk[x].innerHTML,
                    jumlahProduk[x].value,
                    kodeSatuanProduk[x].value,
                    namaSatuanProduk[x].innerHTML,
                    hargaProduk[x].value.replace(/[^,\d]/g, '').toString(),
                    diskonProduk[x].value,
                    totalHargaProduk[x].value,
                    kodeProdukSupliyer[x].value
                ]);

            }

            for (let t = 0; t < hargaProdukPromo.length; t++ ) {
                tablePromo.push([
                    kodeProdukPromo[t].value,
                    kodeProdukPromo[t].value,
                    kodeSatuanProdukPromo[t].value,
                    diskonProdukPromo[t].value,
                    hargaProdukPromo[t].value,
                    hargaSatuanPromo[t].value,
                    idPromo[t].getAttribute('id-promo'),
                    poinPromo[t].value

                ]);

            }

            optionalData.push([
                    '',
                    totalNominal.value,
                    '',
                    '',
                    kodeCustomer,
                    dataPromoProduk,
                    dataInTable
            ]);


            setCookie('tablePromo', JSON.stringify(tablePromo),200);
            setCookie('dataTable', JSON.stringify(tableProduk),200);
            setCookie('optionalData', JSON.stringify(optionalData),200);


        }

        /** ========================================================================== */
        /** END MAIN COUNTING PRODUK */
        /** ========================================================================== */

        /** ========================================================================== */
        /** MAIN COUNTING VOUCHER */
        /** ========================================================================== */

        var kodeVoucher = document.getElementsByClassName('kode-voucher');
        var jumlahVoucher = document.getElementsByClassName('jumlah-voucher');
        var hargaVoucher = document.getElementsByClassName('harga-voucher');
        var totalHargaVoucher = document.getElementsByClassName('total-harga-voucher');
        var totalHargaVoucherDisplay = document.getElementsByClassName('total-harga-voucher-display');
        var totalHargaVoucherDisplay = document.getElementsByClassName('total-harga-voucher-display');
        var totalNominalVoucherDisplay = document.getElementById('totalNominalVoucherDisplay');
        var totalNominalVoucher = document.getElementById('totalNominalVoucher');
        var nominalPembayaranVoucher = document.getElementById('nominalPembayaranVoucher');
        var nominalKembalianVoucher = document.getElementById('nominalKembalianVoucher');
        var cekJumlahPembayaranVoucher = document.getElementById('cekJumlahPembayaranVoucher');

        finalCountingVoucher();
        function finalCountingVoucher() {

            var subTotalVoucher = 0;
            let cal1,cal2,cal3;

            /** cek kode metode pembayaran dan fitur pembayaran $$$ */
            kode_metode_pembayaran = '';
            for (var i = 0, length = metode_pembayaran.length; i < length; i++) {
                if (metode_pembayaran[i].checked) {
                    kode_metode_pembayaran = metode_pembayaran[i].getAttribute('kode-metode');
                };
            }

            /** show hidden form PEMBAYARAN dan NO REK */
            if(kode_metode_pembayaran == 'cash') {
                $('#formPembayaran').css('display','block');
                $('#formDebit').css('display','none');
            }
            else if(kode_metode_pembayaran == 'debit') {
                $('#formPembayaran').css('display','none');
                $('#formDebit').css('display','block');
            }
            else {
                $('#formPembayaran').css('display','none');
                $('#formDebit').css('display','none');
            }


            for(let h = 0; h < kodeVoucher.length; h++) {
                cal1 = jumlahVoucher[h].value * hargaVoucher[h].value; // subtotal per voucher
                subTotalVoucher += cal1;

                totalHargaVoucher[h].value = cal1;
                totalHargaVoucherDisplay[h].innerHTML = formatRupiah(String(cal1), 'Rp. ');
            }

            totalNominalVoucherDisplay.innerHTML = formatRupiah(String(subTotalVoucher), 'Rp. ');
            totalNominalVoucher.value = subTotalVoucher;

            cal2 = nominalPembayaranVoucher.value.replace(/[^,\d]/g, '').toString() - subTotalVoucher ;

            if (cal2 < 0) {
                cal3 = 0;
                cekJumlahPembayaranVoucher.value = '';
            } else {
                cal3 = cal2;
                cekJumlahPembayaranVoucher.value = 'ok';
            };

            nominalKembalianVoucher.value = formatRupiah(String(cal3), 'Rp. ');;

        }

        /** ========================================================================== */
        /** END MAIN COUNTING VOUCHER */
        /** ========================================================================== */



        /** Hide Unhide List Promo yg di ambil */
        displayTabelPromo();
        function displayTabelPromo() {
            if($('#tabelPromo tr').length <= 1) {
                $('#promoContent').css('display','none');
            } else {
                $('#promoContent').css('display','block');
            }
        }

        /** Hide Unhide tombol promo modal */
        function displayBtnPromoModal() {
            if( $('#tabelPromoModal tr').length <= 1 ) {
                $('#btnModalPromo').css('display','none');
            } else {
                $('#btnModalPromo').removeAttr('style');
            }
            $('#totalPromo').html($('#tabelPromoModal tr').length - 1);
        }

        setDeleteRowPromo();
        function setDeleteRowPromo() {
            /** Set fungsi untuk hapus row */
            $("#tabelPromo").on('click', '.delete-row', function () {
                $(this).closest('tr').remove();
                var idPromo = $(this).attr('id-promo');
                dataPromoProduk = $.grep(dataPromoProduk, function(value) {
                    return value != idPromo;
                });
                finalCounting();
                displayTabelPromo();
            });
        }

        $("#cancel").click(function(){
            setCookie('dataTable', '',-1);
            setCookie('optionalData', '',-1);
            setCookie('tablePromo', '',-1);
            window.location.href = "/transaksi_penjualan";
        });

        $("#selectProduk").select2({
            placeholder: "[F1] Pilih Produk",
            allowClear: true
        });

        $("#selectVoucher").select2({
            placeholder: "Pilih Voucher",
            allowClear: true
        });

    $(".rupiah").keyup(function(){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ksszetik menjadi format angka
        this.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        let number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        if (angka < 0) {
            rupiah = split[1] != undefined ? '-' + rupiah + ',' + split[1] : '-' + rupiah;
        } else {
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        }
        if(rupiah == 0) {
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        } else {
            return prefix == undefined ? rupiah.replace(/^0+/, '') : (rupiah ? 'Rp. ' + rupiah.replace(/^0+/, '') : '');
        }
    }

    $('#pending').unbind('click').bind('click', function confirmClose(e){
        let actionVal = $('#pending').val();
        $("input[name=action]").val(actionVal);
        if(!confirm('Anda yakin untuk pending transaksi ? '))
            e.preventDefault();
    });

    $('#cancel').unbind('click').bind('click', function confirmClose(e){
        let actionVal = $('#cancel').val();
        $("input[name=action]").val(actionVal);
        if(!confirm('Anda yakin untuk cancel transaksi ? '))
            e.preventDefault();
    });


    @if(session('sukses'))
    Snackbar.show({
        text: '{{session("sukses")}}',
        duration: 5000,
        showAction: false,
        actionTextColor: '#fff',
        backgroundColor: '#8dbf42'
    });
    @endif
    @if(session('gagal'))
    Snackbar.show({
        text: '{{session("gagal")}}',
        duration: 5000,
        showAction: false,
        actionTextColor: '#fff',
        backgroundColor: '#e7515a'
    });
    @endif
    @if(session('info'))
    Snackbar.show({
        text: '{{session("info")}}',
        duration: 5000,
        showAction: false,
        actionTextColor: '#fff',
        backgroundColor: '#2196f3'
    });
    @endif
    @if(session('perhatian'))
    Snackbar.show({
        text: '{{session("perhatian")}}',
        duration: 5000,
        showAction: false,
        actionTextColor: '#fff',
        backgroundColor: '#e2a03f'
    });
    @endif
    @if (count($errors) > 0)
    Snackbar.show({
            text: '@foreach ($errors->all() as $error)<p style="color:white">{{$error}}</p> @endforeach',
            duration: 10000,
            showAction: true,
            actionTextColor: '#fff',
            backgroundColor: '#e7515a'
        });
    @endif

    // ========================================================
    // Costum Style Untuk Scan Produk
    // ========================================================

    if( $('#scan-produk').focus(function(){
        $('#scan-produk').addClass('focus');
        $('.label-scan-produk').html('[F12] Scanning..');
    }));

    if( $('#scan-produk').blur(function(){
        $('.label-scan-produk').html('[F12] Scan Produk');
        $('#scan-produk').removeClass('focus');
    }));

    $('#scan-produk').keypress(function (e) {
        if(e.keyCode == 13) {
            let scanKodeProduk = $('#scan-produk').val();
            insertDataPembelian(scanKodeProduk);
            $('#scan-produk').val('');
            e.preventDefault();
            return false;
        }
    });

    // ========================================================
    // END Costum Style Untuk Scan Produk
    // ========================================================

    // ========================================================
    // Costum Style Untuk Scan Customer - Produk
    // ========================================================

    if( $('.scan-customer').focus(function(){
        $('.scan-customer').addClass('focus');
        $('.label-scan-customer').html('Scanning..');
    }));

    if( $('.scan-customer').blur(function(){
        $('.label-scan-customer').html('Scan Kartu Customer');
        $('.scan-customer').removeClass('focus');
    }));

    $('.scan-customer').keypress(function(e) {
        thisVal = $(this).val();
        if(e.keyCode == 13 && thisVal != '') {
            let scanKodeProduk = $(this).val();

            $(".formSearchCustomer").val(scanKodeProduk);
            getCustomerData(scanKodeProduk);
            $('.scan-customer').val('');

            e.preventDefault();
            return false;

        }
    });

    // ========================================================
    // END Costum Style Untuk Scan Customer
    // ========================================================

    // ========================================================
    // Fungsi get Customer Data
    // ========================================================

    var kodeCustomer;
    var kategoriPelanggan;
    var kodePelanggan;
    $(".searchCustomerBtn").unbind().click(function(){
        idData = $(this).attr("id-data");
        kodeCustomer = $(".formSearchCustomer[id-data="+idData+"]").val();
        getCustomerData(kodeCustomer);
    })

    /** Call customer dari data cookies */
    @php
        if(isset($optional_data[0][4])) {
            echo "getCustomerData('".$optional_data[0][4]."');";
        }
    @endphp

    /** function get customer data */
    function getCustomerData(val) {
        $(".formSearchCustomer").val(val);
        kodeCustomer = val;
        if(kodeCustomer != '') {
            $.ajax({
                type: "GET",
                url: "/transaksi_penjualan/"+kodeCustomer+"/get_customer_data",
                dataType: "json",
                asyn: true,
                beforeSend: function() {
                    document.getElementById('load_screen').style.visibility = 'visible';
                    document.getElementById('load_screen').style.opacity = '0.8';
                },
                success: function(data) {
                    if(data != 'error') {

                        if(data[0]['foto'] != '') {
                            fotoUrl = "/foto_customer/" + data[0]['foto'];
                        } else {
                            fotoUrl = "/admin/assets/img/90x90.jpg";
                        }

                        kategoriPelanggan = data[0]["kode_kategori_pelanggan"];
                        kodePelanggan = data[0]["kode_pelanggan"];
                        var panelCostumer =

                            '<div class="layout-spacing">'+
                                '<div class="card component-card_5">'+
                                    '<div class="card-body">'+
                                        '<div class="user-info">'+
                                            '<img src="'+ fotoUrl +'" class="card-img-top"  onerror="imgErrorProfile(this);"/>'+
                                            '<div class="media-body">'+
                                                '<h5 class="card-user_name">'+ data[0]["nama_pelanggan"] +'</h5>'+
                                                '<p class="card-user_occupation">'+ data[0]["kategori_pelanggan"]["nama_kategori_pelanggan"] +'</p>'+
                                                '<button style="display:none" id="btnModalPromo" type="button" class="btn btn-primary mt-2 mr-2" data-toggle="modal" data-target="#exampleModal1">Cek Promo<span id="totalPromo" class="badge badge-danger counter"></span></button>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<span onclick="closeCustomer()" class="close-panel"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>'+
                                '</div>'+
                            '</div>';

                        var panelCostumerVoucher =

                            '<div class="layout-spacing">'+
                                '<div class="card component-card_5">'+
                                    '<div class="card-body">'+
                                        '<div class="user-info">'+
                                            '<img src="'+ fotoUrl +'" class="card-img-top"  onerror="imgErrorProfile(this);"/>'+
                                            '<div class="media-body">'+
                                                '<h5 class="card-user_name">'+ data[0]["nama_pelanggan"] +'</h5>'+
                                                '<p class="card-user_occupation">'+ data[0]["kategori_pelanggan"]["nama_kategori_pelanggan"] +'</p>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<span onclick="closeCustomer()" class="close-panel"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>'+
                                '</div>'+
                            '</div>';

                        statusPromo = true;
                        dataPromo = data[1];


                        /** create panel customer */
                        $('.customerDetail').html(panelCostumer);

                        /** create panel customer for vouher page */
                        $('.customerDetailVoucher').html(panelCostumerVoucher);

                        /** hidden panel cari customer */
                        $('.inputCostumer').css('display','none');

                        /** isi option select voucher data */
                        var option = '';
                        for(let i = 0; i<data[2].length; i++){
                            option += "<option value="+data[2][i]['nilai_voucher']+">"+formatRupiah(String(data[2][i]['nilai_voucher']), 'Rp. ')+"</option>"
                        }

                        /** isi data list voucher */
                        $('#selectVoucher').html('<option></option>'+option);

                        /** isi kode customer data */
                        $('input[name="kode_customer_data"]').val(data[0]["kode_pelanggan"]);

                        /** notif jika customer brhasil diinput */
                        if(keyTimer == 0) {

                            const toast = swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                padding: '2em'
                            });

                            toast({
                                type: 'success',
                                title: 'Selamat datang<br>'+data[0]["nama_pelanggan"],
                                padding: '2em',
                            })

                            setTimeout(function(){keyTimer = 0}, 3000);
                            keyTimer = 1;
                        }

                        finalCounting();

                    } else {

                        swal({
                            type: 'error',
                            text: 'Customer tidak ditemukan',
                            padding: '2em'
                        })
                    }

                },
                complete: function(){
                    document.getElementById('load_screen').style.visibility = 'hidden';
                    document.getElementById('load_screen').style.opacity = '0';
                }
            });
        }
    }

    /** function close customer */
    function closeCustomer() {

        /** create panel customer */
        $('.customerDetail').html('');
        $('.customerDetailVoucher').html('');

        /** hidden panel cari customer */
        $('.inputCostumer').css('display','block');

        /** hapus val input cari customer */
        $(".formSearchCustomer").val('');

        /** Reset data promo  */
        var statusPromo  = false;
        dataPromoProduk.length = 0
        kodeCustomer = null;
        kategoriPelanggan = null;
        kodePelanggan = null;
        dataStoreVoucher = [''];

        /** Hapus tabel promo  */
        $('#tabelPromo tbody tr').remove();
        $('#tabelVoucher tbody tr').remove();
        displayTabelPromo();

        finalCounting();
        finalCountingVoucher();
    }

    // ========================================================
    // END Fungsi get Customer Data - Produk
    // ========================================================

    // ========================================================
    // Tambah Produk Promo ke list produk promo
    // ========================================================


    function tambahProdukPromo(val) {

        let idPromo = $(val).attr('id-promo');
        let poinPromo = $(val).attr('poin');
        let kodeProduk = $(val).attr('kode-produk');
        let namaProduk = $(val).attr('nama-produk');
        let hargaSatuan = $(val).attr('harga-satuan');
        let hargaProduk = $(val).attr('harga-produk');
        let satuanProduk = $(val).attr('satuan-produk');
        let diskonProduk = $(val).attr('diskon-produk');

        if(!dataPromoProduk.includes(idPromo)) {

            /** Tambahkan row baru $$$*/
            let row =
                '<tr>'+
                    '<td>'+
                        '<input type="hidden" name="id_promo[]" value="'+idPromo+'">'+
                        '<input type="hidden" name="poin_promo[]" class="poin-promo" value="'+poinPromo+'">'+
                        '<input type="hidden" name="kode_produk_promo[]" class="kode-produk-promo" value="'+kodeProduk+'">'+
                        '<input type="hidden" name="kode_satuan_produk[]" class="kode-satuan-produk-promo" value="'+satuanProduk+'">'+
                        '<input type="hidden" name="diskon_promo[]" class="diskon-produk-promo" value="'+diskonProduk+'">'+
                        '<input type="hidden" name="harga_satuan_promo[]" class="harga-satuan-promo" value="'+hargaSatuan+'">'+
                        '<input type="hidden" name="harga_produk_promo[]" class="harga-produk-promo" value="'+hargaProduk.replace(/[^,\d]/g, '').toString()+'">'+
                        '<span class="nama-produk-promo">'+namaProduk+'</span>'+
                    '</td>'+
                    '<td>'+hargaProduk+'</td>'+
                    '<td class="text-center"><button id-promo="'+idPromo+'" class="delete-row id-promo-btn btn-costum-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button></td>'+
                '</tr>';
            $('#tabelPromo > tbody:last-child').append(row);

            displayTabelPromo();

            setDeleteRowPromo();

            /** Set data ke list produk promo yg sudah diambil */
            dataPromoProduk.push(idPromo);

            finalCounting();

        }

    }

    // ========================================================
    // END Tambah Produk Promo ke list produk promo
    // ========================================================

    </script>

<!-- ============================================================= -->
<!-- VALIDATION DATA -->
<!-- ============================================================= -->

<script src="{{asset('admin/plugins/validate/jquery.validate.min.js')}}"></script>
<script>

$( document ).ready( function () {
    $( "#form1" ).validate( {
        rules: {
            'metode_pembayaran': {
                required: function(element) {
                    if($('input[name=action]').val() == 'checkout_voucher' ){
                        return true
                    } else {
                        return false
                    }
                }
            },
            'cek_jumlah_pembayaran_voucher': {
                required: function(element) {
                    if($('input[name=action]').val() == 'checkout_voucher' ){
                        return true
                    } else {
                        return false
                    }
                }
            } ,
            'nomor_rekening': {
                required: function(element) {
                    if($('input[name=action]').val() == 'checkout_voucher' && kode_metode_pembayaran == 'debit' ){
                        return true
                    } else {
                        return false
                    }
                }
            }
        },
        messages: {
            'metode_pembayaran': "Metode pembayaran harus dipilih",
            'cek_jumlah_pembayaran_voucher': "Nominal pembayaran tidak mencukupi",
            'nomor_rekening': "Nomer rekening harus diisi",
        },

        errorElement: "div",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                $('#error-checkbox').append(error);
            } else
            if ( element.prop( "type" ) === "radio" ) {
                $('#errorPembayaran').append(error);
            } else
            if ( element.hasClass("js-states")) {
                error.insertAfter( element.next() );
            } else {
                error.insertAfter( element );
            }

        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        },
        submitHandler: function(form) {
            if($('input[name=action]').val() == 'checkout_voucher') {
                if(confirm('Anda yakin untuk checkout pembelian voucher ?')) {
                    document.getElementById('load_screen').style.visibility = 'visibility';
                    document.getElementById('load_screen').style.opacity = '1';
                    form.submit();
                }
            } else {
                form.submit();
            }
        }
    });
});

</script>

<!-- ============================================================= -->
<!-- -- END VALIDATION DATA -->
<!-- ============================================================= -->

            @endsection
