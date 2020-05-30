{!! Form::open(['route' => ['patients.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('patients.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>View
    </a>
    <a href="{{ route('patients.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>Edit
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>Delete', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
<br>
<br>
<div class="btn-group">
    <a href="{{ route('quarantinePatients.home_quarantine', $id) }}" class='btn btn-success btn-sm'>
        Home Quarantine
    </a>

    <a href="{{ route('quarantinePatients.institute_quarantine', $id) }}" class='btn btn-primary btn-sm'>
        Institute Quarantine
    </a>
</div>
{!! Form::close() !!}
