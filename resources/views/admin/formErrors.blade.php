@if($errors->count())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li class="mr-2">{{ $error }}</li>
        @endforeach
    </ul>
@endif