<div class="form-group row">
    <label  class="col-sm-2 col-form-label">{{$label}}</label>
{{--    <label  class="col-sm-2 col-form-label">{{$text}}</label>--}}
    <div class="col-sm-10">
        <input type="{{$type}}" class="form-control text-left"  dir="rtl" name="{{$name}}" value="{{old($name)}}">
    </div>
</div>
@error($name)
<p>{{$message}}</p>
@enderror
