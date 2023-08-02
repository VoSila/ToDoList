@extends('layouts.app')

@section('title')
    {{ trans('translations.title_done') }}
@endsection

@section('content')
    <div class="py-5 text-center">
        <h2 style="margin-bottom: 30px " class="lead">{{ trans('translations.text_done') }}</h2>
    </div>
    <div class="container" style="display: flex; justify-content: center;">
        <h1 class="posts-list">
            @include('inc.messages')

            @php
                $userId = auth()->id();
                $hasNotes = false;
            @endphp

            @foreach($data as $element)

                @if($element->user_id == $userId)
                    <article id="post-1" class="post">
                        <div class="post-content">
                            <h2 class="post-title">{{ $element->name }}</h2>
                            <p>{{ $element->message }}</p>
                            <div class="post-footer">
                                <a href="{{ route('not.complete.notes', ['id' => $element->id, 'name' => $element->name, 'message' => $element->message]) }}">
                                    <button class="btn btn-post">{{ trans('translations.cancel') }}</button>
                                </a>
                                <a href="{{ route('note.delete', $element->id) }}">
                                    <button class="btn btn-post">{{ trans('translations.delete') }}</button>
                                </a>
                            </div>
                        </div>
                    </article>
                    @php
                        $hasNotes = true;
                    @endphp
                @endif
            @endforeach

            @if (!$hasNotes)
                <div class="py-5 text-center">
                    <h2 style="margin-bottom: 30px " class="lead">{{ trans('translations.notes_title') }}</h2>
                </div>
        @endif
    </div>
    {{$data->links()}}
@endsection
