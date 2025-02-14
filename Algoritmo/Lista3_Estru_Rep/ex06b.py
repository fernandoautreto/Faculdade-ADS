contador_maior_idade = 0
for qpessoas in range(1, 11):
    idade = int(input('Digite a idade '))
    if idade >= 18:
        contador_maior_idade = contador_maior_idade + 1
print('Foram encontrada',contador_maior_idade,'pessoas maior de 18.')