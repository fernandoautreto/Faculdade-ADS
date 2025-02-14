#Faça um algoritmo que calcule e apresente a média de alturas superior a 1,80 de 10 alunos. Informe também quantos e quais (índice/posição) são os alunos. Não use nenhuma função pronta da linguagem Python, a não ser len() e append().
nome = []
altura = []

for i in range(3):
    nome.append(input(f'Digite o {i}° nome: '))
    altura.append(float(input(f'Difite a altura da {i}° pessoa: ')))

for i in range(len(altura)):
    if altura[i] > 1.80:
        print(f'O aluno {nome[i]} tem {altura[i]:.2f}m de altura, sendo superior a média de 1.80m. E seu índice é {i}')

