idade = int(input('Qual é a sua idade: '))
if idade < 5:
    print('Não se enquadra em nenhuma modalidade')
elif 5 <= idade <= 10:
    print('Você se enquadra na categoria inafntil')
elif 11 <= idade <= 17:
    print('Você se enquadra na categoria juvenil')
else:
    print('Você se enquadra na categoria adulto')

