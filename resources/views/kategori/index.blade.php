@extends('main')
@section('title','Dhasboard')
@section('content')

<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
  <h5 class="mb-0" ><strong>Datatable</strong></h5>
  <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Datatable</span>
  
  <div class="row mt-3">
      <div class="col-sm-12">
          <!--Datatable-->
          <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
              <h6 class="mb-2">Datatable</h6>
              <a href="{{url('kategori/add')}}">ADD</a>
              <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>kode</th>
                              <th>nama</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        @php
                            $no= 1;
                        @endphp
                        @foreach ($kategori as $item)
                            
                       
                          <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{$item->kd_kategori}}</td>
                              <td>{{$item->nama_kategori}}</td>
                              <td>
                            <a href="{{url('kategori/edit/'.$item->id)}}">edit</a>
                            <form action="{{url('kategori/'.$item->id)}}" method="post" class="d-inline" onsubmit="return confirm('yakin hapus data')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm" >
                                    <i class="fa fa-trash"></i>
                                </button>
                                </form>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                     
                  </table>
              </div>
          </div>

@endsection
