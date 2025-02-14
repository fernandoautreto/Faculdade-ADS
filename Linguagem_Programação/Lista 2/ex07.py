#(Função sem retorno com parâmetro) Faça uma função/método para calcular a tabuada de um intervalo informado pelo usuário, por exemplo, tabuada do 3 ao 8.

def tabuadas(x, y):
    for i in range(x, y+1):
        print('\nTabuada do', i)
        for j in range(1, 10+1):
            print(j, 'x', i, '=', j * i)

def main():
    a = int(input('Digite um número: '))
    b = int(input('Digite outro número: '))
    tabuadas(a, b)
main()

