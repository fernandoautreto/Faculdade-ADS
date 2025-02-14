Numero topo = null;
Numero atual = null, anterior = null;

void Insere(int numb)
{
    Numero no = new Numero();
    no.num = numb;
    no.proximo = topo;
    topo = no;
}

void Imprimir()
{
    Numero number = topo;
    while (number != null)
    {
        Console.WriteLine(number.num);
        number = number.proximo;
    }
}

void Buscar(int numero, ref Numero atual, ref Numero anterior)
{
    atual = topo;
    anterior = null;
    while(atual != null && atual.num != numero)
    {
        anterior = atual;
        atual = atual.proximo;
    }
}

void Remover(ref Numero atual, ref Numero anterior)
{
    if (atual != null)
    {
        if (atual == topo)
            topo = atual.proximo;
        else if (atual.proximo == null)
            anterior.proximo = null;
        else
            anterior.proximo = atual.proximo;
    }
}

Console.Write("Digite um número: ");
int numero = Convert.ToInt32(Console.ReadLine());
while (numero != 0)
{
    Insere(numero);
    Console.Write("Digite um número ou 0 para sair: ");
    numero = Convert.ToInt32(Console.ReadLine());
}

Console.Write("Digite um número para ser excluido: ");
int num_excluido = Convert.ToInt32(Console.ReadLine());
Buscar(num_excluido, ref atual, ref anterior);
Remover(ref  atual, ref  anterior);
Imprimir();
class Numero
{
    public int num;
    public Numero proximo;
}