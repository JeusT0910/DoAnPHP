@extends('layouts.Menu_Footer')
@section('content')



	<div class="product-status mg-b-30">
				<div class="container-fluid">
					<div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
							<div class="product-status-wrap">
								<h4>Loại bàn</h4>
								<div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <div class="breadcome-heading">
												<form action="{{route('loaiban.search')}}" method="GET">
													<input type="search" placeholder="Search..." class="form-control" style="color:white" name="query">
													
												</form>
											</div>
                                        </div>
                                    </div>
								<div class="add-product">
									<a href="{{route('loaiban.create')}}">Create</a>
								</div>
								
								<table id="datatable">
								
									<tr>
										<th>Tên Loại Bàn</th>
										<th>Trạng thái</th>
										<th>Chức năng</th>
									</tr>
									@foreach($dsLoaiBan as $ds)
									<tr>
										<td>{{$ds['TenLoaiBan']}}</td>
										<td>
										@if($ds['TrangThai']==1)
											<button class="pd-setting">Active</button> @else

											<button class="ds-setting">Disabled</button>
										@endif	
											
										</td>
											
										<div style="display:flex">
										<a href="{{route('loaiban.edit',$ds['id'])}}"><button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
								
								<form action="{{route('loaiban.updatetrangthai',$ds['id'])}}" method="POST" enctype="multipart/form-data">
									@csrf
									@method('DELETE')
									<a href="{{route('loaiban.updatetrangthai',$ds['id'])}}"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
									</form>
										</div>
										</td>
									</tr>
										@endforeach
								</table>
								<div class="custom-pagination">
									<ul class="pagination">
									{!! $dsLoaiBan->withQueryString()->links() !!}
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
