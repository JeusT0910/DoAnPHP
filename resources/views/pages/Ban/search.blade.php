@extends('layouts.Menu_Footer')
@section('content')

	<div class="product-status mg-b-30">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="product-status-wrap">
								<h4>Bàn</h4>
								<div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <div class="breadcome-heading">
												<form action="{{route('ban.search')}}" method="GET">
												
													<input type="search" placeholder="Search..." class="form-control" style="color:white" name="query">
													
												</form>
											</div>
                                        </div>
                                    </div>
								<div class="add-product">
									<a href="{{route('ban.create')}}">Create</a>
								</div>
								
								<table>
								
									<tr>
										<th>Tên bàn</th>
                                        <th>Loại Bàn</th>
										<th>Trạng thái</th>
										<th>Chức Năng</th>
									</tr>
									@foreach($dsBan as $ds)
									<tr>
										<td>{{$ds['TenBan']}}</td>
										<td>{{$ds['loai_bans_id']}}</td>
										<td>
										
										@if($ds['TrangThai']==1)
											<button class="pd-setting">Còn trống</button> @else

											<button class="ds-setting">Đã đặt</button>
										@endif		
										</td>
										<td>
											
										<div style="display:flex">
										<a href="{{route('ban.edit',$ds['id'])}}"><button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
								
								<form action="{{route('ban.updatetrangthai',$ds['id'])}}" method="POST">
									@csrf
									@method('PUT')
									<a href="{{route('ban.updatetrangthai',$ds['id'])}}"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
									</form>
										</div>
										
									</tr>
									
									@endforeach
								</table>
								<div class="custom-pagination">
									<ul class="pagination" >
									{!! $dsBan->withQueryString()->links() !!}
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
        </div>
@endsection
