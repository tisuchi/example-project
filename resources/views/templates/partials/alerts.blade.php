@if (Session::has('info'))
    <div class="alert alert-info border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        {{ Session::get('info') }}
    </div>
@endif

@if (Session::has('danger'))
    <div class="alert alert-danger border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        {{ Session::get('danger') }}
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        {{ Session::get('warning') }}
    </div>
@endif

@if (Session::has('notification'))
    <div class="alert alert-notification border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        {{ Session::get('notification') }}
    </div>
@endif
