{!! Form::label('name', 'Name:') !!}
{!! Form::text('name', null, [
    'id' => 'name',
    'class' => 'form-control',
    'placeholder' => 'Enter tag name',
]) !!}
{!! Form::label('slug', 'Slug:') !!}
{!! Form::text('slug', null, [
    'id' => 'slug',
    'class' => 'form-control',
    'placeholder' => 'Enter tag slug',
]) !!}
{!! Form::label('order_by', 'tag Serial', ['class' => 'mt-2']) !!}
{!! Form::number('order_by', null, ['class' => 'form-control', 'placeholder' => 'Enter tag serial']) !!}
{!! Form::label('status', 'Tag Status', ['class' => 'mt-2']) !!}
{!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, [
    'class' => 'form-control',
    'placeholder' => 'Select tag status',
]) !!}