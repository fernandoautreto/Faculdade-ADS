n1 = float(input('Qual foi a primeira nota: '))
n2 = float(input('Qual foi a segunda nota: '))
n3 = float(input('Qual foi a terceira nota: '))
m = (n1 + n2 + n3)/3
if 0 <= m < 3:
    print('Reprovado')
elif 3 <= m < 6:
    exame = 12 - m
    print(f'Está de exame, e precisa tiar uma nota {exame:.1f} para ser aprovado')
elif 6 <= m <=10:
    print('Aprovado')