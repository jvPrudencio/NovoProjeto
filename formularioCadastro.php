<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title>Formulário de Login e Registro com HTML5 e CSS3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" type="text/css" href="LoginCadastro.css" />
</head>
<body>
    <div class="container" >
        <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
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
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

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
    
        <a class="links" id="paracadastro"></a>
        <a class="links" id="paralogin"></a>

        <div class="content">      


            <!--FORMULÁRIO DE CADASTRO-->
            <div id="cadastro">
                <form method="post" action="conexaoCadastro.php"> 
                    <h1>Cadastro</h1> 

                    <p> 
                        <label for="nome_cad">Seu nome</label>
                        <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="ex. João" />
                    </p>

                    <p> 
                        <label for="email_cad">Seu e-mail</label>
                        <input id="email_cad" name="email_cad" required="required" type="email" placeholder="ex. joao@gmail.com"/> 
                    </p>

                    <p> 
                        <label for="senha_cad">Sua senha</label>
                        <input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="ex. 1234"/>
                    </p>

                    <p>
                        <label for="cep_cad">Cep</label>
                        <input id="cep_cad" name="cep_cad" required="required" type="number" placeholder="ex. 73000000"/>
                    </p>

                    <p>
                        <label for="endereco_cad">Endereço</label>
                        <input id="endereco_cad" name="endereco_cad" required="required" type="text" placeholder="ex. quandra 7 conj A casa 23"/> 
                    </p>

                    <p>
                        <label for="bairro_cad">Bairro</label>
                        <input id="bairro_cad" name="bairro_cad" required="required" type="text" placeholder="ex. Sobradinho"/>
                    </p>

                    <p>
                        <label for="localidade_cad">Localidade</label>
                        <input id="localidade_cad" name="localidade_cad" required="required" type="text" placeholder="ex. Brasilia/DF"/>
                    </p>

                    <p> 
                        <input type="submit" value="Cadastrar"/> 
                    </p>

                    <p class="link">  
                        Já tem conta?
                        <a href="fomularioLogin.php"> Ir para Login </a>
                    </p>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>
