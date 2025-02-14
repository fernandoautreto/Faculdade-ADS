int mdc( int x, int y)
{
    if (x == y)
        return x;
    
    else if(x<y)
    {
        return mdc(y, x);
    }
    else
    {
        return mdc(x - y, y);
    }

}

Console.WriteLine("Digite um número: ");
int x =int.Parse(Console.ReadLine());
Console.WriteLine("Digite outro número: ");
int y = int.Parse(Console.ReadLine());
Console.WriteLine("O maior divisor comundo é " + mdc(x, y));