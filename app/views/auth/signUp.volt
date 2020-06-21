{% extends "layouts/common.volt" %}

{% block contents %}
    <form class="form-signin" action="/auth/register" method="post">
        <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}">
        <img class="mb-4" src="https://api.adorable.io/avatars/130/abott@adorable.png" alt="placeholder" style="border-radius: 50%;">

        <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputConfirmPassword" class="sr-only">Password</label>
        <input type="password" name="password_confirm" id="inputConfirmPassword" class="form-control" placeholder="Password confirm" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
{% endblock %}
