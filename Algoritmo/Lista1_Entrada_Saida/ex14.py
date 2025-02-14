print('-' * 5, 'CALCULO DE IDADE', '-' * 5)
ano_nasc = int(input('Em que ano você nasceu: '))
ano_atual = int(input('Em que ano estamos: '))
idade_atual = ano_atual - ano_nasc
idade2050 = 2050 - ano_nasc
print('A tua idade atual é de {} anos, e em 2050 você tera {} anos'.format(idade_atual, idade2050))
