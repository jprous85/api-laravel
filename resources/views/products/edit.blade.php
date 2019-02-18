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
            <label class="text-muted"> {{ trans('product.modify_single_product') }} </label>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('product/update/') }}" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{$prod->id}}">

                <div class="card">
                    <div class="card-header">
                        <h5>{{ trans('product.modify_single_product') }} {{ $prod->name }}</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">{{ trans('product.name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $prod->name }}">
                        </div>
                        <div class="form-group">
                            <label for="category">{{ trans('product.category') }}</label>
                            <select name="category" id="category" class="form-control">
                                <option value="null">{{ trans('product.empty') }}</option>
                                <option value="food" @if($prod->category == 'food')selected="selected"@endif>{{trans('product.food')}}</option>
                                <option value="electronic" @if($prod->category == 'electronic')selected="selected"@endif>{{ trans('product.electronic') }}</option>
                                <option value="sport" @if($prod->category == 'sport')selected="selected"@endif>{{ trans('product.sport') }}</option>
                                <option value="life" @if($prod->category == 'life')selected="selected"@endif>{{ trans('product.life') }}</option>
                                <option value="animal" @if($prod->category == 'animal')selected="selected"@endif>{{ trans('product.animal') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('product.description') }}</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $prod->description }}">
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{ trans('product.quantity') }}</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" min="0" value="{{ $prod->quantity }}">
                        </div>
                        <div class="form-group">
                            <label for="price">{{ trans('product.price') }}</label>
                            <input type="" id="price" name="price" class="form-control" min="0" step="0.01" value="{{$prod->price}}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary text-white"> {{ trans('product.modify_single_product') }} </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
@endsection