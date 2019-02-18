@section('content')
    @extends('layouts.app')

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/product/create') }}">{{ trans('product.create_new_product') }}</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            @if (count($product) != 0)
                <table class="table table-hover">
                    <th>{{ trans('product.name') }}</th>
                    <th>{{ trans('product.category') }}</th>
                    <th>{{ trans('product.description') }}</th>
                    <th>{{ trans('product.quantity') }}</th>
                    <th>{{ trans('product.price') }}</th>
                    <th>{{ trans('user.options') }}</th>
                    @foreach($product as $p)
                        <tr>
                            <td>
                                <a href="{{ url('/product/edit/'.$p->id) }}">{{$p->name}}</a>
                            </td>
                            <td>{{ trans('product.'.$p->category) }}</td>
                            <td>{{$p->description}}</td>
                            <td>{{$p->quantity}}</td>
                            <td>{{$p->price}}</td>
                            <td>
                                <a href="{{ url('/product/edit') }}/{{$p->id}}" class="btn btn-primary">{{trans('product.btn-edit')}}</a>
                                &nbsp;
                                <a href="javascript:void(0)" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal"
                                   data-id="{{$p->id}}" data-name="{{$p->name}}">{{trans('product.btn-delete')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $product->links() }}
            @else
                <div class="alert-warning">
                    <p><strong>{{trans('product.empty_product')}}</strong></p>
                </div>
            @endif
        </div>
    </div>
@endsection


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('product.notice_delete_product') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="paragraf_name"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('user.btn-close') }}</button>
                <a id="button_delete" href="" class="btn btn-outline-dark">{{ trans('user.btn-delete') }}</a>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#deleteModal').on('show.bs.modal', function (event) {
                var modal = $(event.relatedTarget);
                var id = modal.data('id');
                var nombre = modal.data('name');
                $('#paragraf_name').html('Vas a eliminar el producto ' + nombre + '.\n¿Estás seguro?');
                $('#button_delete').attr('href', '/product/delete/'+id);
            })
        });
    </script>
@endsection