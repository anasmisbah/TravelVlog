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
                    <h2>Tabel Data Order </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="" href="{{route('order.tambah')}}"><i class="fa fa-plus-square"></i></a>
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
                            <th class="column-title"> ID Order </th>
                            <th class="column-title"> nama pembeli </th>
                            <th class="column-title"> unit pesawat  </th>
                            <th class="column-title"> Asal </th>
                            <th class="column-title"> Tujuan </th>
                            <th class="column-title">total pembayaran</th>
                            <th class="column-title">jumlah tiket</th>
                            <th class="column-title">status</th>
                            <th class="column-title">Detail</th>
                            <th class="column-title no-link last"><span class="nobr">ubah</span>
                            <th class="column-title no-link last"><span class="nobr">hapus</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($orders as $order)
                          <tr class="even pointer">
                            <td class=" ">{{ $order->id }}</td>
                            <td class=" ">{{ $order->pembeli->nama }}</td>
                            <td class=" ">{{ $order->tiket->unit }}</td>
                            <td class=" ">{{ $order->tiket->from }}</td>
                            <td class=" ">{{ $order->tiket->to }}</td>
                            <td class=" ">{{ $order->total_pembayaran }}</td>
                            <td class=" ">{{ $order->jml_tiket }}</td>
                            <td>
                              @if ($order->status==0)
                                <span class="label label-warning">Belum bayar</span>
                              @elseif ($order->status==1)
                                <span class="label label-info">Menunggu Konfirmasi</span>
                              @elseif ($order->status==2)
                                <span class="label label-success">Telah Dibayar</span>
                              @elseif ($order->status==3)
                                <span class="label label-danger">Kesalahan Upload</span>
                              @elseif ($order->status==4)
                                <span class="label label-default">Close</span>
                              @endif
                            </td>
                            <td><a href="{{route('order.detail',['order_id'=> $order->id])}}" class="btn btn-info">Detail</a></td>
                            <td class=" last"><a href="{{route('order.edit',['id' =>$order->id])}}"><i class="fa fa-edit"></i></a></td>
                            <td>
                              <form  action="{{route('order.hapus',['id'=>$order->id])}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin membatalkan pemesanan? ');"><i class="fa fa-trash"></i></button>
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
