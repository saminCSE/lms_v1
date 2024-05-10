@extends('layouts.master')

@section('css')
<link href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />

<style>
    table,
    td,
    th {
        vertical-align: middle !important;
    }

    table th {
        font-weight: bold;
    }
</style>
@endsection
@section('content')
@if (session('status'))
<div class="alert alert-success">{{ session('status')}}</div>
@endif
<div class="card">
  <div class="box-header with-border col-6 text-right">
                <h3 class="box-title">Add Company Basic Information</h3>
            </div>
    <div class="card-body">
        @if(isset($item))
        {!! Form::model($item, ['route'=>["update_company_basic_info", $item->id],'method' =>'PUT', 'enctype'=>'multipart/form-data', 'class' => 'custom-validation', 'files' => true,'role'=>"form", 'id' => 'edit-form']) !!}
        @else 
        {!! Form::open(['route' => ["add_company_basic_info"],'method'=>'POST', 'enctype'=>'multipart/form-data', 'class' => 'custom-validation', 'files' => true, 'role'=>"form",'id' => 'add-form']) !!}
        @endif

        <form class="custom-validation" action="#" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('company_name','Company Name') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('company_name',isset($item->company_name) ? $item->company_name : NULL,['class'=> 'form-control']) !!}
                        {!! $errors->first('company_name', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('code','Company Code') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('code',isset($item->code) ? $item->code : NULL,['class'=> 'form-control']) !!}
                        {!! $errors->first('code', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('xcode','Company XCode') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('xcode', isset($item->xcode) ? $item->xcode : NULL,['class'=> 'form-control']) !!}
                        {!! $errors->first('xcode', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('company_description','Company description') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('company_description',isset($item->company_description) ? $item->company_description : NULL,['class'=> 'form-control']) !!}
                        {!! $errors->first('company_description', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('incorporation_date','Incorporation Date') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('incorporation_date',isset($item->incorporation_date) ? $item->incorporation_date : NULL,['class'=> 'form-control datepicker']) !!}
                        {!! $errors->first('incorporation_date', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('scrip_code_dse','Script Code(DSE)') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('scrip_code_dse',isset($item->scrip_code_dse) ? $item->scrip_code_dse : NULL,['class'=> 'form-control']) !!}
                        {!! $errors->first('scrip_code_dse', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('scrip_code_cse','Script Code(CSE)') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('scrip_code_cse',isset($item->scrip_code_cse) ? $item->scrip_code_cse : NULL,['class'=> 'form-control']) !!}
                        {!! $errors->first('scrip_code_cse', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('listing_year_dse','Listing Year(DSE)') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('listing_year_dse',isset($item->listing_year_dse) ? $item->listing_year_dse : NULL,['class'=> 'form-control datepicker']) !!}
                        {!! $errors->first('listing_year_dse', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('listing_year_cse','Listing Year(CSE)') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('listing_year_cse',isset($item->listing_year_cse) ? $item->listing_year_cse : NULL,['class'=> 'form-control datepicker']) !!}
                        {!! $errors->first('listing_year_cse', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('market_category','market Category') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('market_category',isset($item->market_category) ? $item->market_category : NULL,['class'=> 'form-control']) !!}
                        {!! $errors->first('market_category', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('electronic_share', 'Electronic Share') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">

                        {!! Form::select('electronic_share', $status,isset($item->electronic_share) ? $item->electronic_share : NULL,['class'=> 'form-control']) !!}
                        {!! $errors->first('electronic_share', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('corporate_office_address','Corporate office address') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('corporate_office_address',isset($item->corporate_office_address) ? $item->corporate_office_address : NULL,['class'=> 'form-control']) !!}
                        {!! $errors->first('corporate_office_address', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('head_office_address','Head office address') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('head_office_address',isset($item->head_office_address) ? $item->head_office_address : NULL,['class'=> 'form-control']) !!}
                        {!! $errors->first('head_office_address', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('factory_office_address','Factory office address') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('factory_office_address',isset($item->factory_office_address) ? $item->factory_office_address : NULL,['class'=> 'form-control']) !!}
                        {!! $errors->first('factory_office_address', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('fax','Fax') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('fax',isset($item->fax) ? $item->fax : NULL,['class'=> 'form-control']) !!}
                        {!! $errors->first('fax', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('phone','Phone') !!}
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::text('phone',isset($item->phone) ? $item->phone : NULL,['class'=> 'form-control']) !!}
                        {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 text-right">
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div> <!-- end col -->
@endsection

@section('script')
<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script>
    $(function() {
        $('.datepicker').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    });
</script>
@endsection