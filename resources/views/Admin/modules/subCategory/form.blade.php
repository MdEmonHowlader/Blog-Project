{!! Form::label('name', 'Name:') !!}
{!! Form::text('name', null, [
    'id' => 'name',
    'class' => 'form-control',
    'placeholder' => 'Enter categroy name',
]) !!}
{!! Form::label('slug', 'Slug:') !!}
{!! Form::text('slug', null, [
    'id' => 'slug',
    'class' => 'form-control',
    'placeholder' => 'Enter categroy slug',
]) !!}
{!! Form::label('category_id', 'Select Category') !!}
{!! Form::select('category_id', $categories, null, ['class' => 'form-select', 'placeholder' => 'Select category']) !!}
{!! Form::label('order_by', 'Sub Categroy Serial', ['class' => 'mt-2']) !!}
{!! Form::number('order_by', null, ['class' => 'form-control', 'placeholder' => 'Enter subcategroy serial']) !!}
{!! Form::label('status', 'Category Status', ['class' => 'mt-2']) !!}
{!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, [
    'class' => 'form-control',
    'placeholder' => 'Select category status',
]) !!}