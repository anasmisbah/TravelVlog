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
                    <h2>Tabel Data Kota </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="" href="{{route('kota.tambah')}}"><i class="fa fa-plus-square"></i></a>
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
                            <th class="column-title"> Kota id </th>
                            <th class="column-title"> Nama Kota </th>
                            <th class="column-title"> Kode kota</th>
                            <th class="column-title no-link last"><span class="nobr">ubah</span>
                            <th class="column-title no-link last"><span class="nobr">hapus</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($kota as $kotas)
                          <tr class="even pointer">

                            <td class=" ">{{ $kotas->id }}</td>
                            <td class=" ">{{ $kotas->namakota }}</td>
                            <td class=" ">{{ $kotas->kd_kota }}</td>
                            <td class=" last"><a href="{{ route('kota.edit',['id' => $kotas->id])}}"><i class="fa fa-edit"></i></a></td>
                            <td>
                              <form  action="{{route('kota.hapus',['id' => $kotas->id])}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin membatalkan pemesanan? ');"><i class="fa fa-trash" confirm('Apakah Anda yakin ingin mengahpus data? ');></i></button>
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
