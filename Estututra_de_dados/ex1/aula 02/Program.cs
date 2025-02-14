
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
            crescente(nI+1, nF);
        }
}

while (true)
{
    Console.WriteLine("MENU");
    Console.WriteLine("1 - Funçoes sem vetor");
    Console.WriteLine("2 - Função com vetor");
    Console.WriteLine("3 - Sair");
    Console.WriteLine("Digite a opção desejada");
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
        Console.WriteLine("Digite a opção desejada");
        string op2 = Console.ReadLine();
        if(op2 == "1")
            {
                crescente(nI,nF);
            }
    }

    else if (op == "2")
    {

    }

    else if (op == "3")
    {
        Console.WriteLine("Encerrando o programa!!");
        break;
    }
}