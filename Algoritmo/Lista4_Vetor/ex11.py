numeros = []
x2 = []
x3 = []

for i in range(4):
    numeros.append(int(input(f'Cadastre o {i + 1}º número: ')))

for i in range(len(numeros)):
    if numeros[i] % 2 == 0:
        x2.append(numeros[i])

    if numeros[i] % 3 == 0:
        x3.append(numeros[i])

print(x2)
print(x3)
print(x2, x3)