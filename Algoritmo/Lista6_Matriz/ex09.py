#Faça um programa para gerar automaticamente números entre 0 e 99 de uma cartela de bingo. Sabendo que cada cartela deverá conter 5 linhas de 5 números (matriz 5 x 5), gere estes dados de modo a não ter números repetidos dentro das cartelas. O programa deve apresentar a cartela gerada.

import random
# gera um vetor com a sequência de números de 0 a 99
numeros_disponiveis = list(range(100))
print(numeros_disponiveis)
cartela = []
for linha in range(5):
    vet_linha = []
    for coluna in range(5):
        # inserção de números aleatórios sem repetição na matriz/cartela
        # shuffle() função que embaralha o vetor de números disponíveis
        random.shuffle(numeros_disponiveis)
        # no slide de vetor tem a função pop() que exclui neste caso o ultimo
        # valor do vetor numeros_disponiveis, quando exclui a função pop()
        # dá o número como reposta e nesse momento já o exclui
        vet_linha.append(numeros_disponiveis.pop())
    cartela.append(vet_linha)

for linha in range(len(cartela)): # len(matriz)-> qtde de linhas
    for coluna in range(len(cartela[0])):# len(matriz[0]) qtde de colunas
        print(cartela[linha][coluna],end='\t')
    print()