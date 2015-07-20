@extends('home')
@section('title', 'StatusCanTho.com - Dang Tuyen Dung')
@section('content')

<div class="row">  
			<h3> Form Edit </h3> 
			<form  method='post' action='{{url("/")}}/job/update'>
				{!! csrf_field() !!}
			<div class="row">		
						<div class="hidden">
							<input type='hidden' name='id' value='{{$job->id}}' >
						</div>
						<div class="input-field">
						<input type='text'   name='tencty'  value="{{$job->ten_cty}}">
						<label> Tên Công Ty</label>
						</div>
						<div class="input-field">
						<input type='text'   name='diachi' value="{{ $job->diachi }}" require>
						<label> Địa chỉ  </label>
						</div>
						<div class="input-field">
							<p> Nơi làm việc  </p>
							<p>
						      <input type="checkbox"  checked="true"  id='cantho' name='noilamviec' value='CT'/>
						      <label for='cantho' >Cần Thơ</label> 						      					     
							</p>
						</div>
						<br>
						<div class="input-field">							
						 <input type="text"  id='khac' name='noilamviec'  placeholder='Nhập tỉnh khác vào đây, cách nhau bởi dấu "," '  />
						 <label for='khac' >Tỉnh Khác </label>	
						</div>	
						<div class="">
						<label>Hạn nộp</label>
						 <input type="text" name='hannop' value="{{date('d/m/y',strtotime($job->han_nop))}}">
								
						 
				</div>

				<div class="row ">
					<div class="input-field">
						<textarea id="textarea1" class="materialize-textarea" name='vitri' >
							{{$job->vitri}}
						</textarea>
						<label>Vị trí tuyển dụng</label>
					</div>	
					<div class="input-field">
						
						<textarea id="textarea2" class="materialize-textarea" name='noidung' >
							{!!$job->noidung!!}
						</textarea>
						<script>
				            CKEDITOR.replace( 'textarea2' );
				        </script>
						

					</div>
					<div class="input-filed">
						
						 <button class="btn waves-effect waves-light" type="submit" name="action">Submit   </button>
        
					</div>			

				</div>

			</div>
				
			</form>
</div>

		
@stop