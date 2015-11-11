<h1>Search course</h1>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

{!! Form::open(array('url' => '/course/form_join','class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('code') !!}
    {!! Form::textarea('Code', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Enter code')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Search!', 
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}