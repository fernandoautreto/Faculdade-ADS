qpessoas = 1
contador_maior_idade = 0
while qpessoas <= 10:
    idade = int(input('Digite a idade '))
    if idade >= 18:
        contador_maior_idade = contador_maior_idade + 1
    qpessoas = qpessoas + 1
print('Foram encontrada',contador_maior_idade,'pessoas maior de 18.')
