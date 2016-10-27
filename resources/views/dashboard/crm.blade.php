@extends('master')

@section('title')
    CRM | Myst
@endsection

@section('body')
    <div id="crm" class="outer-container blue-grey lighten-5">
        <div class="container">
            <div id="left-bar" class="card-panel blue-grey lighten-2 collection">
                @foreach($threads as $thread)
                    <a href="/dashboard/crm/{{$thread->sender_id}}/{{$thread->product_id}}" class="collection-item
                        @if(isset($uid) && isset($pid) && $uid==$thread->sender_id && $pid==$thread->product_id)
                            active
                        @endif
                    ">
                        {{$thread->fname}} {{$thread->lname}} <span class="light-green-text text-lighten-3">- {{$thread->name}}</span>
                    </a>
                @endforeach
            </div>
            <div id="right-bar">
                <div class="card-panel white">
                    @if(isset($chats))
                    <div class="thread">
                        @foreach($chats as $chat)
                            <div @if($chat->sender_id == Auth::user()->id)
                                 class="you message green lighten-3 blue-grey-text">
                                @else
                                    class="message grey lighten-3 blue-grey-text">
                                @endif
                                {{$chat->message}}<div class="date">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $chat->created_at)->diffForHumans()}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="message-input">
                        <form action="/message/{{$uid}}/{{$pid}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col s12">
                                    <label for="message">Reply</label>
                                    <textarea id="message" class="materialize-textarea" name="message" length="500"></textarea>
                                </div>
                                <div class="col s12">
                                    <button class="btn blue" type="submit" name="action">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                        <h5 class="center blue-grey-text">Select a thread</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection