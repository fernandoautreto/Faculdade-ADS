/*void cubos(int n)

{

    for (int i = 1; i <= n; i++)

        Controle.WrilteLine(i * i * i);

}
*/
/*
void cubos(int n, int i)
{
    
    if (i<=n)
    {
        Console.WriteLine(i * i * i);
        cubos(n, i+1);
    }
}
int i = 1;
int n = 3;
cubos(n, i);
*/
void cubos(int n)
{
    int i = n;
    if (n > 0)
    {
        cubos(n - 1);
        Console.WriteLine(i * i * i);
    }
}

int n = 3;
cubos(n);

