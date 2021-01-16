@extends('layouts.Menu_Footer')
@section('content')
<div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href=""><i class="icon nalika-edit" aria-hidden="true"></i> Edit lịch làm</a></li>
                                </ul>
                            <form action="{{route('lichlam.update',$dsLichLam['id'])}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Tên" value="{{$dsLichLam['Ca']}}" name="Ca">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Trạng thái" value="{{$dsLichLam['Thu']}}" name="Thu" >
                                                    </div>
                                                    <label for="nhanvien" style="color:white">Chọn nhân viên</label>
                                                    <select name="nhanvien" class="form-control pro-edt-select form-control-primary" id="nhanvien">
                                                            <?php $nhanvien = App\NhanVien::all()  ?>
                                                            @foreach($nhanvien as $i) 
                                                                <option value="{{$i['id']}}" {{($i->id== $dsLichLam->nhan_viens_id ? 'selected' : '')}}>{{$i['HoTen']}}</option>
															@endforeach                                                                                                
														</select> 
                                                        <br/>
                                                    
                                                 
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Lưu
														</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection