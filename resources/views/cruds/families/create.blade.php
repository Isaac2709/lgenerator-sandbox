@extends('layouts.default')

@section('content')
<?php
/*------------------------------------------------------------*/
$viewName="create";
$modelName="families"; 
$p=new Fragale\Helpers\PathsInfo;
include_once($p->pathViews().'/system/cruds/header_cruds.php'); 
/*------------------------------------------------------------*/
?>
			        
		<!-- begin #content -->
		<div id="content" class="content">

			@include('system.cruds.partial_header_cruds')			

			<!-- begin row -->
			<div class="row">
			    <!-- begin first column -->
			    <div class="{{$lc->config('col_1_width')}}">
			        <!-- begin panel -->
                    <div class="panel {{Config::get('cruds.settings.panel_class', 'panel-primary')}}">
                        <div class="panel-heading">
                            <h4 class="panel-title">{{trans('forms.'.$viewName)}}</h4>
                        </div>                   
						<div class="panel-body">
							<div class="row">
								<div class="{{$lc->config('col_full')}}">
									{!! Form::open(array('route' => 'families.store')) !!}
									
										            <!-- Nav tabs -->
            <ul class="nav nav-tabs">            
              <li class="active"><a href="#general" data-toggle="tab">{{{trans('forms.general')}}}</a></li>
              <li ><a href="#personal" data-toggle="tab">{{{trans('forms.personal')}}}</a></li>
              <li ><a href="#identifications" data-toggle="tab">{{{trans('forms.identifications')}}}</a></li>
            </ul>
            <!-- Nav tabs contents -->
            <div class="tab-content">
              <!-- Nav tabs contents for tab general -->
              <div class="tab-pane fade in active" id="general">
                          <fieldset >
                <!-- first_name -->
                <div class="form-group {{{ $errors->has('first_name') ? 'has-error' : '' }}}">
                    {!! Form::label('first_name', trans('forms.First_name'),array( 'class'=> 'control-label')) !!}
                    <div class="controls">
                    {!! Form::text('first_name', Request::old('first_name'), array('class' => 'form-control'  , 'size' => '64', 'maxlength' => '64'  )) !!}
                    {{{ $errors->first('first_name') }}}
                    </div>    
                </div>
                <!-- /first_name -->

                <!-- last_name -->
                <div class="form-group {{{ $errors->has('last_name') ? 'has-error' : '' }}}">
                    {!! Form::label('last_name', trans('forms.Last_name'),array( 'class'=> 'control-label')) !!}
                    <div class="controls">
                    {!! Form::text('last_name', Request::old('last_name'), array('class' => 'form-control'  , 'size' => '64', 'maxlength' => '64'  )) !!}
                    {{{ $errors->first('last_name') }}}
                    </div>    
                </div>
                <!-- /last_name -->

                <!-- gender -->
                <div class="form-group {{{ $errors->has('gender') ? 'has-error' : '' }}}">
                    {!! Form::label('gender', trans('forms.Gender'),array( 'class'=> 'control-label')) !!}
                    <div class="controls">
                    {!! $lc->radio('gender',['f' => 'Female','m' => 'Male'], (isset($family->gender)) ? $family->gender : '' ) !!}
                    {{{ $errors->first('gender') }}}
                    </div>    
                </div>
                <!-- /gender -->

                <!-- employee_id -->
                <div class="form-group {{{ $errors->has('employee_id') ? 'has-error' : '' }}}">
                    <div class="input-group col-md-4 date employee_id">
                      <input name="employee_id" type="hidden" value="{{$lc->master_id}}">
                    </div>
                    {{{ $errors->first('employee_id') }}}
                </div>
                <!-- /employee_id -->

                          </fieldset>
              </div>
              <!-- Nav tabs contents for tab personal -->
              <div class="tab-pane fade " id="personal">
                          <fieldset >
                <!-- date_of_birth -->
                <div class="form-group {{{ $errors->has('date_of_birth') ? 'has-error' : '' }}}">
                    {!! Form::label('date_of_birth', trans('forms.Date_of_birth'),array( 'class'=> 'control-label')) !!}
                    <div class="input-group col-md-4 date date_of_birth">
                      {!! Form::text('date_of_birth', Request::old('date_of_birth'), array('class' => 'form-control', 'size' => '16'  )) !!}
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    {{{ $errors->first('date_of_birth') }}}
                </div>
                <!-- /date_of_birth -->

                <!-- nacionality -->
                <div class="form-group {{{ $errors->has('nacionality') ? 'has-error' : '' }}}">
                    {!! Form::label('nacionality', trans('forms.Nacionality'),array( 'class'=> 'control-label')) !!}
                    <div class="controls">
                    {!! Form::text('nacionality', Request::old('nacionality'), array('class' => 'form-control'  , 'size' => '64', 'maxlength' => '64'  )) !!}
                    {{{ $errors->first('nacionality') }}}
                    </div>    
                </div>
                <!-- /nacionality -->

                <!-- city_of_birth -->
                <div class="form-group {{{ $errors->has('city_of_birth') ? 'has-error' : '' }}}">
                    {!! Form::label('city_of_birth', trans('forms.City_of_birth'),array( 'class'=> 'control-label')) !!}
                    <div class="controls">
                    {!! Form::text('city_of_birth', Request::old('city_of_birth'), array('class' => 'form-control'  , 'size' => '64', 'maxlength' => '64'  )) !!}
                    {{{ $errors->first('city_of_birth') }}}
                    </div>    
                </div>
                <!-- /city_of_birth -->

                <!-- marital_status -->
                <div class="form-group {{{ $errors->has('marital_status') ? 'has-error' : '' }}}">
                    {!! Form::label('marital_status', trans('forms.Marital_status'),array( 'class'=> 'control-label')) !!}
                    <div class="controls">
                    {!! Form::text('marital_status', Request::old('marital_status'), array('class' => 'form-control'  , 'size' => '3', 'maxlength' => '3'  )) !!}
                    {{{ $errors->first('marital_status') }}}
                    </div>    
                </div>
                <!-- /marital_status -->

                          </fieldset>
              </div>
              <!-- Nav tabs contents for tab identifications -->
              <div class="tab-pane fade " id="identifications">
                          <fieldset >
                <!-- document_type -->
                <div class="form-group {{{ $errors->has('document_type') ? 'has-error' : '' }}}">
                    {!! Form::label('document_type', trans('forms.Document_type'),array( 'class'=> 'control-label')) !!}
                    <div class="controls">
                    {!! Form::text('document_type', Request::old('document_type'), array('class' => 'form-control'  , 'size' => '3', 'maxlength' => '3'  )) !!}
                    {{{ $errors->first('document_type') }}}
                    </div>    
                </div>
                <!-- /document_type -->

                <!-- document_number -->
                <div class="form-group {{{ $errors->has('document_number') ? 'has-error' : '' }}}">
                    {!! Form::label('document_number', trans('forms.Document_number'),array( 'class'=> 'control-label')) !!}
                    <div class="controls">
                    {!! Form::text('document_number', Request::old('document_number'), array('class' => 'form-control'  , 'size' => '20', 'maxlength' => '20'  )) !!}
                    {{{ $errors->first('document_number') }}}
                    </div>    
                </div>
                <!-- /document_number -->

                <!-- passport_number -->
                <div class="form-group {{{ $errors->has('passport_number') ? 'has-error' : '' }}}">
                    {!! Form::label('passport_number', trans('forms.Passport_number'),array( 'class'=> 'control-label')) !!}
                    <div class="controls">
                    {!! Form::text('passport_number', Request::old('passport_number'), array('class' => 'form-control'  , 'size' => '20', 'maxlength' => '20'  )) !!}
                    {{{ $errors->first('passport_number') }}}
                    </div>    
                </div>
                <!-- /passport_number -->

                <!-- ss_number -->
                <div class="form-group {{{ $errors->has('ss_number') ? 'has-error' : '' }}}">
                    {!! Form::label('ss_number', trans('forms.Ss_number'),array( 'class'=> 'control-label')) !!}
                    <div class="controls">
                    {!! Form::text('ss_number', Request::old('ss_number'), array('class' => 'form-control'  , 'size' => '20', 'maxlength' => '20'  )) !!}
                    {{{ $errors->first('ss_number') }}}
                    </div>    
                </div>
                <!-- /ss_number -->

                          </fieldset>
              </div>
            </div>
                          </fieldset>
										{!! $lc->inputsMaster() !!}

										<!-- buttons -->
										<p class="divider"></p>
										{!! Form::submit(trans('forms.add'), array('class' => 'btn btn-info')) !!}
										{!! link_to_route($routeBtnIndex, trans('forms.Cancel'), $lc->basicArgs(), array('class' => 'btn btn-default '.$classBtnIndex)) !!}
										<!-- /buttons -->
										<p class="divider"></p>				
									{!! Form::close() !!}
								</div>
							</div>
						</div>		
                    </div>
                    <!-- end panel -->  
                </div>
                <!-- end first column -->			    				

			    <!-- begin second column -->
		    	@include('system.cruds.second_column_cruds')
                <!-- end second column -->			    				                
		    				
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->	                    

<?php
/*------------------------------------------------------------*/
include_once($p->pathViews().'/system/cruds/footer_cruds.php');
/*------------------------------------------------------------*/
?>
@stop
