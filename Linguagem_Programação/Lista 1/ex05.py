#5. (Função sem retorno sem parâmetro) Faça uma função/método que receba o preço antigo e atual de um produto, determine o percentual de acréscimo entre esses valores e apresente-o.

def percentual():
    atual = float(input('Digite o preço atual do produto: R$ '))
    antigo = float(input('Digite o preço antigo do produto: R$ '))

    if atual > antigo:
        percent = ((atual - antigo) * 100) / antigo
        print(f'Teve {percent:.2f}% de aumento.')
    else:
        percent = ((antigo - atual) * 100) / antigo
        print(f'Teve {percent:.2f}% de desconto.')

def main():
    percentual()
main()