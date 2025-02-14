

Pessoa topo = null;
Pessoa atual = null, anterior = null;

void Insere(string nome, int indade, int whats)
{
    Pessoa no = new Pessoa();
    no.nome = nome;
    no.idade = indade;
    no.whats = whats;
    no.prox = topo;
    topo = no;
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

void Buscar(string nome_busca, ref Pessoa atual, ref Pessoa anterior)
{
    atual = topo;
    anterior = null;
    while (atual != null && atual.nome != nome_busca)
    {
        anterior = atual;
        atual = atual.prox;
    }
}

void Remover(ref Pessoa atual, ref Pessoa anterior)
{
  if(atual != null)
  {
        if (atual == topo)
            topo = atual.prox;
        else if (atual.prox == null)
            anterior.prox = null;
        else
            anterior.prox = atual.prox;
  }
}

void Alterar(Pessoa atual)
{
    if (atual != null)
    {
        Console.WriteLine("Nome: " + atual.nome + "\nIdade: " + atual.idade + "\nWhatsapp: " + atual.whats);
        Console.WriteLine("Digite o novo nome desejado: ");
        atual.nome = Console.ReadLine();
        Console.WriteLine("Digite o nova idade desejado: ");
        atual.idade = Convert.ToInt32(Console.ReadLine());
        Console.WriteLine("Digite o novo whats desejado: ");
        atual.whats = int.Parse(Console.ReadLine());
        Console.WriteLine("Dados alterados com sucesso!!");
    }
    else
    {
        Console.WriteLine("Não existe essa pessoa na lista.");
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

    if (op == 1) //Inserir 
    {
        Console.Write("Digite o nome: ");
        string nome = Console.ReadLine();
        Console.Write("Digite a idade: ");
        int idade = int.Parse(Console.ReadLine());
        Console.Write("Digite o whatsapp: ");
        int whats = int.Parse(Console.ReadLine());
        Insere(nome, idade, whats);
    }
    else if (op == 2) // alterar 
    {
        Console.Write("Digite o nome que deseja pesquisar: ");
        string nome_consulta = Console.ReadLine();
        Buscar(nome_consulta, ref atual, ref anterior);
        Console.WriteLine("Nome: " + atual.nome + "\nIdade : " + atual.idade + "\nWhatsapp: "+ atual.whats);
        Alterar(atual);
    }
    else if (op == 3) // removoer
    {
        Console.Write("Digite um nome que deseja excluir: ");
        string nome_excluir = Console.ReadLine();
        Buscar(nome_excluir, ref atual, ref anterior);
        Remover(ref atual, ref anterior);

    }
    else if (op == 4) // imprimir
    {
        Imprimir();
    } 
    else
    {
        Console.WriteLine("Encerrando o programa...");
        break;
    }
}
class Pessoa
{
    public string nome;
    public int idade;
    public int whats;
    public Pessoa prox;
}