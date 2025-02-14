from math import ceil
aluno = 1
total_idade = 0
while aluno <=5:
    idade = int(input(f'Digite a idade do aluno {aluno}: '))
    total_idade = total_idade + idade
    aluno = aluno + 1
media_idade = total_idade / 5
print(f'A media de idade entre os alunos é de {ceil(media_idade)} anos')