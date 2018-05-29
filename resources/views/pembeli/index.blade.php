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
                    <h2>Tabel Data Pembeli </h2>
                    <ul class="nav navbar-right panel_toolbox">
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
                            <th class="column-title"> ID Pembeli </td>
                            <th class="column-title">foto</td>
                            <th class="column-title"> username </td>
                            <th class="column-title"> nama  </td>
                            <th class="column-title"> gender</td>
                            <th class="column-title">email</td>
                            <th class="column-title">kewarganegaraan</td>
                            <th class="column-title">no telepone</td>
                            <th class="column-title no-link last"><span class="nobr">ubah</span></th>
                            <th class="column-title no-link last"><span class="nobr">hapus</span></th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($pembeli as $user)
                          <tr class="even pointer">
                            <td class=" ">{{ $user->id }}</td>
                            <td class=" "><img src="{{asset('storage/'.$user->foto)}}" alt="img" class="img-rounded center-block" width="75px"></td>
                            <td class=" ">{{ $user->user->username }}</td>
                            <td class=" ">{{ $user->nama }}</td>
                            <td class=" ">{{ $user->gender }}</td>
                            <td class=" ">{{ $user->user->email }}</td>
                            <td class=" ">{{ $user->kewarganegaraan }}</td>
                            <td class=" ">{{ $user->notlp }}</td>
                            <td class=" last"><a href="{{ route('pembeli.edit',['id' => $user->id])}}"><i class="fa fa-edit"></i></a></td>
                            <td>
                              <form  action="{{route('pembeli.hapus',['id' =>$user->id])}}" method="post">
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
