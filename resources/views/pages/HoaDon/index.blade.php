@extends('layouts.Menu_Footer')
@section('content')



	<div class="product-status mg-b-30">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="product-status-wrap">
								<h4>Hóa Đơn</h4>
								<div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <div class="breadcome-heading">
												<form action="{{route('hoadon.search')}}" method="GET">
												
													<input type="search" placeholder="Search..." class="form-control" style="color:white" name="query">
													
												</form>
											</div>
                                        </div>
                                    </div>
								<div class="add-product">
									<a href="{{route('hoadon.create')}}">Create</a>
								</div>
								
								<table>
								
									<tr>
										<th>Số lượng</th>
										<th>Ngày Lập</th>
										<th>Ngày thanh toán</th>
										<th>Thành tiền</th>
										<th>Tên bàn</th>
										<th>Tên Nhân viên</th>
										<th>Trạng thái</th>
										<th>Chức năng</th>
									</tr>
									@foreach($dsHoaDon as $ds)
									<tr>
										<td>{{$ds['SoLuong']}}</td>
										
										<td>{{$ds['NgayLap']}}</td>
										<td>{{$ds['NgayThanhToan']}}</td>
										<td>{{$ds['ThanhTien']}}</td>
										<td>{{$ds->ban->TenBan}}</td>
										<td>{{$ds->nhanVien->HoTen}}</td>
										<td>
										@if($ds['TrangThai']==1)
											<button class="pd-setting">Active</button> @else

											<button class="ds-setting">Disabled</button>
										@endif		
										</td>
										<td>
											
										<div style="display:flex">
										<a href="{{route('hoadon.edit',$ds['id'])}}"><button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
								
								<form action="{{route('hoadon.updatetrangthai',$ds['id'])}}" method="POST">
									@csrf
									@method('PUT')
									<a href="{{route('hoadon.updatetrangthai',$ds['id'])}}"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed" onclick="onCheck()"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
									</form>
										</div>
										
									</tr>
									
									@endforeach
								</table>
								<div class="custom-pagination">
									<ul class="pagination">
									{!! $dsHoaDon->links() !!}
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
        </div>
@endsection
<script>
	function onCheck(){
		alert('Cập nhật trạng thái thành công');
	}
</script>