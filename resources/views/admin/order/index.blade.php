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
            <th>زمان ثبت سفارش (دقیقه)</th>
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
                    <div class="btn-group">
                      <a class="btn btn-warning" href="{{ route('orders.show' , $order) }}" data-toggle="tooltip" data-placement="top" title="مشاهده جزئیات سفارش">
                        <i class="fas fa-list"></i>
                      </a>
                      {{-- <form action="{{ route('orders.destroy' , $order) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form> --}}
                    </div>
                </td>
              </tr> 
            @endforeach
          </tbody>
        </table>
        {!! $orders->render() !!}
        {{-- {!! $orders->links('pagination::bootstrap-4') !!} --}}
      </div>
    </div>
  </div>
@endsection