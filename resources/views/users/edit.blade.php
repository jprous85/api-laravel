@section('content')
    @extends('layouts.app')

    @if(Session::has('status'))
        <div class="alert alert-{{Session::get('status_box')}}">
            {{ Session::get('status')}}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <a href="{{url('user/list')}}">Lista de usuarios</a>
            /
            <span>Edición</span>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <h4>Edición de los datos del usuario {{$user->name." ".$user->last_name}}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 text-center center-block pt-5">
            <img class="img img-thumbnail img-rounded" src="{{asset('images/users/'.$user->image)}}" alt="User image" width="70%">
        </div>
        <div class="col-md-9">
            <form action="{{url('user/update')}}" method="post">
                {{csrf_field()}}

                <input type="hidden" name="id" value="{{$user->id}}">

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ trans('user.name-user') }}</label>
                        <input class="form-control" type="text" name="name" id="nameUser" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">{{ trans('user.last-name-user') }}</label>
                        <input class="form-control" type="text" name="last_name" id="last_name" value="{{$user->last_name}}">
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">{{ trans('user.date-of-birth') }}</label>
                        <input class="form-control datepicker" type="text" name="date_of_birth" id="date_of_birth" value="{{\Carbon\Carbon::parse($user->date_of_birth)->format('d/m/Y')}}">
                    </div>
                    <div class="form-group">
                        <label for="email">{{ trans('user.email') }}</label>
                        <input class="form-control" type="text" name="email" id="email" value="{{$user->email}}">
                    </div>
                    {{--<div class="form-group">
                        <label for="password">{{ trans('user.password') }}</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="newPassword">{{ trans('user.repeat-password') }}</label>
                        <input type="password" class="form-control" name="newPassword" id="newPassword">
                    </div>--}}

                </div>
                <div class="card-footer">
                    <div class="pull-left">
                        <button type="button" class="btn btn-info">{{ trans('user.btn-change-pass') }}</button>
                    </div>
                    <div class="pull-right">
                        <button type="submit" id="sendCreateNewUser"
                                class="btn btn-primary text-white">{{ trans('user.btn-modify-user') }}</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <br>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            $("#date_of_birth").datepicker();

            $('#date_of_birth').on('change', function(){
                let date = moment($('#date_of_birth').val()).format('DD/MM/YYYY');;

                if (date != 'Invalid date')
                    $('#date_of_birth').val(date);

            })
        });
    </script>
@endsection