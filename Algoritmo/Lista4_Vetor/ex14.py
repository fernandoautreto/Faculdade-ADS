numeros = []
par = []
impar = []

for i in range(5):
    numeros.append(int(input(f'Cadestre o {i + 1}º número: ')))

for i in range(len(numeros)):
    if numeros[i] % 2 == 0 and numeros[i] != 0:
        par.append(numeros[i])

    elif numeros[i] % 2 != 0 and numeros[i] != 0:
        impar.append(numeros[i])

print(f'Os números pares são: {par}')
print(f'Os números impares são: {impar}')