<div class="list-group">
    <a href="{{ route('foods.index') }}" class="list-group-item d-flex justify-content-between align-items-center {{ in_array(Route::currentRouteName() , ['foods.index','foods.create','foods.edit']) ? 'active' : '' }}">
      غذاها
      <span class="badge badge-primary badge-pill">{{ \App\Models\Food::all()->count() }}</span>
    </a>
    <a href="{{ route('orders.index') }}" class="list-group-item d-flex justify-content-between align-items-center {{ in_array(Route::currentRouteName() ,['orders.index']) ? 'active' : '' }}">
      سفارش ها
      <span class="badge badge-primary badge-pill">{{ \App\Models\Order::all()->count() }}</span>
    </a>
  </div>

