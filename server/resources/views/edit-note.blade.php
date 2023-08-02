@extends('layouts.app')

@section('title')
    {{ trans('translations.title_edit') }}
@endsection

@section('content')

    <div class="py-5 text-center">
        <h2 class="lead">{{ trans('translations.title_edit_page') }}</h2>
    </div>
    @include('inc.messages')
    <div class="container" style="margin-top: 40px">
        <form action="{{route('edit', ['id' => $data->id])}}" method="post">
            @csrf
            <div class="text-field">
                <label class="text-field__label" for="name">{{ trans('translations.subject') }}</label>
                <input type="text" name="name" value="{{ $data->name }}"
                       placeholder="{{ trans('translations.enter_subject') }}" id="name"
                       class="text-field__input">
            </div>
            <div class="text-field">
                <label class="text-field__label" for="message">{{ trans('translations.note') }}</label>
                <textarea name="message" id="message" class="text-field__input"
                          placeholder="{{ trans('translations.text') }}">{{ $data->message }}</textarea>
            </div>
            <button type="submit" class="button-login">{{ trans('translations.button_edit') }}</button>
        </form>
    </div>
@endsection
