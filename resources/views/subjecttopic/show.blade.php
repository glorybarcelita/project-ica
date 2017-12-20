@extends('layouts.app')
@section('content')
{{-- <a href="{{ route('subjecttopic.index') }}" class="btn btn-md btn-outline-secondary">Go Back</a> --}}
<div class="container mt-4">
     <h3 class="text-info">{{ $subject->name }} > {{ $syllabus->name }} > {{ $topic->topic_title }}</h3>
    <br>
    <table class="table">
      <tr>
        <td style="width: 150px;">Notes:
        </td>
        <td>
            {{ $topic->note }}
        </td>
      </tr>
      <tr>
        <td style="width: 150px;">Links:
        </td>
        <td>
          @foreach($vid_links  as $link)
          <div class="col-lg-4 mt-4">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="{{$link->link}}" allowfullscreen></iframe>
            </div>
          </div>
          @endforeach
        </td>
      </tr>
      <tr>
        <td style="width: 150px;">Attachments:
        </td>
        <td>
          @if($file_count>0)
            @foreach($file_count as $file)
              <p><a href="{{ url('storage/'.$file) }}">{{str_replace('subjects/topic/'.$topic->id.'/','',$file)}}</a></p>
            @endforeach
          @else
          <p>No file attached.</p>
          @endif
        </td>
      </tr>
    </table>
</div>

@endsection