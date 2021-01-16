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
											
												
												<div class="form-group">
                               						 <input type="text" class="form-controller" id="search" name="search">
														<button onclick="Seacrh()"><i class="fa fa-search">Search</i></button>
                          						  </div>
													
											</div>
                                        </div>
                                    </div>

								<div class="add-product">
									<a href="{{route('ban.create')}}">Create</a>
								</div>
								<table>
								<thead>
									<tr>
										<th>Tên Bàn</th>
										<th>Loại Bàn</th>
										<th>Trạng Thái</th>
										<th>Chức năng</th>
									</tr>
								</thead>
									@foreach($dsBan as $ds)
									<tr>
										<td>{{$ds['TenBan']}}</td>
										<td>{{$ds->LoaiBan->TenLoaiBan}}</td>
										<td>
										@if($ds['TrangThai']==0)
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
										<a href="{{route('ban.updatetrangthai',$ds['id'])}}"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed" onclick="onCheck()"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
									</form>
										</div>
										</td>
									</tr>
										@endforeach
										
								</table>
								<div class="custom-pagination">
									<ul class="pagination">
										{!! $dsBan->links() !!}
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
        </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
	function onCheck(){
		alert('Cập nhật trạng thái thành công');
	}
	function Seacrh(){
		var value = $('#search').val();
		console.log(value);
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('ban/search') }}',
                    data: {
                        'search': value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
	}
</script>