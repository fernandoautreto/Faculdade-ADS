#3. Faça um programa que carregue um vetor de dez elementos que contenha o nome de pessoas e outro que contenha o peso, encontre qual a pessoa mais gorda e mais magra e apresente o nome o peso das mesmas.​ Use dois vetores, um para peso e outro para nome. Não use nenhuma função pronta da linguagem Python, a não ser len() e append().

nome = []
peso = []
mais_gordo = 0
mais_magro = 0
nome_gordo = 0
nome_magro = 0
for i in range(3):
    nome.append(input(f'Digite o nome da pessoa {i}: '))
    peso.append(float(input(f'Digite o peso da pessoa {i}: ')))

for i in range(3):
    if i == 0:
        mais_gordo = peso[i]
        mais_magro = peso[i]
        nome_gordo = nome[i]
        nome_magro = nome[i]
    if peso[i] > mais_gordo:
        mais_gordo = peso[i]
        nome_gordo = nome[i]
    if peso[i] < mais_magro:
        mais_magro = peso[i]
        nome_magro = nome[i]
print(f'O mais gordo foi o {nome_gordo} e seu peso é de {mais_gordo}.')
print(f'O mais magro foi {nome_magro} e seu peso é de {mais_magro}.')

for i in range(3):
    if peso[i] == mais_gordo:
       print(f'O maior peso digitado foi {mais_gordo} na posição {i}')

    
