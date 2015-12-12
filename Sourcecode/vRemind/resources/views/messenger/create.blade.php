
<h1>Tạo một cuộc trò chuyện mới</h1>
{!! Form::open(['route' => 'messages.store']) !!}
{{-- <div class="col-md-6"> --}}    
    @if($users->count() > 0)
    <div class="checkbox">
        @foreach($users as $user)
            <label title="{!!$user->name!!}"><input type="checkbox" name="recipients[]" value="{!!$user->id!!}">{!!$user->name!!}</label>
        @endforeach
    </div>
    @endif

    <!-- Subject Form Input -->
    {{-- <div class="form-group">
        {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
        {!! Form::text('subject', null, ['class' => 'form-control']) !!}
    </div> --}}
    
    <!-- Message Form Input -->
    <div class="form-group">
        {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
    </div>

    
    <!-- Submit Form Input -->
    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
    </div>
{{-- </div> --}}
{!! Form::close() !!}