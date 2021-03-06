@extends('layouts.user')
@section('title') All Units @stop
@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	Units
</li>

@stop
@section('content')
<div class="col-lg-12">
	<h2>All Units</h2>
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		{!! Form::open(array('route' => 'unit.assigned', 'id' => 'unit.assigned', 'class' => 'form-horizontal row-border', 'method' => 'GET')) !!}
		@include('units._assigned_search')
		{!!form::close()!!}
		</div>
	</div>
	<br><br><br>
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			@if(count($results))
		    <?php $count = 1; ?>
			<table class="table table-striped table-bordered table-advance table-hover">
			    <thead>
			        <tr>
			            <th>
			                #
			            </th>
			            <th class="hidden-xs">
			                Branch Name
			            </th>
			            <th>
			                Class name
			            </th>
			            <th>
			            	Subject
			            </th>
			            <th>
			            	Unit
			            </th>

			            <th>Edit</th>
			            <th>Remove</th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($results as $k => $v)
			        <tr>
			            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
			            <td class="hidden-xs"> {{ $v->branch['branch_name'] }} </td>
			            <td class="hidden-xs"> {{ $v->class['class_name'] }} </td>
			            <td> {{ $v->subject['subject_name'] }} </td>
			            <td> {{ $v->unit['unit_name'] }} </td>
			            <td> <a href="{{ route('edit.assigned', Crypt::encrypt($v->id) ) }}" title="Edit unit">Edit</a>
			            </td>
			            <td> <a onclick="return confirm('Are you sure you want to delete this  ?');" href="{{ route('remove.assigned', Crypt::encrypt($v->id) ) }}" title="Remove"><i class="fa fa-trash"></i>Remove</a> </td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
			<div class="pagination">
			{!! $results->render() !!}
			</div>
		    @else
		    	<div class="alert alert-danger alert-dismissable alert-red">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                  No Units Found !
                </div>
		    @endif
		</div>
	</div>
</div>
@endsection