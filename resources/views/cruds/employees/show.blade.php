@extends('layouts.default')

@section('content')
<?php
/*------------------------------------------------------------*/
$viewName="show";
$modelName="employees"; 
$currentRecord=$employee;
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
							{!! $lc->toolBar($employee) !!}
							<div class="row">
						    	<div class="{{$lc->config('col_full')}}">
								{!! Form::open() !!}
								                              <fieldset disabled>
                <!-- first_name -->
                <div class="form-group {{{ $errors->has('first_name') ? 'has-error' : '' }}}">
                    {!! Form::label('first_name', trans('forms.First_name'),array( 'class'=> 'control-label')) !!}
                    <div class="controls">
                    {!! Form::text('first_name', $employee->first_name, array('class' => 'form-control'  , 'size' => '64', 'maxlength' => '64'  )) !!}
                    {{{ $errors->first('first_name') }}}
                    </div>    
                </div>
                <!-- /first_name -->

                <!-- last_name -->
                <div class="form-group {{{ $errors->has('last_name') ? 'has-error' : '' }}}">
                    {!! Form::label('last_name', trans('forms.Last_name'),array( 'class'=> 'control-label')) !!}
                    <div class="controls">
                    {!! Form::text('last_name', $employee->last_name, array('class' => 'form-control'  , 'size' => '64', 'maxlength' => '64'  )) !!}
                    {{{ $errors->first('last_name') }}}
                    </div>    
                </div>
                <!-- /last_name -->

                          </fieldset>
								    <p class="divider"></p>
								    <div class="row">
								        <div class="col-md-8" align="left">
											{!! $btnGoBack !!}
								        </div>
								        <div class="col-md-4" align="right">								        	
                                        </div>
								    </div>	
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
