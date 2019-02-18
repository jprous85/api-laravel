@section('content')
    @extends('layouts.app')
    @if(Session::has('status'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-{{Session::get('status_box')}}">
                    {{ Session::get('status')}}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/product/list') }}"> {{ trans('product.list') }} </a>
            &nbsp;
            /
            &nbsp;
            <label class="text-muted"> {{ trans('product.create_new_product') }} </label>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('product/store') }}" method="post">
                {{ csrf_field() }}

                <div class="card">
                    <div class="card-header">
                        <h5>{{ trans('product.create_new_product') }}</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">{{ trans('product.name') }}</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="category">{{ trans('product.category') }}</label>
                            <select name="category" id="category" class="form-control">
                                <option value="null">{{ trans('product.empty') }}</option>
                                <option value="food">{{trans('product.food')}}</option>
                                <option value="electronic">{{ trans('product.electronic') }}</option>
                                <option value="sport">{{ trans('product.sport') }}</option>
                                <option value="life">{{ trans('product.life') }}</option>
                                <option value="animal">{{ trans('product.animal') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('product.description') }}</label>
                            <input type="text" class="form-control" name="description" id="description">
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{ trans('product.quantity') }}</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" min="0">
                        </div>
                        <div class="form-group">
                            <label for="price">{{ trans('product.price') }}</label>
                            <input type="" id="price" name="price" class="form-control" min="0" step="0.01">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="pull-left">
                            <button type="reset" class="btn btn-warning text-dark">{{ trans('product.reset') }}</button>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary text-white"> {{ trans('product.create_product') }} </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
@endsection