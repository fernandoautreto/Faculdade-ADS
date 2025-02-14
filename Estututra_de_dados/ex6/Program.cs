string binario(int n)
{
    if (n == 1)
    {
        return "1";
    }
    else if (n == 0)
    {
        return "0";
    }
    else
    {
        return binario(n / 2) + (n % 2).ToString();
    }
}

int n = 10;
Console.WriteLine(binario(n));