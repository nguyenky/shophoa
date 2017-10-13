@extends('templates.admin.template')
@section('main')
   <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    CHỈNH SỬA THÔNG TIN HOA
                </div>
                <?php
                    $id = $arItem['id'];
                    $name = $arItem['name'];
                    $price = $arItem['price'];
                    $preview = $arItem['preview'];
                    $detail = $arItem['detail'];
                    $picture = $arItem['picture'];
                    $discount = $arItem['discount'];
                    $cats_id = $arItem['cats_id'];
                    if($picture != ''){
                        $urlPicture = asset("/storage/app/files/{$picture}");
                            }else{
                        $urlPicture = asset('/storage/app/defoult/no-hoa.jpg');
                            }
                ?>
                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                    <div class="panel-body">
                        <form action="{{route('admin.flowers.edit',$id)}}" id="frmFlowers" method="post" enctype="multipart/form-data"  >
                        {{ csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Tên hoa</label>
                                    <input name="name" value="{{$name}}" class="form-control" type="text" placeholder="Nhập tên hoa..." required>
                                    <p class="help-block"></p>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Chọn danh mục hoa</label>
                                	<select name="cats_id" class="form-control border-input">
                                        @foreach($arCats as $key => $value)
                                        <?php
                                            $id = $value['id'];
                                            $name = $value['name'];
                                        ?>
                                            @if($cats_id == $id)
                                            <option selected="selected" value="{{$id}}">{{$name}}</option>
                                            @else
                                            <option value="{{$id}}">{{$name}}</option>
                                            @endif
                                        @endforeach
                                                    
                                    </select>
                               
                            </div>
                            <div class="form-group col-md-3">
                                <label>Chọn kiểu hoa</label>
                                    <select name="type" class="form-control border-input">
                                        <option value="">--Chọn kiểu hoa--</option>

                                        @foreach($arType as $key => $value)
                                        <?php
                                            $id = $value['id'];
                                            $name = $value['name'];
                                        ?>
                                        <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                                    
                                    </select>
                               
                            </div>
                           </div>
                           <div class="row">
                           		<div class="form-group col-md-3">
                                <label>Giá</label>
                                    <input name="price" value="{{$price}}" class="form-control" type="text" placeholder="Giá...." required>
                                    <p class="help-block"></p>
                            	</div>
                            	<div class="form-group col-md-3">
                                <label>Giảm giá</label>
                                    <input name="discount" value="{{$discount}}" class="form-control" type="text" placeholder="Giảm giá.." required>
                                    <p class="help-block"></p>
                            	</div>
                           	</div>
                            <div class="row">
                            	 <div class="form-group col-md-3">                      			
	                               <input name="picture" type="file">
                                </div>
                        			
                    			@if($picture !="")
                   				<div class="form-group col-md-3">
                                	<input type="checkbox" value="1" name="delete_picture">&nbsp &nbspXóa hình<br />
                                    <img src="{{$urlPicture}}" width="100px" height="100px" >
                                </div>
                                @endif
                            </div>
                                 
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="3" name="preview">{{$preview}}</textarea>
                                <script type="text/javascript">ckeditor ("preview")</script>
                            </div>
                            <div class="form-group">
                                <label>Chi tiết về hoa</label>
                                <textarea class="form-control" rows="3" name="detail">{{$detail}}</textarea>
                                <script type="text/javascript">ckeditor ("detail")</script>
                            </div>
                            <button type="submit" class="btn btn-info">Chỉnh sửa</button>
                            <button type="reset" class="btn btn-info">Nhập lại</button>
                       </form>
                            </div>
                        </div>
                            </div>
        </div>
@endsection
@section('script')
@include('templates.admin.validate')
@endsection