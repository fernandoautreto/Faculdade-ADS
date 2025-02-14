#riar um algoritmo que a partir de um vetor de 10 elementos inteiros, crie outros dois vetores que receberão os elementos positivos e negativos e ao final apresente-os. Não use nenhuma função pronta da linguagem Python, a não ser len() e append().
numeros = []
numeros_positivos = []
numeros_negativos = []
zero = []
print('Digite números inteiros tanto positivos quanto negativos')
for i in range(6):
    numeros.append(int(input(f'Digite o {i}° número: ')))

for i in range(len(numeros)):
    if numeros[i] > 0:
        numeros_positivos.append(numeros[i])
    if numeros[i] < 0:
        numeros_negativos.append(numeros[i])
    if numeros[i] == 0:
        zero.append(numeros[i])


print('Apresentação dos valores positivos')
for i in range(len(numeros_positivos)):
    print(f'Índice: {i}         Elemento Positivo: {numeros_positivos[i]}')
print()

print('Apresentação dos valores positivos')
for i in range(len(numeros_negativos)):
    print(f'Índice: {i}         Elemento Negativo: {numeros_negativos[i]}')
print()

print('Apresentação dos valores positivos')
for i in range(len(zero)):
    print(f'Índice: {i}         Elemento Zero: {zero[i]}')













