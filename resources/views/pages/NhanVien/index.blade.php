@extends('layouts.Menu_Footer')
@section('content')

	<div class="product-status mg-b-30">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="product-status-wrap">
								<h4>Nhân Viên</h4>

								<div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <div class="breadcome-heading">
												<form action="{{route('nhanvien.search')}}" method="GET">
												
													<input type="search" placeholder="Search..." class="form-control" style="color:white" name="query">
													
												</form>
											</div>
                                        </div>
                                    </div>
								
								<div class="add-product">
									<a href="{{route('nhanvien.create')}}">Create</a>
								</div>
								<table>
								
									<tr>
										<th>Họ Tên</th>
										<th>Ngày Sinh</th>
										<th>Số Điện Thoại</th>
										<th>Địa Chỉ</th>
										<th>Mật Khẩu</th>
										<th>Trạng Thái</th>
										<th>Chức năng</th>
									</tr>
									@foreach($dsNhanVien as $ds)
									<tr>
										<td>{{$ds['HoTen']}}</td>
										<td>{{$ds['NgaySinh']}}</td>
										<td>{{$ds['SDT']}}</td>
										<td>{{$ds['DiaChi']}}</td>
										<td>{{$ds['MatKhau']}}</td>
										<td>
										
										@if($ds['TrangThai']==0)
											<button class="pd-setting">Active</button> @else

											<button class="ds-setting">Disabled</button>
										@endif	
										</td>
										<td>

										<div style="display:flex">
										<a href="{{route('nhanvien.edit',$ds['id'])}}"><button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
								
										<form action="{{route('nhanvien.updatetrangthai',$ds['id'])}}" method="POST" enctype="multipart/form-data">
									@csrf
									@method('PUT')
									<a href="{{route('nhanvien.updatetrangthai',$ds['id'])}}"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed" onclick="onCheck()"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
									</form>
										</div>
										</td>
									</tr>
										@endforeach
								</table>
								<div class="custom-pagination">
									<ul class="pagination">
										{!! $dsNhanVien->links() !!}
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
		alert("Cập nhật trạng thái thành công");
	}
</script>