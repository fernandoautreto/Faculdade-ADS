int fib(int n)
{
    if (n==0)
    {
        return n;
    }
    else if (n==1)
    {
        return n;
    }
    else
    {
        return fib(n - 1) + fib(n - 2);
    }
}

Console.WriteLine("Digite um número para saber o fibonate dele: ");
int n = int.Parse(Console.ReadLine());
Console.WriteLine(fib(n));