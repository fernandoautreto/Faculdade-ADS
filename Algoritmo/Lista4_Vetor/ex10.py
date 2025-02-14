numeros = []
par = []
q_par = 0
impar = []
q_impar = 0

for i in range(4):
    numeros.append(int(input(f'Digite o {i + 1}º número: ')))

for i in range(len(numeros)):
    if numeros[i] % 2 == 0:
        par.append(numeros[i])
        q_par += 1

    else:
        impar.append(numeros[i])
        q_impar += 1

print(par, q_par)
print(impar, q_impar
)