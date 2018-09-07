<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Company Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Required','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Company email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Required','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Company Website:</strong>
            {!! Form::text('website', null, array('placeholder' => 'Website','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password Required">
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <label for="password_confirmation" class="sr-only">Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="inputPassword2" placeholder="Password Confirm">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Upload logo:</strong>
            {!! Form::file('logo', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>