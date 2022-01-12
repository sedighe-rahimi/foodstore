@extends('admin.layout')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="card card-warning">
      <div class="card-header d-flex justify-content-start">
        <h3 class="card-title">همه غذاها</h3>
        <a href="{{ route('foods.create') }}" class="btn btn-info text-white">ایجاد غذای جدید</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>تصویر</th>
            <th>نام</th>
            <th>قیمت (تومان)</th>
            <th>موجودی</th>
            <th>نوع غذا</th>
            <th>زمان آماده سازی (دقیقه)</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach($foods as $food)
              <tr>
                <td><img class="img_thumbnail" style="width: 100px" src="{{ $food->image_url }}"></td>
                <td>{{ $food->name }}</td>
                <td>{{ $food->price }}</td>
                <td>{{ $food->count }}</td>
                @php
                    $foodType = \App\Models\FoodType::find($food->food_type_id);
                @endphp
                <td>{{ $foodType ? $foodType->title : '' }}</td>
                <td>{{ $food->waiting_time }}</td>
                <td>
                  <span class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a class="btn btn-warning" href="{{ route('foods.edit' , $food) }}">ویرایش</a>
                    <form action="{{ route('foods.destroy' , $food) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger">حذف</button>
                    </form>
                  </span>
                </td>
              </tr> 
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection