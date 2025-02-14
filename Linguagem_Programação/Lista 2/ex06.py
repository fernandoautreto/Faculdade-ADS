# (Função sem retorno com parâmetro) Faça uma função/método para calcular a tabuada de um número informado pelo usuário.
def tabu(x):
    for i in range(1, 10+1):
        print(i, 'x', x, '=', i * x)


def main():
    n = int(input('Qual tabuada deseja: '))
    tabu(n)

main()