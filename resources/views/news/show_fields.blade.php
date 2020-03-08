<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $news->title }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    <p>{{ $news->body }}</p>
</div>

<!-- Featured Image Field -->
<div class="form-group">
    {!! Form::label('featured_image', 'Featured Image:') !!}
    <p>{{ $news->featured_image }}</p>
</div>

<!-- Video Field -->
<div class="form-group">
    {!! Form::label('video', 'Video:') !!}
    <p>{{ $news->video }}</p>
</div>

<!-- Link Field -->
<div class="form-group">
    {!! Form::label('link', 'Link:') !!}
    <p>{{ $news->link }}</p>
</div>

