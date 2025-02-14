#8. Faça um programa que leia uma matriz 4 x 4.
#* Apresente os valores/elementos e seus respectivos índices (linhas e colunas) que estão na diagonal principal.
#* Calcule e apresente a soma dos elementos acima da diagonal principal, que estão em negrito e com a cor de fundo amarela.

#fazer uma matriz 4x4
matriz = []
i = 0
for linha in range(4):
    vet_linha = []
    for coluna in range(4):
        vet_linha.append(int(input(f'digite o {i + 1}º número da tabela: ')))
        i += 1
    matriz.append(vet_linha)
#imprimindo a matriz 
for linha in range(len(matriz)):
    for coluna in range(len(matriz[0])):
        print(matriz[linha][coluna], end='\t')
    print()
print()
#fazendo a verficaçao da diagonal principal, nesse caso sempre vou ter que usar a variavel para linha e coluna iguais
diagonal = []
for linha in range(len(matriz)):
    diagonal.append(matriz[linha][linha])
print(f'Diagonal principal: {diagonal}')
print()

#fazendo a soma dos número acima na diagonal principal
soma = 0
for linha in range(len(matriz)):
    for coluna in range(len(matriz[0])):
        if matriz[coluna] > matriz[linha]:
            soma += matriz[linha][coluna]
print(f'A soma de todos os números acima da diagonal principal ({diagonal}) é igual a {soma}')
        

