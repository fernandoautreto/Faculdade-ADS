numeros = []
soma = 0

for i in range(5):
    numeros.append(int(input(f'Digite o {i +1}º número: ')))

for i in range(len(numeros)):
    soma += numeros[i]

    print(numeros[i], end = ' + ')
print('=', end =' ')
print(soma)

