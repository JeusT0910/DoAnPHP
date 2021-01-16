@extends('layouts.Menu_Footer')
@section('content')



	<div class="product-status mg-b-30">
				<div class="container-fluid">
					<div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
							<div class="product-status-wrap">
								<h4>Món ăn</h4>
								<div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <div class="breadcome-heading">
												<form action="{{route('monan.search')}}" method="GET">
													<input type="search" placeholder="Search..." class="form-control" style="color:white" name="query">
													
												</form>
											</div>
                                        </div>
                                    </div>
								<div class="add-product">
									<a href="{{route('monan.create')}}">Create</a>
								</div>
								
								<table id="datatable">
								
									<tr>
										<th>Tên</th>
										<th>Trạng thái</th>
										<th>Chi tiết</th>
										<th>Đơn giá</th>
										<th>Danh mục</th>
										<th>Đơn vị tính</th>
										<th>Ảnh</th>
										<th>Chức năng</th>
									</tr>
									@foreach($dsMonAn as $ds)
									<tr>
										<td>{{$ds['TenMon']}}</td>
										<td>
										@if($ds['TrangThai']==0)
											<button class="pd-setting">Active</button> @else

											<button class="ds-setting">Disabled</button>
										@endif	
											
										</td>
										<td>{{$ds['ChiTiet']}}</td>
										<td>{{$ds['DonGia']}}</td>
										<td>{{$ds->danhMuc->TenDM}}</td>
										<td>{{$ds->donViTinh->TenDV}}</td>
										<td><img src="{{asset('img/product/'. $ds['Anh'] )}}" alt="anh"></td>
										<td>
											
										<div style="display:flex">
										<a href="{{route('monan.edit',$ds['id'])}}"><button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
								
								<form action="{{route('monan.updatetrangthai',$ds['id'])}}" method="POST" enctype="multipart/form-data">
									@csrf
									@method('PUT')
									<a href="{{route('monan.updatetrangthai',$ds['id'])}}"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed" onclick="onCheck()"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
									</form>
										</div>
										</td>
									</tr>
										@endforeach
								</table>
								<div class="custom-pagination">
									<ul class="pagination">
										{!! $dsMonAn->links() !!}
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
        </div>
@endsection


	<script>
		function onCheck() {
			alert('Cập nhật trạng thái thành công');
		}
	</script>

