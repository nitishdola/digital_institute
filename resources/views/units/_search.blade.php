<?php 
$unit_name = $subject_id = '';
if(isset($_GET['unit_name'])) {
  $unit_name = $_GET['unit_name'];
}

if(isset($_GET['subject_id'])) {
  $subject_id = $_GET['subject_id'];
}
?>
<div class="col-lg-5">
  <div class="form-group">
    {!! Form::label('unit_name', 'Unit Name', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('unit_name', $unit_name, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Unit Name', 'autocomplete' => 'off',]) !!}
    </div>
  </div>
</div>
<div class="col-lg-5">
  <div class="form-group">
    {!! Form::label('subject_id', 'Select Subject', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('subject_id', $subjects, $subject_id, ['class' => 'control-label col-md-12', 'id' => 'subject_id', 'placeholder' => 'Select Subject']) !!}
    </div>
  </div>
</div>
<div class="col-lg-2">
  <div class="form-group">
    {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form:: submit('Search', ['class' => 'btn btn-success']) !!}
    </div>
  </div>
</div>