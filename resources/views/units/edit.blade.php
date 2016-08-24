@extends('layouts.user')

@section('pageTitle') <h3>Edit Unit</h3>  @endsection
@section('page_title') Edit Unit @endsection
@section('breadcumb') 
<li>
	<i class="icon-home"></i>
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="current">
	Edit Unit
</li>
@endsection

@section('content')
<div class="col-md-12">
	<div class="widget box">
		<div class="widget-content">
			<h2>Edit Unit</h2>
		    {!! Form::model($unit, array('route' => ['unit.update', Crypt::encrypt($unit->id)], 'id' => 'unit_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('units._form')
		        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection