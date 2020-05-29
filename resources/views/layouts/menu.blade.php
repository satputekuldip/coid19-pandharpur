
<li class="{{ Request::is('states*') ? 'active' : '' }}">
    <a href="{{ route('states.index') }}"><i class="fa fa-edit"></i><span>States</span></a>
</li>

<li class="{{ Request::is('districts*') ? 'active' : '' }}">
    <a href="{{ route('districts.index') }}"><i class="fa fa-edit"></i><span>Districts</span></a>
</li>

<li class="{{ Request::is('tahsils*') ? 'active' : '' }}">
    <a href="{{ route('tahsils.index') }}"><i class="fa fa-edit"></i><span>Tahsils</span></a>
</li>

<li class="{{ Request::is('entryPoints*') ? 'active' : '' }}">
    <a href="{{ route('entryPoints.index') }}"><i class="fa fa-edit"></i><span>Entry Points</span></a>
</li>

<li class="{{ Request::is('patients*') ? 'active' : '' }}">
    <a href="{{ route('patients.index') }}"><i class="fa fa-edit"></i><span>Patients</span></a>
</li>

<li class="{{ Request::is('quarantine_addresses.institutes*') ? 'active' : '' }}">
    <a href="{{ route('quarantine_addresses.institutes') }}"><i class="fa fa-edit"></i><span>Institutes</span></a>
</li>

<li class="{{ Request::is('quarantineAddresses*') ? 'active' : '' }}">
    <a href="{{ route('quarantineAddresses.index') }}"><i class="fa fa-edit"></i><span>Quarantine Addresses</span></a>
</li>

<li class="{{ Request::is('quarantinePatients*') ? 'active' : '' }}">
    <a href="{{ route('quarantinePatients.index') }}"><i class="fa fa-edit"></i><span>Quarantine Patients</span></a>
    <a href="{{ route('quarantinePatients.index') }}"><i class="fa fa-edit"></i><span>Quarantine Patients</span></a>
</li>

<li class="{{ Request::is('symptoms*') ? 'active' : '' }}">
    <a href="{{ route('symptoms.index') }}"><i class="fa fa-edit"></i><span>Symptoms</span></a>
</li>

<li class="{{ Request::is('attendances*') ? 'active' : '' }}">
    <a href="{{ route('attendances.index') }}"><i class="fa fa-edit"></i><span>Attendances</span></a>
</li>

