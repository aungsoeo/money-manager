@extends('site.layouts.default') {{-- Web site Title --}}
@section('title') {{{ trans('site/user.dashboard') }}} :: @parent @stop

{{-- Content --}} @section('content')
<div class="page-header">
    <h4>Add Category</h4>
</div>
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-body">
                @include('notifications')
                <form method="POST" action="{{URL::to('admin/add/category')}}" accept-charset="UTF-8">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>
                        <div class="form-group">
                            <label for="type"> {{trans('admin/user.type') }} </label>
                            <select name="type" class="form-control">
                                <option value="EXPENSE">Expense</option>
                                <option value="INCOME">Income</option>
                            </select>
                        </div>
                        <div class="form-group {{$errors->has('category_name')?'has-error':''}}">
                            <label for="category_name"> {{trans('admin/user.category_name') }} </label>
                            <input class="form-control" tabindex="2"
                                   placeholder="{{ trans('admin/user.category_name_placeholder') }}" type="text"
                                   name="category_name" id="category_name">
                            <span class="help-block">{{$errors->first('category_name',':message')}}</span>
                        </div>
                        <div class="form-group parent_type_id">
                            <label for="parent_type_id"> {{trans('admin/user.parent_category_name') }} </label>
                            <select name="parent_type_id" class="form-control">
                            </select>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary">{{{trans('admin/user.submit') }}}</button>
                            <a class="btn btn-default" href="{{URL::to('/admin/category')}}">{{trans('admin/user.cancel') }}</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var categories = '<?php echo $categories;?>';
        if (categories.length > 0) {
            categories = JSON.parse(categories);
        }
        
        displayDrowdown(categories, 'EXPENSE');
        
        function displayDrowdown(categories, selectedType)
        {
            var parentTypeSelect = $("select[name='parent_type_id']");
            switch(selectedType) {
                case "EXPENSE":
                    if (categories.EXPENSE == undefined) {
                        $("div.parent_type_id").hide();
                    } else {
                        $("div.parent_type_id").show();
                        var str = "<option value='0'>Select Parent</option>";
                        $.each(categories.EXPENSE, function(key, value){
                            str += "<option value='"+key+"'>"+value+"</option>";
                        });
                        $(parentTypeSelect).html(str);
                    }
                    break;
                case "INCOME":
                    if (categories.INCOME == undefined) {
                        $("div.parent_type_id").hide();
                    } else {
                        $("div.parent_type_id").show();
                        var str = "<option value='0'>Select Parent</option>";
                        $.each(categories.INCOME, function(key, value){
                            str += "<option value='"+key+"'>"+value+"</option>";
                        });
                        $(parentTypeSelect).html(str);
                    }
                    break;
            }
        }
        
        $("select[name='type']").change(function(){
            displayDrowdown(categories, $(this).val() );
        });
        
    });
</script>
@stop
