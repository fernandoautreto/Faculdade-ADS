int recursao(int n)
{
    if (n <= 10)
    {
        Console.WriteLine(n);
        return n * 2;
    }
    else
    {
        int r1 = recursao(n / 3);
        int r2 = recursao(r1);
        Console.WriteLine(r2);
        return r2;
    }
}
int n = 27;
Console.WriteLine(recursao(n));