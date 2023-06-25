



<form action="/verify" method="post" >
    @csrf
<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Phone Number</label>
    <div class="col-md-6">
        <input id="name" type="tel" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required autofocus>

     @if ($errors->has('phone_number'))
        <span class="help-block">
            <strong>{{ $errors->first('phone_number') }}</strong>
        </span>
    @endif
    </div>
    <input type="submit" value="Verify">
</div>
</form>
