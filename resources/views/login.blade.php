<body>
    <form action="{{ route('loginForm') }}" method="post">
        @csrf
        <label>login</label>
        <input type="text" name="login" required>
        <br>
        <label>password</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">войти</button>
    </form>
</body>