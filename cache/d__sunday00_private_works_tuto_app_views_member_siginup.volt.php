<?= $this->tag->getDoctype() ?>

<html>
    <div class="mt-5">
        <h1>Sign Up</h1>
        <?= $this->tag->form(['signup/register', 'class' => 'form mt-3', 'method' => 'post']) ?>
            <div class="form-group">
                <p>
                    <label for="name">Name</label>
                    <?= $this->tag->textField(['name', 'class' => 'form-control']) ?>
                </p>
                <p>
                    <label for="email">Email</label>
                    <?= $this->tag->textField(['email', 'class' => 'form-control']) ?>
                </p>
                <p>
                    <?= $this->tag->submitButton(['Register', 'class' => 'btn btn-primary form-control']) ?>
                </p>
            </div>
        <?= $endform ?>
    </div>
</html>

