@extends('layouts.default')

@section('content')
<?php
/*------------------------------------------------------------*/
$viewName="index";
$modelName="employees"; 
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
				    <div class="panel {{$lc->config('panel_class')}}">
                       	<div class="panel-heading">
                            <h4 class="panel-title">{{trans('forms.'.$viewName)}}</h4>
                        </div>				    
						<div class="panel-body">					
							<div class="row">
								@include('system.cruds.header_index_panel') 
							</div>
							<div class="row">
							@if ($employees->count())
		                        <!--<table id="data-table" class="table table-striped table-hover table-bordered">	-->
		                        <table class="{{$lc->config('table_class')}}">	
									<!--<thead>-->
										<tr>
											<th>{{trans('forms.First_name')}}<a href="{{route('employees.index', $lc->sortArgs('first_name','asc'))}}">{!! $lc->config('icon_sort-up') !!}</a><a href="{{route('employees.index', $lc->sortArgs('first_name','desc'))}}">{!! $lc->config('icon_sort-down') !!}</a></th>
				<th>{{trans('forms.Last_name')}}<a href="{{route('employees.index', $lc->sortArgs('last_name','asc'))}}">{!! $lc->config('icon_sort-up') !!}</a><a href="{{route('employees.index', $lc->sortArgs('last_name','desc'))}}">{!! $lc->config('icon_sort-down') !!}</a></th>
				<th> - </th>
										</tr>
									<!--</thead>-->
									<!--<tbody>-->
										@foreach ($employees as $employee)
										<tr>
											<td>{{{ $employee->first_name }}}</td>
					<td>{{{ $employee->last_name }}}</td>
                                            <td>{!! link_to_route('employees.show', '', $lc->showArgs($employee->id), ['class' => $lc->config('btn_class_view')] ) !!}</td>
										</tr>
										@endforeach
									<!--</tbody>-->
								</table>
								{!! $employees->render() !!}
							@else
								<?php
								$noRecords=true;
								$table=trans('forms.Employees');
								$messaje=trans('forms.norecords');
								?>
								{{$messaje}} {{$table}}
							@endif
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
