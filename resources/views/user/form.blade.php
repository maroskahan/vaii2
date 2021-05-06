<div class="form-group text-danger">
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
</div>

<form method="post" action="{{ $action }}">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="name">Meno</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Meno" maxlength="10" value="{{ old('name', @$model->name) }}">
    </div>
    <div class="form-group">
        <label for="email">E-mailová adresa</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="E-mailová adresa"  maxlength="50" value="{{ old('name', @$model->email) }}">
    </div>
    <div class="form-group">
        <label for="password">Heslo</label>
            <input type="password" class="form-control" id="password" name="password" minlength="8" maxlength="30" placeholder="Heslo">
    </div>
    <div class="form-group">
        <label for="password">Potvrdenie hesla</label>
            <input type="password" class="form-control" id="password_again" name="password_confirmation" placeholder="Potvrdenie hesla">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary form-control">
    </div>
</form>
