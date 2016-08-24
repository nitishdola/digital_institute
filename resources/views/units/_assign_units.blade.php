<div class="form-group {{ $errors->has('branch_id') ? 'has-error' : ''}}">
  {!! Form::label('branch_id', 'Select Subject', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('branch_id', $branches, null, ['class' => 'col-md-12 select2 required', 'id' => 'branch_id','required' => 'true', 'data-placeholder' => 'Select Branch']) !!}
  {!! $errors->first('branch_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('class_id') ? 'has-error' : ''}}">
  {!! Form::label('class_id', 'Select Class', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('class_id', $classes, null, ['class' => 'col-md-12 select2 required', 'id' => 'class_id','required' => 'true']) !!}
  {!! $errors->first('class_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('subject_id') ? 'has-error' : ''}}">
  {!! Form::label('subject_id', 'Select Subject', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('subject_id', $subjects, null, ['class' => 'col-md-12 select2 required', 'id' => 'subject_id','required' => 'true', 'data-placeholder' => 'Select Subject']) !!}
  {!! $errors->first('subject_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('unit_id') ? 'has-error' : ''}}">
  {!! Form::label('unit_id', 'Select Unit', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('unit_id', $units, null, ['class' => 'col-md-12 select2 required', 'id' => 'unit_id','required' => 'true']) !!}
  {!! $errors->first('unit_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>