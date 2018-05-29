@extends('templates.master')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  @if(session('msg'))
                    <div class="alert alert-success">
                      <p>{{session('msg')}}</p>
                    </div>
                  @endif
                  <div class="x_title">
                    <h2>Tabel Data Tiket </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="" href="{{ route('tiket.tambah') }}"><i class="fa fa-plus-square"></i></a>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr class="headings">
                            <th class="column-title"> ID Tiket </th>
                            <th class="column-title"> Unit </th>
                            <th class="column-title"> Tanggal  </th>
                            <th class="column-title">Asal</th>
                            <th class="column-title">Tujuan</th>
                            <th class="column-title">Keberangkatan</th>
                            <th class="column-title">Kedatangan</th>
                            <th class="column-title">Jumlah Tiket</th>
                            <th class="column-title">Harga</th>
                            <th class="column-title">Kategori Class</th>
                            <th class="column-title no-link last"><span class="nobr">ubah</span>
                            <th class="column-title no-link last"><span class="nobr">hapus</span>
                            </th>

                          </tr>
                        </thead>

                        <tbody>
                        @foreach($tiket as $Tiket)
                          <tr class="even pointer">
                            <td class=" ">{{ $Tiket->id }}</td>
                            <td class=" ">{{ $Tiket->unit }}</td>
                            <td class=" ">{{ $Tiket->date }}</td>
                            <td class=" ">{{ $Tiket->from }}</td>
                            <td class=" ">{{ $Tiket->to }}</td>
                            <td class=" ">{{ $Tiket->departure }}</td>
                            <td class=" ">{{ $Tiket->arrival }}</td>
                            <td class=" ">{{ $Tiket->amount }}</td>
                            <td class=" ">{{ $Tiket->cost }}</td>
                            <td class=" ">{{ $Tiket->Kategori->kategori}}</td>
                            <td class=" last"><a href="{{ route('tiket.edit',['id' => $Tiket->id])}}"><i class="fa fa-edit"></i></a></td>
                            <td class=" last">
                            <form  action="{{route('tiket.hapus',['id' => $Tiket->id])}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE"><button type="submit" onclick="return confirm('Apakah Anda yakin ingin membatalkan pemesanan? ');"><i class="fa fa-trash"></i></button>


                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>


                  </div>
                </div>
              </div>
@endsection
