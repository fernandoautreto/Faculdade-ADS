# Inicializa a diagonal principal como uma lista vazia
diagonal_principal = []

for i in range(2):
    for j in range(2):
        num = int(input(f'digite o {i*2 + j + 1} número da tabela: '))
        if i == j:
            diagonal_principal.append(num)

# Imprime a diagonal principal
for num in diagonal_principal:
    print(num)
