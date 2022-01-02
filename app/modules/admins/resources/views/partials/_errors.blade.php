@if(Session::has('error_message'))
    <div class="row mr-2 ml-2 ">
        <button type="text" class="btn btn-lg btn-block btn-danger mb-2"
                id="type-error">{{Session::get('error_message')}}
        </button>
    </div>
@endif
