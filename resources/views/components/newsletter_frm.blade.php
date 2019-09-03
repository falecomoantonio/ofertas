<div class="container-fluid">
    <div class="row">
        <div class="col s12">
            <form class="">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" type="text" class="text-white validate" name="name" required />
                        <label for="name">Nome</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="email" type="email" class="text-white validate" name="email" required />
                        <label for="email">Email</label>
                    </div>
                    <div class="">
                        <button type="button" id="btnNewsletterSubmit" class="btn waves-effect waves-light btn-small"><i class="material-icons right">send</i> Cadastrar</button>
                    </div>
                </div>
            </form>
            <script type="text/javascript">
                var button = document.querySelector('#btnNewsletterSubmit');
                var name = document.getElementById('#name').value;
                var email = document.getElementById('#email').value;

                console.log({name:name, email:email});

                button.onclick = function(){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            if(this.responseText.status===1)
                                M.toast({html: 'Registramos seu email'})
                            else if(this.responseText.status===0)
                                M.toast({html: 'Email já registrado'})
                            else
                                M.toast({html: 'Erro no Servidor, tente novamente mais tarde'})
                        }
                    };
                    xhttp.open("POST", "{{ route("newsletters.register") }}", true);
                    xhttp.setRequestHeader("Content-type", "application/json");
                    xhttp.send();
                };

            </script>
        </div>
    </div>
</div>
