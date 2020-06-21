{% block header %}
    <header>
        <section class="header">
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="/">FireBall</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                    <ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Member</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                {% if session.get('role') %}
                                    <form action="/auth/logout" method="post">
                                        <input class="dropdown-item" type="submit" value="Logout" />
                                    </form>
                                    <a class="dropdown-item" href="/auth/info">Info</a>
                                {% else %}
                                    <a class="dropdown-item" href="/auth/signUp">SignUp</a>
                                    <a class="dropdown-item" href="/auth/index">LogIn</a>
                                {% endif %}
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </section>
    </header>
{% endblock %}

{% block contents %}

{% endblock %}

{% block msg %}
    {{ flash.output() }}
    {{ flashSession.output() }}
{% endblock %}