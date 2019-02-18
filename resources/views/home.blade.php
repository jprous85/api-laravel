@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 text-center center-block">
                            <a href="{{ url('user/list') }}" class="text-dark">
                                <div class="box">
                                    <p>{{ trans('user.users') }}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 text-center center-block">
                            <a href="{{ url('product/list') }}" class="text-dark">
                                <div class="box">
                                    <p>{{ trans('user.products') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center center-block">
                            <a href="" class="text-dark">
                                <div class="box">
                                    <p>{{ trans('enlazados') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
