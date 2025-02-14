tp_no topo = null;

void Insere(int valor)
{
    tp_no no = new tp_no();
    no.valor = valor;
    no.prox = topo;
    topo = no;
}
tp_no Remove()
{
    tp_no no = topo;
    if (topo != null)
        topo = topo.prox;
    return no;
}
while (true)
{
    Console.WriteLine("1. Inserir valor na lista");
    Console.WriteLine("2. Remover valor da lista");
    Console.WriteLine("3. Sair");
    Console.Write("Escolha uma opção: ");
    int opcao = int.Parse(Console.ReadLine());
    Console.WriteLine(" ");
    if (opcao == 1)
    {
        Console.Write("Digite um número: ");
        int n = Convert.ToInt32(Console.ReadLine());
        Insere(n);
        Console.WriteLine("");
    }
    else if (opcao == 2)
    {
        tp_no removido = Remove(); // Remove o topo da lista
        if (removido != null)
        {
            Console.WriteLine($"Valor removido: {removido.valor}"); // Exibe o valor removido
            Console.WriteLine("");
        }
        else
        {
            Console.WriteLine("A lista está vazia.");
            Console.WriteLine("");
        }
    }
    else
    {
        Console.WriteLine("Saindo...");
        break;
    }
}
class tp_no
{
    public int valor;
    public tp_no prox;
}
