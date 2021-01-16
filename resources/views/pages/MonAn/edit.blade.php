@extends('layouts.Menu_Footer')
@section('content')
<div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href=""><i class="icon nalika-edit" aria-hidden="true"></i> Edit món ăn</a></li>
                                </ul>
                            <form action="{{route('monan.update',$dsMonAn['id'])}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Tên" value="{{$dsMonAn['TenMon']}}" name="TenMon">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Trạng thái" value="{{$dsMonAn['TrangThai']}}" name="TrangThai" readonly style="color:red">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Chi tiết" value="{{$dsMonAn['ChiTiet']}}" name="ChiTiet">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Đơn giá" value="{{$dsMonAn['DonGia']}}" name="DonGia">
                                                    </div>
                                                 
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <label for="danhmuc" style="color:white">Chọn danh mục</label>
                                                    <select name="danhmuc" class="form-control pro-edt-select form-control-primary" id="danhmuc">
                                                            <?php $danhmuc = App\DanhMuc::all()  ?>
                                                            @foreach($danhmuc as $i) 
                                                                <option value="{{$i['id']}}" {{($i->id== $dsMonAn->danh_mucs_id ? 'selected' : '')}}>{{$i['TenDM']}}</option>
															@endforeach
														</select>
                                                    </br>
                                                    <label for="donvitinh" style="color:white">Chọn đơn vị tính</label>
                                                    <select name="donvitinh" class="form-control pro-edt-select form-control-primary" id="donvitinh">
                                                            <?php $donvi = App\DonViTinh::all()  ?>
                                                            @foreach($donvi as $i) 
                                                                <option value="{{$i['id']}}" {{($i->id== $dsMonAn->don_vi_tinhs_id ? 'selected' : '')}}>{{$i['TenDV']}}</option>
															@endforeach
														</select>
                                                        </br>
                                                        <div class="input-group mg-b-pro-edt">

                                                        <span class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"></i></span>
                                                        <input type="file" class="form-control" placeholder="Ảnh"  name="anh" id="anh" value="{{$dsMonAn['Anh']}}" onchange="loadfile(event)">

                                                    </div>
                                                    <div class="form-group">
                                                    <img src="{{asset('img/product/'.$dsMonAn['Anh'])}}" alt="no img" id="imgsp" class="img-thumbnail">
                                                    </div>
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
<script>
    var loadfile = function(event){
        var img = document.getElementById('imgsp');
        img.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection