# Criar um algoritmo que leia dados para um vetor de 100 elementos inteiros, imprimir o maior, o menor, o percentual de números pares e a média dos elementos do vetor. Obs.: percentual = quantidade contada * 100 / quantidade total. Não use nenhuma função pronta da linguagem Python, a não ser len() e append().
numero = []
soma_numero = 0
par = 0
for i in range(5):
    numero.append(int(input(f'Digite o {i}° número: ')))
    soma_numero += numero[i]


for i in range(5):
    if i == 0:
        menor = numero[i]
        maior = numero[i]

    if numero[i] > maior:
        maior = numero[i]

    if numero[i] < menor:
        menor = numero[i]

    if numero[i] % 2 == 0:
        par += 1

percentual = (par * 100) / len(numero)
media = soma_numero / len(numero)
print(maior, menor, par, i)
print(percentual, media)
