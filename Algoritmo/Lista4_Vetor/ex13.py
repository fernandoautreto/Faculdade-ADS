numeros = []
q_negativos = 0
soma_positivos = 0
for i in range(5):
    numeros.append(float(input(f'Digite um números REAL qualquer. [{i + 1}º]: ')))

for i in range(len(numeros)):
    if numeros[i] < 0:
        q_negativos += 1

    else:
        soma_positivos += numeros[i]
print()
print(f'Quantidade de números negativos: {q_negativos}')
print(f'Soma dos números positivos: {soma_positivos}')