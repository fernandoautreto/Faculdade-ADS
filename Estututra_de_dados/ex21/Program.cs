Numeros topo = null;
int[] vetor = new int[5];

void Inserir(int n)
{
    Numeros numb = new Numeros();
    numb.n = n;
    numb.proximo = topo;
    topo = numb; 
}

void Adicionar_vetor(int n, ref int i)
{
    vetor[i] = n;
    i++;
    
}

void Percorrer_vetor(int indice)
{
    if (indice >= vetor.Length)
    {
        return;
    }
    else
    {    
        Inserir(vetor[indice]);
        Percorrer_vetor(indice + 1);
    }
}

void Percorrer_lista()
{
    Numeros lista = topo;
    int maior = 0;
    int menor = 0;
    int soma = 0;
    int contador = 0;
    while(lista != null)
    {
        Maior_menor(ref maior, ref menor, lista);
        Soma(ref soma, lista);
        contador += 1;
        lista = lista.proximo;
    }
    Console.WriteLine(maior);
    Console.WriteLine(menor);
    Console.WriteLine(Divisao(soma, contador));
}

void Maior_menor(ref int maior, ref int menor, Numeros lista )
{
    if (lista.n >= maior)
    {
        maior = lista.n;
    }
    if (lista.n < menor || lista.n < maior)
    {
        menor = lista.n;
    }
}

void Soma(ref int soma, Numeros lista)
{
    soma += lista.n;
}

float Divisao(int soma, int contador)
{
    return (float)soma / contador;
}

void Imprimir()
{
    Numeros numero = topo;
    while (numero != null)
    {
        Console.WriteLine(numero.n);
        numero = numero.proximo;
    }
}

void preencher_vetor()
{
    int i = 0;
    while (true &&i < vetor.Length)
    {
        Console.Write("Digite 1 para adicionar um numero, e 0 para sair: ");
        int op = Convert.ToInt32(Console.ReadLine());
        if (op == 1)
        {
            Console.Write("digite um numero: ");
            int n = Convert.ToInt32(Console.ReadLine());
            Adicionar_vetor(n, ref i);
        }
        else
        {
            break;
        }
    }
}
/*
for (int cont = 0; cont < i; cont++)
{
    Console.WriteLine(vetor[cont]);
}
*/
preencher_vetor();
Percorrer_vetor(0);
Imprimir();
Percorrer_lista();

class Numeros 
{
    public int n;
    public Numeros proximo;
}