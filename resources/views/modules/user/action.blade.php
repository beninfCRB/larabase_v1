<x-ActionButton url='users' id="{{ $data }}"></x-ActionButton>

{{-- {!! Form::open(['route' => ['users.destroy', $id], 'method' => 'delete']) !!}
<a href="{{ route('users.show', $id) }}" class='btn btn-default btn-icon'>
    View
</a>
<a href="{{ route('users.edit', $id) }}" class='btn btn-default btn-icon'>
    Edit
</a>
{!! Form::button('Hapus', [
    'type' => 'submit',
    'class' => 'btn btn-default btn-icon',
    'onclick' => "return confirm('Are you sure?')",
]) !!}
{!! Form::close() !!} --}}
