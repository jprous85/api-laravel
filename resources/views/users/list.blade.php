@section('content')
    @extends('layouts.app')
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/user/create') }}">{{ trans('user.create_new_user') }}</a>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12">
            @if (count($user) != 0)
                <table class="table table-hover">
                    <th>{{ trans('user.name-user') }}</th>
                    <th>{{ trans('user.last-name-user') }}</th>
                    <th>{{ trans('user.date-of-birth') }}</th>
                    <th>{{ trans('user.email') }}</th>
                    <th>{{ trans('user.date-of-create') }}</th>
                    <th>{{ trans('user.options') }}</th>
                    @foreach($user as $u)
                        <tr>
                            <td><a href="{{url('user/edit')}}/{{$u->id}}">{{ $u->name }}</a></td>
                            <td>{{ $u->last_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($u->date_of_birth)->format('d/m/Y') }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($u->created_at)->format('d/m/Y h:m') }}</td>
                            <td>
                                <a href="{{ url('user/edit') }}/{{$u->id}}" class="btn btn-primary">{{trans('user.btn-edit')}}</a>
                                &nbsp;
                                <a href="javascript:void(0)" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal"
                                   data-id="{{$u->id}}" data-name="{{$u->name}} {{$u->last_name}}">{{trans('user.btn-delete')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $user->links() }}
            @else
                <div class="alert-warning">
                    <p><strong>{{ trans('user.empty_user') }}</strong></p>
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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                $('#paragraf_name').html('Vas a eliminar al usuario ' + nombre + '.\n¿Estás seguro?');
                $('#button_delete').attr('href', '/user/delete/'+id);
            })
        });
    </script>
@endsection