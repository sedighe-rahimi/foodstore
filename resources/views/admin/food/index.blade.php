@extends('admin.layout')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="card card-warning">
      <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">همه غذاها</h3>
        <a href="{{ route('foods.create') }}" class="btn btn-info text-white">ایجاد غذای جدید</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @include('admin.formErrors')
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
                <td class="d-flex flex-column justify-content-center border-0">
                  {{ $food->count }}
                  <span class="w-100">
                    <form action="{{ route('food.add.count') }}" method="post" class="form-inline">
                      @csrf
                      @method('patch')
                      <input type="hidden" name="id" value="{{ $food->id }}" class="form-control col-3">
                      <input type="number" name="add_count" class="form-control col-4 rounded-0 rounded-right" value="0" min="{{ ($food->count * -1) }}">
                      <button type="submit" class="btn btn-info rounded-0 rounded-left">+</button>
                    </form>
                  </span>
                </td>
                @php
                    $foodType = \App\Models\FoodType::find($food->food_type_id);
                @endphp
                <td>{{ $foodType ? $foodType->title : '' }}</td>
                <td>{{ $food->waiting_time }}</td>
                <td>
                  {{-- <span class="btn-group btn-group-sm" role="group" aria-label="Basic example"> --}}
                    <a class="btn btn-warning" href="{{ route('foods.edit' , $food) }}">ویرایش</a>
                    <form action="{{ route('foods.destroy' , $food) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger">حذف</button>
                    </form>
                  {{-- </span> --}}
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