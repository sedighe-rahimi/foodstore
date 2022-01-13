@extends('admin.layout')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="card card-warning">
      <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">سفارش ها</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @include('admin.formErrors')
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>شناسه سفارش</th>
            <th>نام کاربر</th>
            <th>تعداد محصول</th>
            <th>زمان سفارش (دقیقه)</th>
            <th>زمان انتظار (دقیقه)</th>
            <th>قیمت کل (تومان)</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
              <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->orderDetails()->count() }}</td>
                <td class="d-flex flex-column justify-content-center border-0">{{ Jdate($order->created_at)->format('Y/m/d H:i') }}</td>
                <td>{{ $order->waiting_time }}</td>
                <td>{{ number_format($order->total_price) }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('orders.show' , $order) }}">مشاهده</a>
                    <form action="{{ route('orders.destroy' , $order) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger">حذف</button>
                    </form>
                </td>
              </tr> 
            @endforeach
          </tbody>
        </table>
        {{-- <div class="row">
          <div class="col-sm-12 col-md-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {!! $orders->render() !!}
            </div>
          </div>
        </div> --}}
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection