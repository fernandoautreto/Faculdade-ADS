#leia o nome e a idade
nome = str(input('Digite seu mone: ')).strip()
idade = int(input('Digite a sua idade: '))
#informe se ela é maior ou menor de idade
if idade>=18:
    print(f'Sua idade é {idade}. Você já é maior de idade')
else:
    print(f'Sua idade é {idade}. Você não é maior de idade ainda')


