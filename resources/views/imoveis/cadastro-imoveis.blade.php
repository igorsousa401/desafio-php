<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Imovéis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('app.imoveis.store') }}">
                        @csrf
                        <div>
                            <x-input-label for="titulo" :value="__('Título')" />
                            <x-text-input id="titulo" class="block mt-1 mb-4 w-full" type="text" name="titulo" :value="old('titulo')" required autofocus />

                            <x-input-label for="descricao" :value="__('Descrição')" />
                            <x-text-input id="descricao" class="block mt-1 mb-4 w-full" type="text" name="descricao" :value="old('descricao')" required autofocus />

                            <x-input-label for="preco" :value="__('Preço')" />
                            <x-text-input id="preco" class="block mt-1 mb-4 w-full" type="text" name="preco" :value="old('preco')" required autofocus />

                            <x-input-label for="cep" :value="__('CEP')" />
                            <x-text-input onblur="pesquisacep(this.value);" id="cep" class="block mt-1 mb-4 w-full" type="text" name="cep" :value="old('cep')" required autofocus />

                            <x-input-label for="rua" :value="__('Rua')" />
                            <x-text-input id="rua" class="block mt-1 mb-4 w-full" type="text" name="rua" :value="old('rua')" required autofocus />

                            <x-input-label for="bairro" :value="__('Bairro')" />
                            <x-text-input id="bairro" class="block mt-1 mb-4 w-full" type="text" name="bairro" :value="old('bairro')" required autofocus />

                            <x-input-label for="cidade" :value="__('Cidade')" />
                            <x-text-input id="cidade" class="block mt-1 mb-4 w-full" type="text" name="cidade" :value="old('cidade')" required autofocus />

                            <x-input-label for="estado" :value="__('Estado')" />
                            <x-text-input id="estado" class="block mt-1 mb-4 w-full" type="text" name="estado" :value="old('estado')" required autofocus />

                            @if(session()->has('error'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-3 rounded relative" role="alert">
                                    <strong class="font-bold">Erro</strong>
                                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                    </span>
                                </div>
                            @endif
                            @if(session()->has('sucess'))
                                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 mt-3 shadow-md" role="alert">
                                    <div class="flex">
                                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                        <div>
                                            <p class="font-bold">Sucesso</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <button type="submit" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                {{ __('Registrar Imóvel') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="relative overflow-x-auto">
                <h2 class="font-semibold text-[3em] text-center pt-1 pb-2 text-gray-800 dark:text-gray-200 leading-tight mt-10">
                    Imóveis
                </h2>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Título
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descrição
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Preço
                        </th><th scope="col" class="px-6 py-3">
                            CEP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rua
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bairro
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cidade
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>



                    </tr>
                    </thead>
                    <tbody>
                    @foreach($imoveis as $imovel)
                        @foreach($imovel as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$item['titulo']}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$item['descricao']}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item['preco']}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item['cep']}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item['rua']}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item['bairro']}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item['cidade']}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item['estado']}}
                                </td>


                                <td class="px-6 py-4">
                                    <form method="POST" action="{{route('app.imoveis.destroy', $item['id'])}}">
                                        @csrf
                                        <button type="submit" class="block text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:ring-red-600 dark:focus:ring-red-800">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('estado').value=(conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {
            console.log('Entrou!');
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
                    document.getElementById('estado').value="...";

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

        function toggleModal(modalID){
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
    </script>



</x-app-layout>

