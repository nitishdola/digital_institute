<?php 
$unit_id = $subject_id = $branch_id = $class_id = '';
if(isset($_GET['unit_id'])) {
  $unit_id = $_GET['unit_id'];
}

if(isset($_GET['class_id'])) {
  $class_id = $_GET['class_id'];
}

if(isset($_GET['subject_id'])) {
  $subject_id = $_GET['subject_id'];
}

if(isset($_GET['unit_id'])) {
  $unit_id = $_GET['unit_id'];
}

?>
<div class="col-lg-3">
  <div class="form-group">
    {!! Form::label('branch_id', 'Select Branch', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('branch_id', $branches, $branch_id, ['class' => 'control-label col-md-12', 'id' => 'branch_id']) !!}
    </div>
  </div>
</div>
<div class="col-lg-3">
  <div class="form-group">
    {!! Form::label('class_id', 'Select Class', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('class_id', $classes, $class_id, ['class' => 'control-label col-md-12', 'id' => 'subject_id']) !!}
    </div>
  </div>
</div>
<div class="col-lg-3">
  <div class="form-group">
    {!! Form::label('subject_id', 'Select Subject', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('subject_id', $subjects, $subject_id, ['class' => 'control-label col-md-12', 'id' => 'subject_id', 'placeholder' => 'Select Subject']) !!}
    </div>
  </div>
</div>
<div class="col-lg-3">
  <div class="form-group">
    {!! Form::label('unit_id', 'Select Unit', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('unit_id', $units, $unit_id, ['class' => 'control-label col-md-12', 'id' => 'unit_id']) !!}
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