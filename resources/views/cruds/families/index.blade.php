@extends('layouts.default')

@section('content')
<?php
/*------------------------------------------------------------*/
$viewName="index";
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
				    <div class="panel {{$lc->config('panel_class')}}">
                       	<div class="panel-heading">
                            <h4 class="panel-title">{{trans('forms.'.$viewName)}}</h4>
                        </div>				    
						<div class="panel-body">					
							<div class="row">
								@include('system.cruds.header_index_panel') 
							</div>
							<div class="row">
							@if ($families->count())
		                        <!--<table id="data-table" class="table table-striped table-hover table-bordered">	-->
		                        <table class="{{$lc->config('table_class')}}">	
									<!--<thead>-->
										<tr>
											<th>{{trans('forms.First_name')}}<a href="{{route('families.index', $lc->sortArgs('first_name','asc'))}}">{!! $lc->config('icon_sort-up') !!}</a><a href="{{route('families.index', $lc->sortArgs('first_name','desc'))}}">{!! $lc->config('icon_sort-down') !!}</a></th>
				<th>{{trans('forms.Last_name')}}<a href="{{route('families.index', $lc->sortArgs('last_name','asc'))}}">{!! $lc->config('icon_sort-up') !!}</a><a href="{{route('families.index', $lc->sortArgs('last_name','desc'))}}">{!! $lc->config('icon_sort-down') !!}</a></th>
				<th>{{trans('forms.Gender')}}<a href="{{route('families.index', $lc->sortArgs('gender','asc'))}}">{!! $lc->config('icon_sort-up') !!}</a><a href="{{route('families.index', $lc->sortArgs('gender','desc'))}}">{!! $lc->config('icon_sort-down') !!}</a></th>
				<th>{{trans('forms.Date_of_birth')}}<a href="{{route('families.index', $lc->sortArgs('date_of_birth','asc'))}}">{!! $lc->config('icon_sort-up') !!}</a><a href="{{route('families.index', $lc->sortArgs('date_of_birth','desc'))}}">{!! $lc->config('icon_sort-down') !!}</a></th>
				<th>{{trans('forms.Nacionality')}}<a href="{{route('families.index', $lc->sortArgs('nacionality','asc'))}}">{!! $lc->config('icon_sort-up') !!}</a><a href="{{route('families.index', $lc->sortArgs('nacionality','desc'))}}">{!! $lc->config('icon_sort-down') !!}</a></th>
				<th>{{trans('forms.City_of_birth')}}<a href="{{route('families.index', $lc->sortArgs('city_of_birth','asc'))}}">{!! $lc->config('icon_sort-up') !!}</a><a href="{{route('families.index', $lc->sortArgs('city_of_birth','desc'))}}">{!! $lc->config('icon_sort-down') !!}</a></th>
				<th>{{trans('forms.Marital_status')}}<a href="{{route('families.index', $lc->sortArgs('marital_status','asc'))}}">{!! $lc->config('icon_sort-up') !!}</a><a href="{{route('families.index', $lc->sortArgs('marital_status','desc'))}}">{!! $lc->config('icon_sort-down') !!}</a></th>
				<th>{{trans('forms.Document_type')}}<a href="{{route('families.index', $lc->sortArgs('document_type','asc'))}}">{!! $lc->config('icon_sort-up') !!}</a><a href="{{route('families.index', $lc->sortArgs('document_type','desc'))}}">{!! $lc->config('icon_sort-down') !!}</a></th>
				<th>{{trans('forms.Document_number')}}<a href="{{route('families.index', $lc->sortArgs('document_number','asc'))}}">{!! $lc->config('icon_sort-up') !!}</a><a href="{{route('families.index', $lc->sortArgs('document_number','desc'))}}">{!! $lc->config('icon_sort-down') !!}</a></th>
				<th>{{trans('forms.Passport_number')}}<a href="{{route('families.index', $lc->sortArgs('passport_number','asc'))}}">{!! $lc->config('icon_sort-up') !!}</a><a href="{{route('families.index', $lc->sortArgs('passport_number','desc'))}}">{!! $lc->config('icon_sort-down') !!}</a></th>
				<th>{{trans('forms.Ss_number')}}<a href="{{route('families.index', $lc->sortArgs('ss_number','asc'))}}">{!! $lc->config('icon_sort-up') !!}</a><a href="{{route('families.index', $lc->sortArgs('ss_number','desc'))}}">{!! $lc->config('icon_sort-down') !!}</a></th>
				<th> - </th>
										</tr>
									<!--</thead>-->
									<!--<tbody>-->
										@foreach ($families as $family)
										<tr>
											<td>{{{ $family->first_name }}}</td>
					<td>{{{ $family->last_name }}}</td>
					<td>{{{ $family->gender }}}</td>
					<td>{{{ $family->date_of_birth }}}</td>
					<td>{{{ $family->nacionality }}}</td>
					<td>{{{ $family->city_of_birth }}}</td>
					<td>{{{ $family->marital_status }}}</td>
					<td>{{{ $family->document_type }}}</td>
					<td>{{{ $family->document_number }}}</td>
					<td>{{{ $family->passport_number }}}</td>
					<td>{{{ $family->ss_number }}}</td>
                                            <td>{!! link_to_route('families.show', '', $lc->showArgs($family->id), ['class' => $lc->config('btn_class_view')] ) !!}</td>
										</tr>
										@endforeach
									<!--</tbody>-->
								</table>
								{!! $families->render() !!}
							@else
								<?php
								$noRecords=true;
								$table=trans('forms.Families');
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
