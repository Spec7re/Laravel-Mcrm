{{--/**
* Created by PhpStorm.
* User: specter
* Date: 19.03.18
* Time: 14:41
*/--}}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>First Name:</strong>
            {!! Form::text('first_name', null, array('placeholder' => 'Required','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Last Name:</strong>
            {!! Form::text('last_name', null, array('placeholder' => 'Required','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email Address:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Required','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Occupation:</strong>
            <select  name="occupation_id" id="occupation" type="text" class="form-control" >
                <option value="">Select Occupation</option>
                @foreach ($occupations as $occupation)
                        <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone:</strong>
            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Required Password">
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <label for="password_confirmation" class="sr-only">Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="inputPassword2" placeholder="Confirm Password">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

