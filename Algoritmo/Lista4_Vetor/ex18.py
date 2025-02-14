#leia um vetor de 10 números inteiros
#exiba na tela os números positivos e seus respectivos índices.
#Não use nenhuma função pronta da linguagem Python, a não ser len() e append().

numero = []
positivo = []
negativo = []
indice = []
for i in range(5):
    numero.append(int(input(f'Cadestre o {i + 1}º número: ')))

for i in range(len(numero)):
    if numero[i] > 0:
        positivo.append(numero[i])
        indice.append(i)
    if numero[i] < 0:
        negativo.append(numero[i])
print()

if positivo:
    print(f'Números positivos : {positivo}')
    print(f'Índices :           {indice}')
elif negativo:
    print('Não teve números positivos')
