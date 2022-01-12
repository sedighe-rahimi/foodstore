@extends('admin.layout')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper col-10">
    <div class="card card-warning">
      <div class="card-header d-flex justify-content-start">
        <h3 class="card-title">ویرایش مشخصات غذا</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @include('admin.formErrors')
        <form role="form" action="{{ route('foods.update' , $food) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <!-- text input -->
          <div class="form-group">
            <label>نام غذا</label>
            <input name="name" type="text" class="form-control" placeholder="نام غذا" value="{{ old('name' , $food->name) }}">
          </div>
          <div class="form-group">
            <label>قیمت</label>
            <input name="price" type="number" class="form-control" placeholder="قیمت غذا" value="{{ old('price' , $food->price) }}">
          </div>
          <div class="form-group">
            <label>موجودی غذا</label>
            <input name="count" type="number" class="form-control" placeholder="موجودی غذا" value="{{ old('count' , $food->count) }}">
          </div>
          <div class="form-group">
            <label>زمان آماده سازی غذا (دقیقه)</label>
            <input name="waiting_time" type="number" class="form-control" placeholder="زمان آماده سازی غذا" value="{{ old('waiting_time' , $food->waiting_time) }}">
          </div>

          <!-- select -->
          <div class="form-group">
            <label>نوع غذا</label>
            <select name="food_type_id" class="form-control">
              @foreach(\App\Models\FoodType::where('active' , 1)->get() as $foodType)
                <option value="{{ $foodType->id }}" {{ (old('food_type_id' , $food->food_type_id) && old('food_type_id' , $food->food_type_id) == $foodType->id) ? 'selected' : '' }}>{{ $foodType->title }}</option>
              @endforeach
            </select>
          </div>

          <!-- textarea -->
          <div class="form-group">
            <label>تاریخچه</label>
            <textarea name="description" class="form-control" rows="3" placeholder="تاریخچه">{{ old('description' , $food->description) }}</textarea>
          </div>
          

          <!-- textarea -->
          <div class="form-group">
            <label>تصویر</label>
            <input name="image_url" type="file" class="form-control" placeholder="تصویر">
          </div>
          <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-info">بروزرسانی</button>
          </div>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection