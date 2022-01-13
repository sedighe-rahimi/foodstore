@extends('admin.layout')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="card card-warning">
      <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">کد سفارش: {{ $order->id }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @include('admin.formErrors')
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>شناسه</th>
            <th>نام محصول</th>
            <th>تعداد سفارش</th>
            <th>وضعیت محصول</th>
            <th>قیمت محصول (تومان)</th>
            <th>وضعیت</th>
          </tr>
          </thead>
          <tbody>
            @foreach($order->orderDetails as $orderDetail)
              <tr>
                <td>{{ $orderDetail->id }}</td>
                <td>{{ $orderDetail->food->name }}</td>
                <td>{{ $orderDetail->count }}</td>
                <td>{{ __($orderDetail->delivered_status) }}</td>
                <td>{{ number_format($orderDetail->price * $orderDetail->count) }}</td>
                <td>
                    @if($orderDetail->delivered_status != 'finished')
                      <form action="{{ route('order_details.update' , $orderDetail) }}" method="POST">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="id" value="{{ $orderDetail->id }}">
                        <input type="hidden" name="set_status" value="finished">
                        <button class="btn btn-danger">تمام شد</button>
                      </form>
                    @endif
                    
                    @if($orderDetail->delivered_status != 'accepted')
                      <form action="{{ route('order_details.update' , $orderDetail) }}" method="POST">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="id" value="{{ $orderDetail->id }}">
                        <input type="hidden" name="set_status" value="accepted">
                        <button class="btn btn-success">پذیرفته شد</button>
                      </form>
                    @endif
                </td>
              </tr> 
            @endforeach
          </tbody>
        </table>
        
        <div class="col-12">آدرس : {{ $order->user->address }}</div>
        <div class="col-12">گیرنده : {{ $order->user->name }}</div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection