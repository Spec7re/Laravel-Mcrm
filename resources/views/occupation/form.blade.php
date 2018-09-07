{{--/**
 * Created by PhpStorm.
 * User: specter
 * Date: 19.03.18
 * Time: 18:18
 */--}}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Occupation Name*:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Occupation Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

