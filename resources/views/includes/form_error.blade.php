@if(count($errors) > 0 )

    <div class="alert alert-danger">

        <ul>
            {{--@foreach($errors->all() as $error)--}}
                {{--<li>{{$error}}</li>--}}

            {{--@endforeach--}}
            <li>Please fill correctly the fields</li>
        </ul>

    </div>
@endif