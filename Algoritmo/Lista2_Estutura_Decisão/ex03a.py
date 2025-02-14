#leia duas notas de um alunon
n1 = float(input('Digite a primeira nota: '))
n2 = float(input('Digite a segunda nota: '))
#calcule a média
m = (n1 + n2)/2
#se esta aprovado ou reprovado
if m>=6:
    print(f'Suas notas foram {n1} e {n2} e você teve uma média de {m:.2f}, e com essa nota você esta APROVADO')
else:
    print(f'Suas notas foram {n1} e {n2} e você teve uma média de {m:.2f}, e com essa nota você esta REPORVADO')
