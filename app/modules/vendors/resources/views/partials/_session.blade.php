@if (Session::has('success_message'))
    <div class="class alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
        {{ Session::get('success_message') }}
        <button type="button" class="close" data-dismissible="alert" aria-label="Close" >
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
