@extends('home')
@section('title', 'StatusCanTho.com - Dang Tuyen Dung')
@section('content')

<div class="row">  
			<h1> Form Đăng Tin </h1> 
			<form action="" method='post'>
			<div class="row">
				<div class="col m4">
					
						<div class="input-field">
						<input type='text' Placeholder="Nhập vào đây"  name='companyname' require>
						<label> Tên Công Ty </label>
						</div>
						<div class="input-field">
						<input type='text' Placeholder="Nhập vào đây địa chỉ "  name='address' require>
						<label> Địa chỉ  </label>
						</div>
						<div class="input-field">
							<p> Nơi làm việc  </p>
							<p>
						      <input type="checkbox"  id='cantho' name='noilamviec' value='cantho'/>
						      <label for='cantho' >Cần Thơ</label> 
						      <input type="checkbox"  id='angiang' name='noilamviec'  value = 'angiang' />
						      <label for='angiang' >An Giang</label>
						     
							</p>

						</div>
						<br>
						<div class="input-field">
							
						 <input type="text"  id='khac' name='noilamviec'  placeholder='Nhập tỉnh khác vào đây, cách nhau bởi dấu "," '  />
						 <label for='khac' >Tỉnh Khác </label>	

						</div>
										
						 

				</div>

				<div class="col m8">
					<div class="">
						<label>Hạn nộp</label>
						 <input type="date" class="datepicker"  name='hannop'>
						  

					</div>
					<div class="input-field">
						<textarea id="textarea1" class="materialize-textarea" name='vitri' Placeholder='Nhập cách nhau bởi dấu ","'></textarea>
						<label>Vị trí tuyển dụng</label>


					</div>	
					<div class="input-field">
						
						<textarea id="textarea1" class="materialize-textarea" name='noidung' Placeholder=" Nội dung chi tiết "></textarea>
						<label>Nội dung</label>

					</div>
					<div class="input-filed">
						
						 <button class="btn waves-effect waves-light" type="submit" name="action">Submit   </button>
        
					</div>			

				</div>

			</div>
				
			</form>
</div>

		
@stop