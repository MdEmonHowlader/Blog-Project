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

    <div class="row">
        <div class="col-md-6">
            {!! Form::label('category_id', 'Select Category') !!}
            {!! Form::select('category_id', $categories, null, [
                'id' => 'category_id',
                'class' => 'form-select',
                'placeholder' => 'Select category',
            ]) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('subCategory_id', 'Select Sub Category') !!}

            <select name="subCategory_id" class="form-select" id="subCategory_id">
                <option class="selected">Select Sub Category</option>
            </select>
        </div>
    </div>
    {!! Form::label('photo', 'Select Photo', ['class' => 'mt-2']) !!}
    {!! Form::file('photo', ['class'=>'form-control']) !!}

    {!! Form::label('description', 'Description', ['class' => 'mt-3']) !!}
    {!! Form::textarea('description', null, ['id'=>'description', 'class' => 'form-control', 'placeholder' => 'Description']) !!}
    {!! Form::label('tag_id', 'Tag', ['class' => 'mt-3']) !!}
<br/>
<div class="row">
    @foreach ($tags as $tag )
<div class="col-md-4">
    {!! Form::checkbox('tag_id',null, false) !!}
    <span>
        {{ $tag->name }}
    </span>
</div>
    
@endforeach

</div>


    @push('css')
    <style>
        .ck.ck-editor__main>.ck-editor__editable{
            min-height: 200px;
        }
    </style>        
    @endpush
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js"
            integrity="sha512-DdX/YwF5e41Ok+AI81HI8f5/5UsoxCVT9GKYZRIzpLxb8Twz4ZwPPX+jQMwMhNQ9b5+zDEefc+dcvQoPWGNZ3g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>

        <script>
            ClassicEditor.create(document.querySelector('#description')).catch(error => {
                console.error(error);
            });
            $('#category_id').on('change', function() {
                let category_id = $(this).val();
                let subCategory_element = $('#subCategory_id')
                subCategory_element.empty()
                subCategory_element.append('<option class="selected">Select Sub Category</option>')
                axios.get(window.location.origin + '/dashboard/get-subCategory/' + category_id).then(res => {
                    subCategory = res.data
                    subCategory.map((subCategory, index) => (
                        $('#subCategory_id').append(
                            `<option value="${subCategory.id}">${subCategory.name}`)
                    ))

                })
            })
            $('#title').on('input', function() {
                let name = $(this).val()
                let slug = name.replaceAll(' ', '-')
                $('#slug').val(slug.toLowerCase());
            })
        </script>
    @endpush
