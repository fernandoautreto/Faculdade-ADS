genero = str(input('Qual é o seu gênero (M/F): ')).strip().upper()
altura = float(input('Qual é a sua altura: '))
pim = (72.7 * altura) - 58
pif = (62.1 * altura) - 44.7
if genero == 'M':
    print(f'O seu peso ideal é de {pim:.2f} kg')
else:
    print(f'O seu peso ideal é de {pif:.2f} kg')




