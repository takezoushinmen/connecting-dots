
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/css/userblade.css" type="text/css">
  </head>
  <body>

@if (Auth::user()->id == $user->id)    
<br><br><br><br>
<img src="/images/icons/{{$icon}}" alt="画像"class="sample2"> 

<p class="name">{{$user->name}}</p>
<p class="review">REVIEW&nbsp;&nbsp;{!!$stars!!} 
@if($review_round!=0)
<a href = "{{route('reviewhistory.get', $user->id)}}">
{{$review_round}}
</a>
@endif
</p>

<p class="point">POINT&nbsp;&nbsp;{{$points}}ポイント</p> 

</p> 
<br><br><br><br>
<p class="profile">
MY PROFILE&nbsp;&nbsp;<a class="btn btn-default" href="{{route ('profileedit.get', $user->id) }}" role="button">EDIT</a></p>
<div class="box1">
    <p>{{$user->introduction}}</p>
</div>
<br><br>

<div class="tabs">
<input id="join" type="radio" name="tab_item" checked>
<label class="tab_item" for="join">参加イベント</label>

<input id="arrange" type="radio" name="tab_item">
<label class="tab_item" for="arrange">主催イベント</label>

<input id="joinhistory" type="radio" name="tab_item">
<label class="tab_item" for="joinhistory">参加イベント履歴</label>

<input id="arrangehistory" type="radio" name="tab_item">
<label class="tab_item" for="arrangehistory">主催イベント履歴</label>


<div class="tab_content" id="join_content">
<div class="tab_content_description">
<p class="c-txtsp">
 
   
@foreach($joining_events as $joining_event)
 <div class="box2">
<p>{{$joining_event->title}}</p>
<p>{{$joining_event->date}}</p>
<a href = "{{route ('review.get', [$joining_event->id, $user->id]) }}">
    <p>完了</p>
</a> 
</div>
@endforeach</p>




</div>
</div>

<div class="tab_content" id="arrange_content">
<div class="tab_content_description">
<p class="c-txtsp">

   
   @foreach($arranging_events as $arranging_event)
   <div class="box2"> 
<p>{{$arranging_event->title}}</p>
<p>{{$arranging_event->date}}</p>
<a href = "{{route ('arrangedone.get', [$arranging_event->id,  $user->id]) }}">
    <p>イベントを締め切る</p>
</a> 

</div>
@endforeach



</p>
</div>
</div>

<div class="tab_content" id="joinhistory_content">
<div class="tab_content_description">
<p class="c-txtsp">
 
 
  @foreach($joined_histories as $joined_history)
   <div class="box2">  
<p>{{$joined_history->title}}</p>
<p>{{$joined_history->date}}</p>
</div>
@endforeach


</p>
</div>
</div>

<div class="tab_content" id="arrangehistory_content">
<div class="tab_content_description">
<p class="c-txtsp">


@foreach($arrnged_histories as $arrnged_history)
<div class="box2">  
<p>{{$arrnged_history->title}}</p>
<p>{{$arrnged_history->date}}</p>
</div>
@endforeach


</p>
</div>
</div>


</div>

@else

<br><br><br><br>
<img src="/images/icons/{{$icon}}" alt="画像"class="sample2"> 

<p class="name">{{$user->name}}</p>
<p class="review">REVIEW&nbsp;&nbsp;{!!$stars!!} 
@if($review_round!=0)
<a href = "{{route('reviewhistory.get', $user->id)}}">
{{$review_round}}
</a>
@endif
</p>

<p class="point">POINT&nbsp;&nbsp;{{$points}}ポイント</p> 

</p> 
<br><br><br><br>
<form action="リンク先URL"><p class="profile">
MY PROFILE&nbsp;&nbsp;</p></form>
<div class="box1">
    <p>{{$user->introduction}}</p>
</div>
<br><br>

<div class="tabs">
<input id="join" type="radio" name="tab_item" checked>
<label class="tab_item" for="join">参加イベント</label>

<input id="arrange" type="radio" name="tab_item">
<label class="tab_item" for="arrange">主催イベント</label>

<input id="joinhistory" type="radio" name="tab_item">
<label class="tab_item" for="joinhistory">参加イベント履歴</label>

<input id="arrangehistory" type="radio" name="tab_item">
<label class="tab_item" for="arrangehistory">主催イベント履歴</label>


<div class="tab_content" id="join_content">
<div class="tab_content_description">
<p class="c-txtsp">


@foreach($joining_events as $joining_event)
<div class="box2">
<p>{{$joining_event->title}}</p>
<p>{{$joining_event->date}}</p>
</div>
@endforeach</p>

 
</div>
</div>

<div class="tab_content" id="arrange_content">
<div class="tab_content_description">
<p class="c-txtsp">


   @foreach($arranging_events as $arranging_event)
   <div class="box2">  
<p>{{$arranging_event->title}}</p>
<p>{{$arranging_event->date}}</p>
</div>
@endforeach

 
</p>
</div>
</div>

<div class="tab_content" id="joinhistory_content">
<div class="tab_content_description">
<p class="c-txtsp">
 

  @foreach($joined_histories as $joined_history)
  <div class="box2"> 
<p>{{$joined_history->title}}</p>
<p>{{$joined_history->date}}</p>
</div>
@endforeach


</p>
</div>
</div>

<div class="tab_content" id="arrangehistory_content">
<div class="tab_content_description">
<p class="c-txtsp">


@foreach($arrnged_histories as $arrnged_history)
<div class="box2">
<p>{{$arrnged_history->title}}</p>
<p>{{$arrnged_history->date}}</p>

@endforeach


</p>
</div>
</div>


</div>


  </body>

</html>

@endif
@endsection