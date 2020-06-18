<h1>Hello assets</h1>

<?php $this->assets->outputCss(); ?>
<?php $this->assets->outputJs(); ?>

<h2>{{ animal1.name }}</h2>
<p>{{ animal1.eat('dear') }}</p>
{% set aa = animal1 %}
{{ aa.type|trim }}

{% for key, act in aa.like %}
<h3>{{key}}</h3>
    <p>{{act}}</p>
{% endfor %}