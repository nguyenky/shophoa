@extends('templates.admin.template')
@section('main')
   <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    THÊM MỚI HOA
                </div>
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
                        <form action="{{route('admin.flowers.add')}}" method="post" id="frmFlower" enctype="multipart/form-data"  >
                        {{ csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Tên hoa</label>
                                    <input name="name" value="{!!old('name')!!}" class="form-control" type="text" placeholder="Nhập tên hoa..." >
                                    <p class="help-block"></p>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Chọn danh mục hoa</label>
                                	<select name="cats_id" class="form-control border-input">
                                        @foreach($arCats as $key => $value)
                                        <?php
                                            $id     = $value['id'];
                                            $name   = $value['name'];
                                        ?>
                                        <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                                    
                                    </select>
                               
                            </div>
                            <div class="form-group col-md-3">
                                <label>Chọn kiểu hoa</label>
                                    <select name="type"  class="form-control border-input">
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
                                    <input name="price" class="form-control" value="{!!old('price')!!}" type="text" placeholder="Giá...." >
                                    <p class="help-block"></p>
                            	</div>
                            	<div class="form-group col-md-3">
                                <label>Giảm giá</label>
                                    <input name="discount" class="form-control" value="{!!old('discount')!!}" type="text" placeholder="Giảm giá.." >
                                    <p class="help-block"></p>
                            	</div>
                           	</div>
                            Hình ảnh chính
                            <div class="row">
                            	 <div class="form-group col-md-3">
	                                    	<input name="picture" type="file">		
                            	</div>
                                
                                </div>
                        	</div>
                    			</div>
                   				
                            </div>
                                 
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="3" value="{!!old('preview')!!}" name="preview"></textarea>
                                <script type="text/javascript">ckeditor ("preview")</script>
                            </div>
                            <div class="form-group">
                                <label>Chi tiết về hoa</label>
                                <textarea class="form-control" rows="3" value="{!!old('detail')!!}" name="detail"></textarea>
                                <script type="text/javascript">ckeditor ("detail")</script>
                            </div>
                            <button type="submit" class="btn btn-info">Thêm mới</button>
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