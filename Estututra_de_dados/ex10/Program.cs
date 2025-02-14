char[] pilha = new char[20]; // Tamanho da pilha 
int topo = 0;

void Insere(char palavras)
{
    pilha[topo] = palavras;
    topo = topo + 1;
}

char Remove()
{
    topo = topo - 1;
    return pilha[topo];
}

bool EstaVazia()
{
    if (topo == 0)
        return true;
    else
        return false;
}

bool EstaCheia()
{
    if (topo == 20)
        return true;
    else
        return false;
}

string frase = "";
Console.Write("Digite uma frase: ");
frase = Console.ReadLine();

int letras = frase.Length;
int i = 0;

// Percorre cada caractere da frase
while (i < letras)
{
    if (frase[i] != ' ')
    {
        Insere(frase[i]); // Empilha o caractere
        if (i == letras - 1)
        {
            // Desempilha e exibe a última palavra, após o fim da frase
            while (!EstaVazia())
            { 
                Console.Write(Remove());
            }
        } 
    }
    else
    {
        // Desempilha e exibe os caracteres até encontrar um espaço
        while (EstaVazia() == false)
        {
            Console.Write(Remove());
        }
        Console.Write(" "); // Exibe o espaço após a palavra invertida
    }
    i++;
}




