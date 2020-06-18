<h1>volt</h1>

<?= $this->tag->form([['for' => 'user-login'], 'method' => 'post', 'class' => 'input', 'some' => 'a']) ?>
    <?= $this->tag->textField(['username']) ?>
    <?= $this->tag->passwordField(['password']) ?>
    <?= $this->tag->submitButton(['login']) ?>
<?= $this->tag->endForm() ?>

<?= $this->tag->form(['/user/loginGet', 'method' => 'get', 'class' => 'input', 'some' => 'a']) ?>
    <?= $this->tag->textField(['username']) ?>
    <?= $this->tag->passwordField(['password']) ?>
    <?= $this->tag->submitButton(['login']) ?>
<?= $this->tag->endForm() ?>

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