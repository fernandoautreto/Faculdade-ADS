#leia um vetor com quinze posições para números inteiros.
#depois da leitura, em outro vetor, armazene a divisão de todos os elementos pelo maior valor do vetor, para isso encontre o maior elemento
#Mostre o vetor após os cálculos.
#Não use nenhuma função pronta da linguagem Python, a não ser len() e append().

numeros = []
maior = 0
vetor2 = []
for i in range(5):
    numeros.append(int(input(f'Digite o {i +1}º número: ')))

for i in range(len(numeros)):
    if i == 0:
        maior = numeros[i]
    if numeros[i] > maior:
        maior = numeros[i]
print(maior)

for i in range(len(numeros)):
    vetor2.append(numeros[i] / maior)

print(vetor2)

