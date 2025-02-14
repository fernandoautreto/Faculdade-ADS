
int potencia(int x, int y)
{
    if (y == 0) 
    {
        return 1;
    }
    else if (y >=1)
    {
        return x * potencia(x, y - 1);
    }

}
Console.Write("Digite um número para X: ");
int x = int.Parse(Console.ReadLine());
Console.Write("Digite um número para Y: ");
int y = int.Parse(Console.ReadLine());

Console.WriteLine(potencia(x, y));
