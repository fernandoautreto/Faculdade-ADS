numeros = []
maior = 0
menor = 0
posicao_maior = 0
posicao_menor = 0
for i in range(5):
    numeros.append(int(input(f'Cadestre o {i + 1}º número: ')))

for i in range(len(numeros)):
    if i == 0:
        maior = menor = numeros[i]
    if numeros[i] > maior:
        maior = numeros[i]
        posicao_maior = i
    if numeros[i] < menor:
        menor = numeros[i]
        posicao_menor = i

print(f'O maior número é {maior} e esta na posiçao {posicao_maior}')
print(f'O menor número é {menor} e esta na posiçao {posicao_menor}')
