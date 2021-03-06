@extends('layouts.user')

@section('pageTitle') <h3>Add a Unit</h3>  @endsection
@section('page_title') Add a Unit @endsection
@section('breadcumb') 
<li>
	<i class="icon-home"></i>
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="current">
	Add New Unit
</li>
@endsection

@section('content')
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-content">
				<h2>Add Unit</h2>
				{!! Form::open(array('route' => 'unit.store', 'id' => 'unit.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('units._form')
			        {!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
			        {!! Form:: submit('Add Unit', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
		</div>
	</div>
@endsection