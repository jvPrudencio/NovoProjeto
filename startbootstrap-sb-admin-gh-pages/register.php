<!DOCTYPE html>
<html lang="en">

<head>
    
     <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco_cad').value=("");
            document.getElementById('bairro_cad').value=("");
            document.getElementById('localidade_cad').value=("");
            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('endereco_cad').value=(conteudo.logradouro);
            document.getElementById('bairro_cad').value=(conteudo.bairro);
            document.getElementById('localidade_cad').value=(conteudo.localidade);
            ;
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('endereco_cad').value="...";
                document.getElementById('bairro_cad').value="...";
                document.getElementById('localidade_cad').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header"><b>Cadastro</b></div>
      <div class="card-body">
        <form method="post" action="conexaoCadastro.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="nome_cad" class="form-control" placeholder="Ex. João" required autofocus="autofocus">
                  <label for="nome_cad">Nome</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="cep_cad" class="form-control" placeholder="Last name" required maxlength="9" onblur="pesquisacep(this.value);">
                  <label for="cep_cad">Cep</label>
                </div>
              </div>
                
                <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="endereco_cad" class="form-control" placeholder="Last name" required maxlength="9" onblur="pesquisacep(this.value);">
                  <label for="endereco_cad">Endereço</label>
                </div>
              </div>
                
                <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="bairro_cad" class="form-control" placeholder="Last name" required="required" maxlength="9" onblur="pesquisacep(this.value);">
                  <label for="bairro_cad">Bairro</label>
                </div>
              </div>
                
                <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lacalidade_cad" class="form-control" placeholder="Last name" required maxlength="9" onblur="pesquisacep(this.value);">
                  <label for="localidade_cad">Localidade</label>
                </div>
              </div>
                
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email_cad" class="form-control" placeholder="Ex. joao@gmail.com" required>
              <label for="email_cad">Email</label>
            </div>
          </div>
            
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="senha_cad" class="form-control" placeholder="Password" required>
                  <label for="senha_cad">Senha</label>
                </div>
              </div>
                
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required>
                  <label for="confirmPassword">Confirmar Senha</label>
                </div>
              </div>
                
            </div>
              
          </div>
            <a class="btn btn-primary btn-block" href="login.php">Registrar-me</a>
        </form>
        <div class="text-center">
            <a class="d-block small mt-3" href="login.php">Entrar</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
