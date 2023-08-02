@extends('layouts.app')

@section('title')
    {{ trans('translations.title') }}
@endsection

@section('content')

    <div class="container" style="display: flex;
    justify-content: center;">
        <h1 class="posts-list">

            @if($data->items() == null)
                <p>Ничего не нашлось</p>
                <a href="{{ route('not.completed.notes') }}">
                    <button style="margin-bottom: 20px" class="btn btn-post">Вернуться</button>
                </a>
            @else
                @include('inc.messages')

                @php
                    $userId = auth()->id();
                    $hasNotes = false;
                @endphp
                @foreach($data as $note)
                    @if($note->user_id == $userId)
                        <article id="post-{{ $note->id }}" class="post">
                            <div class="post-content">
                                <h2 class="post-title">{{ $note->name }}</h2>
                                <p>{{ $note->message }}</p>
                                <div class="post-footer">
                                    <a href="{{ route('note.complete',['id' => $note->id, 'name' => $note->name, 'message' => $note->message])  }}">
                                        <button class="btn btn-post">{{ trans('translations.done') }}</button>
                                    </a>
                                    <a href="{{ route('note.edit', ['id' => $note->id, 'name' => $note->name, 'message' => $note->message]) }}">
                                        <button class="btn btn-post">{{ trans('translations.edit') }}</button>
                                    </a>
                                    <a href="{{ route('note.delete', ['id' => $note->id]) }}">
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
                        <h2 style="margin-bottom: 30px " class="lead">{{ trans('translations.notes') }}</h2>
                    </div>
        @endif
    </div>
    {{$data->links()}}
    @endif
@endsection
