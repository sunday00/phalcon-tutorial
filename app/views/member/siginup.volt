{{ get_doctype() }}

<html>
    <div class="mt-5">
        <h1>Sign Up</h1>
        {{ form( "signup/register", 'class': 'form mt-3', 'method': 'post' ) }}
            <div class="form-group">
                <p>
                    <label for="name">Name</label>
                    {{ text_field('name', 'class':'form-control') }}
                </p>
                <p>
                    <label for="email">Email</label>
                    {{ text_field('email', 'class':'form-control') }}
                </p>
                <p>
                    {{ submit_button('Register', 'class':'btn btn-primary form-control') }}
                </p>
            </div>
        {{ endform }}
    </div>
</html>

