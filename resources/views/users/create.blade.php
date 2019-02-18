@extends('layouts.app')
@section('content')

    @if(Session::has('status'))
        <div class="alert alert-{{Session::get('status_box')}}">
            {{ Session::get('status')}}
        </div>
    @endif

    <div class="card">
        <form action="{{ url('/user/store') }}" role="form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="card-header"><h4><strong>{{ trans('user.newUserCreate') }}</strong></h4></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">{{ trans('user.name-user') }}</label>
                    <input class="form-control" type="text" name="name" id="nameUser">
                </div>
                <div class="form-group">
                    <label for="last_name">{{ trans('user.last-name-user') }}</label>
                    <input class="form-control" type="text" name="last_name" id="last_name">
                </div>
                <div class="form-group">
                    <label for="date_of_birth">{{ trans('user.date-of-birth') }}</label>
                    <input class="form-control datepicker" type="text" name="date_of_birth" id="date_of_birth">
                </div>
                <div class="form-group">
                    <label for="email">{{ trans('user.email') }}</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">{{ trans('user.password') }}</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="newPassword">{{ trans('user.repeat-password') }}</label>
                    <input type="password" class="form-control" name="newPassword" id="newPassword">
                </div>

                <div class="form-group">
                    <label for="image">{{ trans('user.Photography') }}</label>
                    <input type="file" id="image" name="image" class="btn btn-default">
                </div>
            </div>
            <div class="card-footer">
                <button type="reset" class="btn btn-warning text-dark">{{ trans('user.btn-create-clean') }}</button>
                <div class="pull-right">
                    <button type="submit" id="sendCreateNewUser"
                       class="btn btn-primary text-white">{{ trans('user.btn-create-user') }}</button>
                </div>
            </div>
        </form>
    </div>
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