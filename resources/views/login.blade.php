<form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf

    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit">Login</button>

    @error('login')
        <p>{{ $message }}</p>
    @enderror
</form>
