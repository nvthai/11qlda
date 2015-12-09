<style>
	#id-content-search-chat
	{
	    background-image: url('../resources/assets/img/iconChat.png');
	    background-repeat: no-repeat;
	    background-size: 70px;
	    padding-left: 30px;
	    background-position: -39px 7px;
	    border: 1px solid #DADADA;
	    border-radius: 5px;
	}
	.padding-form-search-chat{
		padding:0px;
	}
</style>
<nav class="groups-nav">
	<section class="groups-nav-section">
		<div class="group-header input-group">
			{!! Form::open(array('route' => 'messages', 'class'=>'form navbar-form navbar-left searchform padding-form-search-chat')) !!}
			    {!! Form::text('search', null, array('required',
			                                'class'=>'form-control input-ben-trong',
			                                'placeholder'=>'Search','id'=>'id-content-search-chat')) !!}
			    {{-- {!! Form::submit('Search', array('class'=>'btn btn-default')) !!} --}}
			{!! Form::close() !!}
			
		</div>

		<div class="group-list">
			<span class="input-group-btn">
				<a onclick="createMessage()" class="btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
			</span>			
			@if (Session::has('error_message'))
                <div class="alert alert-danger" role="alert">
                    {!! Session::get('error_message') !!}
                </div>
            @endif
            @if($threads->count() > 0)
                @foreach($threads as $thread)
	                <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
	                <div onclick="showMessage({!! $thread->id !!})" data-pjax='#chat-area' class="media alert {!!$class!!} clickable">
	                    {{-- <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4> --}}
	                    {{-- <a href="{!! 'messages/' . $thread->id !!}"> </a> --}}
	                    <h4 class="media-heading">{!! $thread->participantsString(Auth::user()->id) !!}</h4>
	                    <p>
	                    	<?php 
	                    		$latestUser = vRemind\User::find($thread->latestMessage->user_id); 
	                    		if ($latestUser->id == Auth::id())
	                    			$name = "You"; 
	                    		else
	                    			$name = $latestUser->name;
	                    	?>
	                    		
	                    	@if (strlen($thread->latestMessage->body) <= 40)
	                    		{!! $name . ": " . $thread->latestMessage->body !!}
                    		@else
	                    		{!! $name . ": " . substr($thread->latestMessage->body, 0, 40) . "..." !!}
                    		@endif
	                    </p>
	                    {{-- <p><small><strong>Creator:</strong> {!! $thread->creator()->name !!}</small></p>
	                    <p><small><strong>Participants:</strong> {!! $thread->participantsString(Auth::id()) !!}</small></p> --}}
	                </div>
                @endforeach
            @else
                <p>Sorry, no threads.</p>
            @endif
		</div>
	</section>	
</nav>