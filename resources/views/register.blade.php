<body>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label>login</label>
        <input type="text" name="login" required>
        <br>
        <label>email</label>
        <input type="email" name="email" required>
        <br>
        <label>full_name</label>
        <input type="text" name="full_name" required>
        <br>
        <label>phone</label>
        <input type="tel" name="phone" required>
        <br>
        <label>password</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">зарегистрироваться</button>
    </form>
</body>