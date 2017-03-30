@if(Session::has('Error'))
    <div class="alert alert-fixed alert-danger fadeInDown animated">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('Error') }}
    </div>
@endif

@if(Session::has('Success'))
    <div class="alert alert-fixed alert-success fadeInDown animated">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('Success') }}
    </div>
@endif

@if(Session::has('Login'))
    <div class="alert alert-fixed alert-success fadeInDown animated">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('Login') }}
        {{ Session::forget('Login') }}
    </div>
@endif

@if(Session::has('Info'))
    <div class="alert alert-fixed alert-info fadeInDown animated">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('Info') }}
    </div>
@endif

@if(Session::has('Warning'))
    <div class="alert alert-fixed fadeInDown animated">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('Warning') }}
    </div>
@endif

@if($errors->count())
    <div class="alert alert-fixed alert-danger fadeInDown animated">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach($errors->all() as $e)
            {{ $e }} <br>
        @endforeach
    </div>
@endif