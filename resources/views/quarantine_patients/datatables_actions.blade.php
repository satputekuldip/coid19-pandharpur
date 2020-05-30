{!! Form::open(['route' => ['quarantinePatients.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('quarantinePatients.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('quarantinePatients.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}



</div>

<a href="{{ route('attendances.add_attendance', $id) }}" class='btn btn-success btn'>
    <i class="glyphicon glyphicon-add"></i>Add Attendance
</a>
{!! Form::close() !!}
