<script src="https://cdn.tiny.cloud/1/zod9viouwgxtv5q7xv9yjk9bkdvb9qs0dvqv6uhgxvip0n7e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector:'#text'
    })
</script>
<div class="form-group text-danger">
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
</div>

<form method="post" action="{{ $action }}">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="text">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Titulok" value="{{ old('title', @$model->title) }}">
    </div>
    <div class="form-group">
        <label for="text">Text</label>
        <textarea type="text" class="form-control" id="text" name="text" placeholder="Text clanku" value="{{ old('text', @$model->text) }}"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary form-control">
    </div>
</form>
