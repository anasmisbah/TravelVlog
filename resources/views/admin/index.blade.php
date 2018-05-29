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
                    <h2>Tabel Data Admin </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="" href="{{route('admin.tambah')}}"><i class="fa fa-plus-square"></i></a>
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
                            <th class="column-title"> ID Admin </th>
                            <th class="column-title">foto</th>
                            <th class="column-title"> username </th>
                            <th class="column-title"> nama  </th>
                            <th class="column-title"> gender</th>
                            <th class="column-title">email</th>
                            <th class="column-title">no telepone</th>
                            <th class="column-title no-link last"><span class="nobr">ubah</span>
                            <th class="column-title no-link last"><span class="nobr">hapus</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($admin as $adminis)
                          <tr class="even pointer">
                            <td class=" ">{{ $adminis->id }}</td>
                            <td class=" "><img src="{{asset('storage/'.$adminis->foto)}}" alt="" class="img-rounded center-block" width="75px"></td>
                            <td class=" ">{{ $adminis->user->username }}</td>
                            <td class=" ">{{ $adminis->nama }}</td>
                            <td class=" ">{{ $adminis->gender }}</td>
                            <td class=" ">{{ $adminis->user->email }}</td>
                            <td class=" ">{{ $adminis->notlp }}</td>
                            <td class=" last"><a href="{{ route('admin.edit',['id' => $adminis->id])}}"><i class="fa fa-edit"></i></a></td>
                            <td>
                              <form  action="{{route('admin.hapus',['id' =>$adminis->id])}}" method="post">
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
