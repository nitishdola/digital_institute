@extends('layouts.user')

@section('pageTitle') <h3>Assign Unit</h3>  @endsection
@section('page_title') Assign Unit @endsection
@section('breadcumb') 
<li>
	<i class="icon-home"></i>
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="current">
	Assign Unit
</li>
@endsection

@section('content')
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-content">
				<h2>Assign Unit</h2>
				{!! Form::open(array('route' => 'unit.assign.post', 'id' => 'unit.assign.post', 'class' => 'form-horizontal row-border')) !!}
			        @include('units._assign_units')
			        {!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
			        {!! Form:: submit('Assign', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
		</div>
	</div>
@endsection