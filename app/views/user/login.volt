<h1>volt</h1>

{{ form(['for' : 'user-login'], 'method' : 'post', 'class'  : 'input', 'some':'a') }}
    {{ text_field('username') }}
    {{ password_field('password') }}
    {{ submit_button('login') }}
{{ end_form() }}

{{ form('/user/loginGet', 'method' : 'get', 'class'  : 'input', 'some':'a') }}
    {{ text_field('username') }}
    {{ password_field('password') }}
    {{ submit_button('login') }}
{{ end_form() }}

<form action="/user/login?a=b" method="post">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="submit" value="login">
</form>

<form action="/post/store" method="post">
    <input type="text" name="email">
    <input type="password" name="password">
    <textarea name="content"></textarea>
    <input type="submit">
</form>