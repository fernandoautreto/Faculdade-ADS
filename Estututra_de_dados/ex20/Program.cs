
Pessoa topo = null;

void Insere(string nome, int indade, int whats)
{
    Pessoa no = new Pessoa();
    no.nome = nome;
    no.idade = indade;
    no.whats = whats;
    no.prox = topo;
    topo = no;
}

Pessoa Remove()
{
    Pessoa no = topo;
    if (topo != null)
        topo = topo.prox;
    return no;
}

void alterar(string nome)
{
    Pessoa buscar = topo; //aqui estou indicando que a verificação vai começar pelo topo
    bool encontrado = false;

    while (buscar != null)
    {
        if (buscar.nome == nome)
        {
            encontrado = true;
            Console.WriteLine("Nome: " + buscar.nome + "\nIdade: " + buscar.idade + "\nWhatsapp: " + buscar.whats);
            Console.WriteLine("Digite o novo nome desejado: ");
            buscar.nome = Console.ReadLine();
            Console.WriteLine("Digite o nova idade desejado: ");
            buscar.idade = Convert.ToInt32(Console.ReadLine());
            Console.WriteLine("Digite o novo whats desejado: ");
            buscar.whats = int.Parse(Console.ReadLine());
            break;
        }
        buscar = buscar.prox; // Avançando para o próximo elemento
    }
    if (encontrado == false)
    {
        Console.WriteLine("Não existe essa pessoa na lista.");
    }
    
}

void Imprimir()
{
    Pessoa pessoa = topo;
    while (pessoa != null)
    {
        Console.WriteLine("Nome: " + pessoa.nome);
        Console.WriteLine("Idade: " + pessoa.idade);
        Console.WriteLine("Whats: " + pessoa.whats);
        pessoa = pessoa.prox;
    }
    
}

while (true)
{
    Console.WriteLine("1. Inserir valor na lista");
    Console.WriteLine("2. Alterar valor da lista");
    Console.WriteLine("3. Remover valor da lista");
    Console.WriteLine("4. Imprimir lista");
    Console.WriteLine("5. Sair");
    Console.Write("Escolha uma opção: ");
    int op = int.Parse(Console.ReadLine());
    Console.WriteLine(" ");

    if (op == 1)
    {
        Console.Write("Digite o nome: ");
        string nome = Console.ReadLine();
        Console.Write("Digite a idade: ");
        int idade = int.Parse(Console.ReadLine());
        Console.Write("Digite o whatsapp: ");
        int whats = int.Parse(Console.ReadLine());
        Insere(nome, idade, whats);
    }

    else if (op == 2)
    {
        Console.Write("Digite o nome que deseja alterar: ");
        string nome = Console.ReadLine();
        alterar(nome);
    }
    else if (op == 3)
    {
        Console.Write("Digite o nome que deseja excluir os dados: ");
        string nome = Console.ReadLine();

        // Caso a lista esteja vazia
        if (topo == null)
        {
            Console.WriteLine("Pilha vazia."); // Mensagem informando que a pilha está vazia.
        }
        else if (topo.nome == nome) // Caso o topo seja o elemento a ser removido
        {
            // Exibe os dados do elemento a ser removido
            Console.WriteLine("Nome: " + topo.nome + "\nIdade: " + topo.idade + "\nWhatsapp: " + topo.whats);

            // Remove o topo da pilha chamando a função Remove()
            Remove();
            Console.WriteLine("Elemento removido do topo com sucesso.");
        }
        else
        {
            // Percorrendo a pilha para encontrar o elemento
            Pessoa anterior = topo;  // Começa no topo
            Pessoa atual = topo.prox; // Começa verificando o segundo nó

            bool encontrado = false; // Flag para verificar se o elemento foi encontrado

            while (atual != null)
            {
                // Verifica se o nome do nó atual é o nome a ser removido
                if (atual.nome == nome)
                {
                    // Exibe os dados do elemento a ser removido
                    Console.WriteLine("Nome: " + atual.nome + "\nIdade: " + atual.idade + "\nWhatsapp: " + atual.whats);

                    // Faz o anterior pular o nó atual, efetivamente removendo o nó atual da pilha
                    anterior.prox = atual.prox;
                    Console.WriteLine("Elemento removido com sucesso.");
                    encontrado = true; // Define como encontrado
                    break; // Encerra o loop, pois o nó foi removido
                }

                // Avança para o próximo nó
                anterior = atual;  // Atualiza o 'anterior' para o atual
                atual = atual.prox; // Atualiza o 'atual' para o próximo nó
            }

            // Se o elemento não foi encontrado
            if (!encontrado)
            {
                Console.WriteLine("Elemento não encontrado.");
            }
        }

        // Continua o fluxo da aplicação permitindo novas operações sem encerrar
    }
    else if (op == 4)
    {
        Imprimir();
    }
}


class Pessoa
{
    public string nome;
    public int idade;
    public int whats;
    public Pessoa prox;
}
