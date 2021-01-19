<div class="form-group text-danger">
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
</div>

<form method="post" action="{{ $action }}">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="name">Full name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Full name" maxlength="10" value="{{ old('name', @$model->name) }}">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email"  maxlength="50" value="{{ old('name', @$model->email) }}">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" minlength="8" maxlength="30" placeholder="password">
    </div>
    <div class="form-group">
        <label for="password">Password again</label>
            <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="password">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary form-control">
    </div>
</form>
