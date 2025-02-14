numeros = []

for i in range(5):
    numeros.append(int(input(f'Cadastre o {i + 1}º número: ')))

for i in range(len(numeros)):
    if numeros[i] == 30:
        print(f'O elemento igual a 30 foi encontrado na posição {i}')
