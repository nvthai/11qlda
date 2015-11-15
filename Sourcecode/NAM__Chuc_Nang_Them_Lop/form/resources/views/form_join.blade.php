<h1>Create Book</h1>
    {!! Form::open(array('url' => '/course','class' => 'form')) !!}
    @foreach($participations as $participation)
        <p> {{ $participation->ClassId}}</p>
    @endforeach
    <div class="form-group">
        {!! Form::submit('Join', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}