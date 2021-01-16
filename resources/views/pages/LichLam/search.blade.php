@extends('layouts.Menu_Footer')
@section('content')



	<div class="product-status mg-b-30">
				<div class="container-fluid">
					<div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
							<div class="product-status-wrap">
								<h4>Lịch làm</h4>
								<div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <div class="breadcome-heading">
												<form action="{{route('lichlam.search')}}" method="GET">
													<input type="search" placeholder="Search..." class="form-control" style="color:white" name="query">
													
												</form>
											</div>
                                        </div>
                                    </div>
								<div class="add-product">
									<a href="{{route('lichlam.create')}}">Create</a>
								</div>
								
								<table id="datatable">
								
									<tr>
										<th>Ca</th>
										<th>Thứ</th>
										<th>Nhân viên</th>
										<th>Chức năng</th>
									</tr>
									@foreach($dsLichLam as $ds)
									<tr>
										<td>{{$ds['Ca']}}</td>
										<td>{{$ds['Thu']}}</td>
										<td>{{$ds->nhanVien->HoTen}}</td>
										<td>	
										<div style="display:flex">
										<a href="{{route('lichlam.edit',$ds['id'])}}"><button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
								
								<form action="{{route('lichlam.delete',$ds['id'])}}" method="POST" enctype="multipart/form-data">
									@csrf
									@method('DELETE')
									<a href="{{route('lichlam.delete',$ds['id'])}}"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
									</form>
										</div>
										</td>
									</tr>
										@endforeach
								</table>
								<div class="custom-pagination">
									<ul class="pagination">
									{!! $dsLichLam->withQueryString()->links() !!}
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
        </div>
@endsection

@section('scripts')
	<script>
		$(document).ready( function () {
			$('#datatable').DataTable();
		});
	</script>
@endsection
