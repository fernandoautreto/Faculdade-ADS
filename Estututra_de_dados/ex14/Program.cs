//14) Escreva um programa que insira numa fila, vários números digitados pelo usuário. Após a digitação dos números, seu programa deve removê-los da fila para encontrar o maior, o menor e a média aritmética dos números. Por fim, informe os resultados encontrados.

int[] fila = new int[20];
int inicio = 0, fim = 0;

void Insere(int valor)
{
    fila[fim] = valor;
    fim = fim + 1;
}

int Remove()
{
    inicio = inicio + 1;
    return (fila[inicio - 1]);
}
bool EstaVazia()
{
    if (inicio == fim)
        return true;
    else
        return false;
}

bool EstaCheia()
{
    if (fim == 20)
        return true;
    else
        return false;
}

int contador = 0;
Console.WriteLine("Quer digitar um número?: ");
string decisao = Console.ReadLine();
while(decisao == "sim" || decisao =="SIM" || decisao == "Sim")
{
    Console.Write("Digite um número: ");
    int n = Convert.ToInt32(Console.ReadLine());
    Insere(n);
    Console.WriteLine("Quer digitar um número?: ");
    decisao = Console.ReadLine();
    contador += 1;
}

int maior = fila[0];
int menor = fila[0];
int soma = 0;

while (!EstaVazia())
{
    int nR = Remove();
    if (menor < nR)
        menor = nR;
    if (maior > nR)
        maior = nR;
    soma += nR;
}

float media = (soma / contador);
Console.WriteLine("Menor: " + menor);
Console.WriteLine("Maior: " + maior);
Console.WriteLine("Média: " + media);
