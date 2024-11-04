{!! Form::label('title', 'Title:') !!}
{!! Form::text('title', null, [
    'id' => 'title',
    'class' => 'form-control',
    'placeholder' => 'Enter post title',
]) !!}
{!! Form::label('slug', 'Slug:') !!}
{!! Form::text('slug', null, [
    'id' => 'slug',
    'class' => 'form-control',
    'placeholder' => 'Enter post slug',
]) !!}
{!! Form::label('status', 'Post Status', ['class' => 'mt-2']) !!}
{!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, [
    'class' => 'form-control',
    'placeholder' => 'Select post status',
]) !!}