<div class="form-group {{ $errors->has('unit_name') ? 'has-error' : ''}}">
  {!! Form::label('unit_name', 'Unit Name', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('unit_name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Unit Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('subject_id') ? 'has-error' : ''}}">
  {!! Form::label('subject_id', 'Select Subject', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('subject_id', $subjects, null, ['class' => 'col-md-12 select2 required', 'id' => 'subject_id','required' => 'true', 'data-placeholder' => 'Select Subject']) !!}
  {!! $errors->first('subject_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>