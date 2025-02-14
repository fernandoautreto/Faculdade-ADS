void crescente(int nI, int nF) //recursiva
{
    /*
    while (nI <=nF)
    {
        Console.WriteLine(nI);
        nI++;
    }
    */
    if (nI <= nF)
    {
        Console.WriteLine(nI);
        crescente(nI + 1, nF);
    }
}

void decrescente(int nI, int nF)
{
    if (nF >= nI)
    {
        decrescente(nI + 1, nF);
        Console.WriteLine(nF);
        //decrescente(nI, nF - 1);
    }
}

void impar(int nI, int nF)
{
    if (nI <= nF)
    {
        if (nI % 2 != 0)
        {
            Console.WriteLine(nI);
        }
        impar(nI + 1, nF);
    }
}

/*int somatorio(int nI, int nF, int soma)
{
    if (nI <= nF)
    {
        return somatorio(nI + 1, nF, soma+= nI);
    }
    else
    {
        return soma;
    }
}
*/
int somatorio(int nI, int nF)
{
    if (nI <nF)
        return somatorio(nI+1, nF) + nI;
    else
        return nI;
}


int somaVetor(int[] n, int iI, int iF)
{
    if (iI < iF)
        return somaVetor(n, iI + 1, iF) + n[iI];
    else
        return n[iI];
   
}


while (true)
{
    Console.Clear();
    Console.WriteLine("MENU");
    Console.WriteLine("1 - Funçoes sem vetor");
    Console.WriteLine("2 - Função com vetor");
    Console.WriteLine("3 - Sair");
    Console.Write("Digite a opção desejada: ");
    string op = Console.ReadLine();
    if (op == "1")
    {

        Console.Write("Digite um número inicial: ");
        int nI = Convert.ToInt32(Console.ReadLine());
        Console.Write("Digite um número final: ");
        int nF = Convert.ToInt32(Console.ReadLine());
        Console.WriteLine("MENU 2");
        Console.WriteLine("1 - Exibir os números inteiros em ordem crescentes");
        Console.WriteLine("2 - Exibir os números inteiros em ordem decrescente");
        Console.WriteLine("3 - Exibir so os números inteiros ímpares");
        Console.WriteLine("4 - Somatório dos inteiros");
        Console.Write("Digite a opção desejada: ");
        string op2 = Console.ReadLine();
        if (op2 == "1")
        {
            crescente(nI, nF);
        }
        else if (op2 == "2")
        {
            decrescente(nI, nF);
        }
        else if (op2 == "3")
        {
            impar(nI, nF);
        }
        else if(op2 =="4")
        {
            Console.WriteLine(somatorio(nI,nF));
        }
    }

    else if (op == "2")
    {
        Console.Write("Digite quantos números deseja digitar: ");
        int tamanho = int.Parse(Console.ReadLine());
        int[] n = new int [tamanho];
        for (int i=0; i < tamanho; i++) 
        {
            Console.Write($"Digite um número: ");
            n[i] = int.Parse(Console.ReadLine());
        }
        Console.WriteLine(somaVetor(n, 0, tamanho - 1));
    }

    else if (op == "3")
    {
        Console.WriteLine("Encerrando o programa!!");
        break;
    }
    Console.ReadKey(); //ele espera teclar uma tecla, ai ele continua o codigo 
}