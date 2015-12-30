@extends('app')
@section('content')
<h2>Messages</h2>
<div class="panel panel-default">
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#incoming" aria-controls="incoming" role="tab" data-toggle="tab">Incoming</a></li>
            <li role="presentation"><a href="#outgoing" aria-controls="outgoing" role="tab" data-toggle="tab">Outgoing</a></li>
        </ul>
        <br>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="incoming">

                @foreach($incoming as $message)
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $message->sender->name }} <span class="pull-right">{{ $message->created_at->diffForHumans() }}</span></h4>
                            <p class="list-group-item-heading message_subject">{{ $message->subject }}</p>
                            <hr>
                            <em class="list-group-item-text">{{ $message->body }}</em>
                        </a>
                    </div>
                    @endforeach

            </div>
            <div role="tabpanel" class="tab-pane" id="outgoing">
                @foreach($outgoing as $message)
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $message->sender->name }} <span class="pull-right">{{ $message->created_at->diffForHumans() }}</span></h4>
                            <p class="list-group-item-heading message_subject">{{ $message->subject }}</p>
                            <hr>
                            <em class="list-group-item-text">{{ $message->body }}</em>
                        </a>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>

</div>
@endsection