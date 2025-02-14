#Faça um programa que carregue um vetor com a média de dez alunos, calcule e mostre a MÉDIA DA SALA e quantos alunos estão acima e abaixo da média da sala. Não use nenhuma função pronta da linguagem Python, a não ser len() e append().

soma_nota = 0
notas_maior_media = 0
notas_menor_media = 0

nota = []
for i in range(3):
    nota.append(float(input(f'Qual foi a nota do {i}° aluno: ')))
    soma_nota += nota[i]
media_nota = soma_nota / len(nota)
print(f'A média da sala foi de {media_nota:.2f}.')



for i in range(3):
    if nota[i] >= media_nota:
        notas_maior_media += 1
print(f'Teve {notas_maior_media} notas maiores que a média que foram {nota[i]} e estão nas posições ', end='')
for i, v in enumerate(nota):
    if nota[i] >= media_nota:
        print(f'{i}; ', end='')
print()



for i in range(3):
    if nota[i] < media_nota:
        notas_menor_media += 1
print(f'Teve {notas_menor_media} notas mais baixa que a média, e que foram {nota[i]} e estão nas posições .', end='')
for i, v in enumerate(nota):
    if nota[i] < media_nota:
        print(f'{i}; ', end='')
print()



