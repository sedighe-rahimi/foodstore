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
          </tr>
          </thead>
          <tbody>
            @foreach($order->orderDetails as $orderDetail)
              <tr>
                <td>{{ $orderDetail->id }}</td>
                <td>{{ $orderDetail->food->name }}</td>
                <td>{{ $orderDetail->count }}</td>
                <td>
                  <form action="{{ route('order_details.update' , $orderDetail) }}" method="POST" id="setStatus-form">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{ $orderDetail->id }}">
                    <select class="form-control" name="set_status" onchange="$('#setStatus-form').submit()">
                      <option value="" {{ is_null($orderDetail->delivered_status) ? 'selected' : '' }}>تعیین نشده</option>
                      <option value="finished" {{ $orderDetail->delivered_status == 'finished' ? 'selected' : '' }}>{{ __('finished') }}</option>
                      <option value="accepted" {{ $orderDetail->delivered_status == 'accepted' ? 'selected' : '' }}>{{ __('accepted') }}</option>
                    </select>
                  </form>
                </td>
                <td>{{ number_format($orderDetail->price * $orderDetail->count) }}</td>
              </tr> 
            @endforeach
          </tbody>
        </table>
        
        <div class="col-12">آدرس : {{ $order->user->address }}</div>
        <div class="col-12">گیرنده : {{ $order->user->name }}</div>
      </div>
      
    </div>
  </div>
@endsection