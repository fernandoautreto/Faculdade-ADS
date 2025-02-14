n1 = float(input('Digite a sua primeira nota: '))
n2 = float(input('Digite a sua segunda nota: '))
aulas = int(input('Quantas aulas você teve ao todo: '))
falta = int(input('Quantas faltas você teve: '))
m = (n1+ n2)/2
if m>=6 and falta < aulas - (aulas * 75/100):
    print(f'Suas notas foram {n1} e {n2} e você teve uma média de {m:.2f} e teve frequência menor do que 75%, e assim está APROVADO')
else:
    print(f'Suas notas foram {n1} e {n2} e você teve uma média de {m:.2f} e e teve frequência maior do que 75%, e assim está REPROVADO')