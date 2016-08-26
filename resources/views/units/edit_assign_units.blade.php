@extends('layouts.user')

@section('pageTitle') <h3>Edit Assigned Units</h3>  @endsection
@section('page_title') Edit Assigned Units @endsection
@section('breadcumb') 
<li>
	<i class="icon-home"></i>
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="current">
	Edit Assigned Units
</li>
@endsection

@section('content')
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-content">
				<h2>Edit Assigned Unit</h2>
				{!! Form::model($assigned_unit, array('route' => ['update.assigned', Crypt::encrypt($assigned_unit->id)], 'id' => 'assigned_unit.update', 'class' => 'form-horizontal row-border')) !!}
			        @include('units._assign_units')
			        {!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
			        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
		</div>
	</div>
@endsection