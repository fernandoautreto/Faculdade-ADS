#Faça um programa que carregue um vetor com dez nomes e faça uma verificação se um determinado nome esta nesse vetor. Não use nenhuma função pronta da linguagem Python, a não ser len() e append().
nome = []
for i in range(4):
    nome.append(input(f'Digite o {i}° nome : ').strip().upper())
print(nome)

nome_existente = 'FERNANDO'

if nome_existente in nome:
    print('O nome está na lista')
else:
    print('O nome não esta na lista')


