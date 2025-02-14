#Faça um programa que carregue um vetor de oito elementos numéricos inteiros, calcule e mostre os números pares e suas respectivas índices/posições. Não use nenhuma função pronta da linguagem Python, a não ser len() e append().

numeros = []
for i in range(4):
    numeros.append(int(input('Digite um número qualquer: ')))

for i in range(4):
    if numeros[i] % 2 == 0:
        par = numeros[i]
        print(f'O número par digitado foi {par} . E seu índice é {i}')


for i in range(4):
    if numeros[i] % 2 != 0:
        print(f'O número impar digitado foi {numeros[i]}. E seu índice é {i}')




